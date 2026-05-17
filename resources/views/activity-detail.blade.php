@extends('layouts.app')

@section('title', 'Day Trip to Patnitop - Travel Shravel')

@section('content')
    {{-- Top Header Section --}}
    <section class="bg-gray-50 py-8 border-b border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <nav class="flex mb-6 text-sm text-gray-400">
                <a href="{{ url('/') }}" class="hover:text-navy transition-colors">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ url('/activities') }}" class="hover:text-navy transition-colors">Activities</a>
                <span class="mx-2">/</span>
                <span class="text-navy font-medium">Day Trip to Patnitop</span>
            </nav>
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div>
                    <h1 class="text-3xl md:text-3xl leading-tight mb-3">Day Trip to Patnitop</h1>
                    <div class="flex items-center gap-4">
                        <span class="px-3 py-1 bg-india-green/10 text-india-green text-xs font-semibold rounded-lg uppercase tracking-wider">Day Trip</span>
                        <div class="flex items-center gap-2 text-gray-500 text-sm">
                            <i class="fa-solid fa-location-dot text-india-green"></i>
                            <span>Patnitop, Jammu and Kashmir, India</span>
                        </div>
                        <div class="flex text-saffron text-xs ml-2">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <span class="text-gray-400 text-sm">(4.5 Ratings)</span>
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
                {{-- Slides --}}
                <div class="absolute inset-0 transition-opacity duration-1000 opacity-100" data-slide="0">
                    <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1600&q=80" 
                        alt="Patnitop Landscape" class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" data-slide="1">
                    <img src="https://images.unsplash.com/photo-1617112818585-79b88ef77916?auto=format&fit=crop&w=1600&q=80" 
                        alt="Patnitop View" class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" data-slide="2">
                    <img src="https://images.unsplash.com/photo-1562016600-ece13e8ba570?auto=format&fit=crop&w=1600&q=80" 
                        alt="Nature" class="w-full h-full object-cover">
                </div>

                {{-- Controls --}}
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
                    <div class="w-3 h-3 rounded-full bg-white transition-all cursor-pointer" onclick="goToSlide(0)" id="dot-0"></div>
                    <div class="w-3 h-3 rounded-full bg-white/40 transition-all cursor-pointer" onclick="goToSlide(1)" id="dot-1"></div>
                    <div class="w-3 h-3 rounded-full bg-white/40 transition-all cursor-pointer" onclick="goToSlide(2)" id="dot-2"></div>
                </div>
            </div>

            {{-- Quick Stats Bar --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
                <div class="bg-gray-50 p-6 rounded-2xl flex items-center gap-4 border border-gray-100">
                    <div class="w-12 h-12 bg-navy/5 rounded-2xl flex items-center justify-center text-navy text-xl"><i class="fa-regular fa-clock"></i></div>
                    <div>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Duration</p>
                        <p class="text-md font-semibold">8 Hours</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl flex items-center gap-4 border border-gray-100">
                    <div class="w-12 h-12 bg-navy/5 rounded-2xl flex items-center justify-center text-navy text-xl"><i class="fa-solid fa-ban"></i></div>
                    <div>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Cancellation</p>
                        <p class="text-md font-semibold">Free up to 24h</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl flex items-center gap-4 border border-gray-100">
                    <div class="w-12 h-12 bg-navy/5 rounded-2xl flex items-center justify-center text-navy text-xl"><i class="fa-solid fa-people-group"></i></div>
                    <div>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Group Size</p>
                        <p class="text-md font-semibold">Up to 15 People</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl flex items-center gap-4 border border-gray-100">
                    <div class="w-12 h-12 bg-navy/5 rounded-2xl flex items-center justify-center text-navy text-xl"><i class="fa-solid fa-language"></i></div>
                    <div>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Languages</p>
                        <p class="text-md font-semibold">English, Hindi</p>
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
                            <p>Located in the Udhampur district of Jammu and Kashmir, Patnitop is a famous hill resort perched on a beautiful plateau. Discover the breathtaking scenic views of the Chenab basin and the Pir Panjal range on this guided day trip.</p>
                            <p>This full-day trip will allow you to relax in the meadows, explore the thick forests of Deodar and Pine, and visit the historical Naag Mandir. Suitable for families, couples, and solo travelers seeking a refreshing escape from the city.</p>
                        </div>
                    </div>

                    {{-- Highlights --}}
                    <div>
                        <h2 class="text-2xl font-semibold text-navy mb-8 flex items-center gap-3">
                            <span class="w-2 h-8 bg-india-green rounded-full"></span>
                            Highlights
                        </h2>
                        <ul class="space-y-4">
                            <li class="bg-gray-50 p-5 rounded-2xl border border-gray-100 flex gap-4">
                                <div class="w-8 h-8 rounded-full bg-navy text-white flex-none flex items-center justify-center text-xs font-bold">01</div>
                                <p class="text-gray-600 font-medium">Breathtaking panoramic views of the Shivalik range.</p>
                            </li>
                            <li class="bg-gray-50 p-5 rounded-2xl border border-gray-100 flex gap-4">
                                <div class="w-8 h-8 rounded-full bg-navy text-white flex-none flex items-center justify-center text-xs font-bold">02</div>
                                <p class="text-gray-600 font-medium">Visit the 600-year-old Naag Mandir and experience local spirituality.</p>
                            </li>
                            <li class="bg-gray-50 p-5 rounded-2xl border border-gray-100 flex gap-4">
                                <div class="w-8 h-8 rounded-full bg-navy text-white flex-none flex items-center justify-center text-xs font-bold">03</div>
                                <p class="text-gray-600 font-medium">Explore local parks and take a peaceful walk through the Pine forests.</p>
                            </li>
                        </ul>
                    </div>

                    {{-- Included & Excluded --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h2 class="text-2xl font-semibold text-navy mb-8 flex items-center gap-3">
                                <span class="w-2 h-8 bg-green-500 rounded-full"></span>
                                Included
                            </h2>
                            <ul class="space-y-4">
                                @foreach(['Hotel pickup and drop-off', 'Air-conditioned vehicle', 'Professional local guide', 'All tolls and taxes'] as $item)
                                    <li class="flex items-start gap-3">
                                        <i class="fa-solid fa-circle-check text-green-500 mt-1"></i>
                                        <span class="text-gray-600 font-medium">{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <h2 class="text-2xl font-semibold text-navy mb-8 flex items-center gap-3">
                                <span class="w-2 h-8 bg-red-400 rounded-full"></span>
                                Excluded
                            </h2>
                            <ul class="space-y-4">
                                @foreach(['Meals and beverages', 'Personal expenses', 'Optional activity fees', 'Gratuities'] as $item)
                                    <li class="flex items-start gap-3">
                                        <i class="fa-solid fa-circle-xmark text-red-300 mt-1"></i>
                                        <span class="text-gray-400 font-medium">{{ $item }}</span>
                                    </li>
                                @endforeach
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
                                <p class="text-[13px] opacity-80 mb-1">from <span class="text-2xl font-semibold ml-1">₹2,299.00</span></p>
                            </div>

                            {{-- Tab Switcher --}}
                            <div class="flex border-b border-gray-100">
                                <button onclick="switchTab('book')" id="tab-book" class="flex-1 py-4 text-xs font-bold tracking-widest text-saffron border-b-2 border-saffron transition-all">BOOK</button>
                                <button onclick="switchTab('inquiry')" id="tab-inquiry" class="flex-1 py-4 text-xs font-bold tracking-widest text-gray-400 border-b-2 border-transparent hover:text-gray-600 transition-all">INQUIRY</button>
                            </div>

                            {{-- Book Tab Content --}}
                            <div id="content-book" class="space-y-0">
                                {{-- Date Selector --}}
                                <div class="p-6 border-b border-gray-100 cursor-pointer group relative" onclick="document.getElementById('travel-date-picker').showPicker()">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900 mb-1">Date</p>
                                            <p id="display-date" class="text-[15px] text-navy">15/05/2026</p>
                                        </div>
                                        <i class="fa-solid fa-chevron-down text-xs text-gray-400"></i>
                                    </div>
                                    <input type="date" id="travel-date-picker" class="absolute inset-0 opacity-0 cursor-pointer pointer-events-none" onchange="updateDate(this.value)">
                                </div>

                                {{-- Counters --}}
                                <div class="p-6 space-y-6 border-b border-gray-100">
                                    {{-- Adults --}}
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">Adults</p>
                                            <p class="text-[11px] text-gray-400">Age 12+</p>
                                        </div>
                                        <div class="flex items-center gap-6">
                                            <button onclick="changeCount('adult', -1)" class="text-gray-400 hover:text-navy"><i class="fa-solid fa-minus text-xs"></i></button>
                                            <span id="count-adult" class="text-[15px] text-navy font-semibold min-w-[12px] text-center">1</span>
                                            <button onclick="changeCount('adult', 1)" class="text-gray-400 hover:text-navy"><i class="fa-solid fa-plus text-xs"></i></button>
                                        </div>
                                    </div>
                                    {{-- Children --}}
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">Children</p>
                                            <p class="text-[11px] text-gray-400">Age 3 - 11</p>
                                        </div>
                                        <div class="flex items-center gap-6">
                                            <button onclick="changeCount('child', -1)" class="text-gray-400 hover:text-navy"><i class="fa-solid fa-minus text-xs"></i></button>
                                            <span id="count-child" class="text-[15px] text-navy font-semibold min-w-[12px] text-center">0</span>
                                            <button onclick="changeCount('child', 1)" class="text-gray-400 hover:text-navy"><i class="fa-solid fa-plus text-xs"></i></button>
                                        </div>
                                    </div>
                                    {{-- Infant --}}
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">Infant</p>
                                            <p class="text-[11px] text-gray-400">< 2 years</p>
                                        </div>
                                        <div class="flex items-center gap-6">
                                            <button onclick="changeCount('infant', -1)" class="text-gray-400 hover:text-navy"><i class="fa-solid fa-minus text-xs"></i></button>
                                            <span id="count-infant" class="text-[15px] text-navy font-semibold min-w-[12px] text-center">0</span>
                                            <button onclick="changeCount('infant', 1)" class="text-gray-400 hover:text-navy"><i class="fa-solid fa-plus text-xs"></i></button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Guest Names --}}
                                <div class="p-6 bg-gray-50/50 space-y-4">
                                    <p class="text-[13px] font-semibold text-gray-700">Lead Traveler *</p>
                                    <div class="flex items-center gap-4">
                                        <span class="text-sm text-gray-700 border-b border-gray-200 pb-1 w-8">Mr</span>
                                        <input type="text" placeholder="Full name" class="flex-1 bg-transparent border-b border-gray-200 focus:border-navy outline-none py-1 text-sm text-gray-600 placeholder:text-gray-300 transition-colors">
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

                        {{-- Owner / Hosted By --}}
                        <div class="bg-white rounded-[20px] p-8 border border-gray-100 shadow-sm flex items-center gap-6">
                            <div class="w-16 h-16 rounded-full bg-gray-100 overflow-hidden border border-gray-200">
                                <img src="https://ui-avatars.com/api/?name=Travel+Shravel&background=0D1B2A&color=fff&size=64" alt="Host">
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold mb-1">Hosted By</p>
                                <h4 class="text-lg font-bold text-navy">Travel Shravel</h4>
                                <a href="#" class="text-sm text-india-green font-semibold mt-1 inline-block hover:underline">Ask a question</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Activity's Location --}}
    <section class="py-16 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <h2 class="text-2xl font-semibold text-navy">Activity's Location</h2>
                <div class="flex items-center gap-2 text-gray-500 text-sm">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Patnitop, Jammu and Kashmir, India</span>
                </div>
            </div>
            <div class="w-full rounded-2xl overflow-hidden shadow-sm border border-gray-100 h-[450px]">
                <iframe 
                    src="https://maps.google.com/maps?q=33.0889,75.3267&t=m&z=12&output=embed&iwloc=near" 
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    {{-- FAQs Section --}}
    <section class="py-16 bg-white border-t border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-navy mb-8">FAQs</h2>
            <div class="space-y-4">
                @foreach([['When and where does the tour start?', 'Guests are requested to report to the starting point in Jammu city center by 8:00 AM. Hotel pickups commence prior to this time.'], ['What should I wear?', 'Comfortable walking shoes and layered clothing are recommended, as weather can change in the hills.'], ['Is food included?', 'Food is not included. However, there are multiple stops at local restaurants where you can purchase lunch.']] as $idx => $faq)
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
            <h2 class="text-2xl font-semibold text-navy mb-12">Reviews</h2>
            
            {{-- Review Summary Card --}}
            <div class="bg-white border border-gray-100 rounded-2xl p-8 md:p-12 mb-16 shadow-sm">
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="text-center md:border-r md:border-gray-100 md:pr-12">
                        <div class="text-6xl font-semibold text-[#5D99FF] mb-2">4.5<span class="text-2xl text-gray-300 font-normal">/5</span></div>
                        <div class="text-xl font-semibold text-navy mb-1">Excellent</div>
                        <p class="text-xs text-gray-400">Based on 12 reviews</p>
                    </div>
                    <div class="flex-1 w-full space-y-3">
                        @foreach([['Excellent', 8, '70%'], ['Very Good', 3, '20%'], ['Average', 1, '10%'], ['Poor', 0, '0%'], ['Terrible', 0, '0%']] as $bar)
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
                <p class="text-xs text-gray-400 mb-2">Showing 1 - 3 of 12 in total</p>
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
                                    @foreach(['Service', 'Location', 'Value', 'Guide', 'Overall'] as $cat)
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
                                <button type="submit" class="px-10 py-3.5 bg-[#5D99FF] text-white font-semibold rounded-lg shadow-lg hover:bg-blue-500 transition-all uppercase tracking-wider active:scale-95">
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
            <h2 class="text-3xl font-semibold text-navy mb-12 text-center">Similar Activities</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <x-activity-card 
                    image="https://images.unsplash.com/photo-1617112818585-79b88ef77916?auto=format&fit=crop&q=80&w=800"
                    :featured="true"
                    location="Samba, Jammu and Kashmir, India"
                    title="Day Tour to Mansar Lake"
                    rating="2.6"
                    price="₹1,799.00"
                    duration="6 Hours"
                    link="{{ url('/activity/day-tour-to-mansar-lake') }}"
                />

                <x-activity-card 
                    image="https://images.unsplash.com/photo-1598091383021-15ddea10925d?auto=format&fit=crop&q=80&w=800"
                    :featured="true"
                    location="Jammu, Jammu and Kashmir, India"
                    title="Jammu Local Sightseeing"
                    rating="3.2"
                    price="₹1,149.00"
                    duration="5 Hours"
                    link="{{ url('/activity/jammu-local-sightseeing') }}"
                />

                <x-activity-card 
                    image="https://images.unsplash.com/photo-1579700028741-9457e5b22591?auto=format&fit=crop&q=80&w=800"
                    :featured="false"
                    location="Srinagar, Jammu and Kashmir, India"
                    title="Shikara Ride on Dal Lake"
                    rating="5.0"
                    price="₹999.00"
                    duration="2 Hours"
                    link="{{ url('/activity/shikara-ride-on-dal-lake') }}"
                />
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
            let min = (type === 'adult') ? 1 : 0;
            val = Math.max(min, val + delta);
            el.innerText = val;
        }

        function updateDate(dateStr) {
            if (!dateStr) return;
            const [year, month, day] = dateStr.split('-');
            const formattedDate = `${day}/${month}/${year}`;
            document.getElementById('display-date').innerText = formattedDate;
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
