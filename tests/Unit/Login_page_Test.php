<?php

namespace Tests\Unit;

use Tests\TestCase;

class Login_page_Test extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Home_page_working_properly()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
