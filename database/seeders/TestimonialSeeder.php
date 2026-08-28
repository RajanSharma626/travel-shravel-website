<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'role' => 'Traveler',
                'avatar' => null,
                'initials' => 'SJ',
                'avatar_bg' => 'bg-blue-600',
                'rating' => 5.0,
                'content' => 'Our trip to Bali was absolutely perfect. Travel Shravel handled everything seamlessly, from flights to accommodations. Highly recommend!',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Michael Chen',
                'role' => 'Traveler',
                'avatar' => null,
                'initials' => 'MC',
                'avatar_bg' => 'bg-purple-600',
                'rating' => 5.0,
                'content' => "The best travel agency I've ever used. The attention to detail in our Kashmir itinerary was outstanding. Will definitely book again.",
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Emma Williams',
                'role' => 'Traveler',
                'avatar' => null,
                'initials' => 'EW',
                'avatar_bg' => 'bg-pink-500',
                'rating' => 4.5,
                'content' => 'Great prices and excellent customer service. They helped us find a last-minute luxury hotel in Dubai that fit our budget perfectly.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Rajesh Patel',
                'role' => 'Family Vacation',
                'avatar' => null,
                'initials' => 'RP',
                'avatar_bg' => 'bg-emerald-600',
                'rating' => 5.0,
                'content' => 'Booking our family tour package to Himachal was effortless. The hotel selection and transport arrangements were top notch!',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Ananya Sharma',
                'role' => 'Honeymoon Trip',
                'avatar' => null,
                'initials' => 'AS',
                'avatar_bg' => 'bg-amber-600',
                'rating' => 5.0,
                'content' => 'Incredible experience with Travel Shravel for our honeymoon in Andaman. 24/7 support made our entire trip smooth and stress-free.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'David Miller',
                'role' => 'Corporate Group',
                'avatar' => null,
                'initials' => 'DM',
                'avatar_bg' => 'bg-indigo-600',
                'rating' => 5.0,
                'content' => 'Outstanding corporate retreat planning! The team went above and beyond to coordinate flight tickets, hotel rooms, and guided activities.',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonialData) {
            Testimonial::updateOrCreate(
                ['name' => $testimonialData['name']],
                $testimonialData
            );
        }
    }
}
