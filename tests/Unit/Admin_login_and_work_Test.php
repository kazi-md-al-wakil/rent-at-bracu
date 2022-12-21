<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Admin_login_and_work_Test extends TestCase
{
    use RefreshDatabase;
    public function test_after_login_redirect_to_dashboard()
    {
        $user = User::factory()->create();

        $response = $this->post('/login',[
                'email'=>$user->email,
                'password'=> 'password'
            ]);

        $this->assertAuthenticated();

        $response->assertRedirect('/');
    }
    public function test_admin_can_see_the_registred_users()
    {

        $admin = User::factory()->create(['role_as'=> 1]);

        $response = $this->actingAs($admin)->get('/users');

        $response->assertStatus(200);
    }

    public function test_checking_that_no_duplicate_user_exist()
    {
        $user1 = User::make([
            "name"=>'John',
            'email' => 'john@gmail.com'
        ]);

        $user2 = User::make([
            "name"=>'Abir',
            'email' => 'abir@gmail.com'
        ]);

        $this->assertTrue($user1->name != $user2->name);

    }

    public function test_new_users_store()
    {

        $user= User::factory()->create();

        $response = $this->post('/register',[
            'name'=>$user->name,
            'email'=>$user->email,
            'password'=>'sa21356711',
        ]);

        $response->assertStatus(302);

        $response->assertRedirect('/');
    }


}
