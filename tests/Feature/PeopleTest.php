<?php

namespace Tests\Feature;

use App\Models\People;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PeopleTest extends TestCase
{
    private $people;

    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();

        $this->people = People::factory()->create([
            "user_id" => $user->id
        ]);
    }


    public function test_homepage_if_user_is_guest()
    {
        $this->get("/")->assertOk();
        $this->assertGuest();
    }


    public function test_if_create_form_fields_are_not_empty()
    {

        $this->assertNotEmpty(
            [
                $this->people->name,
                $this->people->email,
                $this->people->number,
                $this->people->income
            ]
        );
    }


    public function test_auth_user_can_see_create_form()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get("/people/create");
        $response->assertSee("Add your person");
        $response->assertStatus(200);

    }


    public function test_unauth_user_cannot_see_create_form()
    {
        $response = $this->get("/people/create");
        $response->assertStatus(302);
        $response->assertRedirect("/login");

    }

    public function test_if_auth_user_can_access_manage_dashboard()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get("/people/manage");
        $response->assertStatus(200);
    }

    public function test_if_unauth_user_can_acess_manage_dashboard() {
        $response = $this->get("/people/manage");
        $response->assertStatus(302);
        $response->assertRedirect("/login");
    }

}
