<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\OrderItem;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Order::class;
    public function definition()
    {
        return [
        'user_id'=> '2',
        'total'=> '1500',
        'fname' =>fake()->name(),
        'email'=> fake()->unique()->safeEmail(),
        'phone' => '01305060601',
        'o_status'=>'0',
        'message'=> 'Bhalo',
        'track_no'=>'Ikaz102',
        ];
    }
}
