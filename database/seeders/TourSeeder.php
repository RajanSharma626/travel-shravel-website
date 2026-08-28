<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tours = [
            [
                'title' => 'Kashmir Paradise: Srinagar, Gulmarg & Pahalgam',
                'description' => 'Explore the crown jewel of India with shikara rides on Dal Lake, scenic gondola rides over Gulmarg snowfields, and the serene valleys of Pahalgam and Betaab Valley.',
                'location' => 'Srinagar, Jammu & Kashmir',
                'city' => 'Srinagar',
                'state' => 'Jammu and Kashmir',
                'country' => 'India',
                'price' => 18999.00,
                'duration_days' => 6,
                'duration_nights' => 5,
                'tour_type' => 'Family & Honeymoon',
                'group_size' => 12,
                'languages' => 'English, Hindi',
                'primary_image' => 'https://images.unsplash.com/photo-1595815771614-ade9d652a65d?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1595815771614-ade9d652a65d?auto=format&fit=crop&q=80&w=1000',
                    'https://images.unsplash.com/photo-1566837945700-30057527ade0?auto=format&fit=crop&q=80&w=1000',
                ],
                'highlights' => ['Deluxe Houseboat Stay on Dal Lake', 'Gulmarg Phase 1 Gondola Ride', 'Aru Valley & Betaab Valley Sightseeing', 'Mughal Gardens Tour'],
                'inclusions' => ['5 Nights Hotel & Houseboat Accommodation', 'Daily Breakfast & Dinner (MAP Plan)', 'Private AC Vehicle for Transfers', 'Toll, Parking, and Driver Allowance'],
                'exclusions' => ['Airfare or Train Tickets', 'Pony/Horse Rides', 'Gondola Tickets Phase 2', 'Personal Expenses'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Enchanting Kerala Backwaters & Munnar Hills',
                'description' => 'Immerse yourself in green tea estates of Munnar, wildlife boat safari in Thekkady, and a romantic overnight cruise on an authentic traditional Alleppey houseboat.',
                'location' => 'Munnar & Alleppey, Kerala',
                'city' => 'Munnar',
                'state' => 'Kerala',
                'country' => 'India',
                'price' => 16499.00,
                'duration_days' => 5,
                'duration_nights' => 4,
                'tour_type' => 'Nature & Leisure',
                'group_size' => 10,
                'languages' => 'English, Hindi',
                'primary_image' => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?auto=format&fit=crop&q=80&w=1000',
                    'https://images.unsplash.com/photo-1593693397690-362cb9666fc2?auto=format&fit=crop&q=80&w=1000',
                ],
                'highlights' => ['Overnight Luxury Houseboat Cruise', 'Munnar Tea Gardens & Echo Point', 'Spice Plantation Walk', 'Periyar Wildlife Sanctuary'],
                'inclusions' => ['4 Nights Stay in Premium Resorts & Houseboat', 'All Meals on Houseboat', 'Daily Breakfast at Resorts', 'Private Chauffeur Driven Vehicle'],
                'exclusions' => ['Flight Tickets', 'Camera Fees & Monument Entries', 'Ayurvedic Massage Charges'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Royal Rajasthan: Jaipur, Jodhpur & Udaipur',
                'description' => 'Step into regal glory with monumental hill forts, grand royal palaces, camel desert safaris in Thar, and serene boat cruises on Lake Pichola in Udaipur.',
                'location' => 'Jaipur & Udaipur, Rajasthan',
                'city' => 'Jaipur',
                'state' => 'Rajasthan',
                'country' => 'India',
                'price' => 21999.00,
                'duration_days' => 7,
                'duration_nights' => 6,
                'tour_type' => 'Heritage & Culture',
                'group_size' => 15,
                'languages' => 'English, Hindi',
                'primary_image' => 'https://images.unsplash.com/photo-1599661046289-e31897846e41?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1599661046289-e31897846e41?auto=format&fit=crop&q=80&w=1000',
                    'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?auto=format&fit=crop&q=80&w=1000',
                ],
                'highlights' => ['Amber Fort Elephant/Jeep Ride', 'City Palace & Hawa Mahal', 'Sunset Boat Ride on Lake Pichola', 'Mehrangarh Fort Tour'],
                'inclusions' => ['6 Nights Heritage Hotel Stays', 'Daily Breakfast & Dinner', 'Local Certified Heritage Guides', 'Dedicated AC Innova Transport'],
                'exclusions' => ['Monument Entrance Tickets', 'Airfare/Train Tickets', 'Personal Souvenir Shopping'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Exotic Andaman Islands Beach Vacation',
                'description' => 'Unwind on Asia’s best Radhanagar Beach in Havelock, explore coral reefs with scuba diving, and experience the historic Light & Sound show at Cellular Jail.',
                'location' => 'Port Blair & Havelock, Andaman',
                'city' => 'Port Blair',
                'state' => 'Andaman and Nicobar Islands',
                'country' => 'India',
                'price' => 24999.00,
                'duration_days' => 6,
                'duration_nights' => 5,
                'tour_type' => 'Island & Adventure',
                'group_size' => 10,
                'languages' => 'English, Hindi',
                'primary_image' => 'https://images.unsplash.com/photo-1589308078059-be1415eab4c3?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1589308078059-be1415eab4c3?auto=format&fit=crop&q=80&w=1000',
                ],
                'highlights' => ['Sunset at Radhanagar Beach', 'Elephant Beach Snorkeling/Scuba', 'Makruzz Premium High-Speed Cruise', 'Cellular Jail Light & Sound'],
                'inclusions' => ['5 Nights Beachfront Hotel Stay', 'Inter-Island Private Cruise Tickets', 'Daily Buffet Breakfast', 'All Port Transfers & Sightseeing'],
                'exclusions' => ['Flight Tickets to Port Blair', 'Water Sports Charges', 'Lunch & Dinner unless specified'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Mystical Leh Ladakh & Pangong Lake Odyssey',
                'description' => 'Drive through the highest motorable passes in the world (Khardung La), marvel at the color-shifting waters of Pangong Tso, and experience Nubra Valley camel rides.',
                'location' => 'Leh & Nubra Valley, Ladakh',
                'city' => 'Leh',
                'state' => 'Ladakh',
                'country' => 'India',
                'price' => 28500.00,
                'duration_days' => 7,
                'duration_nights' => 6,
                'tour_type' => 'Adventure & Road Trip',
                'group_size' => 12,
                'languages' => 'English, Hindi',
                'primary_image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&q=80&w=1000',
                ],
                'highlights' => ['Overnight Luxury Camp at Pangong Tso', 'Khardung La Pass (18,380 ft)', 'Nubra Valley Double-Humped Camel Safari', 'Magnetic Hill & Hall of Fame'],
                'inclusions' => ['6 Nights Accommodation (Hotels + Luxury Camps)', 'Breakfast & Dinner Included Daily', 'Oxygen Cylinder & Inner Line Permits', '4x4 Backup Vehicle'],
                'exclusions' => ['Airfare to Leh', 'Camel Safari charges', 'Personal Medical insurance'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Himachal Wonderland: Shimla, Kullu & Manali',
                'description' => 'A quintessential Himalayan mountain escape featuring snowy mountain viewpoints in Rohtang/Solang, heritage walks on Shimla Mall Road, and tranquil apple orchards.',
                'location' => 'Shimla & Manali, Himachal Pradesh',
                'city' => 'Manali',
                'state' => 'Himachal Pradesh',
                'country' => 'India',
                'price' => 14999.00,
                'duration_days' => 6,
                'duration_nights' => 5,
                'tour_type' => 'Family & Honeymoon',
                'group_size' => 14,
                'languages' => 'English, Hindi',
                'primary_image' => 'https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&q=80&w=1000',
                ],
                'highlights' => ['Solang Valley Snow Sports', 'Kufri & Shimla Ridge Heritage Tour', 'Hadimba Temple & Vashisht Hot Springs', 'River Rafting in Kullu Valley'],
                'inclusions' => ['5 Nights Hotel Stay in 3/4-Star Hotels', 'Daily Breakfast and Dinner', 'All Transfers by AC Sedan/SUV', 'Driver charges & interstate permits'],
                'exclusions' => ['Rohtang Pass NGT Permit/Vehicle', 'Adventure sports charges', 'Personal expenses'],
                'is_active' => true,
                'is_featured' => true,
            ],
        ];

        foreach ($tours as $tourData) {
            $tourData['slug'] = $tourData['slug'] ?? \Illuminate\Support\Str::slug($tourData['title']);
            Tour::updateOrCreate(
                ['slug' => $tourData['slug']],
                $tourData
            );
        }
    }
}
