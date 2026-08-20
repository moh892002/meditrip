<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SpecializationFactory extends Factory
{
    public function definition(): array
    {
        $specializations = [
            'طب الأعصاب', 'طب العيون', 'طب الأسنان', 'جراحة العظام',
            'أمراض القلب', 'طب الأطفال', 'أمراض النساء والتوليد',
            'جراحة المخ والأعصاب', 'طب الأورام', 'جراحة المسالك البولية',
            'أمراض الجهاز الهضمي', 'طب الغدد الصماء', 'جراحات البدانة',
            'زراعة الشعر', 'العلاج بالخلايا الجذعية', 'طب الطوارئ',
            'الأنف والأذن والحنجرة', 'جراحة الأوعية الدموية',
            'أمراض الدم', 'الطب العام'
        ];

        $icons = [
            'build/assets/images/major-1.svg', 'build/assets/images/major-2.svg',
            'build/assets/images/major-3.svg', 'build/assets/images/major-4.svg',
            'build/assets/images/major-5.svg', 'build/assets/images/major-6.svg',
            'build/assets/images/major-7.svg', 'build/assets/images/major-8.svg',
            'build/assets/images/major-9.svg', 'build/assets/images/major-10.svg',
        ];

        return [
            'name' => fake()->unique()->randomElement($specializations),
            'image' => fake()->randomElement($icons),
        ];
    }
}
