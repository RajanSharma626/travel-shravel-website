<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [
                'title' => 'Scuba Diving at Elephant Beach with Underwater Photography',
                'description' => 'Dive into turquoise coral reefs with certified PADI instructors. Spot exotic sea turtles, colorful clownfish, and magnificent reef structures with free underwater 4K video recording.',
                'location' => 'Elephant Beach, Havelock Island',
                'city' => 'Havelock Island',
                'state' => 'Andaman and Nicobar Islands',
                'country' => 'India',
                'price' => 3499.00,
                'duration' => '2.5 Hours',
                'cancellation_policy' => 'Free cancellation up to 24 hours before activity',
                'group_size' => 6,
                'languages' => 'English, Hindi',
                'primary_image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&q=80&w=1000',
                ],
                'highlights' => ['PADI Certified Instructor Guidance', 'Complimentary 4K HD GoPro Photos & Videos', 'Complete Scuba Gear Included', 'Pre-dive Training & Safety Briefing'],
                'inclusions' => ['Full Scuba Gear & Oxygen Tank', 'Instructor Fees', 'Speed Boat Transfer to Dive Site', 'Digital Photos & Videos'],
                'exclusions' => ['Hotel Pickup & Drop', 'Personal Towels & Swimwear'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Tandem Paragliding Flight in Solang Valley',
                'description' => 'Soar high like an eagle above the snow-capped Himalayan mountains of Manali with experienced pilots. Experience the ultimate rush of flying at 8,000 feet.',
                'location' => 'Solang Valley, Manali',
                'city' => 'Manali',
                'state' => 'Himachal Pradesh',
                'country' => 'India',
                'price' => 2499.00,
                'duration' => '45 Minutes',
                'cancellation_policy' => 'Free cancellation due to bad weather conditions',
                'group_size' => 10,
                'languages' => 'English, Hindi',
                'primary_image' => 'https://images.unsplash.com/photo-1507034589631-9433cc6bc453?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1507034589631-9433cc6bc453?auto=format&fit=crop&q=80&w=1000',
                ],
                'highlights' => ['High-Altitude Glide over Solang Valley', 'Certified Tandem Pilot', 'GoPro HD Video Recording Option', 'Safety Helmet and Harness'],
                'inclusions' => ['Glider Equipment & Safety Harness', 'Pilot Flying Charges', 'Site Entry Permission'],
                'exclusions' => ['GoPro Video (Available on add-on ₹500)', 'Transfer to Takeoff Point'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Traditional Alleppey Houseboat Sunset Cruise',
                'description' => 'Glide through the tranquil palm-fringed lagoons, paddy fields, and backwater villages of Alleppey. Savor authentic hot Kerala snacks and fresh filter coffee on board.',
                'location' => 'Punnamada Jetty, Alleppey',
                'city' => 'Alleppey',
                'state' => 'Kerala',
                'country' => 'India',
                'price' => 1999.00,
                'duration' => '3 Hours',
                'cancellation_policy' => 'Free cancellation up to 48 hours in advance',
                'group_size' => 15,
                'languages' => 'English, Hindi, Malayalam',
                'primary_image' => 'https://images.unsplash.com/photo-1593693397690-362cb9666fc2?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1593693397690-362cb9666fc2?auto=format&fit=crop&q=80&w=1000',
                ],
                'highlights' => ['Scenic Sunset Cruise on Vembanad Lake', 'Traditional Kerala Banana Fritters & Chai', 'Village Sightseeing along narrow canals', 'Spacious Sundeck Seating'],
                'inclusions' => ['3 Hours Cruise on Deluxe Houseboat', 'Evening Tea, Coffee & Traditional Snacks', 'Life Jackets & Crew Service'],
                'exclusions' => ['Alcoholic Beverages', 'Hotel Transfers'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Thar Desert Camel Safari & Dune Bashing Experience',
                'description' => 'Ride through the golden sand dunes of Sam in Jaisalmer, watch the spectacular sunset, enjoy Rajasthani folk dances (Kalbeliya) around a bonfire, and feast on traditional dinner.',
                'location' => 'Sam Sand Dunes, Jaisalmer',
                'city' => 'Jaisalmer',
                'state' => 'Rajasthan',
                'country' => 'India',
                'price' => 1799.00,
                'duration' => '4 Hours',
                'cancellation_policy' => 'Free cancellation up to 24 hours before start',
                'group_size' => 20,
                'languages' => 'English, Hindi',
                'primary_image' => 'https://images.unsplash.com/photo-1509316975850-ff9c5deb0cd9?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1509316975850-ff9c5deb0cd9?auto=format&fit=crop&q=80&w=1000',
                ],
                'highlights' => ['1-Hour Camel Ride into Sun-Kissed Dunes', 'High-Speed 4x4 Jeep Dune Bashing', 'Rajasthani Folk Dance & Music Show', 'Buffet Rajasthani Dinner with Bonfire'],
                'inclusions' => ['Camel Ride & Dune Bashing', 'Cultural Program & Welcome Drink', 'Buffet Dinner at Desert Camp'],
                'exclusions' => ['Alcohol & Soft Drinks', 'Pickup from Jaisalmer City'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'White Water River Rafting (16 Km Shivpuri to Rishikesh)',
                'description' => 'Tackle famous Grade III and IV rapids like Roller Coaster, Golf Course, and Club House along the roaring holy Ganges river in Rishikesh under expert international safety standards.',
                'location' => 'Shivpuri, Rishikesh',
                'city' => 'Rishikesh',
                'state' => 'Uttarakhand',
                'country' => 'India',
                'price' => 1299.00,
                'duration' => '3 Hours',
                'cancellation_policy' => 'Free cancellation up to 24 hours in advance',
                'group_size' => 8,
                'languages' => 'English, Hindi',
                'primary_image' => 'https://images.unsplash.com/photo-1530866495561-507c9faab2ed?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1530866495561-507c9faab2ed?auto=format&fit=crop&q=80&w=1000',
                ],
                'highlights' => ['16 Km Rafting with 7 Major Rapids', 'Cliff Jumping & Body Surfing', 'Certified River Guide on each Raft', 'Imported Safety Gear & Life Jackets'],
                'inclusions' => ['All Rafting & Safety Gear', 'Guide & Rescue Kayaker Fees', 'Transport from Office to Start Point'],
                'exclusions' => ['GoPro Photos/Video', 'Personal Clothing & Dry Bags'],
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Romantic Sunset Shikara Ride on Dal Lake',
                'description' => 'Drift across the peaceful mirror waters of Dal Lake in Srinagar. Pass through the floating vegetable gardens, lotus swamps, and lively floating handicraft markets.',
                'location' => 'Ghat No. 1, Dal Lake, Srinagar',
                'city' => 'Srinagar',
                'state' => 'Jammu and Kashmir',
                'country' => 'India',
                'price' => 899.00,
                'duration' => '2 Hours',
                'cancellation_policy' => 'Free cancellation up to 12 hours before ride',
                'group_size' => 4,
                'languages' => 'English, Hindi, Kashmiri',
                'primary_image' => 'https://images.unsplash.com/photo-1566837945700-30057527ade0?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1566837945700-30057527ade0?auto=format&fit=crop&q=80&w=1000',
                ],
                'highlights' => ['2-Hour Private Decorated Shikara Ride', 'Floating Market & Char Chinar Stop', 'Kashmiri Kahwa Tea Tasting on Board', 'Unobstructed Himalayan Views'],
                'inclusions' => ['Private Shikara with Boatman', 'Warm Blankets during winter/evening', 'Complimentary Cup of Kashmiri Kahwa'],
                'exclusions' => ['Shopping from Floating Vendors', 'Tips for Boatman'],
                'is_active' => true,
                'is_featured' => true,
            ],
        ];

        foreach ($activities as $activityData) {
            $activityData['slug'] = $activityData['slug'] ?? \Illuminate\Support\Str::slug($activityData['title']);
            Activity::updateOrCreate(
                ['slug' => $activityData['slug']],
                $activityData
            );
        }
    }
}
