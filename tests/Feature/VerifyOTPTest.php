<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Cache;
use App\User;


class VerifyOTPTest extends TestCase
{

    use DatabaseMigrations;


    public function setup()
    {
        
        parent::setUp();
        $this->logInUser();

    }





    public function a_user_can_submit_otp_and_Get_verified()
    {
        
        $OTP = auth()->user()->cacheTheOTP();

        $this->post('verifyOTP', ['OTP' => $OTP])->assertStatus(302);

        $this->assertDatabaseHas('users', ['isVerified' => 1]);
    }

    public function user_can_see_otp_verify_page()
    {

        $this->get('/verifyOTP')

        ->assertStatus(200)

        ->assertSee('Enter OTP');
    }



    public function invalid_otp_returns_error_message()
    {

        $this->post('verifyOTP', ['OTP' => 'InvalidOTP'])->assertSessionHasErrors();
    }


    public function if_no_otp_is_given_then_it_return_with_error()
    {
        
        $this->withExceptionHandling();

        $this->post('verifyOTP', ['OTP' => null])->assertSessionHasErrors(['OTP']);
    }
}
