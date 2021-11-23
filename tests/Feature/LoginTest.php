<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class LoginTest extends TestCase
{

    use DatabaseMigrations;



    public function after_login_can_not_access_home_page_until_verifired()
    {
        $this->logInUser();
        $this->get('/home')->assertRedirect('/verifiedOTP');

    }


    public function after_login_can_access_home_page_if_verifired()
    {
        $this->logInUser(['isVerified' => 1]);

        $this->get('/home')->assertStatus(200);
    }


    public function a_user_can_select_opt_via_channel()
    {
        $this->get('/login')->assertSee('OTP via SMS');
    }
}
