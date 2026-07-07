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
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div>
                    <h1 class="text-3xl md:text-3xl leading-tight mb-3">{{ $hotel->name }}</h1>
                    <div class="flex items-center gap-4">
                        <span class="px-3 py-1 bg-saffron/10 text-saffron text-xs font-semibold rounded-lg uppercase tracking-wider">{{ $hotel->stars }} Stars</span>
                        <div class="flex items-center gap-2 text-gray-500 text-sm">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>{{ $hotel->location }}</span>
                        </div>
                        <div class="flex text-saffron text-xs ml-4">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $hotel->stars)
                                    <i class="fa-solid fa-star"></i>
                                @else
                                    <i class="fa-regular fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-gray-400 text-sm">(0 Reviews)</span>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-navy hover:text-white hover:border-navy transition-all"><i class="fa-solid fa-share-nodes"></i></button>
                    <button class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-red-500 hover:text-white hover:border-red-500 transition-all"><i class="fa-regular fa-heart"></i></button>
                </div>
            </div>
        </div>
    </section>

    {{-- Hero Slider --}}
    <section class="py-10 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-2xl overflow-hidden h-[500px] border border-gray-200 group" id="hero-slider">
                @php
                    $slides = !empty($hotel->images) && is_array($hotel->images) ? $hotel->images : [$hotel->primary_image ?: 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1600&q=80'];
                @endphp
                {{-- Slides --}}
                @foreach($slides as $index => $slide)
                    <div class="absolute inset-0 transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" data-slide="{{ $index }}">
                        <img src="{{ $slide }}" alt="{{ $hotel->name }} Image {{ $index + 1 }}" class="w-full h-full object-cover">
                    </div>
                @endforeach

                {{-- Controls --}}
                @if(count($slides) > 1)
                <div class="absolute inset-0 flex items-center justify-between px-6 pointer-events-none transition-opacity duration-300">
                    <button onclick="prevSlide()" class="w-10 h-10 rounded-full bg-white/90 backdrop-blur flex items-center justify-center text-navy shadow-sm pointer-events-auto hover:bg-india-green hover:text-white transition-all">
                        <i class="fa-solid fa-chevron-left text-sm"></i>
                    </button>
                    <button onclick="nextSlide()" class="w-10 h-10 rounded-full bg-white/90 backdrop-blur flex items-center justify-center text-navy shadow-sm pointer-events-auto hover:bg-india-green hover:text-white transition-all">
                        <i class="fa-solid fa-chevron-right text-sm"></i>
                    </button>
                </div>

                {{-- Dots indicator --}}
                <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-3 z-20">
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
                        <p class="text-md font-semibold">12:00 PM / 11:00 AM</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl flex items-center gap-4 border border-gray-100">
                    <div class="w-12 h-12 bg-navy/5 rounded-2xl flex items-center justify-center text-navy text-xl"><i class="fa-solid fa-wifi"></i></div>
                    <div>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Internet</p>
                        <p class="text-md font-semibold">Free Wi-Fi</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl flex items-center gap-4 border border-gray-100">
                    <div class="w-12 h-12 bg-navy/5 rounded-2xl flex items-center justify-center text-navy text-xl"><i class="fa-solid fa-utensils"></i></div>
                    <div>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Dining</p>
                        <p class="text-md font-semibold">Inhouse Restaurant</p>
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
                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                                    <span>Airport Shuttle (Surcharge)</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Amenities --}}
                    <div>
                        <h2 class="text-2xl font-semibold text-navy mb-8 flex items-center gap-3">
                            <span class="w-2 h-8 bg-india-green rounded-full"></span>
                            Amenities
                        </h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-y-6 gap-x-4">
                            @foreach([
                                ['fa-wifi', 'Free Wi-Fi'],
                                ['fa-tv', 'Flat-screen TV'],
                                ['fa-snowflake', 'Air Conditioning'],
                                ['fa-mug-hot', 'Coffee/Tea Maker'],
                                ['fa-car', 'Free Parking'],
                                ['fa-bell-concierge', 'Room Service'],
                                ['fa-shield-halved', 'Safe Deposit Box'],
                                ['fa-bath', 'Private Bathroom'],
                                ['fa-utensils', 'Restaurant']
                            ] as $amenity)
                                <div class="flex items-center gap-3 text-gray-600">
                                    <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-navy shadow-sm">
                                        <i class="fa-solid {{ $amenity[0] }}"></i>
                                    </div>
                                    <span class="text-[15px] font-medium">{{ $amenity[1] }}</span>
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
                        <div class="space-y-6">
                            @foreach([
                                ['Deluxe Room', 'Spacious room with modern amenities, perfect for couples.', $hotel->price, 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=400&q=80'],
                                ['Premium Suite', 'Luxury suite featuring a separate living area and premium views.', $hotel->price * 1.5, 'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=400&q=80']
                            ] as $room)
                            <div class="bg-gray-50 rounded-2xl border border-gray-100 overflow-hidden flex flex-col sm:flex-row group transition-all hover:shadow-lg">
                                <div class="sm:w-1/3 h-48 sm:h-auto overflow-hidden">
                                    <img src="{{ $room[3] }}" alt="{{ $room[0] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                </div>
                                <div class="p-6 sm:w-2/3 flex flex-col justify-between">
                                    <div>
                                        <h3 class="text-xl font-bold text-navy mb-2">{{ $room[0] }}</h3>
                                        <p class="text-sm text-gray-500 mb-4">{{ $room[1] }}</p>
                                        <div class="flex flex-wrap gap-3 mb-4">
                                            <span class="text-xs text-gray-500 flex items-center gap-1"><i class="fa-solid fa-user-group text-india-green"></i> 2 Guests</span>
                                            <span class="text-xs text-gray-500 flex items-center gap-1"><i class="fa-solid fa-bed text-india-green"></i> 1 King Bed</span>
                                            <span class="text-xs text-gray-500 flex items-center gap-1"><i class="fa-solid fa-maximize text-india-green"></i> 30 m²</span>
                                        </div>
                                    </div>
                                    <div class="flex items-end justify-between mt-4 border-t border-gray-200/60 pt-4">
                                        <div>
                                            <p class="text-xs text-gray-400 mb-1">Price per night</p>
                                            <p class="text-xl font-bold text-navy">₹{{ number_format($room[2], 2) }}</p>
                                        </div>
                                        <button class="bg-india-green text-white px-6 py-2 rounded-xl text-sm font-semibold shadow-lg shadow-india-green/20 hover:bg-india-green/90 transition-all active:scale-95">Select Room</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Hotel Rules --}}
                    <div>
                        <h2 class="text-2xl font-semibold text-navy mb-8 flex items-center gap-3">
                            <span class="w-2 h-8 bg-india-green rounded-full"></span>
                            Hotel Rules
                        </h2>
                        <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100">
                            <ul class="space-y-4">
                                <li class="flex items-start gap-4 pb-4 border-b border-gray-200/60">
                                    <div class="w-32 flex-none font-semibold text-gray-800 text-sm">Check-in</div>
                                    <div class="text-sm text-gray-600">From 12:00 PM. Guests are required to show a photo ID upon check-in.</div>
                                </li>
                                <li class="flex items-start gap-4 pb-4 border-b border-gray-200/60">
                                    <div class="w-32 flex-none font-semibold text-gray-800 text-sm">Check-out</div>
                                    <div class="text-sm text-gray-600">Until 11:00 AM.</div>
                                </li>
                                <li class="flex items-start gap-4 pb-4 border-b border-gray-200/60">
                                    <div class="w-32 flex-none font-semibold text-gray-800 text-sm">Cancellation</div>
                                    <div class="text-sm text-gray-600">Cancellation and prepayment policies vary according to room type. Please check the room conditions when selecting your room.</div>
                                </li>
                                <li class="flex items-start gap-4 pb-4 border-b border-gray-200/60">
                                    <div class="w-32 flex-none font-semibold text-gray-800 text-sm">Pets</div>
                                    <div class="text-sm text-gray-600">Pets are not allowed in the hotel premises.</div>
                                </li>
                                <li class="flex items-start gap-4">
                                    <div class="w-32 flex-none font-semibold text-gray-800 text-sm">Accepted Payment</div>
                                    <div class="text-sm text-gray-600 flex gap-2 text-xl text-gray-400">
                                        <i class="fa-brands fa-cc-visa hover:text-blue-700 transition-colors cursor-pointer"></i>
                                        <i class="fa-brands fa-cc-mastercard hover:text-orange-500 transition-colors cursor-pointer"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

                {{-- Right Column (Sidebar Widget) --}}
                <div class="lg:w-1/3">
                    <div class="sticky top-28 space-y-8">
                        
                        {{-- Premium Booking/Inquiry Widget --}}
                        <div class="bg-white rounded-xl border border-gray-100 overflow-hidden" id="booking-widget">
                            {{-- Price Header --}}
                            <div class="bg-navy p-6 text-white">
                                <p class="text-[13px] opacity-80 mb-1">from <span class="text-2xl font-semibold ml-1">₹{{ number_format($hotel->price, 2) }}</span> /night</p>
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
                                        <p id="display-checkin" class="text-sm text-navy">13/03/2026</p>
                                        <input type="date" id="checkin-picker" class="absolute inset-0 opacity-0 cursor-pointer pointer-events-none" onchange="updateDate('checkin', this.value)">
                                    </div>
                                    <div class="p-4 cursor-pointer group relative" onclick="document.getElementById('checkout-picker').showPicker()">
                                        <p class="text-xs font-semibold text-gray-900 mb-1">Check Out</p>
                                        <p id="display-checkout" class="text-sm text-navy">14/03/2026</p>
                                        <input type="date" id="checkout-picker" class="absolute inset-0 opacity-0 cursor-pointer pointer-events-none" onchange="updateDate('checkout', this.value)">
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
                                        <span>₹3,633.33 x 1 night x 1 room</span>
                                        <span>₹3,633.33</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-600 mb-4 pb-4 border-b border-gray-200">
                                        <span>Taxes & Fees</span>
                                        <span>₹654.00</span>
                                    </div>
                                    <div class="flex justify-between font-bold text-navy text-lg">
                                        <span>Total</span>
                                        <span>₹4,287.33</span>
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
                                        <input type="text" class="w-full bg-transparent border-b border-gray-200 focus:border-india-green outline-none py-2 text-[15px] text-gray-700">
                                    </div>
                                    <div class="relative">
                                        <p class="text-[11px] text-gray-400 mb-1">Email *</p>
                                        <input type="email" class="w-full bg-transparent border-b border-gray-200 focus:border-india-green outline-none py-2 text-[15px] text-gray-700">
                                    </div>
                                    <div class="relative">
                                        <p class="text-[11px] text-gray-400 mb-1">Phone *</p>
                                        <input type="tel" class="w-full bg-transparent border-b border-gray-200 focus:border-india-green outline-none py-2 text-[15px] text-gray-700">
                                    </div>
                                    <div class="relative">
                                        <p class="text-[11px] text-gray-400 mb-1">Note *</p>
                                        <textarea rows="1" class="w-full bg-transparent border-b border-gray-200 focus:border-india-green outline-none py-2 text-[15px] text-gray-700 resize-none"></textarea>
                                    </div>
                                </div>
                                <div class="flex justify-center pt-4">
                                    <button class="w-full py-3 bg-navy text-white font-semibold rounded-xl shadow-lg hover:bg-navy/90 transition-all uppercase tracking-widest active:scale-95">
                                        SEND
                                    </button>
                                </div>
                            </div>
                            
                            {{-- Bottom Aesthetic Bar --}}
                            <div class="h-1 bg-navy"></div>
                        </div>

                        {{-- Why Choose Us --}}
                        <div class="bg-gray-50 rounded-[40px] p-8 border border-gray-100 border-dashed">
                            <h4 class="text-lg font-bold text-navy mb-6">Booking Information</h4>
                            <ul class="space-y-4">
                                <li class="flex items-center gap-3 text-sm text-gray-500">
                                    <i class="fa-solid fa-headset text-india-green"></i>
                                    <span>24/7 Dedicated Support</span>
                                </li>
                                <li class="flex items-center gap-3 text-sm text-gray-500">
                                    <i class="fa-solid fa-shield-halved text-india-green"></i>
                                    <span>Secure Payment Gateway</span>
                                </li>
                                <li class="flex items-center gap-3 text-sm text-gray-500">
                                    <i class="fa-solid fa-calendar-check text-india-green"></i>
                                    <span>Instant Confirmation</span>
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
                <h2 class="text-2xl font-semibold text-navy">Hotel Location</h2>
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
                        src="https://maps.google.com/maps?q={{ urlencode($hotel->name . ' ' . $hotel->location) }}&t=m&z=14&output=embed&iwloc=near" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                @endif
            </div>
        </div>
    </section>

    {{-- FAQs Section --}}
    <section class="py-16 bg-white border-t border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-navy mb-8">FAQs</h2>
            <div class="space-y-4">
                @foreach([['What are the check-in and check-out times at the hotel?', 'Check-in is from 12:00 PM, and check-out is until 11:00 AM. Early check-in or late check-out is subject to availability and may incur additional charges.'], ['Does the hotel provide parking facilities?', 'Yes, the hotel provides free secure parking on site for guests. Reservation is not needed.']] as $idx => $faq)
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
                        <div class="text-6xl font-semibold text-india-green mb-2">0<span class="text-2xl text-gray-300 font-normal">/5</span></div>
                        <div class="text-xl font-semibold text-navy mb-1">Not Rated</div>
                        <p class="text-xs text-gray-400">Based on 0 review</p>
                    </div>
                    <div class="flex-1 w-full space-y-3">
                        @foreach([['Excellent', 0, '0%'], ['Very Good', 0, '0%'], ['Average', 0, '0%'], ['Poor', 0, '0%'], ['Terrible', 0, '0%']] as $bar)
                            <div class="flex items-center gap-4 text-xs font-medium">
                                <span class="w-20 text-gray-500">{{ $bar[0] }}</span>
                                <div class="flex-1 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-gray-200 rounded-full" style="width: {{ $bar[2] }}"></div>
                                </div>
                                <span class="w-4 text-gray-400 text-right">{{ $bar[1] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Write a Review Form --}}
            <div>
                <p class="text-xs text-gray-400 mb-2">Showing 1 - 0 of 0 in total</p>
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

    {{-- You Might Also Like --}}
    <section class="py-24 bg-gray-50 border-t border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-semibold text-navy mb-12 text-center">Similar Hotels</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $similar_hotels = [
                        ['name' => 'Hotel Grand Habib', 'location' => 'Srinagar, Jammu and Kashmir, India', 'price' => '3,750.00', 'rating' => 0, 'reviews' => 0, 'score' => 'Not Rated', 'img' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&q=80&w=800', 'stars' => 3, 'featured' => true],
                        ['name' => 'Hotel Regent, Pahalgam', 'location' => 'Pahalgam, Jammu and Kashmir, India', 'price' => '4,800.00', 'rating' => 0, 'reviews' => 0, 'score' => 'Not Rated', 'img' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&q=80&w=800', 'stars' => 0, 'featured' => false],
                        ['name' => 'Hotel Zojila Residency', 'location' => 'Kargil, Ladakh, India', 'price' => '5,500.00', 'rating' => 0, 'reviews' => 0, 'score' => 'Not Rated', 'img' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&q=80&w=800', 'stars' => 2, 'featured' => false]
                    ];
                @endphp
                
                @foreach($similar_hotels as $hotel)
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
                        link="{{ url('/hotel/' . Str::slug($hotel['name'])) }}"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <script>
        let currentSlide = 0;
        const totalSlides = 3;
        let slideInterval = setInterval(nextSlide, 5000);

        function showSlide(index) {
            const slider = document.getElementById('hero-slider');
            const slides = slider.querySelectorAll('[data-slide]');
            const dots = slider.querySelectorAll('[id^="dot-"]');

            slides.forEach((slide, i) => {
                slide.style.opacity = (i === index) ? '1' : '0';
            });

            dots.forEach((dot, i) => {
                dot.classList.toggle('bg-white', i === index);
                dot.classList.toggle('bg-white/40', i !== index);
            });

            currentSlide = index;
        }

        function nextSlide() {
            let next = (currentSlide + 1) % totalSlides;
            showSlide(next);
            resetTimer();
        }

        function prevSlide() {
            let prev = (currentSlide - 1 + totalSlides) % totalSlides;
            showSlide(prev);
            resetTimer();
        }

        function goToSlide(index) {
            showSlide(index);
            resetTimer();
        }

        function resetTimer() {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, 5000);
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
            let val = parseInt(el.innerText);
            // Minimum 1 room/adult, 0 children
            let min = (type === 'child') ? 0 : 1;
            val = Math.max(min, val + delta);
            el.innerText = val;
        }

        function updateDate(type, dateStr) {
            if (!dateStr) return;
            const [year, month, day] = dateStr.split('-');
            const formattedDate = `${day}/${month}/${year}`;
            document.getElementById(`display-${type}`).innerText = formattedDate;
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
    </script>
@endsection
