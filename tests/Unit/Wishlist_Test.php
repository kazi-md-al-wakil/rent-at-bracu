<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Order;
use App\Models\Wishlist;


class Wishlist_Test extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_see_the_wishlist()
    {
        $user = User::factory()->create(['role_as'=>0]);

        $response = $this->actingAs($user)->get('/wishlist');

        $response->assertStatus(200);
    }

    public function test_user_can_add_item_to_wishlist()
    {
        $user = User::factory()->create(['role_as'=>0]);

        $response = $this->actingAs($user)->post('/add-to-wishlist',[
            'user_id'=>'2',
            'product_id'=>'3'
        ]);

        $response->assertStatus(200);
    }

    public function test_user_can_delete_item_from_wishlist()
    {
        $user = User::factory()->create(['role_as'=>0]);

        $wishlist = Wishlist::factory()->create();

        $this->assertEquals(1,Wishlist::count());

        $wishlist = Wishlist::first();

        $response = $this->actingAs($user)->post('/delete-wish-item');

        $response->assertStatus(200);
    }

}
