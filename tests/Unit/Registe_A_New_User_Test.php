<?php

namespace Tests\Unit;

use Tests\TestCase;

class Registe_A_New_User_Test extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_new_users_store()
    {
        $response = $this->post('/register',[
            'name'=>'Davido',
            'email'=>'daviod@gmail.com',
            'password'=>'sa21356711',
            'password_confirmation'=>'sa21356711'
        ]);
        $response->assertRedirect('/home');
    }
}
