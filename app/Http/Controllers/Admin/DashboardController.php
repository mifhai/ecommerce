<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\OrderProduct;
use App\User;
use App\Province;
use App\Model\City;
use App\Model\District;
use App\Model\BuktiTransfer;
use DB;
use PDF;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $product = Product::count();
        $productsum = Order::where('status', 'paid')->sum('total_pembayaran');
        $productpending = Order::where('status', 'pending')->sum('total_pembayaran');
        $user = User::count();
        $orders = Order::orderBy('created_at', 'DESC')->get();
        $buktitransfer = BuktiTransfer::all();

        return view ('backend.page.dashboard', compact('orders', 'product', 'productsum', 'user', 'productpending', 'buktitransfer'));
    }

    public function transaction($order_no)
    {
        $orders = Order::where('session_id', $order_no)->first();
        $orderproducts = OrderProduct::where(['order_id'=>$orders->id])->get();
        $user = User::where(['email'=>$orders->user_email])->first();
        $province = Province::where(['province_id'=>$user->provinsi])->first();
        $city = City::where(['city_id'=>$user->kabupaten])->first();
        $district = District::where(['district_id'=>$user->kecamatan])->first();
        $imagestransfer = BuktiTransfer::where(['nomor_order'=>$orders->session_id])->first();
        // dd($orderproduct);

        return view ('backend.page.transaction', compact('orders', 'orderproducts', 'province', 'city', 'district', 'user', 'imagestransfer'));
    }

    public function post(Request $request, $order_no)
    {
        $data = $request->all();

        if(empty($data['delivery'])){
            $delivery = '';
        }else {
            $delivery = $data['delivery'];
        }

        if(empty($data['resi'])){
            $resi = '';
        }else {
            $resi = $data['resi'];
        }
        // dd($data);
        DB::table('orders')->where('session_id', $order_no)->update([
            'status'=>$data['status'],
            'delivery_status'=>$delivery,
            'no_resi'=>$resi,
        ]);

        return redirect()->route('dashboard')->with('flash_message_success', 'Data Berhasil Diupdate');
    }

    public function orderall()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        return view ('backend.page.orderall', compact('orders'));
    }

    public function invoice($no_order)
    {
        $orders = Order::where('session_id', $no_order)->first();
        $orderproducts = OrderProduct::where(['order_id'=>$orders->id])->get();
        $user = User::where(['email'=>$orders->user_email])->first();
        $province = Province::where(['province_id'=>$user->provinsi])->first();
        $city = City::where(['city_id'=>$user->kabupaten])->first();
        $district = District::where(['district_id'=>$user->kecamatan])->first();
        // dd($orderproduct);

        return view ('backend.page.invoice', compact('orders', 'orderproducts', 'province', 'city', 'district', 'user'));
        // $pdf = PDF::loadview('backend.page.invoice', compact('orders', 'orderproducts', 'province', 'city', 'district', 'user'));
        // return $pdf->stream();
    }
}
