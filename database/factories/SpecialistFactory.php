<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialistFactory extends Factory
{
    public function definition(): array
    {
        $specialistImages = [
            'build/assets/images/specialist.png',
            'build/assets/images/specialist-2.png',
            'build/assets/images/specialist-3.png',
            'build/assets/images/specialist-4.png',
        ];

        return [
            'name' => fake()->name(),
            'image' => fake()->randomElement($specialistImages),
            'rate' => fake()->randomFloat(1, 3, 5),
            'description' => fake()->paragraph(2),
            'price' => fake()->randomFloat(2, 100, 2000),
        ];
    }
}
