@extends('layouts.app')

@section('title', 'Travel Insurance | Travel Shravel')

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

        /* Fix background disappearing on hover due to compilation latency of new tailwind variants */
        .group:hover .group-hover\:bg-saffron {
            background-color: var(--color-saffron) !important;
        }
        .group:hover .group-hover\:bg-india-green {
            background-color: var(--color-india-green) !important;
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
            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=1920" alt="Travel Protection Hero"
                class="h-full w-full object-cover">
            {{-- Shadow / Gradient Overlay --}}
            <div class="absolute inset-0 bg-black/55 bg-gradient-to-t from-black/85 via-black/45 to-black/75"></div>
        </div>

        {{-- Hero Content --}}
        <div class="hero-content-shift relative w-full max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-saffron/20 border border-saffron/30 text-white text-xs font-semibold tracking-wider uppercase mb-4 animate-pulse">
                <i class="fa-solid fa-shield-halved text-[10px]"></i> Secure Travel Protection
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl text-white font-libre-baskerville mb-4 drop-shadow-lg uppercase tracking-wide">
                Travel Insurance
            </h1>
            <p class="text-base md:text-lg text-white/90 max-w-2xl mx-auto tracking-wide drop-shadow-sm font-light">
                Secure your journey against medical emergencies, cancellations, lost luggage, and delays. Travel the world with peace of mind.
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
                        <i class="fa-solid fa-file-shield text-base"></i>
                    </div>
                    <div>
                        <h2 class="text-base font-bold tracking-wide">Get a Travel Insurance Quote</h2>
                        <p class="text-xs text-white/70 font-light">Fill out details below, and our experts will suggest the most comprehensive plans.</p>
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

            <form action="{{ route('insurance.inquiry.store') }}" method="POST" class="p-6 md:p-8 space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- First Name --}}
                    <div class="space-y-2">
                        <label for="first_name" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-regular fa-user text-saffron text-[10px]"></i> First Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-saffron transition-colors">
                                <i class="fa-solid fa-user-tag"></i>
                            </span>
                            <input type="text" id="first_name" name="first_name" required placeholder="Enter first name"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all">
                        </div>
                    </div>

                    {{-- Last Name --}}
                    <div class="space-y-2">
                        <label for="last_name" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-regular fa-user text-saffron text-[10px]"></i> Last Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-saffron transition-colors">
                                <i class="fa-solid fa-user-tag"></i>
                            </span>
                            <input type="text" id="last_name" name="last_name" required placeholder="Enter last name"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all">
                        </div>
                    </div>

                    {{-- Email --}}
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

                    {{-- D.O.B. --}}
                    <div class="space-y-2">
                        <label for="dob" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-regular fa-calendar-days text-saffron text-[10px]"></i> Date of Birth <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-saffron transition-colors">
                                <i class="fa-regular fa-calendar"></i>
                            </span>
                            <input type="date" id="dob" name="dob" required max="{{ date('Y-m-d') }}"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all">
                        </div>
                    </div>

                    {{-- Travel Plan --}}
                    <div class="space-y-2">
                        <label for="travel_plan" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-map text-india-green text-[10px]"></i> Travel Plan <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="fa-solid fa-plane-departure"></i>
                            </span>
                            <select id="travel_plan" name="travel_plan" required
                                class="w-full pl-11 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all appearance-none cursor-pointer">
                                <option value="Overseas Travel" selected>Overseas Travel</option>
                                <option value="Domestic Travel">Domestic Travel</option>
                                <option value="Student Travel">Student Travel Plan</option>
                                <option value="Senior Citizen Travel">Senior Citizen Plan</option>
                            </select>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 text-xs">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>
                    </div>

                    {{-- Travel Type --}}
                    <div class="space-y-2">
                        <label for="travel_type" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-users text-saffron text-[10px]"></i> Travel Type <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="fa-solid fa-people-group"></i>
                            </span>
                            <select id="travel_type" name="travel_type" required
                                class="w-full pl-11 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all appearance-none cursor-pointer">
                                <option value="Individual" selected>Individual Traveler</option>
                                <option value="Family Floater">Family Floater</option>
                                <option value="Multi-Trip (Annual)">Multi-Trip (Annual)</option>
                            </select>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 text-xs">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>
                    </div>

                    {{-- Start Date --}}
                    <div class="space-y-2">
                        <label for="start_date" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-regular fa-calendar-check text-saffron text-[10px]"></i> Start Date <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-saffron transition-colors">
                                <i class="fa-regular fa-calendar-check"></i>
                            </span>
                            <input type="date" id="start_date" name="start_date" required min="{{ date('Y-m-d') }}"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all">
                        </div>
                    </div>

                    {{-- End Date --}}
                    <div class="space-y-2">
                        <label for="end_date" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-regular fa-calendar-check text-india-green text-[10px]"></i> End Date <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-india-green transition-colors">
                                <i class="fa-solid fa-calendar-xmark"></i>
                            </span>
                            <input type="date" id="end_date" name="end_date" required min="{{ date('Y-m-d') }}"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all">
                        </div>
                    </div>

                    {{-- Country --}}
                    <div class="space-y-2">
                        <label for="country" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-globe text-india-green text-[10px]"></i> Country <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="fa-solid fa-earth-americas"></i>
                            </span>
                            <select id="country" name="country" required
                                class="w-full pl-11 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all appearance-none cursor-pointer">
                                <option value="India" selected>India</option>
                                <option value="United States">United States</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Thailand">Thailand</option>
                                <option value="UAE">United Arab Emirates</option>
                                <option value="Schengen Area (Europe)">Schengen Area (Europe)</option>
                                <option value="Other">Other Country</option>
                            </select>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 text-xs">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>
                    </div>

                    {{-- Pin Code --}}
                    <div class="space-y-2">
                        <label for="pincode" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-map-location text-saffron text-[10px]"></i> Pin Code <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-saffron transition-colors">
                                <i class="fa-solid fa-map-pin"></i>
                            </span>
                            <input type="text" id="pincode" name="pincode" required placeholder="Pin Code of your city"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-saffron/20 focus:border-saffron transition-all">
                        </div>
                    </div>

                    {{-- Pre-Existing Diseases (PED) --}}
                    <div class="space-y-2">
                        <label for="ped" class="text-xs font-semibold text-gray-700 tracking-wide uppercase flex items-center gap-1.5">
                            <i class="fa-solid fa-heart-pulse text-india-green text-[10px]"></i> Does any traveller have PED? <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="fa-solid fa-stethoscope"></i>
                            </span>
                            <select id="ped" name="ped" required
                                class="w-full pl-11 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:bg-white focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all appearance-none cursor-pointer">
                                <option value="No" selected>No (Healthy Travel)</option>
                                <option value="Yes">Yes (Needs Medical Review)</option>
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
                        Your details are fully protected. Covered by standard insurance privacy regulations.
                    </p>
                    <button type="submit"
                        class="w-full sm:w-auto px-10 py-4 bg-saffron text-white rounded-xl font-bold text-sm tracking-wide shadow-lg shadow-saffron/20 hover:bg-saffron-deep hover:shadow-saffron/30 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fa-regular fa-paper-plane text-xs"></i> Send Quote Request
                    </button>
                </div>
            </form>
        </div>
    </section>

    {{-- Key Coverages Section --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-saffron text-xs font-bold uppercase tracking-widest block mb-2">Maximum Safety</span>
                <h2 class="text-3xl font-bold text-navy mb-4 tracking-tight">Key Coverages in Travel Insurance</h2>
                <div class="w-12 h-1 bg-saffron mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-500 leading-relaxed font-light">
                    Whether it's medical emergencies, lost baggage, or trip disruptions, we ensure you have complete financial protection on your journey.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Coverage 1 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group text-left">
                    <div class="w-12 h-12 rounded-xl bg-saffron/10 text-saffron flex items-center justify-center mb-6 group-hover:bg-saffron group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-house-medical text-lg"></i>
                    </div>
                    <h3 class="text-[17px] font-bold text-navy mb-3">Cashless Hospitalization</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-light">
                        Access cashless medical care at our network hospitals worldwide in case of sudden illness or injury during travel.
                    </p>
                </div>

                {{-- Coverage 2 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group text-left">
                    <div class="w-12 h-12 rounded-xl bg-india-green/10 text-india-green flex items-center justify-center mb-6 group-hover:bg-india-green group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-suitcase-rolling text-lg"></i>
                    </div>
                    <h3 class="text-[17px] font-bold text-navy mb-3">Baggage Loss & Delay</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-light">
                        Compensation for stolen, lost, or significantly delayed check-in baggage, helping you purchase essentials.
                    </p>
                </div>

                {{-- Coverage 3 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group text-left">
                    <div class="w-12 h-12 rounded-xl bg-saffron/10 text-saffron flex items-center justify-center mb-6 group-hover:bg-saffron group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-calendar-xmark text-lg"></i>
                    </div>
                    <h3 class="text-[17px] font-bold text-navy mb-3">Trip Interruptions</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-light">
                        Get reimbursed for non-refundable expenses if your trip is canceled, delayed, or interrupted due to unforeseen events.
                    </p>
                </div>

                {{-- Coverage 4 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group text-left">
                    <div class="w-12 h-12 rounded-xl bg-india-green/10 text-india-green flex items-center justify-center mb-6 group-hover:bg-india-green group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-passport text-lg"></i>
                    </div>
                    <h3 class="text-[17px] font-bold text-navy mb-3">Passport Loss Coverage</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-light">
                        Reimbursement for expenses incurred in obtaining a duplicate passport, as well as temporary travel emergency costs.
                    </p>
                </div>

                {{-- Coverage 5 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group text-left">
                    <div class="w-12 h-12 rounded-xl bg-saffron/10 text-saffron flex items-center justify-center mb-6 group-hover:bg-saffron group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-truck-medical text-lg"></i>
                    </div>
                    <h3 class="text-[17px] font-bold text-navy mb-3">Emergency Evacuation</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-light">
                        Complete coverage for air ambulance or emergency medical repatriation back to your home country if required.
                    </p>
                </div>

                {{-- Coverage 6 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group text-left">
                    <div class="w-12 h-12 rounded-xl bg-india-green/10 text-india-green flex items-center justify-center mb-6 group-hover:bg-india-green group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-clock-rotate-left text-lg"></i>
                    </div>
                    <h3 class="text-[17px] font-bold text-navy mb-3">24/7 Global Helpline</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-light">
                        One-click emergency helpline access to connect you to dedicated claim specialists anywhere in the world.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
