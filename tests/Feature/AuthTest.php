<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function PHPUnit\Framework\assertNotEmpty;

class AuthTest extends TestCase
{
    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_if_registration_form_is_rendered_on_screen()
    {
        $this->get("/register")->assertOk();
    }

    public function test_if_new_user_can_register()
    {
        $response = $this->post("/register", [
            "name" => "test",
            "email" => "test@gmail.com",
            "password" => bcrypt($password = "password"),
            "password_confirmation" => "password",
            "is_admin" => 0
        ]);

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_if_register_fields_are_not_empty()
    {


        $this->
        assertNotEmpty(
            [
                $this->user->name,
                $this->user->email,
                $this->user->password,
                $this->user->password_confirmation
            ]
        );
    }


    public function test_if_login_form_rendered_on_screen()
    {
        $this->get("/login")->assertOk();
    }


    public function test_if_user_can_login()
    {
        $response = $this->post("/login",
            ["email" => $this->user->email, "password" => "password"]
        );

        $response->assertStatus(302);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_if_login_fields_are_not_empty()
    {


        $this->assertNotEmpty(
            [
                $this->user->email,
                $this->user->password
            ]
        );
    }

    public function test_if_user_entered_wrong_password()
    {
        $this->post("/login",
            ["email" => $this->user->email, "password" => "wrong-password"]
        );
        $this->assertGuest();

    }



}
