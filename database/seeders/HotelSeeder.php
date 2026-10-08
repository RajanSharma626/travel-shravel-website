<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = [
            [
                'name' => 'The Grand Dragon Luxury Resort & Spa',
                'description' => 'Experience unmatched hospitality and breathtaking panoramic views of the Himalayan peaks. Features heated indoor pools, fine dining restaurants, and holistic Ayurvedic spa therapies.',
                'stars' => 5,
                'location' => 'Srinagar, Jammu & Kashmir',
                'address' => 'Boulevard Road, Dal Lake',
                'city' => 'Srinagar',
                'state' => 'Jammu and Kashmir',
                'country' => 'India',
                'price' => 8499.00,
                'primary_image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=1000',
                    'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&q=80&w=1000',
                    'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&q=80&w=1000',
                ],
                'amenities' => ['Free High-Speed WiFi', 'Swimming Pool', 'Spa & Wellness Center', 'Complimentary Breakfast', 'Airport Shuttle', 'Mountain View Balcony', '24/7 Room Service'],
                'check_in_time' => '02:00 PM',
                'check_out_time' => '11:00 AM',
                'internet' => '1',
                'dining' => '1',
                'room_types' => [
                    ['name' => 'Deluxe Mountain View Room', 'price' => 8499, 'capacity' => '2 Adults'],
                    ['name' => 'Royal Heritage Suite', 'price' => 14999, 'capacity' => '3 Adults'],
                ],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Taj Exotica Beachfront Resort & Spa',
                'description' => 'Sprawling Mediterranean-style 5-star resort overlooking the Arabian Sea in Benaulim, South Goa. Features private beach access, world-class dining, and lush tropical gardens.',
                'stars' => 5,
                'location' => 'Benaulim Beach, South Goa',
                'address' => 'Calvaddo, Benaulim, Salcete',
                'city' => 'Goa',
                'state' => 'Goa',
                'country' => 'India',
                'price' => 11999.00,
                'primary_image' => 'https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&q=80&w=1000',
                    'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?auto=format&fit=crop&q=80&w=1000',
                ],
                'amenities' => ['Private Beach Access', 'Infinity Swimming Pool', 'Jiva Luxury Spa', 'Free Breakfast', 'Kids Play Zone', 'Fitness Center', 'Seafood Grill Bar'],
                'check_in_time' => '03:00 PM',
                'check_out_time' => '12:00 PM',
                'internet' => '1',
                'dining' => '1',
                'room_types' => [
                    ['name' => 'Garden Villa Room', 'price' => 11999, 'capacity' => '2 Adults, 1 Child'],
                    ['name' => 'Sunset Ocean Plunge Pool Villa', 'price' => 22499, 'capacity' => '2 Adults'],
                ],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Solang Valley Pine View Boutique Resort',
                'description' => 'Nestled amidst whispering pine forests and snowy peaks in Manali. Enjoy cozy wooden chalets, outdoor bonfires, live acoustic music, and authentic Himachali culinary treats.',
                'stars' => 4,
                'location' => 'Solang Valley, Manali',
                'address' => 'Palchan, Near Solang Ropeway',
                'city' => 'Manali',
                'state' => 'Himachal Pradesh',
                'country' => 'India',
                'price' => 4899.00,
                'primary_image' => 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&q=80&w=1000',
                    'https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?auto=format&fit=crop&q=80&w=1000',
                ],
                'amenities' => ['Free WiFi', 'Campfire & Live Music', 'Heated Bedding', 'Multi-Cuisine Restaurant', 'Adventure Desk', 'Free Parking'],
                'check_in_time' => '01:00 PM',
                'check_out_time' => '11:00 AM',
                'internet' => '1',
                'dining' => '1',
                'room_types' => [
                    ['name' => 'Cedar Pine Cottage Room', 'price' => 4899, 'capacity' => '2 Adults'],
                    ['name' => 'Snow Peak Family Duplex', 'price' => 7999, 'capacity' => '4 Adults'],
                ],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Kumarakom Lake Luxury Heritage Resort',
                'description' => 'Acclaimed backwater haven along Lake Vembanad in Kerala. Traditional 16th-century ancestral cottages with open-roof showers and private infinity plunge pools.',
                'stars' => 5,
                'location' => 'Kumarakom, Kottayam',
                'address' => 'Kumarakom North Post, Kottayam',
                'city' => 'Kumarakom',
                'state' => 'Kerala',
                'country' => 'India',
                'price' => 12500.00,
                'primary_image' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&q=80&w=1000',
                    'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&q=80&w=1000',
                ],
                'amenities' => ['Backwater Sunset Cruise', 'Ayurvedic Wellness Spa', 'Meandering Pool', 'Floating Seafood Restaurant', 'Free WiFi', 'Yoga Pavilion'],
                'check_in_time' => '02:00 PM',
                'check_out_time' => '12:00 PM',
                'internet' => '1',
                'dining' => '1',
                'room_types' => [
                    ['name' => 'Heritage Villa with Private Pool', 'price' => 12500, 'capacity' => '2 Adults'],
                    ['name' => 'Luxury Lake View Pavilion', 'price' => 18900, 'capacity' => '2 Adults'],
                ],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Symphony Palms Beach & Scuba Resort',
                'description' => 'Idyllic beachfront sanctuary on Havelock Island (Swaraj Dweep). Step right onto pristine white sands and turquoise waters with on-site PADI scuba diving center.',
                'stars' => 4,
                'location' => 'Govind Nagar Beach, Havelock Island',
                'address' => 'Beach No. 3, Govind Nagar, Swaraj Dweep',
                'city' => 'Havelock Island',
                'state' => 'Andaman and Nicobar Islands',
                'country' => 'India',
                'price' => 6799.00,
                'primary_image' => 'https://images.unsplash.com/photo-1582719508461-905c673771fd?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1582719508461-905c673771fd?auto=format&fit=crop&q=80&w=1000',
                ],
                'amenities' => ['Direct Beach Access', 'PADI Dive Center', 'Seaside Candlelight Dining', 'Bar & Lounge', 'Complimentary Breakfast', 'Free WiFi'],
                'check_in_time' => '12:00 PM',
                'check_out_time' => '09:00 AM',
                'internet' => '1',
                'dining' => '1',
                'room_types' => [
                    ['name' => 'Lagoon Suite Cottage', 'price' => 6799, 'capacity' => '2 Adults'],
                    ['name' => 'Beachside Wooden Chalet', 'price' => 9999, 'capacity' => '2 Adults, 1 Child'],
                ],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'The Oberoi Rajvilas Heritage Palace',
                'description' => 'A royal retreat set in a 32-acre oasis of beautiful landscaped gardens, traditional pavilions, and reflection pools recreating the majestic romance of Rajput royalty.',
                'stars' => 5,
                'location' => 'Goner Road, Jaipur',
                'address' => 'Babaji Ka Thikana, Goner Road',
                'city' => 'Jaipur',
                'state' => 'Rajasthan',
                'country' => 'India',
                'price' => 15999.00,
                'primary_image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=1000',
                ],
                'amenities' => ['Private Pool Villas', 'Royal Spa', 'Fine Dining Restaurants', 'Tennis Courts', 'Cultural Performances', 'Helipad Access', 'Free WiFi'],
                'check_in_time' => '02:00 PM',
                'check_out_time' => '12:00 PM',
                'internet' => '1',
                'dining' => '1',
                'room_types' => [
                    ['name' => 'Premier Royal Room', 'price' => 15999, 'capacity' => '2 Adults'],
                    ['name' => 'Luxury Tent with Private Garden', 'price' => 25000, 'capacity' => '2 Adults'],
                ],
                'is_active' => true,
                'is_featured' => true,
            ],
        ];

        foreach ($hotels as $hotelData) {
            $hotelData['slug'] = $hotelData['slug'] ?? \Illuminate\Support\Str::slug($hotelData['name']);
            Hotel::updateOrCreate(
                ['slug' => $hotelData['slug']],
                $hotelData
            );
        }
    }
}
