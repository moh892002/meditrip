<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HospitalFactory extends Factory
{
    public function definition(): array
    {
        $hospitalImages = [
            'build/assets/images/hospital-1.png',
            'build/assets/images/hospital-2.png',
            'build/assets/images/hospital-3.png',
        ];
        $logoImages = [
            'build/assets/images/logo-hospital-1.png',
            'build/assets/images/logo-hospital-2.png',
            'build/assets/images/hospital-logo-3.png',
        ];

        return [
            'name' => fake()->company() . ' Hospital',
            'city' => 'إسطنبول',
            'country' => 'تركيا',
            'image' => fake()->randomElement($hospitalImages),
            'logo' => fake()->randomElement($logoImages),
            'about' => fake()->paragraph(3),
            'services' => fake()->randomElements([
                'خدمات التنقل', 'خدمات الترجمة', 'الدفع أونلاين',
                'حجز الفندق', 'سجلات طبية', 'استقبال بالمطار'
            ], fake()->numberBetween(2, 5)),
            'facilities' => fake()->randomElement([
                'غرف خاصة', 'كافيتيريا/مطعم', 'غرف مزودة بهاتف',
                'موقف سيارات', 'خدمة إنترنت', 'صيدلية'
            ]),
            'beds_num' => fake()->numberBetween(50, 2000),
            'founded_year' => fake()->numberBetween(1980, 2023),
            'doctors_count' => fake()->numberBetween(10, 500),
            'staff_count' => fake()->numberBetween(50, 5000),
            'operations_count' => fake()->numberBetween(100, 500000),
            'images' => [
                'build/assets/images/hospital-img-1.png',
                'build/assets/images/hospital-img-2.png',
                'build/assets/images/hospital-img-3.png',
            ],
        ];
    }
}
