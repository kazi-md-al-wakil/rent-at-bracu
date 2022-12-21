<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\UpcomingProducts;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class Admin_Order_Test extends TestCase
{
    use RefreshDatabase;
    public function test_admin_can_see_the_order_requests()
    {
        $admin = User::factory()->create(['role_as'=>1]);

        $response = $this->actingAs($admin)->get('/orders');

        $response->assertStatus(200);
    }

    public function test_admin_can_see_the_details_of_pending_order_requests()
    {
        $admin = User::factory()->create(['role_as'=>1]);

        $order = Order::factory()->create();

        $response = $this->actingAs($admin)->get('/orders/view-order/'. $order->id);
        $response->assertStatus(200);
    }

    public function test_admin_can_update_status_of_pending_order_requests_if_completed()
    {
        $admin = User::factory()->create(['role_as'=>1]);

        $order = Order::factory()->create();

        $response = $this->actingAs($admin)->put('/update-order/'. $order->id,[
            'order_status' => '1'
        ]);
        $response->assertRedirect('/orders');
    }

    public function test_admin_can_see_history_of_completed_order_requests()
    {
        $admin = User::factory()->create(['role_as'=>1]);

        $order = Order::factory()->create([
            'o_status' => '1'
        ]);

        $response = $this->actingAs($admin)->get('/order-history');
        $response->assertStatus(200);
    }
}


