<?php

namespace Database\Factories;

use App\Models\UpcomingProducts;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UpcomingProducts>
 */
class UpcomingProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\UpcomingProducts::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'small_desc' => fake()->catchPhrase(),
        ];
    }
}
