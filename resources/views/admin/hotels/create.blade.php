@extends('admin.layout')

@section('title', 'Add New Hotel')
@section('page_title', 'Add New Hotel')

@section('content')
<div class="w-full max-w-[1650px] mx-auto pb-10">

    <!-- Top Action Bar & Breadcrumbs (Sticky below top navbar on Scroll) -->
    <div class="sticky top-[60px] z-10 mb-5 py-3 px-4 bg-white/95 backdrop-blur-md rounded-2xl border border-slate-200/90 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-3 transition-all">
        <div>
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 text-[11px] font-semibold text-slate-400 mb-1">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-primary transition">Dashboard</a>
                <span>/</span>
                <a href="{{ route('admin.hotels.index') }}" class="hover:text-primary transition">Hotels</a>
                <span>/</span>
                <span class="text-slate-700">Add New Hotel</span>
            </div>
            <!-- Title & Badges -->
            <div class="flex items-center flex-wrap gap-2.5">
                <h1 class="text-base sm:text-lg font-bold text-slate-800">Create New Hotel Property</h1>
                <span class="px-2.5 py-0.5 bg-blue-50 text-primary border border-blue-200 rounded-full text-[10px] font-bold">
                    New Listing
                </span>
            </div>
        </div>

        <!-- Header Actions -->
        <div class="flex items-center gap-2.5 flex-shrink-0">
            <a href="{{ route('admin.hotels.index') }}" class="px-3.5 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-200 rounded-xl text-xs font-semibold shadow-sm transition flex items-center gap-1.5">
                <i class="fa-solid fa-arrow-left text-[10px]"></i> Back
            </a>
            <button type="submit" form="hotel-create-form" class="px-5 py-2 bg-primary hover:bg-blue-700 text-white rounded-xl text-xs font-bold shadow-md shadow-primary/20 transition flex items-center gap-2">
                <i class="fa-solid fa-plus text-xs"></i> Create Hotel
            </button>
        </div>
    </div>

    <!-- Main Grid Form -->
    <form id="hotel-create-form" action="{{ route('admin.hotels.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        @csrf

        <!-- Left / Main Column (Sections 1 to 7) -->
        <div class="lg:col-span-8 xl:col-span-8 2xl:col-span-9 space-y-6">

            <!-- Card 1: General Information -->
            <div id="sec-general" class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-5 sm:p-6 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-xl bg-blue-50 text-primary flex items-center justify-center text-sm font-bold shadow-xs">
                            <i class="fa-solid fa-hotel"></i>
                        </span>
                        <div>
                            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider">1. General Information</h3>
                            <p class="text-[11px] text-slate-400">Basic identification, star category, pricing, and property overview.</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-primary bg-blue-50/80 px-2.5 py-1 rounded-full border border-blue-100">Step 1</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 pt-1">
                    <!-- Hotel Name -->
                    <div class="md:col-span-2">
                        <label for="name" class="block text-xs font-semibold text-slate-700 mb-1">Hotel Name <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required oninput="syncLiveSummary()"
                               placeholder="e.g. The Himalayan River View Resort"
                               class="w-full px-3.5 py-2.5 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition bg-slate-50/30">
                        @error('name') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Star Rating -->
                    <div>
                        <label for="stars" class="block text-xs font-semibold text-slate-700 mb-1">Star Rating <span class="text-rose-500">*</span></label>
                        <select name="stars" id="stars" required onchange="syncLiveSummary()"
                                class="w-full px-3.5 py-2.5 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition bg-white cursor-pointer font-medium text-slate-700">
                            <option value="3" {{ old('stars', '3') == 3 ? 'selected' : '' }}>★★★ 3 Stars</option>
                            <option value="1" {{ old('stars') == 1 ? 'selected' : '' }}>★ 1 Star</option>
                            <option value="2" {{ old('stars') == 2 ? 'selected' : '' }}>★★ 2 Stars</option>
                            <option value="4" {{ old('stars') == 4 ? 'selected' : '' }}>★★★★ 4 Stars</option>
                            <option value="5" {{ old('stars') == 5 ? 'selected' : '' }}>★★★★★ 5 Stars (Luxury)</option>
                        </select>
                        @error('stars') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Price per Night -->
                    <div>
                        <label for="price" class="block text-xs font-semibold text-slate-700 mb-1">Base Price / Night (INR) <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-xs text-slate-400 font-bold">₹</span>
                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', '3999') }}" required oninput="syncLiveSummary()"
                                   placeholder="e.g. 3999"
                                   class="w-full pl-8 pr-3.5 py-2.5 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition bg-slate-50/30">
                        </div>
                        @error('price') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-xs font-semibold text-slate-700 mb-1">Description</label>
                        <textarea name="description" id="description" rows="3" placeholder="Describe the hotel ambiance, views, signature experiences, and hospitality..."
                                  class="w-full px-3.5 py-2.5 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition bg-slate-50/30">{{ old('description') }}</textarea>
                        @error('description') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Card 2: Location & Map Details -->
            <div id="sec-location" class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-5 sm:p-6 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-sm font-bold shadow-xs">
                            <i class="fa-solid fa-location-dot"></i>
                        </span>
                        <div>
                            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider">2. Location & Address</h3>
                            <p class="text-[11px] text-slate-400">Complete geographic address, region, and interactive map embed link.</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-rose-600 bg-rose-50/80 px-2.5 py-1 rounded-full border border-rose-100">Step 2</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 pt-1">
                    <!-- Location Area -->
                    <div class="sm:col-span-1">
                        <label for="location" class="block text-xs font-semibold text-slate-700 mb-1">Location Area / Landmark <span class="text-rose-500">*</span></label>
                        <input type="text" name="location" id="location" value="{{ old('location') }}" required placeholder="e.g. Near Mall Road" 
                               class="w-full px-3.5 py-2.5 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition bg-slate-50/30">
                        @error('location') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Full Address -->
                    <div class="sm:col-span-2">
                        <label for="address" class="block text-xs font-semibold text-slate-700 mb-1">Full Street Address <span class="text-rose-500">*</span></label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}" required placeholder="e.g. 123 River View Road, Old Manali" 
                               class="w-full px-3.5 py-2.5 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition bg-slate-50/30">
                        @error('address') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- City -->
                    <div>
                        <label for="city" class="block text-xs font-semibold text-slate-700 mb-1">City <span class="text-rose-500">*</span></label>
                        <input type="text" name="city" id="city" value="{{ old('city', 'Manali') }}" required placeholder="e.g. Manali" 
                               class="w-full px-3.5 py-2.5 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition bg-slate-50/30">
                        @error('city') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- State -->
                    <div>
                        <label for="state" class="block text-xs font-semibold text-slate-700 mb-1">State / Province <span class="text-rose-500">*</span></label>
                        <input type="text" name="state" id="state" value="{{ old('state', 'Himachal Pradesh') }}" required placeholder="e.g. Himachal Pradesh" 
                               class="w-full px-3.5 py-2.5 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition bg-slate-50/30">
                        @error('state') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Country -->
                    <div>
                        <label for="country" class="block text-xs font-semibold text-slate-700 mb-1">Country <span class="text-rose-500">*</span></label>
                        <input type="text" name="country" id="country" value="{{ old('country', 'India') }}" required placeholder="e.g. India" 
                               class="w-full px-3.5 py-2.5 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition bg-slate-50/30">
                        @error('country') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Map URL -->
                    <div class="md:col-span-3">
                        <label for="map_url" class="block text-xs font-semibold text-slate-700 mb-1">Google Maps Embed URL</label>
                        <input type="text" name="map_url" id="map_url" value="{{ old('map_url') }}" placeholder="https://maps.google.com/..." 
                               class="w-full px-3.5 py-2.5 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition bg-slate-50/30">
                        <p class="text-[10px] text-slate-400 mt-1">Paste Google Maps Embed iframe URL for live interactive map rendering on Hotel Details.</p>
                        @error('map_url') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Card 3: Check-in & Check-out Timings -->
            <div id="sec-timings" class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-5 sm:p-6 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-sm font-bold shadow-xs">
                            <i class="fa-solid fa-clock"></i>
                        </span>
                        <div>
                            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider">3. Timings & Check-in Details</h3>
                            <p class="text-[11px] text-slate-400">Standard arrival and departure hours for guests.</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-amber-600 bg-amber-50/80 px-2.5 py-1 rounded-full border border-amber-100">Step 3</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-1">
                    <div>
                        <label for="check_in_time" class="block text-xs font-semibold text-slate-700 mb-1">Check-in Time <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <i class="fa-regular fa-clock absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                            <input type="text" name="check_in_time" id="check_in_time" value="{{ old('check_in_time', '12:00 PM') }}" required placeholder="e.g. 12:00 PM / 01:00 PM" 
                                   class="w-full pl-9 pr-3.5 py-2.5 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition bg-slate-50/30">
                        </div>
                        @error('check_in_time') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="check_out_time" class="block text-xs font-semibold text-slate-700 mb-1">Check-out Time <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <i class="fa-solid fa-clock-rotate-left absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                            <input type="text" name="check_out_time" id="check_out_time" value="{{ old('check_out_time', '11:00 AM') }}" required placeholder="e.g. 11:00 AM" 
                                   class="w-full pl-9 pr-3.5 py-2.5 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition bg-slate-50/30">
                        </div>
                        @error('check_out_time') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Card 4: Hotel Rules & Policies -->
            <div id="sec-rules" class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-5 sm:p-6 space-y-5">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm font-bold shadow-xs">
                            <i class="fa-solid fa-shield-halved"></i>
                        </span>
                        <div>
                            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider">4. Hotel Rules & Policies</h3>
                            <p class="text-[11px] text-slate-400">Fixed default rules, payment methods, and custom property-specific terms.</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50/80 px-2.5 py-1 rounded-full border border-emerald-100">Step 4</span>
                </div>

                @php
                    $defaultRules = \App\Models\Hotel::defaultHotelRules(old('check_in_time', '12:00 PM'), old('check_out_time', '11:00 AM'));
                    $customRules = old('hotel_rules') ? array_slice(old('hotel_rules'), 5) : [];
                    
                    $checkInDesc = old('hotel_rules.0.description', $defaultRules[0]['description']);
                    $checkOutDesc = old('hotel_rules.1.description', $defaultRules[1]['description']);
                    $cancellationDesc = old('hotel_rules.2.description', $defaultRules[2]['description']);
                    $petsDesc = old('hotel_rules.3.description', $defaultRules[3]['description']);
                    $paymentDesc = old('hotel_rules.4.description', $defaultRules[4]['description']);
                @endphp

                <!-- 1. Fixed Default Rules Box -->
                <div class="p-4 bg-slate-50/80 border border-slate-200/80 rounded-2xl space-y-3.5">
                    <div class="flex items-center justify-between pb-2 border-b border-slate-200/60">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-shield-halved text-emerald-600 text-sm"></i>
                            <span class="text-xs font-bold text-slate-800">Fixed Default Rules</span>
                            <span class="px-2 py-0.5 bg-emerald-50 text-emerald-700 border border-emerald-200/60 rounded-full text-[9px] font-bold">5 Core Policies</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3.5 pt-1">
                        <!-- 1. Check-in -->
                        <div class="p-3 bg-white border border-slate-200/80 rounded-xl space-y-1.5 shadow-xs">
                            <div class="flex items-center justify-between">
                                <span class="text-[11px] font-bold text-slate-800 flex items-center gap-1.5">
                                    <i class="fa-solid fa-clock text-blue-500 text-[10px]"></i> 1. Check-in
                                </span>
                                <span class="text-[9px] font-semibold text-slate-400 uppercase tracking-wider">Default</span>
                            </div>
                            <input type="hidden" name="hotel_rules[0][title]" value="Check-in">
                            <textarea id="core-rule-checkin" name="hotel_rules[0][description]" rows="2" placeholder="e.g. From 01:00 PM. Guests are required to show photo ID..." required
                                      class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-slate-50/30">{{ $checkInDesc }}</textarea>
                        </div>

                        <!-- 2. Check-out -->
                        <div class="p-3 bg-white border border-slate-200/80 rounded-xl space-y-1.5 shadow-xs">
                            <div class="flex items-center justify-between">
                                <span class="text-[11px] font-bold text-slate-800 flex items-center gap-1.5">
                                    <i class="fa-regular fa-clock text-indigo-500 text-[10px]"></i> 2. Check-out
                                </span>
                                <span class="text-[9px] font-semibold text-slate-400 uppercase tracking-wider">Default</span>
                            </div>
                            <input type="hidden" name="hotel_rules[1][title]" value="Check-out">
                            <textarea id="core-rule-checkout" name="hotel_rules[1][description]" rows="2" placeholder="e.g. Until 11:00 AM." required
                                      class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-slate-50/30">{{ $checkOutDesc }}</textarea>
                        </div>

                        <!-- 3. Cancellation -->
                        <div class="p-3 bg-white border border-slate-200/80 rounded-xl space-y-1.5 shadow-xs">
                            <div class="flex items-center justify-between">
                                <span class="text-[11px] font-bold text-slate-800 flex items-center gap-1.5">
                                    <i class="fa-solid fa-file-contract text-amber-500 text-[10px]"></i> 3. Cancellation
                                </span>
                                <span class="text-[9px] font-semibold text-slate-400 uppercase tracking-wider">Default</span>
                            </div>
                            <input type="hidden" name="hotel_rules[2][title]" value="Cancellation">
                            <textarea id="core-rule-cancellation" name="hotel_rules[2][description]" rows="2" placeholder="e.g. Cancellation and prepayment policies..." required
                                      class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-slate-50/30">{{ $cancellationDesc }}</textarea>
                        </div>

                        <!-- 4. Pets -->
                        <div class="p-3 bg-white border border-slate-200/80 rounded-xl space-y-1.5 shadow-xs">
                            <div class="flex items-center justify-between">
                                <span class="text-[11px] font-bold text-slate-800 flex items-center gap-1.5">
                                    <i class="fa-solid fa-paw text-orange-500 text-[10px]"></i> 4. Pets
                                </span>
                                <span class="text-[9px] font-semibold text-slate-400 uppercase tracking-wider">Default</span>
                            </div>
                            <input type="hidden" name="hotel_rules[3][title]" value="Pets">
                            <textarea id="core-rule-pets" name="hotel_rules[3][description]" rows="2" placeholder="e.g. Pets are not allowed..." required
                                      class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-slate-50/30">{{ $petsDesc }}</textarea>
                        </div>

                        <!-- 5. Accepted Payment (Full width on md) -->
                        <div class="p-3.5 bg-white border border-slate-200/80 rounded-xl space-y-2.5 shadow-xs md:col-span-2">
                            <div class="flex items-center justify-between gap-2 border-b border-slate-100 pb-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-[11px] font-bold text-slate-800 flex items-center gap-1.5">
                                        <i class="fa-solid fa-credit-card text-emerald-500 text-[10px]"></i> 5. Accepted Payment
                                    </span>
                                    <span class="px-2 py-0.5 bg-emerald-50 text-emerald-700 border border-emerald-200/60 rounded-full text-[9px] font-bold">Choose Payment Modes</span>
                                </div>
                            </div>

                            <input type="hidden" name="hotel_rules[4][title]" value="Accepted Payment">
                            <input type="hidden" id="core-rule-payment" name="hotel_rules[4][description]" value="{{ $paymentDesc }}">

                            <!-- Interactive Payment Option Chips with Icons -->
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-2 pt-0.5">
                                <!-- 1. Cards -->
                                <label class="payment-chip-label relative flex flex-col items-center justify-center p-2.5 rounded-xl border-2 cursor-pointer transition select-none group" id="chip-card-container">
                                    <input type="checkbox" id="pay-opt-cards" class="sr-only payment-toggle-input" onchange="updatePaymentDescription()">
                                    <div class="w-7 h-7 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mb-1 group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-credit-card text-xs"></i>
                                    </div>
                                    <span class="text-[11px] font-bold text-slate-800 text-center">Cards</span>
                                    <span class="text-[8px] text-slate-400 text-center">Visa, Master, RuPay</span>
                                    <div class="check-badge absolute top-1.5 right-1.5 w-3.5 h-3.5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[7px] opacity-0 transition-opacity">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                </label>

                                <!-- 2. UPI -->
                                <label class="payment-chip-label relative flex flex-col items-center justify-center p-2.5 rounded-xl border-2 cursor-pointer transition select-none group" id="chip-upi-container">
                                    <input type="checkbox" id="pay-opt-upi" class="sr-only payment-toggle-input" onchange="updatePaymentDescription()">
                                    <div class="w-7 h-7 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center mb-1 group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-qrcode text-xs"></i>
                                    </div>
                                    <span class="text-[11px] font-bold text-slate-800 text-center">UPI / QR</span>
                                    <span class="text-[8px] text-slate-400 text-center">GPay, PhonePe, Paytm</span>
                                    <div class="check-badge absolute top-1.5 right-1.5 w-3.5 h-3.5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[7px] opacity-0 transition-opacity">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                </label>

                                <!-- 3. Net Banking -->
                                <label class="payment-chip-label relative flex flex-col items-center justify-center p-2.5 rounded-xl border-2 cursor-pointer transition select-none group" id="chip-netbanking-container">
                                    <input type="checkbox" id="pay-opt-netbanking" class="sr-only payment-toggle-input" onchange="updatePaymentDescription()">
                                    <div class="w-7 h-7 rounded-full bg-sky-50 text-sky-600 flex items-center justify-center mb-1 group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-building-columns text-xs"></i>
                                    </div>
                                    <span class="text-[11px] font-bold text-slate-800 text-center">Net Banking</span>
                                    <span class="text-[8px] text-slate-400 text-center">All Indian Banks</span>
                                    <div class="check-badge absolute top-1.5 right-1.5 w-3.5 h-3.5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[7px] opacity-0 transition-opacity">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                </label>

                                <!-- 4. Cash -->
                                <label class="payment-chip-label relative flex flex-col items-center justify-center p-2.5 rounded-xl border-2 cursor-pointer transition select-none group" id="chip-cash-container">
                                    <input type="checkbox" id="pay-opt-cash" class="sr-only payment-toggle-input" onchange="updatePaymentDescription()">
                                    <div class="w-7 h-7 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mb-1 group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-money-bill-wave text-xs"></i>
                                    </div>
                                    <span class="text-[11px] font-bold text-slate-800 text-center">Cash Payment</span>
                                    <span class="text-[8px] text-slate-400 text-center">Pay at Property</span>
                                    <div class="check-badge absolute top-1.5 right-1.5 w-3.5 h-3.5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[7px] opacity-0 transition-opacity">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                </label>

                                <!-- 5. Digital Wallets -->
                                <label class="payment-chip-label relative flex flex-col items-center justify-center p-2.5 rounded-xl border-2 cursor-pointer transition select-none group" id="chip-wallets-container">
                                    <input type="checkbox" id="pay-opt-wallets" class="sr-only payment-toggle-input" onchange="updatePaymentDescription()">
                                    <div class="w-7 h-7 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center mb-1 group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-wallet text-xs"></i>
                                    </div>
                                    <span class="text-[11px] font-bold text-slate-800 text-center">Wallets</span>
                                    <span class="text-[8px] text-slate-400 text-center">Mobikwik, Amazon</span>
                                    <div class="check-badge absolute top-1.5 right-1.5 w-3.5 h-3.5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[7px] opacity-0 transition-opacity">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Additional Custom Rules Section -->
                <div class="space-y-3 pt-1">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-2">
                        <div>
                            <span class="text-xs font-bold text-slate-800 flex items-center gap-1.5">
                                <i class="fa-solid fa-circle-plus text-primary text-xs"></i> Additional Custom Rules <span class="text-slate-400 font-normal text-[10px]">(Optional for this Hotel)</span>
                            </span>
                            <p class="text-[10px] text-slate-400">Add custom rules specific to this hotel (e.g. Smoking Policy, Child Policy, Quiet Hours, ID Requirement, etc.).</p>
                        </div>
                        <button type="button" onclick="addCustomRule()" class="px-3 py-1 bg-blue-50 hover:bg-blue-100 text-primary border border-blue-200 rounded-lg text-[10px] font-bold transition flex items-center gap-1.5 shadow-sm">
                            <i class="fa-solid fa-plus text-[9px]"></i> Add Custom Rule
                        </button>
                    </div>

                    <div id="custom-rules-container" class="space-y-3">
                        @forelse($customRules as $cIdx => $customRule)
                        @php
                            $cTitle = is_array($customRule) ? ($customRule['title'] ?? '') : '';
                            $cDesc = is_array($customRule) ? ($customRule['description'] ?? '') : (string)$customRule;
                            $cNumber = $cIdx + 5;
                        @endphp
                        <div class="p-3 bg-white border border-slate-200 rounded-xl space-y-2 relative group shadow-sm" id="custom-rule-row-{{ $cNumber }}">
                            <div class="flex items-center justify-between border-b border-slate-100 pb-1.5">
                                <span class="text-[11px] font-bold text-slate-700 flex items-center gap-1.5">
                                    <i class="fa-solid fa-list-check text-primary text-[10px]"></i>
                                    <span class="custom-rule-label">Custom Rule #{{ $cIdx + 1 }}</span>
                                </span>
                                <button type="button" onclick="removeCustomRule('custom-rule-row-{{ $cNumber }}')" class="px-2 py-0.5 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-md text-[10px] font-bold transition flex items-center gap-1 shadow-sm" title="Remove Custom Rule">
                                    <i class="fa-solid fa-trash-can text-[9px]"></i> Remove
                                </button>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-1">
                                <div class="sm:col-span-1">
                                    <label class="block text-[10px] font-semibold text-slate-500 mb-1">Rule Title <span class="text-rose-500">*</span></label>
                                    <input type="text" name="hotel_rules[{{ $cNumber }}][title]" value="{{ $cTitle }}" placeholder="e.g. Smoking Policy, Age Limit" required
                                           class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="block text-[10px] font-semibold text-slate-500 mb-1">Rule Description <span class="text-rose-500">*</span></label>
                                    <textarea name="hotel_rules[{{ $cNumber }}][description]" rows="2" placeholder="e.g. Detailed terms and instructions..." required
                                              class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">{{ $cDesc }}</textarea>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div id="no-custom-rules-msg" class="p-4 bg-slate-50/50 border border-dashed border-slate-200 rounded-xl text-center text-xs text-slate-400">
                            <i class="fa-solid fa-circle-info mr-1 text-slate-400"></i> No extra custom rules added. Fixed default rules above will apply. Click "+ Add Custom Rule" to add hotel-specific policies.
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Card 5: Amenities -->
            <div id="sec-amenities" class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-5 sm:p-6 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-sm font-bold shadow-xs">
                            <i class="fa-solid fa-bell-concierge"></i>
                        </span>
                        <div>
                            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider">5. Amenities & Facilities</h3>
                            <p class="text-[11px] text-slate-400">Add or manage key guest amenities and hotel facilities.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-bold text-indigo-600 bg-indigo-50/80 px-2.5 py-1 rounded-full border border-indigo-100">Step 5</span>
                        <button type="button" onclick="addAmenity()" class="px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-primary border border-blue-200 rounded-lg text-xs font-bold transition flex items-center gap-1.5 shadow-sm">
                            <i class="fa-solid fa-plus text-[10px]"></i> Add Amenity
                        </button>
                    </div>
                </div>

                <div id="amenities-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 pt-1">
                    @php
                        $commonAmenities = old('amenities', [
                            'Free High-Speed Wi-Fi',
                            'Swimming Pool',
                            'Spa & Wellness Centre',
                            'Free Parking on Site',
                            'Multi-Cuisine Restaurant',
                            '24/7 Room Service',
                            'Air Conditioning',
                            'Airport Shuttle Service'
                        ]);
                    @endphp
                    @foreach($commonAmenities as $index => $amenity)
                    <div class="flex items-center gap-2 bg-slate-50/70 p-2 rounded-xl border border-slate-200" id="amenity-row-{{ $index }}">
                        <i class="fa-solid fa-circle-check text-emerald-500 text-xs ml-1 flex-shrink-0"></i>
                        <input type="text" name="amenities[]" value="{{ $amenity }}" placeholder="Enter Amenity" oninput="syncLiveSummary()"
                               class="flex-1 px-2.5 py-1.5 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                        <button type="button" onclick="removeElement('amenity-row-{{ $index }}'); syncLiveSummary();" class="w-7 h-7 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-xs" title="Remove">
                            <i class="fa-solid fa-trash-can text-[10px]"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Card 6: Room Types & Rates -->
            <div id="sec-rooms" class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-5 sm:p-6 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-sm font-bold shadow-xs">
                            <i class="fa-solid fa-door-open"></i>
                        </span>
                        <div>
                            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider">6. Room Categories & Rates</h3>
                            <p class="text-[11px] text-slate-400">Configure different room categories, custom prices per night, guest capacity, and room photos.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-bold text-purple-600 bg-purple-50/80 px-2.5 py-1 rounded-full border border-purple-100">Step 6</span>
                        <button type="button" onclick="addRoomType()" class="px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-primary border border-blue-200 rounded-lg text-xs font-bold transition flex items-center gap-1.5 shadow-sm">
                            <i class="fa-solid fa-plus text-[10px]"></i> Add Room Category
                        </button>
                    </div>
                </div>
                
                <div id="room-types-container" class="space-y-4 pt-1">
                    @php
                        $roomTypes = old('room_types', [
                            ['name' => 'Deluxe Room', 'price' => '3999', 'capacity' => '2 Adults', 'description' => 'Comfortable room with garden/mountain views and modern amenities.'],
                            ['name' => 'Executive Suite', 'price' => '6499', 'capacity' => '2 Adults, 1 Child', 'description' => 'Spacious luxury suite with king bed, balcony, and panoramic views.']
                        ]);
                    @endphp
                    @foreach($roomTypes as $index => $room)
                    @php
                        $rName = is_array($room) ? ($room['name'] ?? '') : (string)$room;
                        $rPrice = is_array($room) && isset($room['price']) ? $room['price'] : '3999';
                        $rCapacity = is_array($room) && isset($room['capacity']) ? $room['capacity'] : '2 Adults';
                        $rDesc = is_array($room) && isset($room['description']) ? $room['description'] : '';
                    @endphp
                    <div class="p-4 bg-slate-50/70 border border-slate-200/90 rounded-2xl space-y-3 relative group" id="room-card-{{ $index }}">
                        <div class="flex items-center justify-between border-b border-slate-200/60 pb-2">
                            <span class="text-xs font-bold text-slate-800 flex items-center gap-2">
                                <i class="fa-solid fa-door-open text-primary"></i>
                                <span class="room-title-label">Room Category #{{ $index + 1 }}</span>
                            </span>
                            <button type="button" onclick="removeRoomType('room-card-{{ $index }}'); syncLiveSummary();" class="px-2.5 py-1 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg text-[10px] font-bold transition flex items-center gap-1 shadow-xs" title="Remove Room">
                                <i class="fa-solid fa-trash-can text-[9px]"></i> Remove
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3.5">
                            <!-- Room Name -->
                            <div class="sm:col-span-2">
                                <label class="block text-[11px] font-semibold text-slate-600 mb-1">Room Name <span class="text-rose-500">*</span></label>
                                <input type="text" name="room_types[{{ $index }}][name]" value="{{ $rName }}" placeholder="e.g. Deluxe Room" required
                                       class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                            </div>
                            
                            <!-- Room Price -->
                            <div>
                                <label class="block text-[11px] font-semibold text-slate-600 mb-1">Price / Night (₹) <span class="text-rose-500">*</span></label>
                                <input type="number" step="0.01" name="room_types[{{ $index }}][price]" value="{{ $rPrice }}" placeholder="e.g. 3999" required
                                       class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                            </div>

                            <!-- Capacity -->
                            <div>
                                <label class="block text-[11px] font-semibold text-slate-600 mb-1">Guests / Capacity</label>
                                <input type="text" name="room_types[{{ $index }}][capacity]" value="{{ $rCapacity }}" placeholder="e.g. 2 Adults"
                                       class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                            </div>

                            <!-- Room Description -->
                            <div class="sm:col-span-2">
                                <label class="block text-[11px] font-semibold text-slate-600 mb-1">Bed & Feature Details (Optional)</label>
                                <input type="text" name="room_types[{{ $index }}][description]" value="{{ $rDesc }}" placeholder="e.g. 1 King Bed, Mountain View"
                                       class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                            </div>

                            <!-- Room Image Upload -->
                            <div class="sm:col-span-2">
                                <label class="block text-[11px] font-semibold text-slate-600 mb-1">Room Photo</label>
                                <div class="flex items-center gap-3">
                                    <div class="w-16 h-12 rounded-lg bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center flex-shrink-0 shadow-xs" id="room-preview-box-{{ $index }}">
                                        <i class="fa-regular fa-image text-slate-300 text-lg"></i>
                                    </div>
                                    <input type="file" name="room_type_images[{{ $index }}]" accept="image/*" onchange="previewRoomImage(this, {{ $index }})" 
                                           class="text-[11px] text-slate-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[10px] file:font-semibold file:bg-blue-50 file:text-primary hover:file:bg-blue-100 transition cursor-pointer">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Card 7: Photo Gallery -->
            <div id="sec-gallery" class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-5 sm:p-6 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-sm font-bold shadow-xs">
                            <i class="fa-solid fa-images"></i>
                        </span>
                        <div>
                            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider">7. Photo Gallery & Cover Image</h3>
                            <p class="text-[11px] text-slate-400">Upload hotel photos and select the primary cover image.</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-sky-600 bg-sky-50/80 px-2.5 py-1 rounded-full border border-sky-100">Step 7</span>
                </div>
                
                <!-- Hidden input to track primary image selection -->
                <input type="hidden" name="primary_image" id="primary-image-input" value="">

                <!-- Dropzone Area -->
                <div class="space-y-1">
                    <div class="relative bg-slate-50 border-2 border-dashed border-slate-300 hover:border-primary/50 rounded-2xl p-6 sm:p-8 transition flex flex-col items-center justify-center text-center cursor-pointer group" id="dropzone" onclick="document.getElementById('local-file-selector').click()">
                        <input type="file" name="image_files[]" id="local-file-selector" multiple accept="image/*" onchange="handleLocalFileSelect(this)" class="hidden">
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-primary flex items-center justify-center text-xl mb-2 group-hover:scale-110 transition-transform shadow-xs">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                        </div>
                        <p class="text-xs font-bold text-slate-800">Drag & drop photos here, or <span class="text-primary hover:underline">Browse from Computer</span></p>
                        <p class="text-[10px] text-slate-400 mt-1">Supports JPG, PNG, WEBP, GIF. You can select multiple photos at once.</p>
                    </div>
                </div>

                <!-- Hidden inputs container for local uploads -->
                <div id="hidden-file-inputs-container" class="hidden"></div>

                <!-- Gallery Preview Grid -->
                <div class="space-y-2 mt-4 pt-1">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold text-slate-700">Photo Previews & Primary Cover</label>
                        <span class="text-[10px] text-slate-400 flex items-center gap-1 font-medium"><i class="fa-solid fa-star text-amber-400"></i> Click gold star to set Primary Cover</span>
                    </div>
                    
                    <div id="gallery-preview-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-3.5 p-4 bg-slate-50/70 rounded-2xl border border-slate-200 min-h-[130px] items-center">
                        <p id="empty-gallery-msg" class="col-span-full text-slate-400 text-xs py-6 text-center">
                            <i class="fa-regular fa-images text-2xl text-slate-300 block mb-1"></i>
                            No photos uploaded yet. Drag & drop or browse photos above.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column: Sticky Sidebar & Overview -->
        <div class="lg:col-span-4 xl:col-span-4 2xl:col-span-3 space-y-5 lg:sticky lg:top-[136px]">

            <!-- Card A: Publish & Status Actions -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-5 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <span class="text-xs font-bold text-slate-800 uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-sliders text-primary"></i> Status & Visibility
                    </span>
                    <span class="text-[10px] font-bold text-slate-400 uppercase">Live Controls</span>
                </div>

                <!-- Switch Toggles: Active & Featured -->
                <div class="space-y-3">
                    <label class="flex items-center justify-between p-3.5 rounded-xl border border-slate-200/80 bg-slate-50/50 hover:bg-slate-50 cursor-pointer transition select-none group">
                        <div>
                            <span class="block text-xs font-bold text-slate-800 group-hover:text-primary transition">Active Listing</span>
                            <span class="block text-[10px] text-slate-400">Visible to public on website</span>
                        </div>
                        <div class="relative inline-flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                        </div>
                    </label>

                    <label class="flex items-center justify-between p-3.5 rounded-xl border border-slate-200/80 bg-slate-50/50 hover:bg-slate-50 cursor-pointer transition select-none group">
                        <div>
                            <span class="block text-xs font-bold text-slate-800 group-hover:text-amber-600 transition">Featured Hotel</span>
                            <span class="block text-[10px] text-slate-400">Showcase on Homepage & Deals</span>
                        </div>
                        <div class="relative inline-flex items-center">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-amber-500"></div>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Card B: Live Hotel Overview Card -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                <!-- Cover Image Preview -->
                <div class="h-32 bg-slate-100 relative overflow-hidden">
                    <img id="live-cover-image" src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-2.5 left-3 right-3 flex items-center justify-between text-white">
                        <span class="text-[10px] font-bold bg-black/40 backdrop-blur px-2 py-0.5 rounded-md">Live Preview</span>
                        <span id="live-summary-stars" class="text-amber-400 text-xs">★★★</span>
                    </div>
                </div>

                <!-- Card Details -->
                <div class="p-4 space-y-3">
                    <div>
                        <h4 id="live-summary-name" class="text-xs font-bold text-slate-800 line-clamp-1">New Hotel Property</h4>
                        <p class="text-[10px] text-slate-400 flex items-center gap-1 mt-0.5">
                            <i class="fa-solid fa-location-dot text-rose-500"></i> <span id="live-summary-location">Location details, City</span>
                        </p>
                    </div>

                    <div class="p-2.5 bg-slate-50 rounded-xl border border-slate-100 flex items-center justify-between">
                        <span class="text-[10px] font-semibold text-slate-400">Base Price:</span>
                        <span id="live-summary-price" class="text-xs font-bold text-emerald-600">₹3,999.00 / night</span>
                    </div>

                    <div class="grid grid-cols-3 gap-2 text-center text-[10px]">
                        <div class="p-2 bg-slate-50 rounded-lg border border-slate-100">
                            <span id="live-count-rooms" class="block font-bold text-slate-700">{{ count($roomTypes) }}</span>
                            <span class="text-[9px] text-slate-400">Rooms</span>
                        </div>
                        <div class="p-2 bg-slate-50 rounded-lg border border-slate-100">
                            <span id="live-count-amenities" class="block font-bold text-slate-700">{{ count($commonAmenities) }}</span>
                            <span class="text-[9px] text-slate-400">Amenities</span>
                        </div>
                        <div class="p-2 bg-slate-50 rounded-lg border border-slate-100">
                            <span id="live-count-photos" class="block font-bold text-slate-700">0</span>
                            <span class="text-[9px] text-slate-400">Photos</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    let customRuleCounter = {{ count($customRules) + 5 }};
    let amenityCounter = {{ count($commonAmenities) }};
    let roomCounter = {{ count($roomTypes) }};
    let localFileCounter = 0;

    function syncLiveSummary() {
        const nameVal = document.getElementById('name')?.value || 'New Hotel Property';
        const priceVal = parseFloat(document.getElementById('price')?.value || 0).toLocaleString('en-IN', { minimumFractionDigits: 2 });
        const starsVal = parseInt(document.getElementById('stars')?.value || 3);
        const locVal = document.getElementById('location')?.value || 'Location details';
        const cityVal = document.getElementById('city')?.value || 'City';

        const nameEl = document.getElementById('live-summary-name');
        const priceEl = document.getElementById('live-summary-price');
        const starsEl = document.getElementById('live-summary-stars');
        const locEl = document.getElementById('live-summary-location');

        if (nameEl) nameEl.innerText = nameVal;
        if (priceEl) priceEl.innerText = `₹${priceVal} / night`;
        if (starsEl) starsEl.innerText = '★'.repeat(starsVal);
        if (locEl) locEl.innerText = `${locVal}, ${cityVal}`;

        const roomsCount = document.querySelectorAll('#room-types-container > div').length;
        const amenitiesCount = document.querySelectorAll('#amenities-container > div').length;
        const photosCount = document.querySelectorAll('#gallery-preview-grid .group').length;

        const rCountEl = document.getElementById('live-count-rooms');
        const aCountEl = document.getElementById('live-count-amenities');
        const pCountEl = document.getElementById('live-count-photos');

        if (rCountEl) rCountEl.innerText = roomsCount;
        if (aCountEl) aCountEl.innerText = amenitiesCount;
        if (pCountEl) pCountEl.innerText = photosCount;
    }

    function addCustomRule(title = '', description = '') {
        const container = document.getElementById('custom-rules-container');
        const emptyMsg = document.getElementById('no-custom-rules-msg');
        if (emptyMsg) emptyMsg.style.display = 'none';

        const id = customRuleCounter;
        const rowId = `custom-rule-row-${id}`;
        const currentCount = container.querySelectorAll('.group').length + 1;

        const html = `
            <div class="p-3 bg-white border border-slate-200 rounded-xl space-y-2 relative group shadow-sm" id="${rowId}">
                <div class="flex items-center justify-between border-b border-slate-100 pb-1.5">
                    <span class="text-[11px] font-bold text-slate-700 flex items-center gap-1.5">
                        <i class="fa-solid fa-list-check text-primary text-[10px]"></i>
                        <span class="custom-rule-label">Custom Rule #${currentCount}</span>
                    </span>
                    <button type="button" onclick="removeCustomRule('${rowId}')" class="px-2 py-0.5 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-md text-[10px] font-bold transition flex items-center gap-1 shadow-sm" title="Remove Custom Rule">
                        <i class="fa-solid fa-trash-can text-[9px]"></i> Remove
                    </button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-1">
                    <div class="sm:col-span-1">
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Rule Title <span class="text-rose-500">*</span></label>
                        <input type="text" name="hotel_rules[${id}][title]" value="${title.replace(/"/g, '&quot;')}" placeholder="e.g. Smoking Policy, Age Limit" required
                               class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Rule Description <span class="text-rose-500">*</span></label>
                        <textarea name="hotel_rules[${id}][description]" rows="2" placeholder="e.g. Detailed terms and instructions..." required
                                  class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">${description}</textarea>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        customRuleCounter++;
    }

    function removeCustomRule(rowId) {
        const el = document.getElementById(rowId);
        if (el) el.remove();

        const container = document.getElementById('custom-rules-container');
        const rows = container.querySelectorAll('.group');
        if (rows.length === 0) {
            const emptyMsg = document.getElementById('no-custom-rules-msg');
            if (emptyMsg) {
                emptyMsg.style.display = 'block';
            } else {
                container.innerHTML = `
                    <div id="no-custom-rules-msg" class="p-4 bg-slate-50/50 border border-dashed border-slate-200 rounded-xl text-center text-xs text-slate-400">
                        <i class="fa-solid fa-circle-info mr-1 text-slate-400"></i> No extra custom rules added. Fixed default rules above will apply. Click "+ Add Custom Rule" to add hotel-specific policies.
                    </div>
                `;
            }
        } else {
            rows.forEach((row, idx) => {
                const label = row.querySelector('.custom-rule-label');
                if (label) label.innerText = `Custom Rule #${idx + 1}`;
            });
        }
    }

    function initPaymentOptions() {
        const hiddenInput = document.getElementById('core-rule-payment');
        const desc = hiddenInput ? hiddenInput.value.toLowerCase() : '';

        const hasCards = desc.includes('card') || desc.includes('visa') || desc.includes('master');
        const hasUpi = desc.includes('upi') || desc.includes('gpay') || desc.includes('paytm');
        const hasNetbanking = desc.includes('net banking') || desc.includes('bank');
        const hasCash = desc.includes('cash') && !desc.includes('no cash');
        const hasWallets = desc.includes('wallet');

        const isBlank = !hasCards && !hasUpi && !hasNetbanking && !hasCash && !hasWallets;

        const cardsEl = document.getElementById('pay-opt-cards');
        const upiEl = document.getElementById('pay-opt-upi');
        const netbankingEl = document.getElementById('pay-opt-netbanking');
        const cashEl = document.getElementById('pay-opt-cash');
        const walletsEl = document.getElementById('pay-opt-wallets');

        if (cardsEl) cardsEl.checked = isBlank ? true : hasCards;
        if (upiEl) upiEl.checked = isBlank ? true : hasUpi;
        if (netbankingEl) netbankingEl.checked = isBlank ? true : hasNetbanking;
        if (cashEl) cashEl.checked = isBlank ? true : hasCash;
        if (walletsEl) walletsEl.checked = isBlank ? false : hasWallets;

        refreshPaymentChipStyles();
    }

    function refreshPaymentChipStyles() {
        const chips = [
            { id: 'pay-opt-cards', container: 'chip-card-container', icon: '<i class="fa-brands fa-cc-visa text-blue-600" title="Visa"></i><i class="fa-brands fa-cc-mastercard text-orange-500" title="MasterCard"></i>' },
            { id: 'pay-opt-upi', container: 'chip-upi-container', icon: '<i class="fa-solid fa-qrcode text-indigo-600" title="UPI"></i>' },
            { id: 'pay-opt-netbanking', container: 'chip-netbanking-container', icon: '<i class="fa-solid fa-building-columns text-sky-600" title="Net Banking"></i>' },
            { id: 'pay-opt-cash', container: 'chip-cash-container', icon: '<i class="fa-solid fa-money-bill-wave text-emerald-600" title="Cash"></i>' },
            { id: 'pay-opt-wallets', container: 'chip-wallets-container', icon: '<i class="fa-solid fa-wallet text-amber-500" title="Wallets"></i>' }
        ];

        const iconsContainer = document.getElementById('payment-live-icons');
        let activeIconsHtml = '';

        chips.forEach(c => {
            const input = document.getElementById(c.id);
            const container = document.getElementById(c.container);
            if (!input || !container) return;

            const checkBadge = container.querySelector('.check-badge');

            if (input.checked) {
                container.classList.add('border-emerald-500', 'bg-emerald-50/30', 'shadow-xs');
                container.classList.remove('border-slate-200', 'bg-white', 'opacity-50');
                if (checkBadge) checkBadge.classList.remove('opacity-0');
                activeIconsHtml += c.icon;
            } else {
                container.classList.remove('border-emerald-500', 'bg-emerald-50/30', 'shadow-xs');
                container.classList.add('border-slate-200', 'bg-white', 'opacity-50');
                if (checkBadge) checkBadge.classList.add('opacity-0');
            }
        });

        if (iconsContainer) {
            iconsContainer.innerHTML = activeIconsHtml;
        }
    }

    function updatePaymentDescription() {
        const cards = document.getElementById('pay-opt-cards')?.checked;
        const upi = document.getElementById('pay-opt-upi')?.checked;
        const netbanking = document.getElementById('pay-opt-netbanking')?.checked;
        const cash = document.getElementById('pay-opt-cash')?.checked;
        const wallets = document.getElementById('pay-opt-wallets')?.checked;

        const parts = [];
        if (cards) parts.push('Credit/Debit Cards (Visa, MasterCard)');
        if (netbanking) parts.push('Net Banking');
        if (upi) parts.push('UPI');
        if (wallets) parts.push('Digital Wallets');
        if (cash) parts.push('Cash');

        let text = '';
        if (parts.length === 0) {
            text = 'Prepaid online payment only.';
        } else if (parts.length === 1) {
            text = `${parts[0]} is accepted.`;
        } else {
            const last = parts.pop();
            text = `${parts.join(', ')}, and ${last} are accepted.`;
        }

        const hiddenInput = document.getElementById('core-rule-payment');
        const previewText = document.getElementById('payment-live-preview-text');

        if (hiddenInput) hiddenInput.value = text;
        if (previewText) previewText.innerText = text;

        refreshPaymentChipStyles();
    }

    function setPaymentPreset(type) {
        if (type === 'all') {
            if (document.getElementById('pay-opt-cards')) document.getElementById('pay-opt-cards').checked = true;
            if (document.getElementById('pay-opt-upi')) document.getElementById('pay-opt-upi').checked = true;
            if (document.getElementById('pay-opt-netbanking')) document.getElementById('pay-opt-netbanking').checked = true;
            if (document.getElementById('pay-opt-cash')) document.getElementById('pay-opt-cash').checked = true;
            if (document.getElementById('pay-opt-wallets')) document.getElementById('pay-opt-wallets').checked = false;
        } else if (type === 'cashless') {
            if (document.getElementById('pay-opt-cards')) document.getElementById('pay-opt-cards').checked = true;
            if (document.getElementById('pay-opt-upi')) document.getElementById('pay-opt-upi').checked = true;
            if (document.getElementById('pay-opt-netbanking')) document.getElementById('pay-opt-netbanking').checked = true;
            if (document.getElementById('pay-opt-cash')) document.getElementById('pay-opt-cash').checked = false;
            if (document.getElementById('pay-opt-wallets')) document.getElementById('pay-opt-wallets').checked = true;
        } else if (type === 'upi_cash') {
            if (document.getElementById('pay-opt-cards')) document.getElementById('pay-opt-cards').checked = false;
            if (document.getElementById('pay-opt-upi')) document.getElementById('pay-opt-upi').checked = true;
            if (document.getElementById('pay-opt-netbanking')) document.getElementById('pay-opt-netbanking').checked = false;
            if (document.getElementById('pay-opt-cash')) document.getElementById('pay-opt-cash').checked = true;
            if (document.getElementById('pay-opt-wallets')) document.getElementById('pay-opt-wallets').checked = false;
        } else if (type === 'cards_upi') {
            if (document.getElementById('pay-opt-cards')) document.getElementById('pay-opt-cards').checked = true;
            if (document.getElementById('pay-opt-upi')) document.getElementById('pay-opt-upi').checked = true;
            if (document.getElementById('pay-opt-netbanking')) document.getElementById('pay-opt-netbanking').checked = false;
            if (document.getElementById('pay-opt-cash')) document.getElementById('pay-opt-cash').checked = false;
            if (document.getElementById('pay-opt-wallets')) document.getElementById('pay-opt-wallets').checked = false;
        }
        updatePaymentDescription();
    }

    function resetCoreRuleDescriptions() {
        if (!confirm('Are you sure you want to reset the default rule descriptions?')) return;

        const inTime = document.getElementById('check_in_time').value || '12:00 PM';
        const outTime = document.getElementById('check_out_time').value || '11:00 AM';

        const checkInEl = document.getElementById('core-rule-checkin');
        const checkOutEl = document.getElementById('core-rule-checkout');
        const cancelEl = document.getElementById('core-rule-cancellation');
        const petsEl = document.getElementById('core-rule-pets');

        if (checkInEl) checkInEl.value = `From ${inTime}. Guests are required to show a valid government photo ID upon check-in.`;
        if (checkOutEl) checkOutEl.value = `Until ${outTime}.`;
        if (cancelEl) cancelEl.value = 'Cancellation and prepayment policies vary according to room type. Free cancellation up to 48 hours before check-in.';
        if (petsEl) petsEl.value = 'Pets are not allowed in the hotel premises unless prior arrangement has been made.';
        setPaymentPreset('all');
    }

    function addAmenity() {
        const container = document.getElementById('amenities-container');
        const rowId = `amenity-row-${amenityCounter}`;
        
        const html = `
            <div class="flex items-center gap-2 bg-slate-50/70 p-2 rounded-xl border border-slate-200" id="${rowId}">
                <i class="fa-solid fa-circle-check text-emerald-500 text-xs ml-1 flex-shrink-0"></i>
                <input type="text" name="amenities[]" placeholder="Enter Amenity" oninput="syncLiveSummary()"
                       class="flex-1 px-2.5 py-1.5 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                <button type="button" onclick="removeElement('${rowId}'); syncLiveSummary();" class="w-7 h-7 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-xs" title="Remove">
                    <i class="fa-solid fa-trash-can text-[10px]"></i>
                </button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        amenityCounter++;
        syncLiveSummary();
    }

    function removeElement(id) {
        const el = document.getElementById(id);
        if (el) el.remove();
        syncLiveSummary();
    }

    function addRoomType() {
        const container = document.getElementById('room-types-container');
        const id = roomCounter;
        const cardId = `room-card-${id}`;

        const html = `
            <div class="p-4 bg-slate-50/70 border border-slate-200/90 rounded-2xl space-y-3 relative group" id="${cardId}">
                <div class="flex items-center justify-between border-b border-slate-200/60 pb-2">
                    <span class="text-xs font-bold text-slate-800 flex items-center gap-2">
                        <i class="fa-solid fa-door-open text-primary"></i>
                        <span class="room-title-label">Room Category #${id + 1}</span>
                    </span>
                    <button type="button" onclick="removeRoomType('${cardId}'); syncLiveSummary();" class="px-2.5 py-1 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg text-[10px] font-bold transition flex items-center gap-1 shadow-xs" title="Remove Room">
                        <i class="fa-solid fa-trash-can text-[9px]"></i> Remove
                    </button>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3.5">
                    <div class="sm:col-span-2">
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Room Name <span class="text-rose-500">*</span></label>
                        <input type="text" name="room_types[${id}][name]" placeholder="e.g. Executive Suite Room" required
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                    </div>
                    
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Price / Night (₹) <span class="text-rose-500">*</span></label>
                        <input type="number" step="0.01" name="room_types[${id}][price]" placeholder="e.g. 7499" required
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                    </div>

                    <div>
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Guests / Capacity</label>
                        <input type="text" name="room_types[${id}][capacity]" value="2 Adults" placeholder="e.g. 2 Adults"
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Bed & Feature Details (Optional)</label>
                        <input type="text" name="room_types[${id}][description]" placeholder="e.g. 1 King Bed, Panoramic Views"
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Room Photo Upload</label>
                        <input type="hidden" name="room_types[${id}][existing_image]" id="room-existing-img-${id}" value="">
                        
                        <div class="flex items-center gap-3">
                            <div class="w-16 h-12 rounded-lg bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center flex-shrink-0 shadow-xs" id="room-preview-box-${id}">
                                <i class="fa-regular fa-image text-slate-300 text-lg"></i>
                            </div>
                            <input type="file" name="room_type_images[${id}]" accept="image/*" onchange="previewRoomImage(this, ${id})" 
                                   class="text-[11px] text-slate-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[10px] file:font-semibold file:bg-blue-50 file:text-primary hover:file:bg-blue-100 transition cursor-pointer">
                        </div>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        roomCounter++;
        syncLiveSummary();
    }

    function removeRoomType(cardId) {
        const el = document.getElementById(cardId);
        if (el) el.remove();
        syncLiveSummary();
    }

    function previewRoomImage(input, index) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const box = document.getElementById(`room-preview-box-${index}`);
                box.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Gallery Local File Upload & Dropzone
    function handleLocalFileSelect(input) {
        const files = input.files;
        if (!files.length) return;

        const grid = document.getElementById('gallery-preview-grid');
        const emptyMsg = document.getElementById('empty-gallery-msg');
        if (emptyMsg) emptyMsg.style.display = 'none';

        const hiddenContainer = document.getElementById('hidden-file-inputs-container');

        Array.from(files).forEach(file => {
            if (!file.type.startsWith('image/')) return;

            const fileId = `local-file-${localFileCounter}`;
            const reader = new FileReader();

            const individualInput = document.createElement('input');
            individualInput.type = 'file';
            individualInput.name = 'images[]';
            individualInput.id = `input-${fileId}`;
            individualInput.style.display = 'none';

            const dt = new DataTransfer();
            dt.items.add(file);
            individualInput.files = dt.files;
            hiddenContainer.appendChild(individualInput);

            reader.onload = function(e) {
                const card = document.createElement('div');
                card.className = 'relative group rounded-xl overflow-hidden border border-slate-200 aspect-video bg-white shadow-xs';
                card.id = `card-${fileId}`;
                card.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-full object-cover">
                    <button type="button" onclick="setPrimaryImage(this, '${file.name}')" class="primary-star absolute top-2 left-2 w-7 h-7 bg-black/50 backdrop-blur rounded-full flex items-center justify-center text-white/70 hover:text-amber-400 transition z-10" title="Set as Primary Cover">
                        <i class="fa-solid fa-star text-xs"></i>
                    </button>
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center p-2">
                        <button type="button" onclick="removeLocalImage('${fileId}')" class="w-8 h-8 bg-rose-600 hover:bg-rose-700 text-white rounded-full flex items-center justify-center transition shadow" title="Delete Photo">
                            <i class="fa-solid fa-trash-can text-xs"></i>
                        </button>
                    </div>
                `;
                grid.appendChild(card);
                autoSelectFirstImageAsPrimary();
                syncLiveSummary();
            };

            reader.readAsDataURL(file);
            localFileCounter++;
        });

        input.value = '';
    }

    function removeLocalImage(fileId) {
        const card = document.getElementById(`card-${fileId}`);
        const input = document.getElementById(`input-${fileId}`);
        
        if (card) card.remove();
        if (input) input.remove();
        
        checkEmptyGallery();
        autoSelectFirstImageAsPrimary();
        syncLiveSummary();
    }

    function setPrimaryImage(buttonEl, imageIdentifier) {
        document.getElementById('primary-image-input').value = imageIdentifier;

        const coverImgEl = document.getElementById('live-cover-image');
        const imgNode = buttonEl.closest('.relative')?.querySelector('img');
        if (coverImgEl && imgNode) {
            coverImgEl.src = imgNode.src;
        }
        
        document.querySelectorAll('.primary-star').forEach(starBtn => {
            starBtn.classList.remove('text-amber-400');
            starBtn.classList.add('text-white/70', 'hover:text-amber-400');
        });
        document.querySelectorAll('.primary-badge').forEach(badge => badge.remove());
        
        buttonEl.classList.remove('text-white/70', 'hover:text-amber-400');
        buttonEl.classList.add('text-amber-400');

        const parentCard = buttonEl.closest('.relative');
        if (parentCard) {
            parentCard.insertAdjacentHTML('beforeend', '<span class="primary-badge absolute bottom-2 left-2 px-2 py-0.5 bg-amber-500 text-white text-[9px] font-extrabold rounded-md shadow uppercase tracking-wider z-10">Primary Cover</span>');
        }
    }

    function autoSelectFirstImageAsPrimary() {
        const primaryInput = document.getElementById('primary-image-input');
        if (!primaryInput.value || primaryInput.value === '') {
            const firstStar = document.querySelector('.primary-star');
            if (firstStar) {
                firstStar.click();
            }
        }
    }

    function checkEmptyGallery() {
        const grid = document.getElementById('gallery-preview-grid');
        const cards = grid.querySelectorAll('.relative.group');
        const emptyMsg = document.getElementById('empty-gallery-msg');
        
        if (cards.length === 0) {
            if (emptyMsg) emptyMsg.style.display = 'block';
            document.getElementById('primary-image-input').value = '';
        }
    }

    // Drag & Drop
    const dropzone = document.getElementById('dropzone');
    if (dropzone) {
        ['dragenter', 'dragover'].forEach(eventName => {
            dropzone.addEventListener(eventName, (e) => {
                e.preventDefault();
                dropzone.classList.add('border-primary', 'bg-blue-50/50');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, (e) => {
                e.preventDefault();
                dropzone.classList.remove('border-primary', 'bg-blue-50/50');
            }, false);
        });

        dropzone.addEventListener('drop', (e) => {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length) {
                const selector = document.getElementById('local-file-selector');
                const imageFilesDT = new DataTransfer();
                for (let i = 0; i < files.length; i++) {
                    if (files[i].type.startsWith('image/')) {
                        imageFilesDT.items.add(files[i]);
                    }
                }
                if (imageFilesDT.files.length) {
                    selector.files = imageFilesDT.files;
                    handleLocalFileSelect(selector);
                }
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        initPaymentOptions();
        syncLiveSummary();
    });
</script>
@endpush
