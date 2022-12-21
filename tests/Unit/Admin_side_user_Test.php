<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Admin_side_user_Test extends TestCase
{
    use RefreshDatabase;
    public function test_admin_can_see_details_of_a_user()
    {
        $admin = User::factory()->create(['role_as'=>1]);

        $user = User::factory()->create();

        $response = $this->actingAs($admin)->get('/users/view-user/'. $user->id);
        
        $response->assertStatus(200);
    }

    public function test_admin_can_ban_or_delete_a_user()
    {
        $admin = User::factory()->create(['role_as'=>1]);

        $user = User::factory()->create();

        $this->assertEquals(2,User::count());

        $user = User::first();

        $response = $this->actingAs($admin)->get('/delete-users/'. $user->id);
        $this->assertEquals(1,User::count()); //after deleting a user, only admin is left in the user database
    }

}
