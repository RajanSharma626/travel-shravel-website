@extends('layouts.app')

@section('title', 'Train Tickets Inquiry | Travel Shravel')

@push('styles')
    <style>
        /* Force padding-left on input/select elements to prevent icons from overlapping the text/placeholder */
        .relative input,
        .relative select {
            padding-left: 2.75rem !important;
        }

        /* Fix background disappearing on hover due to compilation latency of new tailwind variants */
        .group:hover .group-hover\:bg-saffron {
            background-color: var(--color-saffron) !important;
        }
        .group:hover .group-hover\:bg-india-green {
            background-color: var(--color-india-green) !important;
        }

        /* Fallback for the popular trains cards to prevent invisible white text on white backgrounds */
        .train-card {
            background-image: linear-gradient(135deg, var(--color-ashoka-navy, #1E3A8A), var(--color-navy-deep, #172554)) !important;
        }
        .train-card-icon {
            position: absolute !important;
            right: -1.5rem !important;
            bottom: -1.5rem !important;
            opacity: 0.08 !important;
            pointer-events: none !important;
            z-index: 1 !important;
        }
        .train-badge {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            line-height: 1 !important;
            height: 1.75rem !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }

        /* Form header fallback background styling */
        .form-header {
            background-color: var(--color-ashoka-navy, #1E3A8A) !important;
            background-image: linear-gradient(to right, var(--color-ashoka-navy, #1E3A8A), var(--color-navy-deep, #172554)) !important;
        }

        /* Forced layout spacing bypass rules */
        .hero-section {
            height: 480px !important;
        }
        .hero-content-shift {
            margin-top: -3.5rem !important;
        }
        .inquiry-section {
            margin-top: -3.5rem !important;
        }

        /* Support active pill styling and animations */
        .support-pill {
            display: inline-flex !important;
            align-items: center !important;
            gap: 0.5rem !important;
            padding: 0.375rem 0.875rem !important;
            border-radius: 9999px !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            background-color: rgba(255, 255, 255, 0.05) !important;
            font-size: 0.72rem !important;
            font-weight: 500 !important;
            color: rgba(255, 255, 255, 0.85) !important;
            line-height: 1 !important;
            flex-shrink: 0 !important;
        }
        .status-dot-container {
            position: relative !important;
            display: inline-flex !important;
            width: 0.5rem !important;
            height: 0.5rem !important;
            flex-shrink: 0 !important;
        }
        .status-dot-pulse {
            position: absolute !important;
            display: inline-flex !important;
            width: 100% !important;
            height: 100% !important;
            border-radius: 9999px !important;
            background-color: var(--color-india-green, #10B981) !important;
            opacity: 0.75 !important;
        }
        .status-dot-static {
            position: relative !important;
            display: inline-flex !important;
            width: 0.5rem !important;
            height: 0.5rem !important;
            border-radius: 9999px !important;
            background-color: var(--color-india-green, #10B981) !important;
        }
    </style>
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="hero-section relative w-full overflow-hidden flex items-center justify-center bg-navy">
        {{-- Background Image --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1474487548417-781cb71495f3?auto=format&fit=crop&q=80&w=1920" alt="Train Journey Hero"
                class="h-full w-full object-cover">
            {{-- Shadow / Gradient Overlay --}}
            <div class="absolute inset-0 bg-black/55 bg-gradient-to-t from-black/85 via-black/45 to-black/75"></div>
        </div>

        {{-- Hero Content --}}
        <div class="hero-content-shift relative w-full max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-saffron/20 border border-saffron/30 text-white text-xs font-semibold tracking-wider uppercase mb-4 animate-pulse">
                <i class="fa-solid fa-train text-[10px]"></i> Indian Railways Booking Partner
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl text-white font-libre-baskerville mb-4 drop-shadow-lg uppercase tracking-wide">
                Train Tickets Inquiry
            </h1>
            <p class="text-base md:text-lg text-white/90 max-w-2xl mx-auto tracking-wide drop-shadow-sm font-light">
                Book your train tickets easily. Hassle-free inquiry, verified schedules, and premium assistance for a comfortable journey.
            </p>
        </div>
    </section>

    {{-- Interactive Inquiry Section --}}
    <section class="inquiry-section relative z-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="bg-white rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.12)] border border-gray-100 overflow-hidden">
            {{-- Tab Header --}}
            <div class="form-header bg-gradient-to-r from-navy to-navy/90 px-8 py-5 border-b border-white/10 flex items-center justify-between">
                <div class="flex items-center gap-3 text-white">
                    <div class="w-10 h-10 rounded-xl bg-saffron/20 flex items-center justify-center text-saffron">
                        <i class="fa-solid fa-train-subway text-lg"></i>
                    </div>
                    <div>
                        <h2 class="text-base font-bold tracking-wide">Request a Callback / Ticket Inquiry</h2>
                        <p class="text-xs text-white/70 font-light">Fill out details below, and our experts will get back with confirmed bookings.</p>
                    </div>
                </div>
                <div class="hidden sm:flex support-pill">
                    <span class="status-dot-container">
                        <span class="animate-ping status-dot-pulse"></span>
                        <span class="status-dot-static"></span>
                    </span>
                    <span>Support Active (24/7)</span>
                </div>
            </div>

            {{-- Inquiry Form --}}
            <form action="#" method="POST" class="p-6 md:p-8 space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- Origin/Source --}}
                    <div class="space-y-2">
                        <label for="origin" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-circle-dot text-saffron text-[10px]"></i> Source (Origin) <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-saffron transition-colors">
                                <i class="fa-solid fa-location-dot"></i>
                            </span>
                            <input type="text" id="origin" name="origin" required placeholder="Enter boarding station (e.g. Katra)"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all">
                        </div>
                    </div>

                    {{-- Destination --}}
                    <div class="space-y-2">
                        <label for="destination" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-location-arrow text-india-green text-[10px]"></i> Destination <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-india-green transition-colors">
                                <i class="fa-solid fa-map-pin"></i>
                            </span>
                            <input type="text" id="destination" name="destination" required placeholder="Enter destination (e.g. New Delhi)"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all">
                        </div>
                    </div>

                    {{-- Travel Date --}}
                    <div class="space-y-2">
                        <label for="travel_date" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-regular fa-calendar-days text-saffron text-[10px]"></i> Date of Travel <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-saffron transition-colors">
                                <i class="fa-regular fa-calendar"></i>
                            </span>
                            <input type="date" id="travel_date" name="travel_date" required min="{{ date('Y-m-d') }}"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all">
                        </div>
                    </div>

                    {{-- Name --}}
                    <div class="space-y-2">
                        <label for="name" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-regular fa-user text-saffron text-[10px]"></i> Passenger Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-saffron transition-colors">
                                <i class="fa-solid fa-user-tag"></i>
                            </span>
                            <input type="text" id="name" name="name" required placeholder="Enter full name"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all">
                        </div>
                    </div>

                    {{-- Mobile Number --}}
                    <div class="space-y-2">
                        <label for="mobile" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-phone text-india-green text-[10px]"></i> Mobile Number <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-india-green transition-colors">
                                <i class="fa-solid fa-mobile-screen-button"></i>
                            </span>
                            <input type="tel" id="mobile" name="mobile" required placeholder="Enter mobile number"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all">
                        </div>
                    </div>

                    {{-- Email ID --}}
                    <div class="space-y-2">
                        <label for="email" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-regular fa-envelope text-saffron text-[10px]"></i> Email ID <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-saffron transition-colors">
                                <i class="fa-solid fa-at"></i>
                            </span>
                            <input type="email" id="email" name="email" required placeholder="e.g. yourname@domain.com"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all">
                        </div>
                    </div>

                    {{-- Number of Persons --}}
                    <div class="space-y-2">
                        <label for="persons" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-users text-saffron text-[10px]"></i> Number of Persons <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-saffron transition-colors">
                                <i class="fa-solid fa-user-group"></i>
                            </span>
                            <input type="number" id="persons" name="persons" required min="1" max="10" value="1"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all">
                        </div>
                    </div>

                    {{-- Quota --}}
                    <div class="space-y-2">
                        <label for="quota" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-percentage text-india-green text-[10px]"></i> Quota <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="fa-solid fa-sliders"></i>
                            </span>
                            <select id="quota" name="quota" required
                                class="w-full pl-11 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all appearance-none cursor-pointer">
                                <option value="General" selected>General</option>
                                <option value="Ladies">Ladies</option>
                                <option value="Tatkal">Tatkal</option>
                                <option value="Premium Tatkal">Premium Tatkal</option>
                                <option value="Lower Berth / Sr. Citizen">Lower Berth / Sr. Citizen</option>
                            </select>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 text-xs">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>
                    </div>

                    {{-- Class of Travel --}}
                    <div class="space-y-2">
                        <label for="travel_class" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-chair text-saffron text-[10px]"></i> Class of Travel <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="fa-solid fa-couch"></i>
                            </span>
                            <select id="travel_class" name="travel_class" required
                                class="w-full pl-11 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all appearance-none cursor-pointer">
                                <option value="Second Sitting (2S)" selected>Second Sitting (2S)</option>
                                <option value="Sleeper Class (SL)">Sleeper Class (SL)</option>
                                <option value="AC Chair Car (CC)">AC Chair Car (CC)</option>
                                <option value="AC 3 Economy (3E)">AC 3 Economy (3E)</option>
                                <option value="AC 3 Tier (3A)">AC 3 Tier (3A)</option>
                                <option value="AC 2 Tier (2A)">AC 2 Tier (2A)</option>
                                <option value="AC First Class (1A)">AC First Class (1A)</option>
                            </select>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 text-xs">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Action Panel --}}
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-between border-t border-gray-100 gap-4">
                    <p class="text-xs text-gray-400 flex items-center gap-2">
                        <i class="fa-solid fa-shield-halved text-india-green"></i> 
                        Your personal information is secure and encrypted.
                    </p>
                    <button type="submit"
                        class="w-full sm:w-auto px-10 py-4 bg-saffron text-white rounded-xl font-bold text-sm tracking-wide shadow-lg shadow-saffron/20 hover:bg-saffron-deep hover:shadow-saffron/30 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fa-regular fa-paper-plane text-xs"></i> Send Ticket Inquiry
                    </button>
                </div>
            </form>
        </div>
    </section>

    {{-- Why Book Train Ticket Section --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-saffron text-xs font-bold uppercase tracking-widest block mb-2">Why Choose Rail Travel</span>
                <h2 class="text-3xl font-bold text-navy mb-4 tracking-tight">Why Book Train Tickets with Us?</h2>
                <div class="w-12 h-1 bg-saffron mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-500 leading-relaxed font-light">
                    Traveling by train in India is a popular choice among travelers for short journeys and long journeys. Indian Railways has an immense network. The expanse of routes connecting cities is unparalleled. Book with confidence and enjoy a stress-free travel assistance process.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Feature 1 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-saffron/10 text-saffron flex items-center justify-center mb-6 group-hover:bg-saffron group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-network-wired text-lg"></i>
                    </div>
                    <h3 class="text-[17px] font-bold text-navy mb-3">Vast Route Network</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-light">
                        Connect to the remotest corners, religious towns, and major metropolis areas in India easily.
                    </p>
                </div>

                {{-- Feature 2 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-india-green/10 text-india-green flex items-center justify-center mb-6 group-hover:bg-india-green group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-ticket-simple text-lg"></i>
                    </div>
                    <h3 class="text-[17px] font-bold text-navy mb-3">Smooth Verification</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-light">
                        Double-checked train details and seat availability verification, ensuring you are not stuck waiting.
                    </p>
                </div>

                {{-- Feature 3 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-saffron/10 text-saffron flex items-center justify-center mb-6 group-hover:bg-saffron group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-wallet text-lg"></i>
                    </div>
                    <h3 class="text-[17px] font-bold text-navy mb-3">Pocket-Friendly Travel</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-light">
                        Budget-friendly tickets, with fair pricing structures suitable for families and solo backpackers alike.
                    </p>
                </div>

                {{-- Feature 4 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-india-green/10 text-india-green flex items-center justify-center mb-6 group-hover:bg-india-green group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-headset text-lg"></i>
                    </div>
                    <h3 class="text-[17px] font-bold text-navy mb-3">Dedicated Support</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-light">
                        Expert ticketing representatives to help book, alter, or cancel your travel reservations stress-free.
                    </p>
                </div>

                {{-- Feature 5 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-saffron/10 text-saffron flex items-center justify-center mb-6 group-hover:bg-saffron group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-leaf text-lg"></i>
                    </div>
                    <h3 class="text-[17px] font-bold text-navy mb-3">Eco-Friendly Option</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-light">
                        Lower carbon footprints and sustainable green travel across beautiful scenic country pathways.
                    </p>
                </div>

                {{-- Feature 6 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-india-green/10 text-india-green flex items-center justify-center mb-6 group-hover:bg-india-green group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-star text-lg"></i>
                    </div>
                    <h3 class="text-[17px] font-bold text-navy mb-3">Authorised Partner</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-light">
                        We work closely with official booking interfaces to provide direct reservation services.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Popular Trains Grid Section --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
                <div>
                    <span class="text-saffron text-xs font-bold uppercase tracking-widest block mb-2">Top Selections</span>
                    <h2 class="text-3xl font-bold text-navy tracking-tight">Popular Express & SF Trains</h2>
                    <div class="w-12 h-1 bg-saffron mt-4 rounded-full"></div>
                </div>
                <p class="text-gray-500 text-sm max-w-md mt-4 md:mt-0 font-light">
                    Direct trains connecting beautiful pilgrimage hubs like Katra (Vaishno Devi) with major capitals like Delhi.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $trains = [
                        [
                            'num' => '12445', 'name' => 'Uttar S Kranti',
                            'from' => 'Katra', 'to' => 'New Delhi', 'runs' => 'Daily'
                        ],
                        [
                            'num' => '22402', 'name' => 'UHP DEE AC SF',
                            'from' => 'Udhampur', 'to' => 'Delhi Sarai Rohilla', 'runs' => 'Tue, Thu, Sun'
                        ],
                        [
                            'num' => '22462', 'name' => 'Shri Shakti Exp',
                            'from' => 'Katra', 'to' => 'New Delhi', 'runs' => 'Daily'
                        ],
                        [
                            'num' => '12436', 'name' => 'Jammu Rajdhani',
                            'from' => 'Jammu', 'to' => 'New Delhi', 'runs' => 'Sun, Thu'
                        ],
                        [
                            'num' => '16032', 'name' => 'Andaman Express',
                            'from' => 'Katra', 'to' => 'Mgr Chennai Ctr', 'runs' => 'Sun, Fri, Wed'
                        ],
                        [
                            'num' => '14610', 'name' => 'Hemkunt Express',
                            'from' => 'Katra', 'to' => 'Rishikesh', 'runs' => 'Daily'
                        ],
                        [
                            'num' => '14504', 'name' => 'SVDK KLK EXP',
                            'from' => 'Katra', 'to' => 'Chandigarh', 'runs' => 'Wed, Sat'
                        ],
                        [
                            'num' => '12904', 'name' => 'Golden Temple M',
                            'from' => 'Amritsar', 'to' => 'Mumbai Central', 'runs' => 'Daily'
                        ]
                    ];
                @endphp

                @foreach($trains as $t)
                    <div class="train-card bg-gradient-to-br from-navy/95 to-navy/80 rounded-2xl p-6 text-white shadow-md relative overflow-hidden group hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300">
                        {{-- Decorative train track background overlay --}}
                        <div class="train-card-icon absolute -right-6 -bottom-6 w-24 h-24 text-white group-hover:scale-125 transition-transform duration-500">
                            <i class="fa-solid fa-train text-8xl"></i>
                        </div>
                        
                        <div class="flex items-center justify-between mb-4">
                            <span class="train-badge px-3 text-[10px] font-bold tracking-wider rounded-md bg-saffron text-white uppercase shadow-sm shadow-saffron/10">
                                {{ $t['num'] }}
                            </span>
                            <span class="text-[10px] font-semibold text-white/70 flex items-center gap-1">
                                <i class="fa-regular fa-clock text-[9px] text-india-green"></i> Runs: {{ $t['runs'] }}
                            </span>
                        </div>

                        <h3 class="text-base font-bold text-white mb-6 group-hover:text-saffron transition-colors truncate">
                            {{ $t['name'] }}
                        </h3>

                        <div class="space-y-2 text-xs border-t border-white/10 pt-4 mb-6">
                            <div class="flex justify-between">
                                <span class="text-white/60">From:</span>
                                <span class="font-semibold text-white/90">{{ $t['from'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-white/60">To:</span>
                                <span class="font-semibold text-white/90">{{ $t['to'] }}</span>
                            </div>
                        </div>

                        <button type="button" 
                            onclick="fillInquiry('{{ addslashes($t['from']) }}', '{{ addslashes($t['to']) }}')"
                            class="w-full py-2.5 rounded-xl border border-white/20 text-xs font-semibold hover:bg-white hover:text-navy transition-all duration-300 text-center flex items-center justify-center gap-2 cursor-pointer">
                            <i class="fa-solid fa-magnifying-glass text-[9px]"></i> Search Schedule
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Popular Routes Section --}}
    <section class="py-20 bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-saffron text-xs font-bold uppercase tracking-widest block mb-2">Fast Connections</span>
                <h2 class="text-3xl font-bold text-navy tracking-tight">Popular Train Routes</h2>
                <div class="w-12 h-1 bg-saffron mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                @php
                    $leftRoutes = [
                        ['from' => 'New Delhi', 'to' => 'Jammu Tawi', 'code' => 'NDLS - JAT'],
                        ['from' => 'New Delhi', 'to' => 'Patna Jn', 'code' => 'NDLS - PNBE'],
                        ['from' => 'Howrah Jn', 'to' => 'Jaipur', 'code' => 'HWH - JP'],
                        ['from' => 'Hyderabad Deccan', 'to' => 'Chennai Central', 'code' => 'HYB - MAS'],
                        ['from' => 'Mumbai Central', 'to' => 'Pune Jn', 'code' => 'BCT - PUNE'],
                        ['from' => 'Udhampur', 'to' => 'Delhi Sarai Rohilla', 'code' => 'UHP - DEE'],
                        ['from' => 'Patna Jn', 'to' => 'Guwahati', 'code' => 'PNBE - GHY'],
                        ['from' => 'New Delhi', 'to' => 'Lucknow NE', 'code' => 'NDLS - LJN'],
                        ['from' => 'Mumbai', 'to' => 'Goa', 'code' => 'MUMBAI - GOA'],
                        ['from' => 'Jammu', 'to' => 'Shri Mata Vaishno Devi', 'code' => 'JAT - SVDK'],
                        ['from' => 'Udhampur', 'to' => 'Kathua', 'code' => 'UHP - KTH']
                    ];

                    $rightRoutes = [
                        ['from' => 'Vijayawada Jn', 'to' => 'Chennai Central', 'code' => 'BZA - MAS'],
                        ['from' => 'Indore Jn Bg', 'to' => 'Mumbai Central', 'code' => 'INDB - BCT'],
                        ['from' => 'Jaipur', 'to' => 'Ahmedabad Jn', 'code' => 'JP - ADI'],
                        ['from' => 'Udhampur', 'to' => 'Jammu', 'code' => 'UHP - JAT'],
                        ['from' => 'Udhampur', 'to' => 'Pathankot', 'code' => 'UHP - PTK'],
                        ['from' => 'Udhampur', 'to' => 'Haridwar', 'code' => 'UHP - HW'],
                        ['from' => 'Jammu', 'to' => 'Bina', 'code' => 'JAT - BINA'],
                        ['from' => 'Jammu', 'to' => 'Pune', 'code' => 'JAT - PUNE'],
                        ['from' => 'Jammu', 'to' => 'Ahmedabad', 'code' => 'JAT - ADI'],
                        ['from' => 'Jammu', 'to' => 'Kolkata', 'code' => 'JAT - HWH'],
                        ['from' => 'Jammu', 'to' => 'Jaipur', 'code' => 'JAT - JP']
                    ];
                @endphp

                {{-- Left column --}}
                <div class="space-y-3">
                    @foreach($leftRoutes as $r)
                        <div onclick="fillInquiry('{{ addslashes($r['from']) }}', '{{ addslashes($r['to']) }}')"
                            class="bg-white hover:bg-navy hover:text-white p-4 rounded-xl border border-gray-150 flex items-center justify-between group cursor-pointer shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex items-center gap-3">
                                <span class="w-8 h-8 rounded-lg bg-gray-50 group-hover:bg-white/10 text-gray-500 group-hover:text-saffron flex items-center justify-center transition-colors">
                                    <i class="fa-solid fa-train text-xs"></i>
                                </span>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-800 group-hover:text-white transition-colors">
                                        {{ $r['from'] }} <span class="text-gray-400 group-hover:text-white/50 px-1">➔</span> {{ $r['to'] }}
                                    </h4>
                                    <p class="text-[10px] font-medium text-gray-400 group-hover:text-white/60 tracking-wider">
                                        {{ $r['code'] }}
                                    </p>
                                </div>
                            </div>
                            <span class="text-xs text-saffron group-hover:text-white font-semibold flex items-center gap-1">
                                Search <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                            </span>
                        </div>
                    @endforeach
                </div>

                {{-- Right column --}}
                <div class="space-y-3">
                    @foreach($rightRoutes as $r)
                        <div onclick="fillInquiry('{{ addslashes($r['from']) }}', '{{ addslashes($r['to']) }}')"
                            class="bg-white hover:bg-navy hover:text-white p-4 rounded-xl border border-gray-150 flex items-center justify-between group cursor-pointer shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex items-center gap-3">
                                <span class="w-8 h-8 rounded-lg bg-gray-50 group-hover:bg-white/10 text-gray-500 group-hover:text-saffron flex items-center justify-center transition-colors">
                                    <i class="fa-solid fa-train text-xs"></i>
                                </span>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-800 group-hover:text-white transition-colors">
                                        {{ $r['from'] }} <span class="text-gray-400 group-hover:text-white/50 px-1">➔</span> {{ $r['to'] }}
                                    </h4>
                                    <p class="text-[10px] font-medium text-gray-400 group-hover:text-white/60 tracking-wider">
                                        {{ $r['code'] }}
                                    </p>
                                </div>
                            </div>
                            <span class="text-xs text-saffron group-hover:text-white font-semibold flex items-center gap-1">
                                Search <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function fillInquiry(origin, destination) {
                const originInput = document.getElementById('origin');
                const destInput = document.getElementById('destination');
                
                if (originInput && destInput) {
                    originInput.value = origin;
                    destInput.value = destination;
                    
                    // Smoothly scroll to the inquiry form at the top
                    document.getElementById('origin').scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'center'
                    });
                    
                    // Visual focus animation
                    originInput.focus();
                    setTimeout(() => {
                        destInput.focus();
                    }, 500);
                }
            }
        </script>
    @endpush
@endsection
