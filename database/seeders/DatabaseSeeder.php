<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Default Test User
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'username' => 'testuser',
                'password' => bcrypt('password'),
            ]
        );

        // Run Entity Seeders
        $this->call([
            HotelSeeder::class,
            TourSeeder::class,
            ActivitySeeder::class,
            CarSeeder::class,
            TestimonialSeeder::class,
            PartnerSeeder::class,
        ]);
    }
}
