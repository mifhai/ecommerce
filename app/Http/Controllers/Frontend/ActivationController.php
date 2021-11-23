<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use App\User;
use App\Category;
use App\Model\Cart;
use Session;
use Auth;

class ActivationController extends Controller
{
    public function activation(Request $request)
    {

        $productsBrand = Brand::orderBy('created_at', "DESC")->get();
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        if (Auth::check()) {
            $user_email = Auth::user()->email;
            $cart = Cart::where('user_email',$user_email)->get();
        }
        return view ('frontend.auth.otp', compact('productsBrand', 'category', 'cart'));
    }
    public function activationOtp(Request $request)
    {

        $user = User::where('token_activation', $request->token_activation)->first();
        if($user==null){
            return redirect()->back()->with('flash_message_error','OTP salah Silahkan Cek Kembali');
        }else{
            $user->update([
                'isVerified'=> true,
                'token_activation'=>null
                ]);
            Auth::logout();
            Session::forget('FrontSession');
            return redirect('userLogin')->with('flash_message_success','Selamat akun anda telah aktif !! Silahkan Login Kembali');
        }
    }
}
