<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'rating' => fake()->randomFloat(1, 1, 5),
            'review' => fake()->optional(0.7)->paragraph(),
        ];
    }
}
