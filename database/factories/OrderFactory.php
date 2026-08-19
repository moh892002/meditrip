<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        $statuses = ['pending', 'under_review', 'completed', 'cancelled'];

        return [
            'status' => fake()->randomElement($statuses),
            'notes' => fake()->optional(0.5)->paragraph(),
            'patient_name' => fake()->name(),
            'patient_email' => fake()->safeEmail(),
            'patient_phone' => fake()->phoneNumber(),
            'disease_description' => fake()->paragraph(2),
        ];
    }
}
