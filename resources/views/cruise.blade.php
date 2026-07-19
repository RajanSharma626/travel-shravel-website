@extends('layouts.app')

@section('title', 'Cruise Booking Inquiry | Travel Shravel')

@push('styles')
    <style>
        /* Force padding-left on input/select elements to prevent icons from overlapping the text/placeholder */
        .relative input,
        .relative select {
            padding-left: 2.75rem !important;
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
            <img src="https://images.unsplash.com/photo-1548574505-5e239809ee19?auto=format&fit=crop&q=80&w=1920" alt="Cruise Ship Sunset Hero"
                class="h-full w-full object-cover">
            {{-- Shadow / Gradient Overlay --}}
            <div class="absolute inset-0 bg-black/55 bg-gradient-to-t from-black/85 via-black/45 to-black/75"></div>
        </div>

        {{-- Hero Content --}}
        <div class="hero-content-shift relative w-full max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-saffron/20 border border-saffron/30 text-white text-xs font-semibold tracking-wider uppercase mb-4 animate-pulse">
                <i class="fa-solid fa-ship text-[10px]"></i> Luxury Ocean Cruises
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl text-white font-libre-baskerville mb-4 drop-shadow-lg uppercase tracking-wide">
                Cruise Booking Inquiry
            </h1>
            <p class="text-base md:text-lg text-white/90 max-w-2xl mx-auto tracking-wide drop-shadow-sm font-light">
                Sail away to exotic shores. Request cabins, book itineraries, and experience five-star amenities at the best guaranteed rates.
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
                        <i class="fa-solid fa-ship text-base"></i>
                    </div>
                    <div>
                        <h2 class="text-base font-bold tracking-wide">Cruise Booking & Quote Request</h2>
                        <p class="text-xs text-white/70 font-light">Fill out details below, and our luxury cruise specialists will find the best cabins.</p>
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
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded relative m-6" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('cruise.inquiry.store') }}" method="POST" class="p-6 md:p-8 space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- Cruise Line / Name of Cruise --}}
                    <div class="space-y-2">
                        <label for="cruise_name" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-anchor text-saffron text-[10px]"></i> Name of Cruise <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="fa-solid fa-ship"></i>
                            </span>
                            <select id="cruise_name" name="cruise_name" required
                                class="w-full pl-11 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all appearance-none cursor-pointer">
                                <option value="Resorts World Cruises" selected>Resorts World Cruises</option>
                                <option value="Royal Caribbean">Royal Caribbean International</option>
                                <option value="Norwegian Cruise Line">Norwegian Cruise Line (NCL)</option>
                                <option value="Cordelia Cruises">Cordelia Cruises</option>
                                <option value="Costa Cruises">Costa Cruises</option>
                                <option value="Any / Not Sure">Any Operator (Best Price)</option>
                            </select>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 text-xs">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>
                    </div>

                    {{-- Port of Departure --}}
                    <div class="space-y-2">
                        <label for="origin" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-circle-dot text-saffron text-[10px]"></i> Port of Departure <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-saffron transition-colors">
                                <i class="fa-solid fa-compass"></i>
                            </span>
                            <input type="text" id="origin" name="origin" required placeholder="e.g. Mumbai, Singapore"
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
                            <input type="text" id="destination" name="destination" required placeholder="e.g. Goa, Lakshadweep, Phuket"
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

                    {{-- Cabin Type --}}
                    <div class="space-y-2">
                        <label for="cabin_type" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-hotel text-india-green text-[10px]"></i> Cabin Type <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="fa-solid fa-door-open"></i>
                            </span>
                            <select id="cabin_type" name="cabin_type" required
                                class="w-full pl-11 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all appearance-none cursor-pointer">
                                <option value="Balcony Cabin" selected>Balcony Cabin</option>
                                <option value="Ocean View">Ocean View (Window)</option>
                                <option value="Interior / Inside">Interior / Inside Cabin</option>
                                <option value="Suite">Premium Luxury Suite</option>
                                <option value="Penthouse">Presidential Penthouse</option>
                            </select>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 text-xs">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
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
                            <input type="number" id="persons" name="persons" required min="1" max="10" value="2"
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
                </div>

                {{-- Action Panel --}}
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-between border-t border-gray-100 gap-4">
                    <p class="text-xs text-gray-400 flex items-center gap-2">
                        <i class="fa-solid fa-shield-halved text-india-green"></i> 
                        Your booking query is protected by encrypted transmission.
                    </p>
                    <button type="submit"
                        class="w-full sm:w-auto px-10 py-4 bg-saffron text-white rounded-xl font-bold text-sm tracking-wide shadow-lg shadow-saffron/20 hover:bg-saffron-deep hover:shadow-saffron/30 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fa-regular fa-paper-plane text-xs"></i> Send Cruise Inquiry
                    </button>
                </div>
            </form>
        </div>
    </section>

    {{-- Cruise operators Section --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-saffron text-xs font-bold uppercase tracking-widest block mb-2">Luxury Operators</span>
                <h2 class="text-3xl font-bold text-navy mb-4 tracking-tight">Our Premium Cruise Partners</h2>
                <div class="w-12 h-1 bg-saffron mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-500 leading-relaxed font-light">
                    We partner with the world's leading ocean liners to bring you the best deals, five-star accommodations, and unforgettable routes.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Operator 1 --}}
                <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1548574505-5e239809ee19?auto=format&fit=crop&q=80&w=800" alt="Resorts World Cruises"
                            class="w-full h-full object-cover">
                        <span class="absolute top-4 left-4 px-2.5 py-1 text-[10px] font-bold tracking-widest rounded-md bg-saffron text-white uppercase shadow-sm">Featured</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-6">
                        <div>
                            <h3 class="text-lg font-bold text-navy mb-2">Resorts World Cruises</h3>
                            <p class="text-gray-500 text-xs font-light leading-relaxed">
                                Experience Asian hospitality at sea. Discover incredible itineraries across Singapore, Malaysia, and Phuket.
                            </p>
                        </div>
                        <div class="border-t border-gray-50 pt-4 flex items-center justify-between">
                            <span class="text-xs font-semibold text-gray-400">Best Experience with</span>
                            <button type="button" onclick="selectCruise('Resorts World Cruises')" class="px-5 py-2.5 bg-saffron/10 text-saffron text-xs font-bold rounded-xl hover:bg-saffron hover:text-white transition-colors cursor-pointer">
                                Call for Price
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Operator 2 --}}
                <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&q=80&w=800" alt="Royal Caribbean"
                            class="w-full h-full object-cover">
                        <span class="absolute top-4 left-4 px-2.5 py-1 text-[10px] font-bold tracking-widest rounded-md bg-india-green text-white uppercase shadow-sm">Popular</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-6">
                        <div>
                            <h3 class="text-lg font-bold text-navy mb-2">Royal Caribbean</h3>
                            <p class="text-gray-500 text-xs font-light leading-relaxed">
                                The ultimate family cruise experience. Giant slides, broadway shows, and private island getaways.
                            </p>
                        </div>
                        <div class="border-t border-gray-50 pt-4 flex items-center justify-between">
                            <span class="text-xs font-semibold text-gray-400">Best Experience with</span>
                            <button type="button" onclick="selectCruise('Royal Caribbean')" class="px-5 py-2.5 bg-saffron/10 text-saffron text-xs font-bold rounded-xl hover:bg-saffron hover:text-white transition-colors cursor-pointer">
                                Call for Price
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Operator 3 --}}
                <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1569263979104-865ab7cd8d13?auto=format&fit=crop&q=80&w=800" alt="Norwegian Cruise Line"
                            class="w-full h-full object-cover">
                        <span class="absolute top-4 left-4 px-2.5 py-1 text-[10px] font-bold tracking-widest rounded-md bg-saffron text-white uppercase shadow-sm">Premium</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-6">
                        <div>
                            <h3 class="text-lg font-bold text-navy mb-2">Norwegian Cruise Line</h3>
                            <p class="text-gray-500 text-xs font-light leading-relaxed">
                                Freestyle cruising at its finest. No set schedules, award-winning dining, and spectacular ocean routes.
                            </p>
                        </div>
                        <div class="border-t border-gray-50 pt-4 flex items-center justify-between">
                            <span class="text-xs font-semibold text-gray-400">Best Experience with</span>
                            <button type="button" onclick="selectCruise('Norwegian Cruise Line')" class="px-5 py-2.5 bg-saffron/10 text-saffron text-xs font-bold rounded-xl hover:bg-saffron hover:text-white transition-colors cursor-pointer">
                                Call for Price
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function selectCruise(cruiseName) {
                const selectElement = document.getElementById('cruise_name');
                if (selectElement) {
                    selectElement.value = cruiseName;
                    
                    // Smoothly scroll to the inquiry form at the top
                    selectElement.scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'center'
                    });
                    
                    // Visual focus animation
                    selectElement.focus();
                }
            }
        </script>
    @endpush
@endsection
