@extends('layouts.app')

@section('title', 'Hotel Search | Travel Shravel')

@section('content')
    {{-- Hero Section --}}
    <section class="relative h-[500px] w-full overflow-hidden flex items-center justify-center">
        {{-- Background Image --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&q=80&w=1920" alt="Hotel Hero"
                class="h-full w-full object-cover">
            {{-- Shadow Overlay --}}
            <div class="absolute inset-0 bg-black/55"></div>
        </div>

        {{-- Hero Content --}}
        <div class="relative w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-5xl md:text-6xl text-white font-libre-baskerville mb-4 drop-shadow-lg">
                    HOTEL
                </h1>
                <p class="text-lg md:text-xl text-white/90 tracking-wide drop-shadow-sm">
                    Discover your home away from home
                </p>
            </div>

            {{-- Search Bar Layout - Exactly like the image --}}
            <div class="w-full max-w-6xl mx-auto">
                <div class="bg-white rounded-full shadow-[0_20px_50px_rgba(0,0,0,0.3)] p-2 md:p-3 flex flex-col md:flex-row items-center gap-0">
                    
                    {{-- Location --}}
                    <div class="flex-1 flex items-center gap-4 px-8 py-3 border-r border-gray-100 group cursor-pointer hover:bg-gray-50/50 rounded-l-full transition-all">
                        <div class="w-10 h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors">
                            <i class="fa-solid fa-location-dot text-xl"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[13px] font-semibold text-gray-900 leading-tight">Location</p>
                            <p class="text-[13px] text-gray-400 whitespace-nowrap">Where are you going?</p>
                        </div>
                    </div>

                    {{-- Check In --}}
                    <div class="flex-none flex items-center gap-4 px-8 py-3 border-r border-gray-100 group cursor-pointer hover:bg-gray-50/50 transition-all">
                        <div class="w-10 h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors">
                            <i class="fa-regular fa-calendar-plus text-xl"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[13px] font-semibold text-gray-900 leading-tight">Check in</p>
                            <p class="text-[13px] text-gray-400 whitespace-nowrap">13/03/2026</p>
                        </div>
                    </div>

                    {{-- Arrow --}}
                    <div class="flex-none px-2 text-gray-300">
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </div>

                    {{-- Check Out --}}
                    <div class="flex-none flex items-center gap-4 px-8 py-3 border-r border-gray-100 group cursor-pointer hover:bg-gray-50/50 transition-all">
                        <div class="w-10 h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors">
                            <i class="fa-regular fa-calendar-check text-xl"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[13px] font-semibold text-gray-900 leading-tight">Check out</p>
                            <p class="text-[13px] text-gray-400 whitespace-nowrap">14/03/2026</p>
                        </div>
                    </div>

                    {{-- Guests --}}
                    <div class="flex-1 flex items-center gap-4 px-8 py-3 group cursor-pointer hover:bg-gray-50/50 transition-all">
                        <div class="w-10 h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors">
                            <i class="fa-solid fa-user-group text-xl"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[13px] font-semibold text-gray-900 leading-tight">Guests</p>
                            <p class="text-[13px] text-gray-400 whitespace-nowrap">1 guest, 1 room</p>
                        </div>
                    </div>

                    {{-- Search Button --}}
                    <div class="p-1">
                        <button class="bg-india-green text-white px-10 py-5 rounded-full shadow-lg hover:bg-india-green/90 transition-all active:scale-95 flex items-center justify-center gap-3 font-semibold text-sm">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content Section --}}
    <section class="py-12 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                {{-- Left Sidebar: Filters --}}
                <aside class="w-full lg:w-[280px] flex flex-col gap-6">
                    
                    {{-- Map View --}}
                    <div class="relative h-48 rounded-2xl overflow-hidden shadow-sm group">
                        <img src="https://api.maptiler.com/maps/streets/static/auto/400x300.png?key=get_your_own_key" 
                             alt="Map" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/5 group-hover:bg-black/0 transition-all"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <button class="bg-white text-india-green px-6 py-2.5 rounded-full text-[13px] font-semibold shadow-lg hover:bg-india-green hover:text-white transition-all transform hover:scale-105">
                                View in a map
                            </button>
                        </div>
                    </div>

                    {{-- Filter Price --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-[15px] font-semibold text-gray-900">Filter Price</h3>
                            <i class="fa-solid fa-chevron-up text-[10px] text-gray-400"></i>
                        </div>
                        
                        {{-- Range Slider Simulation --}}
                        <div class="px-2 mb-6">
                            <div class="h-1 bg-gray-100 rounded-full relative">
                                <div class="absolute inset-y-0 left-0 right-0 bg-saffron rounded-full"></div>
                                <div class="absolute -top-1.5 left-0 w-4 h-4 bg-white border-2 border-saffron rounded-full cursor-pointer shadow-sm"></div>
                                <div class="absolute -top-1.5 right-0 w-4 h-4 bg-white border-2 border-saffron rounded-full cursor-pointer shadow-sm"></div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-8">
                            <div class="flex-1">
                                <label class="text-[10px] text-gray-400 uppercase font-semibold mb-1 block">Min price</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[13px] text-gray-900">₹</span>
                                    <input type="text" value="0.00" class="w-full pl-6 pr-3 py-2 bg-gray-50 border-none rounded-lg text-[13px] font-medium focus:ring-1 focus:ring-saffron/20">
                                </div>
                            </div>
                            <span class="text-gray-300 mt-5">—</span>
                            <div class="flex-1">
                                <label class="text-[10px] text-gray-400 uppercase font-semibold mb-1 block">Max price</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[13px] text-gray-900">₹</span>
                                    <input type="text" value="5,500.00" class="w-full pl-6 pr-3 py-2 bg-gray-50 border-none rounded-lg text-[13px] font-medium focus:ring-1 focus:ring-saffron/20">
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between border-t border-gray-50 pt-5">
                            <button class="text-[13px] font-semibold text-saffron hover:underline">Clear</button>
                            <button class="bg-india-green text-white px-6 py-2 rounded-xl text-[13px] font-semibold shadow-md shadow-india-green/20 hover:bg-india-green/90 transition-all">Apply</button>
                        </div>
                    </div>

                    {{-- Review Score --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-[15px] font-semibold text-gray-900">Review Score</h3>
                            <i class="fa-solid fa-chevron-up text-[10px] text-gray-400"></i>
                        </div>
                        <div class="space-y-3">
                            @foreach(['Excellent', 'Very Good', 'Average', 'Poor', 'Terrible'] as $score)
                            <label class="flex items-center gap-3 group cursor-pointer">
                                <div class="w-5 h-5 rounded border border-gray-200 flex items-center justify-center group-hover:border-india-green transition-colors">
                                    <input type="checkbox" class="hidden">
                                    <i class="fa-solid fa-check text-[10px] text-white hidden"></i>
                                </div>
                                <span class="text-[14px] text-gray-600 group-hover:text-gray-900 transition-colors">{{ $score }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Hotel Star --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-[15px] font-semibold text-gray-900">Hotel Star</h3>
                            <i class="fa-solid fa-chevron-up text-[10px] text-gray-400"></i>
                        </div>
                        <div class="space-y-3">
                            @for($i = 5; $i >= 1; $i--)
                            <label class="flex items-center gap-3 group cursor-pointer">
                                <div class="w-5 h-5 rounded border border-gray-200 flex items-center justify-center group-hover:border-india-green transition-colors">
                                    <input type="checkbox" class="hidden">
                                </div>
                                <div class="flex items-center gap-0.5">
                                    @for($j = 1; $j <= $i; $j++)
                                    <i class="fa-solid fa-star text-[10px] text-saffron"></i>
                                    @endfor
                                </div>
                            </label>
                            @endfor
                        </div>
                    </div>

                    {{-- Facilities --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-[15px] font-semibold text-gray-900">Facilities</h3>
                            <i class="fa-solid fa-chevron-up text-[10px] text-gray-400"></i>
                        </div>
                        <div class="space-y-3 mb-4">
                            @foreach(['[Mega] Listing Activity', '[Mega] Listing Hotel', '[Mega] Listing Tour', '[Mega] Single Activity'] as $facility)
                            <label class="flex items-center gap-3 group cursor-pointer">
                                <div class="w-5 h-5 rounded border border-gray-200 flex items-center justify-center group-hover:border-india-green transition-colors">
                                    <input type="checkbox" class="hidden">
                                </div>
                                <span class="text-[14px] text-gray-600 truncate">{{ $facility }}</span>
                            </label>
                            @endforeach
                        </div>
                        <button class="text-[13px] font-semibold text-india-green flex items-center gap-1">
                            See more <i class="fa-solid fa-chevron-down text-[8px]"></i>
                        </button>
                    </div>

                    {{-- Hotel Theme --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-[15px] font-semibold text-gray-900">Hotel Theme</h3>
                            <i class="fa-solid fa-chevron-up text-[10px] text-gray-400"></i>
                        </div>
                        <div class="space-y-3 mb-4">
                            @foreach(['[Mega] Listing Activity', '[Mega] Listing Hotel', '[Mega] Listing Tour', '[Mega] Single Activity'] as $theme)
                            <label class="flex items-center gap-3 group cursor-pointer">
                                <div class="w-5 h-5 rounded border border-gray-200 flex items-center justify-center group-hover:border-india-green transition-colors">
                                    <input type="checkbox" class="hidden">
                                </div>
                                <span class="text-[14px] text-gray-600 truncate">{{ $theme }}</span>
                            </label>
                            @endforeach
                        </div>
                        <button class="text-[13px] font-semibold text-india-green flex items-center gap-1">
                            See more <i class="fa-solid fa-chevron-down text-[8px]"></i>
                        </button>
                    </div>

                </aside>

                {{-- Right Content: Hotel List --}}
                <div class="flex-1 min-w-0">
                    
                    {{-- List Header --}}
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 pb-4 border-b border-gray-100 gap-4">
                        <h2 class="text-lg text-gray-900">9 hotels found</h2>
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-2 cursor-pointer group">
                                <span class="text-[14px] font-medium text-gray-400 group-hover:text-gray-900 transition-colors">Sort by:</span>
                                <span class="text-[14px] font-semibold text-gray-900 group-hover:text-india-green transition-colors">Recommended</span>
                                <i class="fa-solid fa-chevron-down text-[10px] text-gray-400"></i>
                            </div>
                            <div class="flex items-center bg-gray-50 p-1 rounded-xl">
                                <button class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-400 hover:text-gray-900 transition-all">
                                    <i class="fa-solid fa-list-ul text-sm"></i>
                                </button>
                                <button class="w-9 h-9 flex items-center justify-center rounded-lg text-india-green bg-white shadow-sm border border-gray-100">
                                    <i class="fa-solid fa-table-cells text-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Hotel Grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2">
                        
                        @php
                            $hotels = [
                                ['name' => 'Orange Classic Rishikesh', 'location' => 'Rishikesh, Uttarakhand, India', 'price' => '2,500.00', 'rating' => 5, 'reviews' => 1, 'score' => 'Excellent', 'img' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=800', 'stars' => 2],
                                ['name' => 'Classic Cottage Nubra', 'location' => 'Nubra, Ladakh, India', 'price' => '3,200.00', 'rating' => 0, 'reviews' => 0, 'score' => 'Not Rated', 'img' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&q=80&w=800', 'stars' => 1],
                                ['name' => 'Hotel Regent, Pahalgam', 'location' => 'Pahalgam, Jammu and Kashmir, India', 'price' => '4,800.00', 'rating' => 0, 'reviews' => 0, 'score' => 'Not Rated', 'img' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&q=80&w=800', 'stars' => 0],
                                ['name' => 'Hotel Diamond Manali', 'location' => 'Manali, Himachal Pradesh, India', 'price' => '4,000.00', 'rating' => 0, 'reviews' => 0, 'score' => 'Not Rated', 'img' => 'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&q=80&w=800', 'stars' => 2],
                                ['name' => 'Hotel Madhuban Srinagar', 'location' => 'Srinagar, Jammu and Kashmir, India', 'price' => '3,633.33', 'rating' => 0, 'reviews' => 0, 'score' => 'Not Rated', 'img' => 'https://images.unsplash.com/photo-1564501049412-61c2a3083791?auto=format&fit=crop&q=80&w=800', 'stars' => 2, 'featured' => true],
                                ['name' => 'Hotel Grand Habib', 'location' => 'Srinagar, Jammu and Kashmir, India', 'price' => '3,750.00', 'rating' => 0, 'reviews' => 0, 'score' => 'Not Rated', 'img' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&q=80&w=800', 'stars' => 3, 'featured' => true],
                                ['name' => 'Morpho Hotel, Calangute', 'location' => 'Goa, India', 'price' => '4,250.00', 'rating' => 0, 'reviews' => 0, 'score' => 'Not Rated', 'img' => 'https://images.unsplash.com/photo-1571896349842-3378fb9f0f94?auto=format&fit=crop&q=80&w=800', 'stars' => 3, 'featured' => true],
                                ['name' => 'Hotel Zojila Residency, Kargil', 'location' => 'Kargil, Ladakh, India', 'price' => '5,500.00', 'rating' => 0, 'reviews' => 0, 'score' => 'Not Rated', 'img' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&q=80&w=800', 'stars' => 2],
                                ['name' => 'Glacier View Guest House', 'location' => 'Leh, Ladakh, India', 'price' => '2,850.00', 'rating' => 0, 'reviews' => 0, 'score' => 'Not Rated', 'img' => 'https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?auto=format&fit=crop&q=80&w=800', 'stars' => 1],
                            ];
                        @endphp
                        
                        @foreach($hotels as $hotel)
                            <x-hotel-card 
                                :title="$hotel['name']"
                                :image="$hotel['img']"
                                :stars="$hotel['stars']"
                                :location="$hotel['location']"
                                ratingValue="{{ $hotel['rating'] }} / 5"
                                :ratingLabel="$hotel['score']"
                                :reviewCount="$hotel['reviews']"
                                price="₹{{ $hotel['price'] }}"
                                :featured="$hotel['featured'] ?? false"
                            />
                        @endforeach
                    </div>

                    {{-- Pagination Placeholder --}}
                    <div class="mt-12 flex justify-center">
                        <button class="h-10 w-10 flex items-center justify-center rounded-lg bg-india-green text-white shadow-md shadow-blue-500/20 transition-all">1</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
