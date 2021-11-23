<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Auth\UserActivationEmail;
use App\Brand;
use App\User;
use App\Category;

class ResendActivationController extends Controller
{
    public function formResend()
    {
        $productsBrand = Brand::orderBy('created_at', "DESC")->get();
        $category = Category::where('status', true)->orderBy('name', "ASC")->get();
        return view ('frontend.auth.resendOtp', compact('productsBrand', 'category'));
    }


    public function resend(Request $request)
    {
        $this->validateResendRequest($request);

        $user = User::where('email', $request->email)->first();

        event(new UserActivationEmail($user));

        return redirect('activation')->with('flash_message_success', 'Kode OTP telah dikirim silahkan cek email anda');
    }

    protected function validateResendRequest(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required|email|exists:users,email'
        ], [
            'email.exists' => 'Email Tidak Ditemukan Silahkan Cek Kembali'
        ]);
    }
}
