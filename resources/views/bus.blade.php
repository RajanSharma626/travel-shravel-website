@extends('layouts.app')

@section('title', 'Bus Tickets Inquiry | Travel Shravel')

@push('styles')
    <style>
        /* Force padding-left on input/select elements to prevent icons from overlapping the text/placeholder */
        .relative input,
        .relative select {
            padding-left: 2.75rem !important;
        }

        /* Long weekend promo card gradient */
        .weekend-promo {
            background: linear-gradient(135deg, #F59E0B, #D97706) !important;
        }

        /* Flat 10% off promo card gradient */
        .discount-promo {
            background: linear-gradient(135deg, #0284C7, #0369A1) !important;
        }

        /* Fix button text color compilation issues */
        .weekend-promo button {
            color: #D97706 !important; /* Amber-600 fallback */
            background-color: #ffffff !important;
        }
        .discount-promo button {
            color: #0284C7 !important; /* Sky-600 fallback */
            background-color: #ffffff !important;
        }

        /* Promo badges spacing & centering alignment */
        .promo-badge {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            line-height: 1 !important;
            height: 1.75rem !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }

        /* Prevent background icon overlap over text badges */
        .promo-card-icon {
            position: absolute !important;
            right: -1.5rem !important;
            bottom: -1.5rem !important;
            opacity: 0.12 !important;
            pointer-events: none !important;
            z-index: 1 !important;
        }
        .promo-card-icon i {
            font-size: 8rem !important;
            line-height: 1 !important;
        }

        /* Prevent route icon container stretching */
        .route-icon-box {
            width: 1.75rem !important;
            height: 1.75rem !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            border-radius: 0.5rem !important;
            flex-shrink: 0 !important;
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
            <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&q=80&w=1920" alt="Bus Journey Hero"
                class="h-full w-full object-cover">
            {{-- Shadow / Gradient Overlay --}}
            <div class="absolute inset-0 bg-black/55 bg-gradient-to-t from-black/85 via-black/45 to-black/75"></div>
        </div>

        {{-- Hero Content --}}
        <div class="hero-content-shift relative w-full max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-saffron/20 border border-saffron/30 text-white text-xs font-semibold tracking-wider uppercase mb-4 animate-pulse">
                <i class="fa-solid fa-bus text-[10px]"></i> Authorized Bus Booking Partner
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl text-white font-libre-baskerville mb-4 drop-shadow-lg uppercase tracking-wide">
                Bus Ticket Inquiry
            </h1>
            <p class="text-base md:text-lg text-white/90 max-w-2xl mx-auto tracking-wide drop-shadow-sm font-light">
                Book Sleeper, Volvo AC, and Express buses across India. Fast reservations, best price guarantee, and 24/7 travel support.
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
                        <i class="fa-solid fa-bus-simple text-lg"></i>
                    </div>
                    <div>
                        <h2 class="text-base font-bold tracking-wide">Request Bus Tickets / Callback</h2>
                        <p class="text-xs text-white/70 font-light">Fill out details below, and our experts will get back with confirmed ticket options.</p>
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
                            <input type="text" id="origin" name="origin" required placeholder="Enter boarding city (e.g. Delhi)"
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
                            <input type="text" id="destination" name="destination" required placeholder="Enter destination city (e.g. Manali)"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all">
                        </div>
                    </div>

                    {{-- Travel Date --}}
                    <div class="space-y-2">
                        <label for="travel_date" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-regular fa-calendar-days text-saffron text-[10px]"></i> Date of Journey <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-saffron transition-colors">
                                <i class="fa-regular fa-calendar"></i>
                            </span>
                            <input type="date" id="travel_date" name="travel_date" required min="{{ date('Y-m-d') }}"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all">
                        </div>
                    </div>

                    {{-- Seat Type --}}
                    <div class="space-y-2">
                        <label for="seat_type" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-chair text-india-green text-[10px]"></i> Seat / Coach Type <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="fa-solid fa-couch"></i>
                            </span>
                            <select id="seat_type" name="seat_type" required
                                class="w-full pl-11 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all appearance-none cursor-pointer">
                                <option value="Sitter" selected>Sitter (Sitting)</option>
                                <option value="Sleeper">Sleeper (AC / Non-AC)</option>
                                <option value="Semi-Sleeper">Semi-Sleeper</option>
                                <option value="Volvo AC Seater">Volvo AC Seater</option>
                                <option value="Volvo AC Sleeper">Volvo AC Sleeper</option>
                                <option value="Luxury Coach">Luxury Multi-Axle Coach</option>
                            </select>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 text-xs">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
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

                    {{-- Contact Number --}}
                    <div class="space-y-2">
                        <label for="mobile" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-phone text-india-green text-[10px]"></i> Contact Number <span class="text-red-500">*</span>
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
                            <input type="number" id="persons" name="persons" required min="1" max="15" value="1"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all">
                        </div>
                    </div>
                </div>

                {{-- Action Panel --}}
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-between border-t border-gray-100 gap-4">
                    <p class="text-xs text-gray-400 flex items-center gap-2">
                        <i class="fa-solid fa-shield-halved text-india-green"></i> 
                        Your booking query is protected by encrypted transmission.
                    </p>
                    <button type="submit"
                        class="w-full sm:w-auto px-10 py-4 bg-saffron text-white rounded-xl font-bold text-sm tracking-wide shadow-lg shadow-saffron/20 hover:bg-saffron-deep hover:shadow-saffron/30 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fa-regular fa-paper-plane text-xs"></i> Send Bus Inquiry
                    </button>
                </div>
            </form>
        </div>
    </section>

    {{-- Details Sections --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                {{-- Column 1 --}}
                <div class="bg-white rounded-3xl p-8 md:p-10 border border-gray-100 shadow-sm">
                    <span class="text-saffron text-xs font-bold uppercase tracking-wider block mb-2">Booking Process</span>
                    <h3 class="text-2xl font-bold text-navy mb-4">How to Book Bus Ticket?</h3>
                    <div class="w-10 h-1 bg-saffron mb-6 rounded-full"></div>
                    <p class="text-gray-500 leading-relaxed font-light mb-6">
                        Bus ticket booking is very much easy with Travel Shravel. All you have to do is fill up the form mentioned above. We have internal systems to book bus tickets for you for domestic and a few international sectors. Our bus booking facility allows you having a copy of your ticket in your inbox. You can obtain your bus ticket again from your email id if you lost your ticket.
                    </p>
                    <ul class="space-y-3.5 text-sm text-gray-600 font-light">
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-circle-check text-india-green"></i>
                            Fill out the Origin, Destination & Travel Date.
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-circle-check text-india-green"></i>
                            Select your desired Coach category (Sleeper/Volvo/AC).
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-circle-check text-india-green"></i>
                            Receive a confirmation callback or direct tickets in mail.
                        </li>
                    </ul>
                </div>

                {{-- Column 2 --}}
                <div class="bg-white rounded-3xl p-8 md:p-10 border border-gray-100 shadow-sm">
                    <span class="text-india-green text-xs font-bold uppercase tracking-wider block mb-2">Fleet Options</span>
                    <h3 class="text-2xl font-bold text-navy mb-4">Kind of Buses we book!</h3>
                    <div class="w-10 h-1 bg-india-green mb-6 rounded-full"></div>
                    <p class="text-gray-500 leading-relaxed font-light mb-6">
                        You can get different type of bus tickets for you depending on your choice: ticket for AC Bus, Non-AC Bus, Volvo AC Seater Bus, Volvo AC Sleeper Bus, AC Sleeper Coach Bus, Sleeper Seater Bus, AC Luxury Bus can be booked. Booking bus tickets for buses is ideal for travelers. People prefer AC sleeper buses for long distance or overnight travel. Simply give us a call for your queries related to bus ticket.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-xs font-semibold text-navy">
                        <div class="p-3 bg-gray-50 rounded-xl border border-gray-100 flex items-center gap-2">
                            <i class="fa-solid fa-fan text-saffron"></i>
                            Volvo Multi-Axle AC
                        </div>
                        <div class="p-3 bg-gray-50 rounded-xl border border-gray-100 flex items-center gap-2">
                            <i class="fa-solid fa-bed text-india-green"></i>
                            Sleeper Coaches
                        </div>
                        <div class="p-3 bg-gray-50 rounded-xl border border-gray-100 flex items-center gap-2">
                            <i class="fa-solid fa-bus text-saffron"></i>
                            Non-AC Express
                        </div>
                        <div class="p-3 bg-gray-50 rounded-xl border border-gray-100 flex items-center gap-2">
                            <i class="fa-solid fa-star text-india-green"></i>
                            Luxury Multi-Axle
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Promo Section --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Promo 1 --}}
                <div class="weekend-promo rounded-3xl p-8 text-white relative overflow-hidden group shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="promo-card-icon absolute -right-6 -bottom-6 w-32 h-32 text-white group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-umbrella-beach text-9xl"></i>
                    </div>
                    <div class="relative z-10 space-y-4 max-w-md">
                        <span class="promo-badge text-[10px] font-bold tracking-widest rounded-md bg-white/20 text-white uppercase">Combo Deal</span>
                        <h4 class="text-xl md:text-2xl font-bold font-libre-baskerville">Plan your long weekend in advance!</h4>
                        <p class="text-xs text-white/90 font-light">
                            Make instant bookings inclusive of <strong>Bus + Car + Accommodation</strong>. Available for Shimla, Katra, Delhi, Manali, and Dharamshala.
                        </p>
                        <button type="button" onclick="fillInquiry('Delhi', 'Manali')" class="mt-4 px-6 py-2 bg-white text-amber-600 rounded-xl text-xs font-bold hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer">
                            Inquire Now
                        </button>
                    </div>
                </div>

                {{-- Promo 2 --}}
                <div class="discount-promo rounded-3xl p-8 text-white relative overflow-hidden group shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="promo-card-icon absolute -right-6 -bottom-6 w-32 h-32 text-white group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-percent text-9xl"></i>
                    </div>
                    <div class="relative z-10 space-y-4 max-w-md">
                        <span class="promo-badge text-[10px] font-bold tracking-widest rounded-md bg-white/20 text-white uppercase animate-pulse">Special Offer</span>
                        <h4 class="text-xl md:text-2xl font-bold font-libre-baskerville">Flat 10% Off Best Price</h4>
                        <p class="text-xs text-white/90 font-light">
                            Get early bird discounts on popular weekend destinations. Verified tickets for Solang, Kullu, and Manikaran routes.
                        </p>
                        <button type="button" onclick="fillInquiry('Delhi', 'Kullu')" class="mt-4 px-6 py-2 bg-white text-sky-600 rounded-xl text-xs font-bold hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer">
                            Claim Offer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Popular Routes Section --}}
    <section class="py-20 bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-saffron text-xs font-bold uppercase tracking-widest block mb-2">Quick Booking</span>
                <h2 class="text-3xl font-bold text-navy tracking-tight">Popular Bus Routes</h2>
                <div class="w-12 h-1 bg-saffron mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @php
                    $routes = [
                        ['from' => 'Raipur, CG', 'to' => 'Pune'],
                        ['from' => 'Vadodara', 'to' => 'Bhopal'],
                        ['from' => 'Jodhpur', 'to' => 'Mukerian'],
                        ['from' => 'Vadodara', 'to' => 'Aurangabad'],
                        ['from' => 'Jalna', 'to' => 'Pune'],
                        ['from' => 'Chandigarh', 'to' => 'Kotputli'],
                        ['from' => 'Nasirabad', 'to' => 'Agra'],
                        ['from' => 'Jaipur', 'to' => 'Ludhiana'],
                        ['from' => 'Delhi', 'to' => 'Mukerian'],
                        ['from' => 'Ahmedabad', 'to' => 'Beawar'],
                        ['from' => 'Jodhpur', 'to' => 'Jammu'],
                        ['from' => 'Pune', 'to' => 'Washim'],
                        ['from' => 'Jaipur', 'to' => 'Kota'],
                        ['from' => 'Mumbai', 'to' => 'Pune'],
                        ['from' => 'Gorakhpur', 'to' => 'Lucknow'],
                        ['from' => 'Gandhinagar', 'to' => 'Jaipur'],
                        ['from' => 'Kurukshetra', 'to' => 'Jammu'],
                        ['from' => 'Jaipur', 'to' => 'Agra'],
                        ['from' => 'Shirpur', 'to' => 'Nagpur'],
                        ['from' => 'Greater Noida', 'to' => 'Kanpur'],
                        ['from' => 'Parbhani', 'to' => 'Pune'],
                        ['from' => 'Amravati', 'to' => 'Pune'],
                        ['from' => 'Kurukshetra', 'to' => 'Jodhpur'],
                        ['from' => 'Dhule', 'to' => 'Ahmedabad'],
                        ['from' => 'Jammu', 'to' => 'Kullu'],
                        ['from' => 'Jammu', 'to' => 'Chandigarh'],
                        ['from' => 'Jammu', 'to' => 'Shimla'],
                        ['from' => 'Jammu', 'to' => 'Rishikesh'],
                        ['from' => 'Jammu', 'to' => 'Manali'],
                        ['from' => 'Jammu', 'to' => 'Dharamshala'],
                        ['from' => 'Jammu', 'to' => 'Srinagar'],
                        ['from' => 'Jammu', 'to' => 'Leh'],
                    ];
                @endphp

                @foreach($routes as $r)
                    <div onclick="fillInquiry('{{ addslashes($r['from']) }}', '{{ addslashes($r['to']) }}')"
                        class="bg-white hover:bg-navy hover:text-white p-4 rounded-xl border border-gray-150 flex items-center justify-between group cursor-pointer shadow-sm hover:shadow-md transition-all duration-300">
                        <div class="flex items-center gap-2.5 truncate">
                            <span class="route-icon-box bg-gray-50 group-hover:bg-white/10 text-gray-500 group-hover:text-saffron transition-colors">
                                <i class="fa-solid fa-bus text-xs"></i>
                            </span>
                            <div class="truncate text-left">
                                <h4 class="text-xs font-bold text-gray-800 group-hover:text-white transition-colors truncate">
                                    {{ $r['from'] }} ➔ {{ $r['to'] }}
                                </h4>
                            </div>
                        </div>
                        <span class="text-[10px] text-saffron group-hover:text-white font-bold flex items-center gap-0.5 flex-shrink-0">
                            Book <i class="fa-solid fa-chevron-right text-[8px] group-hover:translate-x-0.5 transition-transform"></i>
                        </span>
                    </div>
                @endforeach
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
