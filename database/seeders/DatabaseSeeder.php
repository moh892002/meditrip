<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Hospital;
use App\Models\Specializtion;
use App\Models\Specialist;
use App\Models\Offer;
use App\Models\Article;
use App\Models\Rate;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@meditrip.com',
            'phone' => '+90 555 000 00 00',
            'country' => 'تركيا',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        // Test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '+90 555 111 22 33',
            'country' => 'مصر',
            'password' => bcrypt('password'),
        ]);

        // Specializations
        $specializations = Specializtion::factory(20)->create();

        // Hospitals with all relations
        Hospital::factory(10)
            ->has(Offer::factory()->count(3), 'offers')
            ->has(
                Specialist::factory()->count(5)
                    ->sequence(fn ($sequence) => [
                        'specializtion_id' => $specializations->random()->id,
                    ]),
                'specialists'
            )
            ->create()
            ->each(function ($hospital) use ($specializations) {
                // Attach random specializations to each hospital
                $hospital->specializations()->attach(
                    $specializations->random(rand(3, 8))->pluck('id')->toArray()
                );

                // Create rates for each hospital
                Rate::factory(rand(5, 20))->create([
                    'hospital_id' => $hospital->id,
                    'user_id' => User::inRandomOrder()->first()->id,
                ]);
            });

        // Orders
        User::all()->each(function ($user) {
            Order::factory(rand(1, 3))->create([
                'user_id' => $user->id,
                'hospital_id' => Hospital::inRandomOrder()->first()->id,
                'specializtion_id' => Specializtion::inRandomOrder()->first()->id,
            ]);
        });

        // Articles
        User::all()->each(function ($user) {
            Article::factory(rand(1, 2))->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
