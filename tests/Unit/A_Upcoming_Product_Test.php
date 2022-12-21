<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\UpcomingProducts;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class A_Upcoming_Product_Test extends TestCase
{
    use RefreshDatabase;
    public function test_admin_can_store_upcoming_product()
    {
        $admin = User::factory()->create(['role_as'=>1]);

        $response = $this->actingAs($admin)->post('/insert-up',[
            'name' => 'Fluid',
            'small_desc' => 'White Fluid'
        ]);

        $response -> assertRedirect('/up-products');
    }

    public function test_admin_can_see_edit_upcoming_product_page()
    {
        $admin = User::factory()->create(['role_as'=>1]);

        $upProd = UpcomingProducts::factory()->create();

        $response = $this->actingAs($admin)->get('/edit-up-prod/'. $upProd->id);
        $response->assertStatus(200);
    }

    public function test_admin_can_update_upcoming_product()
    {
        $admin = User::factory()->create(['role_as'=>1]);

        UpcomingProducts::factory()->create();

        $this->assertCount(1,UpcomingProducts::all());

        $upProd = UpcomingProducts::first();

        $response = $this->actingAs($admin)->put('/update-up-prod/'. $upProd->id,[
            'name' => 'Updated Prod',
            'small_desc' => 'White Thick Fluid'
        ]);
        $response->assertSessionHasNoErrors();

        $response -> assertRedirect('/up-products');

        $this -> assertEquals('Updated Prod',UpcomingProducts::first()->name);

    }

    public function test_admin_can_see_delete_upcoming_product()
    {
        $admin = User::factory()->create(['role_as'=>1]);

        $upProd = UpcomingProducts::factory()->create();

        $this->assertEquals(1,UpcomingProducts::count());

        $upProd = UpcomingProducts::first();

        $response = $this->actingAs($admin)->get('/delete-up-prod/'. $upProd->id);

        $this->assertEquals(0,UpcomingProducts::count());
    }
}
