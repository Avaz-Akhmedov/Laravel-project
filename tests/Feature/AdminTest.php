<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AdminTest extends TestCase
{

    private $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create(
            [
                "is_admin" => 1
            ]
        );
    }

    public function test_if_admin_reached_correct_route()
    {

        $response = $this->actingAs($this->admin)->get("/admin");
        $response->assertStatus(200);
    }



    public function test_if_admin_can_see_registered_users()
    {
        $response = $this->actingAs($this->admin)->get("/admin/users");
        $response->assertStatus(200);
    }


    public function test_if_admin_can_manage_people_of_registered_users() {
        $user = User::factory()->create();
        $response = $this->actingAs($this->admin)->get("/admin/users/".$user->id."/people");
        $response->assertStatus(200);

    }



}
