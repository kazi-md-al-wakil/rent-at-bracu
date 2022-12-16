<?php

namespace Tests\Unit;

use Tests\TestCase;

class Category_Test extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_inserting_a_new_category()
    {
        $response = $this->post('/insert-category',[

            'name'=>'Sports',
            'description'=>'sports stuff',
            'custom_url'=>'sport stuffy',
            'status'=>'0',
            'is_popular'=>'1',
            'image'=>'14569.jpg',
            'meta_title'=>'sporting',
            'meta_description'=>'sports you need',
            'meta_keywords'=>'sport, tenning, carrom'
        ]);
        $response->assertRedirect('/login');
    }
}
