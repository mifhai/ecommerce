<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTPMail;
use App\Notifications\OTPNotification;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','isVerified', 'token_activation'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function OTP()
    {
        return Cache::get($this->OTPKey());
    }


    public function OTPKey(Type $var = null)
    {
        return "OTP_for_{$this->id}";
    }


    public function cacheTheOTP()
    {
        $OTP = rand(100000, 999999);
        Cache::put([$this->OTPKey() => $OTP], now()->addSeconds(300));
        return $OTP;
    }

    public function sendOTP($via)
    {

        $OTP = $this->cacheTheOTP();

        $this->notify(new OTPNotification($via, $OTP));
       
    }


    public function routeNotificationForKarix()
        {
            return $this->phone;
        }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
