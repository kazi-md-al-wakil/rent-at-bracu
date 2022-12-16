<?php

namespace Tests\Unit;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_all_the_routes_are_being_tasted()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('category');
        $response->assertStatus(200);

        $response = $this->get('category/{category_custom_url}/{product_custom_url}');
        $response->assertStatus(302);

        $response = $this->get('product-list');
        $response->assertStatus(200);

        $response = $this->post('searchproduct');
        $response->assertStatus(302);

        $response = $this->get('/home');
        $response->assertStatus(302);

        $response = $this->get('load-cart-data');
        $response->assertStatus(200);

        $response = $this->get('load-wishlist-count');
        $response->assertStatus(200);

        $response = $this->post('add-to-cart');
        $response->assertStatus(200);

        $response = $this->post('delete-cart-item');
        $response->assertStatus(200);

        $response = $this->post('update-cart');
        $response->assertStatus(200);


        $response = $this->post('add-to-wishlist');
        $response->assertStatus(200);

        $response = $this->post('delete-wish-item');
        $response->assertStatus(200);

        $response = $this->get('cart');
        $response->assertStatus(302);

        $response = $this->get('checkout');
        $response->assertStatus(302);

        //$response = $this->get('place-order');
        //$response->assertStatus(200);

        $response = $this->get('my-orders');
        $response->assertStatus(302);

        $response = $this->get('view-order/{id}');
        $response->assertStatus(302);

        $response = $this->get('wishlist');
        $response->assertStatus(302);

        $response = $this->post('procced-to-pay');
        $response->assertStatus(302);

        $response = $this->post('add-rating');
        $response->assertStatus(302);

        $response = $this->get('add-review/{product_url}/userreview');
        $response->assertStatus(302);
        $response = $this->get('edit-review/{product_url}/userreview');
        $response->assertStatus(302);

        $response = $this->post('add-review');
        $response->assertStatus(302);

        $response = $this->put('update-review');
        $response->assertStatus(302);



    }
}
