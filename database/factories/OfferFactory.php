<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'image' => 'build/assets/images/article-2.png',
            'price' => fake()->randomFloat(2, 500, 10000),
            'offer_price' => fake()->randomFloat(2, 200, 8000),
            'description' => fake()->paragraph(),
            'valid_until' => fake()->dateTimeBetween('+1 month', '+6 months'),
        ];
    }
}
