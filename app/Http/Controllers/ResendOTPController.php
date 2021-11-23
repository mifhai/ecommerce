<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResendOTPRequest;

class ResendOTPController extends Controller
{
    

    public function resend(ResendOTPRequest $request)
    {

        auth()->user()->sendOTP($request->via);

        return back()->with('Message', 'OTP baru telah dikirim, silahkan cek kembali!');
    }

}
