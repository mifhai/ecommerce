<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupon;

class CouponController extends Controller
{
    public function addCoupon(Request $request)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>" ; print_r($data); die;

            $coupon = new Coupon;
            // echo "<pre>" ; print_r($data); die;

            $coupon->coupon_code = $data['coupon_code'];
            $coupon->amount = $data['amount'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->expired_date = $data['expired_date'];
            $coupon->status = $data['status'];
            $coupon->save();
            return redirect('daftar_coupon')->with('flash_message_success', 'Coupon Berhasil Ditambahkan');
        }
        return view ('backend.coupon.add');

    }


    public function editCoupon(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            $coupon = Coupon::find($id);
            // echo "<pre>" ; print_r($data); die;

            $coupon->coupon_code = $data['coupon_code'];
            $coupon->amount = $data['amount'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->expired_date = $data['expired_date'];
            if(empty($data['status'])){
                $data['status'] = 0;
            }
            $coupon->status = $data['status'];
            $coupon->save();
            return redirect('daftar_coupon')->with('flash_message_success', 'Coupon Berhasil Diupdate');
        }



        $detailCoupon = Coupon::find($id);
        return view ('backend.coupon.edit', compact('detailCoupon'));
    }

    public function daftarCoupon()
    {
        $detailCoupon = Coupon::get();

        return view ('backend.coupon.daftar_coupon', compact('detailCoupon'));
    }

    public function deleteCoupon($id=null)
    {
        Coupon::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Coupon Telah Berhasil Terhapus!!');
    }
}
