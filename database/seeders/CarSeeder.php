<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'name' => 'Toyota Innova Crysta 2.4 VX',
                'category' => 'MUV',
                'price' => 3499.00,
                'passengers' => 7,
                'transmission' => 'Manual',
                'bags' => 4,
                'doors' => 5,
                'description' => 'The ultimate king of highway cruising and family group journeys. Offers plush captain seats, powerful AC with rear vents, and ample luggage space for outstation trips.',
                'primary_image' => 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&q=80&w=1000',
                ],
                'features' => ['Free Cancellation', 'Pay at Pickup', 'Unlimited Mileage', 'Dual AC with Rear Vents', 'Bluetooth & USB Charging', 'Chauffeur Driven Option'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Mahindra Thar 4x4 Convertible',
                'category' => 'SUV',
                'price' => 4200.00,
                'passengers' => 4,
                'transmission' => 'Automatic',
                'bags' => 2,
                'doors' => 3,
                'description' => 'Unleash your adventurous spirit in Goa, Ladakh, or Himachal mountains with this rugged 4x4 powerhouse. Features high ground clearance, touchscreen infotainment, and open-air thrills.',
                'primary_image' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=1000',
                ],
                'features' => ['4x4 Terrain Mode', 'Apple CarPlay & Android Auto', 'Convertible Soft/Hard Top', 'Free Roadside Assistance', 'Unlimited Kilometers'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Hyundai Creta SX Turbo',
                'category' => 'SUV',
                'price' => 2899.00,
                'passengers' => 5,
                'transmission' => 'Automatic',
                'bags' => 3,
                'doors' => 5,
                'description' => 'Modern, stylish, and supremely comfortable compact SUV. Fitted with panoramic sunroof, ventilated leather seats, Bose audio system, and smooth automatic transmission.',
                'primary_image' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&q=80&w=1000',
                ],
                'features' => ['Panoramic Sunroof', 'Bose Premium Sound System', 'Push Button Start', 'Free Cancellation up to 24h', 'GPS Navigation'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Honda City 1.5 i-VTEC ZX',
                'category' => 'Sedan',
                'price' => 2599.00,
                'passengers' => 5,
                'transmission' => 'Automatic',
                'bags' => 3,
                'doors' => 4,
                'description' => 'The definitive executive sedan offering class-leading legroom, butter-smooth petrol CVT performance, electric sunroof, and superior highway stability.',
                'primary_image' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&q=80&w=1000',
                ],
                'features' => ['Electric Sunroof', 'LaneWatch Camera', 'Touchscreen Infotainment', 'Instant Confirmation', 'Fuel Efficient Engine'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Maruti Suzuki Ertiga Smart Hybrid',
                'category' => 'MUV',
                'price' => 2299.00,
                'passengers' => 7,
                'transmission' => 'Manual',
                'bags' => 3,
                'doors' => 5,
                'description' => 'Budget-friendly and fuel-efficient 7-seater MUV perfect for extended family road trips, airport transfers, and group sightseeing tours.',
                'primary_image' => 'https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?auto=format&fit=crop&q=80&w=1000',
                ],
                'features' => ['High Fuel Mileage', 'Rear AC Vents', 'Foldable 3rd Row Seats', 'Pay on Arrival', '24/7 Breakdown Support'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Maruti Suzuki Swift Dzire ZXI',
                'category' => 'Sedan',
                'price' => 1799.00,
                'passengers' => 5,
                'transmission' => 'Manual',
                'bags' => 2,
                'doors' => 4,
                'description' => 'Compact and economical city car with fantastic maneuverability, comfortable seating, and low fuel consumption for couples and solo city travelers.',
                'primary_image' => 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&q=80&w=1000',
                ],
                'features' => ['Excellent Mileage', 'Bluetooth Music System', 'Chilled Air Conditioning', 'Free Airport Delivery', 'Unlimited Mileage Option'],
                'is_active' => true,
                'is_featured' => true,
            ],
        ];

        foreach ($cars as $carData) {
            $carData['slug'] = $carData['slug'] ?? \Illuminate\Support\Str::slug($carData['name']);
            Car::updateOrCreate(
                ['slug' => $carData['slug']],
                $carData
            );
        }
    }
}
