<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Model\MidtransPayment;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;

class MidtransController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

        // Set midtrans configuration
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function submitProduct()
    {
        \DB::transaction(function(){
            // Save donasi ke database
            $order = Order::create([
                'user_email' => $this->request->email,
                'name' => $this->request->name,
                'alamat_lengkap' => $this->request->alamat_lengkap,
                'provinsi' => $this->request->provinsi,
                'kota' => $this->request->kota,
                'kecamatan' => $this->request->kecamatan,
                'kode_pos' => $this->request->kode_pos,
                'phone' => $this->request->phone,
                'ongkir' => $this->request->ongkir,
                'kode_coupon' => $this->request->kode_coupon,
                'nilai_coupon' => $this->request->nilai_coupon,
                'order_status' => $this->request->order_status,
                'bank_name' => $this->request->bank_name,
                'kode_pembayaran' => $this->request->kode_pembayaran,
                'total_pembayaran' => $this->request->total_pembayaran,
                'session_id' => $this->request->session_id,
                'courier' => $this->request->courier,
                'service' => $this->request->service,
            ]);
            // Buat transaksi ke midtrans kemudian save snap tokennya.
            $payload = [
                'transaction_details' => [
                    'order_id'      => $order->session_id,
                    'gross_amount'  => $order->total_pembayaran,
                ],
                'customer_details' => [
                    'first_name'    => $order->name,
                    'email'         => $order->user_email,
                    'phone'         => $order->phone,
                    'address'       => $order->alamat_lengkap,
                ],
                'item_details' => [
                    [
                        'id'       => $order->kode_pembayaran,
                        'price'    => $order->total_pembayaran,
                        'quantity' => 1,
                        'name'     => ucwords(str_replace('_', ' ', $order->kode_pembayaran))
                    ]
                ]
            ];
            $snapToken = Veritrans_Snap::getSnapToken($payload);
            $order->snap_token = $snapToken;
            $order->save();

            // Beri response snap token
            $this->response['snap_token'] = $snapToken;

        });

        return response()->json($this->response);

    }

    public function notificationHandler(Request $request)
    {
        $notif = new Veritrans_Notification();
        \DB::transaction(function() use($notif) {

          $transaction = $notif->transaction_status;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
          $donation = Order::findOrFail($orderId);

          if ($transaction == 'capture') {

            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {

              if($fraud == 'challenge') {
                // TODO set payment status in merchant's database to 'Challenge by FDS'
                // TODO merchant should decide whether this transaction is authorized or not in MAP
                // $donation->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                $donation->setPending();
              } else {
                // TODO set payment status in merchant's database to 'Success'
                // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                $donation->setSuccess();
              }

            }

          } elseif ($transaction == 'settlement') {

            // TODO set payment status in merchant's database to 'Settlement'
            // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
            $donation->setSuccess();

          } elseif($transaction == 'pending'){

            // TODO set payment status in merchant's database to 'Pending'
            // $donation->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
            $donation->setPending();

          } elseif ($transaction == 'deny') {

            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
            $donation->setFailed();

          } elseif ($transaction == 'expire') {

            // TODO set payment status in merchant's database to 'expire'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
            $donation->setExpired();

          } elseif ($transaction == 'cancel') {

            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
            $donation->setFailed();

          }

        });

        return;
    }

}
