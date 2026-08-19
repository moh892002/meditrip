<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        $categories = ['أمراض القلب', 'طب الأعصاب', 'جراحة العظام', 'طب الأسنان', 'طب العيون', 'الصحة العامة'];

        $articleImages = [
            'build/assets/images/article1.png',
            'build/assets/images/article-2.png',
            'build/assets/images/article-3.png',
        ];

        return [
            'name' => fake()->sentence(6),
            'content' => fake()->paragraphs(5, true),
            'image' => fake()->randomElement($articleImages),
            'category' => fake()->randomElement($categories),
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
