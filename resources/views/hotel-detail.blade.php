@extends('layouts.app')

@section('title', $hotel->name . ' - Travel Shravel')

@section('content')
    {{-- Top Header Section --}}
    <section class="bg-gray-50 py-8 border-b border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <nav class="flex mb-6 text-sm text-gray-400">
                <a href="{{ url('/') }}" class="hover:text-navy transition-colors">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ url('/hotels') }}" class="hover:text-navy transition-colors">Hotels</a>
                <span class="mx-2">/</span>
                <span class="text-navy font-medium">{{ $hotel->name }}</span>
            </nav>
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 sm:gap-6">
                <div>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-libre-baskerville text-navy leading-tight mb-3">{{ $hotel->name }}</h1>
                    <div class="flex flex-wrap items-center gap-2.5 sm:gap-4">
                        <span class="px-3 py-1 bg-saffron/10 text-saffron text-xs font-semibold rounded-lg uppercase tracking-wider">{{ $hotel->stars }} Stars</span>
                        <div class="flex items-center gap-1.5 text-gray-500 text-xs sm:text-sm">
                            <i class="fa-solid fa-location-dot text-saffron"></i>
                            <span>{{ $hotel->location }}</span>
                        </div>
                        <div class="flex text-saffron text-xs">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $hotel->stars)
                                    <i class="fa-solid fa-star"></i>
                                @else
                                    <i class="fa-regular fa-star text-gray-300"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-gray-400 text-xs sm:text-sm">({{ $hotel->city }}, {{ $hotel->state }})</span>
                    </div>
                </div>
                <div class="flex gap-3 mt-2 md:mt-0">
                    <button class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-navy hover:text-white hover:border-navy transition-all" title="Share"><i class="fa-solid fa-share-nodes"></i></button>
                    <button class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-red-500 hover:text-white hover:border-red-500 transition-all" title="Add to wishlist"><i class="fa-regular fa-heart"></i></button>
                </div>
            </div>
        </div>
    </section>

    {{-- Hero Slider --}}
    <section class="py-6 sm:py-10 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-2xl overflow-hidden h-[260px] sm:h-[380px] md:h-[480px] border border-gray-200 group" id="hero-slider">
                @php
                    $slides = !empty($hotel->images) && is_array($hotel->images) 
                        ? array_values(array_filter($hotel->images, fn($img) => is_string($img) && trim($img) !== '')) 
                        : [];
                    if (!empty($hotel->primary_image) && !in_array($hotel->primary_image, $slides)) {
                        array_unshift($slides, $hotel->primary_image);
                    }
                    if (empty($slides)) {
                        $slides = ['https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1600&q=80'];
                    }
                @endphp
                {{-- Slides --}}
                @foreach($slides as $index => $slide)
                    <div class="absolute inset-0 transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0 pointer-events-none' }}" data-slide="{{ $index }}">
                        <img src="{{ $slide }}" alt="{{ $hotel->name }} Image {{ $index + 1 }}" class="w-full h-full object-cover">
                    </div>
                @endforeach

                {{-- Controls --}}
                @if(count($slides) > 1)
                <div class="absolute inset-0 flex items-center justify-between px-4 sm:px-6 pointer-events-none transition-opacity duration-300">
                    <button onclick="prevSlide()" class="w-10 h-10 rounded-full bg-white/90 backdrop-blur flex items-center justify-center text-navy shadow-sm pointer-events-auto hover:bg-india-green hover:text-white transition-all focus:outline-none" aria-label="Previous Slide">
                        <i class="fa-solid fa-chevron-left text-sm"></i>
                    </button>
                    <button onclick="nextSlide()" class="w-10 h-10 rounded-full bg-white/90 backdrop-blur flex items-center justify-center text-navy shadow-sm pointer-events-auto hover:bg-india-green hover:text-white transition-all focus:outline-none" aria-label="Next Slide">
                        <i class="fa-solid fa-chevron-right text-sm"></i>
                    </button>
                </div>

                {{-- Dots indicator --}}
                <div class="absolute bottom-6 sm:bottom-8 left-1/2 -translate-x-1/2 flex gap-2 sm:gap-3 z-20">
                    @foreach($slides as $index => $slide)
                        <div class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-white/40' }} transition-all cursor-pointer" onclick="goToSlide({{ $index }})" id="dot-{{ $index }}"></div>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Quick Stats Bar --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
                <div class="bg-gray-50 p-6 rounded-2xl flex items-center gap-4 border border-gray-100">
                    <div class="w-12 h-12 bg-navy/5 rounded-2xl flex items-center justify-center text-navy text-xl"><i class="fa-solid fa-bed"></i></div>
                    <div>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Hotel Rating</p>
                        <p class="text-md font-semibold">{{ $hotel->stars }} Stars</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl flex items-center gap-4 border border-gray-100">
                    <div class="w-12 h-12 bg-navy/5 rounded-2xl flex items-center justify-center text-navy text-xl"><i class="fa-solid fa-clock"></i></div>
                    <div>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Check In/Out</p>
                        <p class="text-md font-semibold">{{ $hotel->check_in_time ?: '12:00 PM' }} / {{ $hotel->check_out_time ?: '11:00 AM' }}</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl flex items-center gap-4 border border-gray-100">
                    <div class="w-12 h-12 bg-navy/5 rounded-2xl flex items-center justify-center text-navy text-xl"><i class="fa-solid fa-wifi"></i></div>
                    <div>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Internet</p>
                        <p class="text-md font-semibold">{{ !empty($hotel->amenities) && collect($hotel->amenities)->contains(fn($a) => is_string($a) && stripos($a, 'wifi') !== false) ? 'Free High-Speed Wi-Fi' : 'Free Wi-Fi' }}</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl flex items-center gap-4 border border-gray-100">
                    <div class="w-12 h-12 bg-navy/5 rounded-2xl flex items-center justify-center text-navy text-xl"><i class="fa-solid fa-utensils"></i></div>
                    <div>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Dining</p>
                        <p class="text-md font-semibold">{{ !empty($hotel->amenities) && collect($hotel->amenities)->contains(fn($a) => is_string($a) && (stripos($a, 'restaurant') !== false || stripos($a, 'dining') !== false || stripos($a, 'breakfast') !== false)) ? 'Inhouse Dining' : ($hotel->stars >= 4 ? 'Luxury Stay' : 'Boutique Hotel') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content Section --}}
    <section class="py-12 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-16">
                
                {{-- Left Column (Details) --}}
                <div class="lg:w-2/3 space-y-16">
                    
                    {{-- Description --}}
                    <div>
                        <h2 class="text-2xl font-semibold text-navy mb-6 flex items-center gap-3">
                            <span class="w-2 h-8 bg-india-green rounded-full"></span>
                            Description
                        </h2>
                        <div class="text-gray-600 leading-relaxed text-[15px] space-y-6">
                            <p>{!! nl2br(e($hotel->description)) !!}</p>
                            @if(!empty($hotel->amenities) && is_array($hotel->amenities) && count($hotel->amenities) > 0)
                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                @foreach(array_slice($hotel->amenities, 0, 4) as $topAmenity)
                                @php
                                    $topAmenityName = is_array($topAmenity) ? ($topAmenity['name'] ?? '') : (string)$topAmenity;
                                @endphp
                                @if(!empty($topAmenityName))
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-circle-check text-india-green mt-1 text-xs"></i>
                                    <span>{{ $topAmenityName }}</span>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            @else
                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-circle-check text-india-green mt-1 text-xs"></i>
                                    <span>24/7 Front Desk Support</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-circle-check text-india-green mt-1 text-xs"></i>
                                    <span>Daily Housekeeping</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-circle-check text-india-green mt-1 text-xs"></i>
                                    <span>Concierge Services</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-circle-check text-india-green mt-1 text-xs"></i>
                                    <span>Airport Transfer Available</span>
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>

                    {{-- Amenities --}}
                    <div>
                        <h2 class="text-2xl font-semibold text-navy mb-8 flex items-center gap-3">
                            <span class="w-2 h-8 bg-india-green rounded-full"></span>
                            Amenities
                        </h2>
                        @php
                            $amenityList = !empty($hotel->amenities) && is_array($hotel->amenities) 
                                ? array_values(array_filter($hotel->amenities, fn($a) => !empty($a))) 
                                : ['Free Wi-Fi', 'Swimming Pool', 'Room Service', 'Air Conditioning', 'Safe Deposit Box', 'Private Bathroom'];

                            if (!function_exists('getHotelAmenityIcon')) {
                                function getHotelAmenityIcon($name) {
                                    $n = strtolower(is_array($name) ? ($name['name'] ?? '') : (string)$name);
                                    if (str_contains($n, 'wifi') || str_contains($n, 'internet')) return 'fa-wifi';
                                    if (str_contains($n, 'pool') || str_contains($n, 'swimming')) return 'fa-person-swimming';
                                    if (str_contains($n, 'spa') || str_contains($n, 'wellness') || str_contains($n, 'massage')) return 'fa-spa';
                                    if (str_contains($n, 'breakfast') || str_contains($n, 'dining') || str_contains($n, 'restaurant') || str_contains($n, 'food') || str_contains($n, 'cuisine')) return 'fa-utensils';
                                    if (str_contains($n, 'bar') || str_contains($n, 'lounge') || str_contains($n, 'cocktail') || str_contains($n, 'grill')) return 'fa-martini-glass';
                                    if (str_contains($n, 'beach') || str_contains($n, 'sea') || str_contains($n, 'ocean')) return 'fa-umbrella-beach';
                                    if (str_contains($n, 'park') || str_contains($n, 'parking') || str_contains($n, 'valet')) return 'fa-square-parking';
                                    if (str_contains($n, 'shuttle') || str_contains($n, 'transfer') || str_contains($n, 'airport')) return 'fa-van-shuttle';
                                    if (str_contains($n, 'gym') || str_contains($n, 'fitness')) return 'fa-dumbbell';
                                    if (str_contains($n, 'ac') || str_contains($n, 'air condition') || str_contains($n, 'cooling') || str_contains($n, 'heat')) return 'fa-snowflake';
                                    if (str_contains($n, 'balcony') || str_contains($n, 'view') || str_contains($n, 'mountain') || str_contains($n, 'lake')) return 'fa-mountain-sun';
                                    if (str_contains($n, 'room service') || str_contains($n, 'service') || str_contains($n, 'housekeeping')) return 'fa-bell-concierge';
                                    if (str_contains($n, 'tv') || str_contains($n, 'screen')) return 'fa-tv';
                                    if (str_contains($n, 'safe') || str_contains($n, 'security')) return 'fa-shield-halved';
                                    if (str_contains($n, 'bath') || str_contains($n, 'shower')) return 'fa-bath';
                                    if (str_contains($n, 'tea') || str_contains($n, 'coffee')) return 'fa-mug-hot';
                                    if (str_contains($n, 'scuba') || str_contains($n, 'dive') || str_contains($n, 'water') || str_contains($n, 'cruise')) return 'fa-water';
                                    if (str_contains($n, 'camp') || str_contains($n, 'fire') || str_contains($n, 'music')) return 'fa-fire';
                                    if (str_contains($n, 'yoga')) return 'fa-peace';
                                    if (str_contains($n, 'play') || str_contains($n, 'kid')) return 'fa-gamepad';
                                    if (str_contains($n, 'tennis')) return 'fa-table-tennis-paddle-ball';
                                    if (str_contains($n, 'helipad')) return 'fa-helicopter';
                                    return 'fa-circle-check';
                                }
                            }
                        @endphp
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-y-6 gap-x-4">
                            @foreach($amenityList as $amenityItem)
                                @php
                                    $name = is_array($amenityItem) ? ($amenityItem['name'] ?? '') : (string)$amenityItem;
                                    $icon = getHotelAmenityIcon($name);
                                @endphp
                                <div class="flex items-center gap-3 text-gray-600">
                                    <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-navy shadow-sm">
                                        <i class="fa-solid {{ $icon }}"></i>
                                    </div>
                                    <span class="text-[15px] font-medium">{{ $name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Room Availability --}}
                    <div>
                        <h2 class="text-2xl font-semibold text-navy mb-8 flex items-center gap-3">
                            <span class="w-2 h-8 bg-india-green rounded-full"></span>
                            Available Rooms
                        </h2>
                        @php
                            $roomList = !empty($hotel->room_types) && is_array($hotel->room_types) && count($hotel->room_types) > 0
                                ? $hotel->room_types
                                : [
                                    ['name' => 'Deluxe Room', 'price' => $hotel->price, 'capacity' => '2 Adults', 'description' => 'Comfortable and spacious room with modern amenities.'],
                                    ['name' => 'Premium Suite', 'price' => round($hotel->price * 1.4), 'capacity' => '2 Adults, 1 Child', 'description' => 'Luxury suite featuring extra living space and premium views.']
                                ];
                        @endphp
                        <div class="space-y-6" id="available-rooms-list">
                            @foreach($roomList as $index => $room)
                            @php
                                $rName = is_array($room) ? ($room['name'] ?? 'Deluxe Room') : (string)$room;
                                $rPrice = is_array($room) && isset($room['price']) ? (float)$room['price'] : ($index === 0 ? (float)$hotel->price : round((float)$hotel->price * 1.35));
                                $rCapacity = is_array($room) && isset($room['capacity']) ? $room['capacity'] : '2 Guests';
                                $rDesc = is_array($room) && isset($room['description']) ? $room['description'] : 'Spacious room equipped with contemporary decor and high quality comfort.';
                                $rImg = (!empty($room['image']))
                                    ? $room['image']
                                    : ((!empty($hotel->images) && isset($hotel->images[$index + 1])) 
                                        ? $hotel->images[$index + 1] 
                                        : ($hotel->primary_image ?: 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=600&q=80'));
                                $isSelected = ($index === 0);
                            @endphp
                            <div id="room-card-{{ $index }}" class="room-card-item rounded-2xl border transition-all duration-300 overflow-hidden flex flex-col sm:flex-row group {{ $isSelected ? 'border-india-green ring-2 ring-india-green/20 bg-emerald-50/20 shadow-md' : 'border-gray-200 bg-gray-50/70 hover:shadow-lg' }}">
                                <div class="sm:w-1/3 h-48 sm:h-auto overflow-hidden relative">
                                    <img src="{{ $rImg }}" alt="{{ $rName }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                </div>
                                <div class="p-6 sm:w-2/3 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-start justify-between gap-2 mb-2">
                                            <h3 class="text-xl font-bold text-navy">{{ $rName }}</h3>
                                            <span id="room-badge-{{ $index }}" class="room-selected-badge {{ $isSelected ? '' : 'hidden' }} px-2.5 py-1 bg-india-green text-white text-xs font-bold rounded-lg shadow-sm flex items-center gap-1.5 flex-shrink-0">
                                                <i class="fa-solid fa-circle-check text-xs"></i> Selected
                                            </span>
                                        </div>
                                        <p class="text-sm text-gray-500 mb-4">{{ $rDesc }}</p>
                                        <div class="flex flex-wrap gap-3 mb-4">
                                            <span class="text-xs text-gray-500 flex items-center gap-1"><i class="fa-solid fa-user-group text-india-green"></i> {{ $rCapacity }}</span>
                                            <span class="text-xs text-gray-500 flex items-center gap-1"><i class="fa-solid fa-bed text-india-green"></i> Premium Bedding</span>
                                            <span class="text-xs text-gray-500 flex items-center gap-1"><i class="fa-solid fa-circle-check text-india-green"></i> Free Cancellation</span>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between mt-4 border-t border-gray-200/60 pt-4">
                                        <div>
                                            <p class="text-xs text-gray-400 mb-1">Price per night</p>
                                            <p class="text-xl font-bold text-navy">₹{{ number_format($rPrice, 2) }}</p>
                                        </div>
                                        <button type="button" id="room-btn-{{ $index }}" onclick="selectRoom({{ $index }}, '{{ addslashes($rName) }}', {{ $rPrice }})" 
                                                class="room-select-btn px-6 py-2 rounded-xl text-sm font-semibold transition-all active:scale-95 flex items-center gap-1.5 {{ $isSelected ? 'bg-india-green text-white shadow-lg shadow-india-green/20 ring-2 ring-india-green/30' : 'bg-white hover:bg-india-green text-navy hover:text-white border border-gray-200 shadow-sm' }}">
                                            @if($isSelected)
                                                <i class="fa-solid fa-circle-check"></i> Selected
                                            @else
                                                Select Room
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Hotel Rules --}}
                    @php
                        $hotelRulesList = $hotel->formatted_rules;
                    @endphp
                    @if(!empty($hotelRulesList) && count($hotelRulesList) > 0)
                    <div>
                        <h2 class="text-2xl font-semibold text-navy mb-8 flex items-center gap-3">
                            <span class="w-2 h-8 bg-india-green rounded-full"></span>
                            Hotel Rules
                        </h2>
                        <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100">
                            <ul class="space-y-4">
                                @foreach($hotelRulesList as $rule)
                                    @php
                                        $ruleTitle = is_array($rule) ? ($rule['title'] ?? '') : '';
                                        $ruleDesc = is_array($rule) ? ($rule['description'] ?? '') : (string)$rule;
                                        $isPayment = str_contains(strtolower($ruleTitle), 'payment');
                                    @endphp
                                    <li class="flex items-start gap-4 {{ !$loop->last ? 'pb-4 border-b border-gray-200/60' : '' }}">
                                        <div class="w-32 sm:w-40 flex-none font-semibold text-gray-800 text-sm">{{ $ruleTitle }}</div>
                                        <div class="text-sm text-gray-600 flex-1">
                                            @if($ruleDesc)
                                                <div class="leading-relaxed">{{ $ruleDesc }}</div>
                                            @endif
                                            @if($isPayment)
                                                @php
                                                    $descLower = strtolower($ruleDesc);
                                                    $hasCards = str_contains($descLower, 'card') || str_contains($descLower, 'visa') || str_contains($descLower, 'master');
                                                    $hasUpi = str_contains($descLower, 'upi') || str_contains($descLower, 'qr') || str_contains($descLower, 'gpay') || str_contains($descLower, 'phonepe') || str_contains($descLower, 'paytm');
                                                    $hasBank = str_contains($descLower, 'bank') || str_contains($descLower, 'net banking');
                                                    $hasCash = str_contains($descLower, 'cash');
                                                    $hasWallets = str_contains($descLower, 'wallet');
                                                @endphp
                                                <div class="flex items-center flex-wrap gap-3.5 text-2xl {{ $ruleDesc ? 'mt-3' : '' }}">
                                                    @if($hasCards)
                                                        <i class="fa-brands fa-cc-visa text-blue-600 hover:text-blue-700 hover:scale-110 transition-all cursor-default" title="Visa Cards"></i>
                                                        <i class="fa-brands fa-cc-mastercard text-orange-500 hover:text-orange-600 hover:scale-110 transition-all cursor-default" title="Mastercard"></i>
                                                    @endif
                                                    @if($hasUpi)
                                                        <span class="inline-flex items-center justify-center px-2 py-0.5 rounded-md bg-indigo-50 border border-indigo-200 text-indigo-700 text-xs font-bold tracking-tight shadow-2xs hover:scale-105 transition-all cursor-default" title="UPI (GPay, PhonePe, Paytm, QR)">
                                                            <i class="fa-solid fa-mobile-screen-button mr-1 text-[11px]"></i>UPI
                                                        </span>
                                                    @endif
                                                    @if($hasBank)
                                                        <i class="fa-solid fa-building-columns text-sky-600 hover:text-sky-700 hover:scale-110 transition-all text-xl cursor-default" title="Net Banking"></i>
                                                    @endif
                                                    @if($hasCash)
                                                        <i class="fa-solid fa-money-bill-wave text-emerald-600 hover:text-emerald-700 hover:scale-110 transition-all text-xl cursor-default" title="Cash on Arrival"></i>
                                                    @endif
                                                    @if($hasWallets)
                                                        <i class="fa-solid fa-wallet text-amber-500 hover:text-amber-600 hover:scale-110 transition-all text-xl cursor-default" title="Digital Wallets"></i>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                </div>

                {{-- Right Column (Sidebar Widget) --}}
                <div class="lg:w-1/3">
                    <div class="sticky top-28 space-y-8">
                        
                        {{-- Premium Booking/Inquiry Widget --}}
                        <div class="bg-white rounded-xl border border-gray-100 overflow-hidden shadow-sm" id="booking-widget">
                            {{-- Price Header --}}
                            <div class="bg-navy p-6 text-white">
                                <p class="text-[13px] opacity-80 mb-1">from <span class="text-2xl font-semibold ml-1" id="widget-rate-display">₹{{ number_format($hotel->price, 2) }}</span> /night</p>
                                <p class="text-xs text-slate-300" id="selected-room-indicator">Standard Room Rate</p>
                            </div>

                            {{-- Tab Switcher --}}
                            <div class="flex border-b border-gray-100">
                                <button onclick="switchTab('book')" id="tab-book" class="flex-1 py-4 text-xs font-bold tracking-widest text-saffron border-b-2 border-saffron transition-all">BOOK</button>
                                <button onclick="switchTab('inquiry')" id="tab-inquiry" class="flex-1 py-4 text-xs font-bold tracking-widest text-gray-400 border-b-2 border-transparent hover:text-gray-600 transition-all">INQUIRY</button>
                            </div>

                            {{-- Book Tab Content --}}
                            <div id="content-book" class="space-y-0">
                                {{-- Date Selector --}}
                                <div class="grid grid-cols-2 border-b border-gray-100">
                                    <div class="p-4 border-r border-gray-100 cursor-pointer group relative" onclick="document.getElementById('checkin-picker').showPicker()">
                                        <p class="text-xs font-semibold text-gray-900 mb-1">Check In</p>
                                        <p id="display-checkin" class="text-sm text-navy font-medium">--/--/----</p>
                                        <input type="date" id="checkin-picker" class="absolute inset-0 opacity-0 cursor-pointer" onchange="updateDate('checkin', this.value)">
                                    </div>
                                    <div class="p-4 cursor-pointer group relative" onclick="document.getElementById('checkout-picker').showPicker()">
                                        <p class="text-xs font-semibold text-gray-900 mb-1">Check Out</p>
                                        <p id="display-checkout" class="text-sm text-navy font-medium">--/--/----</p>
                                        <input type="date" id="checkout-picker" class="absolute inset-0 opacity-0 cursor-pointer" onchange="updateDate('checkout', this.value)">
                                    </div>
                                </div>

                                {{-- Counters --}}
                                <div class="p-6 space-y-6 border-b border-gray-100">
                                    {{-- Rooms --}}
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">Rooms</p>
                                        </div>
                                        <div class="flex items-center gap-6">
                                            <button onclick="changeCount('room', -1)" class="text-gray-400 hover:text-navy"><i class="fa-solid fa-minus text-xs"></i></button>
                                            <span id="count-room" class="text-[15px] text-navy font-semibold min-w-[12px] text-center">1</span>
                                            <button onclick="changeCount('room', 1)" class="text-gray-400 hover:text-navy"><i class="fa-solid fa-plus text-xs"></i></button>
                                        </div>
                                    </div>
                                    {{-- Adults --}}
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">Adults</p>
                                            <p class="text-[11px] text-gray-400">12 years and above</p>
                                        </div>
                                        <div class="flex items-center gap-6">
                                            <button onclick="changeCount('adult', -1)" class="text-gray-400 hover:text-navy"><i class="fa-solid fa-minus text-xs"></i></button>
                                            <span id="count-adult" class="text-[15px] text-navy font-semibold min-w-[12px] text-center">2</span>
                                            <button onclick="changeCount('adult', 1)" class="text-gray-400 hover:text-navy"><i class="fa-solid fa-plus text-xs"></i></button>
                                        </div>
                                    </div>
                                    {{-- Children --}}
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">Children</p>
                                            <p class="text-[11px] text-gray-400">0 - 11 years</p>
                                        </div>
                                        <div class="flex items-center gap-6">
                                            <button onclick="changeCount('child', -1)" class="text-gray-400 hover:text-navy"><i class="fa-solid fa-minus text-xs"></i></button>
                                            <span id="count-child" class="text-[15px] text-navy font-semibold min-w-[12px] text-center">0</span>
                                            <button onclick="changeCount('child', 1)" class="text-gray-400 hover:text-navy"><i class="fa-solid fa-plus text-xs"></i></button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Summary & Total --}}
                                <div class="p-6 bg-gray-50/50">
                                    <div class="flex justify-between text-sm text-gray-600 mb-2">
                                        <span id="calc-breakdown">₹{{ number_format($hotel->price, 2) }} x 1 night x 1 room</span>
                                        <span id="calc-subtotal">₹{{ number_format($hotel->price, 2) }}</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-600 mb-4 pb-4 border-b border-gray-200">
                                        <span>Taxes & GST (18%)</span>
                                        <span id="calc-taxes">₹{{ number_format($hotel->price * 0.18, 2) }}</span>
                                    </div>
                                    <div class="flex justify-between font-bold text-navy text-lg">
                                        <span>Total</span>
                                        <span id="calc-total">₹{{ number_format($hotel->price * 1.18, 2) }}</span>
                                    </div>
                                </div>

                                {{-- Book Submit --}}
                                <div class="p-6 pb-2">
                                    <button class="w-full py-3 bg-navy text-white font-semibold rounded-lg shadow-lg hover:bg-navy/90 transition-all uppercase tracking-wider active:scale-95">
                                        BOOK NOW
                                    </button>
                                </div>
                            </div>

                            {{-- Inquiry Tab Content --}}
                            <div id="content-inquiry" class="hidden p-8 space-y-6">
                                <div class="space-y-4">
                                    <div class="relative">
                                        <p class="text-[11px] text-gray-400 mb-1">Name *</p>
                                        <input type="text" placeholder="Enter your full name" class="w-full bg-transparent border-b border-gray-200 focus:border-india-green outline-none py-2 text-[15px] text-gray-700">
                                    </div>
                                    <div class="relative">
                                        <p class="text-[11px] text-gray-400 mb-1">Email *</p>
                                        <input type="email" placeholder="name@example.com" class="w-full bg-transparent border-b border-gray-200 focus:border-india-green outline-none py-2 text-[15px] text-gray-700">
                                    </div>
                                    <div class="relative">
                                        <p class="text-[11px] text-gray-400 mb-1">Phone *</p>
                                        <input type="tel" placeholder="+91 98765 43210" class="w-full bg-transparent border-b border-gray-200 focus:border-india-green outline-none py-2 text-[15px] text-gray-700">
                                    </div>
                                    <div class="relative">
                                        <p class="text-[11px] text-gray-400 mb-1">Message / Requirements *</p>
                                        <textarea rows="2" placeholder="Tell us your travel dates or special requests..." class="w-full bg-transparent border-b border-gray-200 focus:border-india-green outline-none py-2 text-[15px] text-gray-700 resize-none"></textarea>
                                    </div>
                                </div>
                                <div class="flex justify-center pt-4">
                                    <button class="w-full py-3 bg-navy text-white font-semibold rounded-xl shadow-lg hover:bg-navy/90 transition-all uppercase tracking-widest active:scale-95">
                                        SEND INQUIRY
                                    </button>
                                </div>
                            </div>
                            
                            {{-- Bottom Aesthetic Bar --}}
                            <div class="h-1 bg-navy"></div>
                        </div>

                        {{-- Why Choose Us --}}
                        <div class="bg-gray-50 rounded-[40px] p-8 border border-gray-100 border-dashed">
                            <h4 class="text-lg font-bold text-navy mb-6">Booking Guarantee</h4>
                            <ul class="space-y-4">
                                <li class="flex items-center gap-3 text-sm text-gray-500">
                                    <i class="fa-solid fa-headset text-india-green"></i>
                                    <span>24/7 Dedicated Concierge Support</span>
                                </li>
                                <li class="flex items-center gap-3 text-sm text-gray-500">
                                    <i class="fa-solid fa-shield-halved text-india-green"></i>
                                    <span>100% Verified Property Guarantee</span>
                                </li>
                                <li class="flex items-center gap-3 text-sm text-gray-500">
                                    <i class="fa-solid fa-calendar-check text-india-green"></i>
                                    <span>Instant Confirmation & Booking Voucher</span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Hotel Location --}}
    <section class="py-16 bg-white border-t border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-2xl font-semibold text-navy mb-1">Hotel Location</h2>
                    <p class="text-xs text-gray-400">{{ $hotel->address ? $hotel->address . ', ' : '' }}{{ $hotel->city }}, {{ $hotel->state }}, {{ $hotel->country }}</p>
                </div>
                <div class="flex items-center gap-2 text-gray-500 text-sm">
                    <i class="fa-solid fa-location-dot text-india-green"></i>
                    <span>{{ $hotel->location }}</span>
                </div>
            </div>
            <div class="w-full rounded-2xl overflow-hidden shadow-sm border border-gray-100 h-[450px]">
                @if($hotel->map_url)
                    <iframe 
                        src="{{ $hotel->map_url }}" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                @else
                    <iframe 
                        src="https://maps.google.com/maps?q={{ urlencode($hotel->name . ' ' . $hotel->location . ' ' . $hotel->city) }}&t=m&z=14&output=embed&iwloc=near" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                @endif
            </div>
        </div>
    </section>

    {{-- FAQs Section --}}
    <section class="py-16 bg-white border-t border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-navy mb-8">Frequently Asked Questions</h2>
            <div class="space-y-4">
                @php
                    $faqs = [
                        [
                            'What are the check-in and check-out times at ' . $hotel->name . '?',
                            'Check-in starts from ' . ($hotel->check_in_time ?: '12:00 PM') . ', and check-out is until ' . ($hotel->check_out_time ?: '11:00 AM') . '. Early check-in or late check-out is subject to availability upon arrival.'
                        ],
                        [
                            'Does ' . $hotel->name . ' offer internet and dining facilities?',
                            'Yes, guests enjoy complimentary ' . (!empty($hotel->amenities) && collect($hotel->amenities)->contains(fn($a) => is_string($a) && stripos($a, 'wifi') !== false) ? 'high-speed Wi-Fi' : 'Wi-Fi') . ' along with dining options throughout their stay.'
                        ],
                        [
                            'Where is the hotel situated?',
                            $hotel->name . ' is located at ' . $hotel->location . ($hotel->address ? ' (' . $hotel->address . ', ' . $hotel->city . ', ' . $hotel->state . ')' : '') . '.'
                        ]
                    ];
                @endphp
                @foreach($faqs as $idx => $faq)
                    <div class="border border-gray-100 rounded-lg overflow-hidden transition-all duration-300">
                        <button onclick="toggleFaq({{ $idx }})" class="w-full p-6 flex items-center justify-between text-left hover:bg-gray-50/50 transition-colors">
                            <div class="flex items-center gap-4">
                                <i class="fa-regular fa-question-circle text-gray-400 text-lg"></i>
                                <span class="font-semibold text-gray-800">{{ $faq[0] }}</span>
                            </div>
                            <i id="faq-icon-{{ $idx }}" class="fa-solid fa-chevron-down text-navy text-xs transition-transform duration-300"></i>
                        </button>
                        <div id="faq-content-{{ $idx }}" class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-gray-50/30">
                            <div class="p-6 pt-0 text-sm text-gray-500 leading-relaxed">
                                {{ $faq[1] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Reviews Section --}}
    <section class="py-16 bg-white border-t border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-navy mb-12">Guest Reviews</h2>
            
            {{-- Review Summary Card --}}
            <div class="bg-white border border-gray-100 rounded-2xl p-8 md:p-12 mb-16 shadow-sm">
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="text-center md:border-r md:border-gray-100 md:pr-12">
                        <div class="text-6xl font-semibold text-india-green mb-2">{{ $hotel->stars >= 4 ? '4.8' : '4.5' }}<span class="text-2xl text-gray-300 font-normal">/5</span></div>
                        <div class="text-xl font-semibold text-navy mb-1">{{ $hotel->stars >= 4 ? 'Excellent' : 'Very Good' }}</div>
                        <p class="text-xs text-gray-400">Based on verified traveler reviews</p>
                    </div>
                    <div class="flex-1 w-full space-y-3">
                        @foreach([['Excellent', 85, '85%'], ['Very Good', 12, '12%'], ['Average', 3, '3%'], ['Poor', 0, '0%'], ['Terrible', 0, '0%']] as $bar)
                            <div class="flex items-center gap-4 text-xs font-medium">
                                <span class="w-20 text-gray-500">{{ $bar[0] }}</span>
                                <div class="flex-1 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-india-green rounded-full" style="width: {{ $bar[2] }}"></div>
                                </div>
                                <span class="w-6 text-gray-400 text-right">{{ $bar[1] }}%</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Write a Review Form --}}
            <div>
                <div class="flex items-center gap-2 cursor-pointer mb-8 group" onclick="toggleReviewForm()">
                    <h3 class="text-lg font-semibold text-navy">Write a review</h3>
                    <i id="review-chevron" class="fa-solid fa-chevron-down text-gray-400 text-xs transition-transform duration-300"></i>
                </div>
                
                <div id="review-form-container" class="max-h-0 overflow-hidden transition-all duration-700 ease-in-out">
                    <div class="bg-gray-50/50 rounded-2xl p-8 md:p-12 border border-gray-100">
                        <h4 class="text-xs font-bold tracking-widest text-navy uppercase mb-4">LEAVE A REVIEW</h4>
                        <p class="text-xs text-gray-400 mb-8">Your email address will not be published. Required fields are marked *</p>

                        <form action="#" class="space-y-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <input type="text" placeholder="Name *" class="w-full px-5 py-3.5 bg-white border border-gray-100 rounded-xl focus:ring-1 focus:ring-navy focus:border-navy outline-none text-sm transition-all placeholder:text-gray-300">
                                <input type="email" placeholder="Email *" class="w-full px-5 py-3.5 bg-white border border-gray-100 rounded-xl focus:ring-1 focus:ring-navy focus:border-navy outline-none text-sm transition-all placeholder:text-gray-300">
                            </div>
                            <input type="text" placeholder="Title *" class="w-full px-5 py-3.5 bg-white border border-gray-100 rounded-xl focus:ring-1 focus:ring-navy focus:border-navy outline-none text-sm transition-all placeholder:text-gray-300">
                            
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                                {{-- Star Ratings --}}
                                <div class="bg-white p-8 rounded-2xl border border-gray-50 space-y-6">
                                    @foreach(['Cleanliness', 'Comfort', 'Location', 'Facilities', 'Staff', 'Value for money'] as $cat)
                                        <div class="flex items-center justify-between">
                                            <span class="text-xs font-semibold text-gray-400">{{ $cat }}</span>
                                            <div class="flex gap-1 text-gray-200 text-sm">
                                                @for($i=0; $i<5; $i++)
                                                    <i class="fa-solid fa-star cursor-pointer hover:text-saffron transition-colors"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- Content area --}}
                                <div class="relative">
                                    <textarea placeholder="Content *" rows="8" class="w-full px-8 py-8 bg-white border border-gray-50 rounded-2xl focus:ring-1 focus:ring-navy focus:border-navy outline-none text-[15px] text-gray-600 transition-all resize-none placeholder:text-gray-300"></textarea>
                                </div>
                            </div>

                            <div class="pt-4">
                                <button type="submit" class="px-10 py-3.5 bg-navy text-white font-semibold rounded-lg shadow-lg hover:bg-navy/90 transition-all uppercase tracking-wider active:scale-95">
                                    POST REVIEW
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Similar Hotels --}}
    @if(isset($similarHotels) && $similarHotels->count() > 0)
    <section class="py-24 bg-gray-50 border-t border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-semibold text-navy mb-12 text-center">Similar Hotels You May Like</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($similarHotels as $sHotel)
                    <x-hotel-card 
                        :title="$sHotel->name"
                        :image="$sHotel->primary_image ?: (!empty($sHotel->images) && is_array($sHotel->images) ? $sHotel->images[0] : 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=800')"
                        :stars="$sHotel->stars"
                        :location="$sHotel->location"
                        ratingValue="{{ $sHotel->stars }} / 5"
                        ratingLabel="{{ $sHotel->stars >= 4 ? 'Excellent' : 'Very Good' }}"
                        reviewCount="0"
                        price="₹{{ number_format($sHotel->price, 2) }}"
                        :featured="$sHotel->is_featured ?? false"
                        link="{{ url('/hotel/' . $sHotel->slug) }}"
                    />
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <script>
        let currentSlide = 0;
        let slideInterval = null;
        let activeRoomRate = {{ (float) $hotel->price }};
        let activeRoomTitle = 'Standard Room';

        function getSliderData() {
            const slider = document.getElementById('hero-slider');
            if (!slider) return { slides: [], dots: [], total: 0 };
            const slides = slider.querySelectorAll('[data-slide]');
            const dots = slider.querySelectorAll('[id^="dot-"]');
            return { slides, dots, total: slides.length };
        }

        function showSlide(index) {
            const { slides, dots, total } = getSliderData();
            if (total === 0) return;

            currentSlide = (index + total) % total;

            slides.forEach((slide, i) => {
                if (i === currentSlide) {
                    slide.style.opacity = '1';
                    slide.classList.remove('pointer-events-none');
                } else {
                    slide.style.opacity = '0';
                    slide.classList.add('pointer-events-none');
                }
            });

            dots.forEach((dot, i) => {
                dot.classList.toggle('bg-white', i === currentSlide);
                dot.classList.toggle('bg-white/40', i !== currentSlide);
            });
        }

        function nextSlide() {
            const { total } = getSliderData();
            if (total > 1) {
                showSlide(currentSlide + 1);
                resetTimer();
            }
        }

        function prevSlide() {
            const { total } = getSliderData();
            if (total > 1) {
                showSlide(currentSlide - 1);
                resetTimer();
            }
        }

        function goToSlide(index) {
            showSlide(index);
            resetTimer();
        }

        function resetTimer() {
            if (slideInterval) {
                clearInterval(slideInterval);
                slideInterval = null;
            }
            const { total } = getSliderData();
            if (total > 1) {
                slideInterval = setInterval(function() {
                    const { total: currentTotal } = getSliderData();
                    if (currentTotal > 1) {
                        showSlide(currentSlide + 1);
                    }
                }, 5000);
            }
        }

        function formatCurrency(amount) {
            return '₹' + amount.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        function getSelectedNights() {
            const checkinInput = document.getElementById('checkin-picker');
            const checkoutInput = document.getElementById('checkout-picker');
            if (checkinInput && checkoutInput && checkinInput.value && checkoutInput.value) {
                const start = new Date(checkinInput.value);
                const end = new Date(checkoutInput.value);
                const diffTime = end - start;
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                if (diffDays > 0) return diffDays;
            }
            return 1;
        }

        function recalculateBooking() {
            const roomCountEl = document.getElementById('count-room');
            const rooms = parseInt(roomCountEl ? roomCountEl.innerText : 1) || 1;
            const nights = getSelectedNights();

            const subtotal = activeRoomRate * nights * rooms;
            const taxes = subtotal * 0.18;
            const total = subtotal + taxes;

            const breakdownEl = document.getElementById('calc-breakdown');
            const subtotalEl = document.getElementById('calc-subtotal');
            const taxesEl = document.getElementById('calc-taxes');
            const totalEl = document.getElementById('calc-total');

            if (breakdownEl) breakdownEl.innerText = `${formatCurrency(activeRoomRate)} x ${nights} ${nights === 1 ? 'night' : 'nights'} x ${rooms} ${rooms === 1 ? 'room' : 'rooms'}`;
            if (subtotalEl) subtotalEl.innerText = formatCurrency(subtotal);
            if (taxesEl) taxesEl.innerText = formatCurrency(taxes);
            if (totalEl) totalEl.innerText = formatCurrency(total);
        }

        function selectRoom(index, roomName, price) {
            activeRoomRate = parseFloat(price);
            activeRoomTitle = roomName;

            const widgetRateDisplay = document.getElementById('widget-rate-display');
            const selectedRoomIndicator = document.getElementById('selected-room-indicator');

            if (widgetRateDisplay) widgetRateDisplay.innerText = formatCurrency(activeRoomRate);
            if (selectedRoomIndicator) selectedRoomIndicator.innerText = `${activeRoomTitle} Selected`;

            // Reset all room cards and buttons
            document.querySelectorAll('.room-card-item').forEach(card => {
                card.classList.remove('border-india-green', 'ring-2', 'ring-india-green/20', 'bg-emerald-50/20', 'shadow-md');
                card.classList.add('border-gray-200', 'bg-gray-50/70');
            });

            document.querySelectorAll('.room-selected-badge').forEach(badge => {
                badge.classList.add('hidden');
            });

            document.querySelectorAll('.room-select-btn').forEach(btn => {
                btn.classList.remove('bg-india-green', 'text-white', 'shadow-lg', 'shadow-india-green/20', 'ring-2', 'ring-india-green/30');
                btn.classList.add('bg-white', 'hover:bg-india-green', 'text-navy', 'hover:text-white', 'border', 'border-gray-200', 'shadow-sm');
                btn.innerHTML = 'Select Room';
            });

            // Highlight selected card & button
            const activeCard = document.getElementById(`room-card-${index}`);
            if (activeCard) {
                activeCard.classList.remove('border-gray-200', 'bg-gray-50/70');
                activeCard.classList.add('border-india-green', 'ring-2', 'ring-india-green/20', 'bg-emerald-50/20', 'shadow-md');
            }

            const activeBadge = document.getElementById(`room-badge-${index}`);
            if (activeBadge) {
                activeBadge.classList.remove('hidden');
            }

            const activeBtn = document.getElementById(`room-btn-${index}`);
            if (activeBtn) {
                activeBtn.classList.remove('bg-white', 'hover:bg-india-green', 'text-navy', 'hover:text-white', 'border', 'border-gray-200', 'shadow-sm');
                activeBtn.classList.add('bg-india-green', 'text-white', 'shadow-lg', 'shadow-india-green/20', 'ring-2', 'ring-india-green/30');
                activeBtn.innerHTML = '<i class="fa-solid fa-circle-check"></i> Selected';
            }

            recalculateBooking();
        }

        function switchTab(tab) {
            const bookContent = document.getElementById('content-book');
            const inquiryContent = document.getElementById('content-inquiry');
            const bookBtn = document.getElementById('tab-book');
            const inquiryBtn = document.getElementById('tab-inquiry');

            if (tab === 'book') {
                bookContent.classList.remove('hidden');
                inquiryContent.classList.add('hidden');
                bookBtn.classList.add('text-saffron', 'border-saffron');
                bookBtn.classList.remove('text-gray-400', 'border-transparent');
                inquiryBtn.classList.remove('text-saffron', 'border-saffron');
                inquiryBtn.classList.add('text-gray-400', 'border-transparent');
            } else {
                bookContent.classList.add('hidden');
                inquiryContent.classList.remove('hidden');
                inquiryBtn.classList.add('text-saffron', 'border-saffron');
                inquiryBtn.classList.remove('text-gray-400', 'border-transparent');
                bookBtn.classList.remove('text-saffron', 'border-saffron');
                bookBtn.classList.add('text-gray-400', 'border-transparent');
            }
        }

        function changeCount(type, delta) {
            const el = document.getElementById(`count-${type}`);
            if (!el) return;
            let val = parseInt(el.innerText) || 0;
            let min = (type === 'child') ? 0 : 1;
            val = Math.max(min, val + delta);
            el.innerText = val;

            if (type === 'room') {
                recalculateBooking();
            }
        }

        function formatDateDisplay(d) {
            const day = String(d.getDate()).padStart(2, '0');
            const month = String(d.getMonth() + 1).padStart(2, '0');
            const year = d.getFullYear();
            return `${day}/${month}/${year}`;
        }

        function formatISODate(d) {
            const day = String(d.getDate()).padStart(2, '0');
            const month = String(d.getMonth() + 1).padStart(2, '0');
            const year = d.getFullYear();
            return `${year}-${month}-${day}`;
        }

        function updateDate(type, dateStr) {
            if (!dateStr) return;
            const [year, month, day] = dateStr.split('-');
            const formattedDate = `${day}/${month}/${year}`;
            const displayEl = document.getElementById(`display-${type}`);
            if (displayEl) displayEl.innerText = formattedDate;

            // Ensure checkout is after checkin
            const checkinPicker = document.getElementById('checkin-picker');
            const checkoutPicker = document.getElementById('checkout-picker');
            if (type === 'checkin' && checkoutPicker && checkinPicker) {
                const cin = new Date(checkinPicker.value);
                const cout = new Date(checkoutPicker.value);
                if (cout <= cin) {
                    const nextDay = new Date(cin);
                    nextDay.setDate(nextDay.getDate() + 1);
                    checkoutPicker.value = formatISODate(nextDay);
                    document.getElementById('display-checkout').innerText = formatDateDisplay(nextDay);
                }
            }

            recalculateBooking();
        }

        function toggleFaq(index) {
            const content = document.getElementById(`faq-content-${index}`);
            const icon = document.getElementById(`faq-icon-${index}`);
            
            if (content.style.maxHeight && content.style.maxHeight !== '0px') {
                content.style.maxHeight = '0px';
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.style.transform = 'rotate(180deg)';
            }
        }

        function toggleReviewForm() {
            const container = document.getElementById('review-form-container');
            const icon = document.getElementById('review-chevron');
            
            if (container.style.maxHeight && container.style.maxHeight !== '0px') {
                container.style.maxHeight = '0px';
                icon.style.transform = 'rotate(0deg)';
            } else {
                container.style.maxHeight = container.scrollHeight + "px";
                icon.style.transform = 'rotate(180deg)';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            resetTimer();

            // Set default dates (Today + Tomorrow)
            const today = new Date();
            const tomorrow = new Date();
            tomorrow.setDate(today.getDate() + 1);

            const checkinPicker = document.getElementById('checkin-picker');
            const checkoutPicker = document.getElementById('checkout-picker');
            const displayCheckin = document.getElementById('display-checkin');
            const displayCheckout = document.getElementById('display-checkout');

            if (checkinPicker) {
                checkinPicker.value = formatISODate(today);
                checkinPicker.min = formatISODate(today);
            }
            if (checkoutPicker) {
                checkoutPicker.value = formatISODate(tomorrow);
                checkoutPicker.min = formatISODate(tomorrow);
            }
            if (displayCheckin) displayCheckin.innerText = formatDateDisplay(today);
            if (displayCheckout) displayCheckout.innerText = formatDateDisplay(tomorrow);

            recalculateBooking();
        });
    </script>
@endsection
