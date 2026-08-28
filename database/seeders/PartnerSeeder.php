<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            [
                'name' => 'Incredible India',
                'image_url' => 'assets/img/partners/incredible-india.svg',
                'is_active' => true,
            ],
            [
                'name' => 'IATA - International Air Transport Association',
                'image_url' => 'assets/img/partners/iata.svg',
                'is_active' => true,
            ],
            [
                'name' => 'TAAI - Travel Agents Association of India',
                'image_url' => 'assets/img/partners/taai.svg',
                'is_active' => true,
            ],
            [
                'name' => 'IRCTC - Indian Railway Catering & Tourism',
                'image_url' => 'assets/img/partners/irctc.svg',
                'is_active' => true,
            ],
            [
                'name' => 'Make in India',
                'image_url' => 'assets/img/partners/make-in-india.svg',
                'is_active' => true,
            ],
            [
                'name' => 'TripAdvisor',
                'image_url' => 'assets/img/partners/tripadvisor.svg',
                'is_active' => true,
            ],
        ];

        foreach ($partners as $partnerData) {
            Partner::updateOrCreate(
                ['name' => $partnerData['name']],
                $partnerData
            );
        }
    }
}
