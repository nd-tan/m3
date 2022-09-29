<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'age' => fake()->word(),
            'color' => fake()->colorName(),
            'gender' => fake()->word(),
            'price' => mt_rand(100,1000000),
            'quantity' => mt_rand(1,1000),
            'image' => fake()->image(),
            'category_id' => 1,
            'supplier_id' => 2,
            'user_id' => 1,
        ];
    }
}
