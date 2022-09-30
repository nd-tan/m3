<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LevelFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
