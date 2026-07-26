@extends('layouts.app')

@section('title', 'Home | Travel Shravel')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .flatpickr-calendar { box-shadow: 0 10px 40px rgba(0,0,0,0.1) !important; border: 1px solid #f3f4f6 !important; border-radius: 24px !important; padding: 10px !important; }
        .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, .flatpickr-day.selected.inRange, .flatpickr-day.startRange.inRange, .flatpickr-day.endRange.inRange, .flatpickr-day.selected:focus, .flatpickr-day.startRange:focus, .flatpickr-day.endRange:focus, .flatpickr-day.selected:hover, .flatpickr-day.startRange:hover, .flatpickr-day.endRange:hover, .flatpickr-day.selected.prevMonthDay, .flatpickr-day.startRange.prevMonthDay, .flatpickr-day.endRange.prevMonthDay, .flatpickr-day.selected.nextMonthDay, .flatpickr-day.startRange.nextMonthDay, .flatpickr-day.endRange.nextMonthDay { background: #4b8df8 !important; border-color: #4b8df8 !important; }
    </style>
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="relative h-[600px] w-full z-10">
        {{-- Background Image --}}
        <div class="absolute inset-0 overflow-hidden">
            <img src="https://www.travelshravel.com/wp-content/uploads/2022/05/banner5.jpg" alt="Hero Background"
                class="h-full w-full object-cover">
            {{-- Shadow Overlay --}}
            <div class="absolute inset-0 bg-black/55"></div>
        </div>

        {{-- Hero Content --}}
        <div class="relative h-full flex flex-col items-start justify-center px-4 pt-10 max-w-5xl mx-auto w-full">
            <h1 class="text-5xl text-white tracking-tight mb-1 drop-shadow-md font-libre-baskerville">
                Hi There!
            </h1>
            <p class="text-lg md:text-xl text-white/90 mb-8 tracking-wide drop-shadow-sm">
                Where would you like to go?
            </p>

            {{-- Search Categories --}}
            <div class="flex items-center gap-6 mb-6">
                <button type="button" onclick="switchHeroTab(this)"
                    class="hero-tab text-sm text-white border-b-2 border-white pb-1 tracking-wider uppercase drop-shadow transition-all">Tours</button>
                <button type="button" onclick="switchHeroTab(this)"
                    class="hero-tab text-sm text-white/80 hover:text-white border-b-2 border-transparent pb-1 tracking-wider uppercase drop-shadow transition-all">Hotel</button>
                <button type="button" onclick="switchHeroTab(this)"
                    class="hero-tab text-sm text-white/80 hover:text-white border-b-2 border-transparent pb-1 tracking-wider uppercase drop-shadow transition-all">Activity</button>
                <button type="button" onclick="switchHeroTab(this)"
                    class="hero-tab text-sm text-white/80 hover:text-white border-b-2 border-transparent pb-1 tracking-wider uppercase drop-shadow transition-all">Rental</button>
                <button type="button" onclick="switchHeroTab(this)"
                    class="hero-tab text-sm text-white/80 hover:text-white border-b-2 border-transparent pb-1 tracking-wider uppercase drop-shadow transition-all">Cars Rental</button>
            </div>

            {{-- Search Component --}}
            <div class="w-full max-w-5xl bg-white rounded-[40px] shadow-2xl p-2 md:p-2.5 relative z-20" id="main-search-bar">
                <div class="flex flex-col md:flex-row items-center w-full relative">
                    
                    {{-- Location Dropdown --}}
                    <div class="relative flex-[1.2] w-full">
                        <button type="button" onclick="toggleDropdown('location-dropdown')" class="flex items-center gap-3 px-6 py-3 w-full hover:bg-gray-50 rounded-[32px] transition-colors text-left focus:outline-none focus:bg-gray-50">
                            <div class="text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[15px] font-semibold text-gray-900 leading-tight mb-0.5">Location</span>
                                <input type="text" id="location-input" readonly placeholder="Where are you going?" class="text-sm text-gray-500 bg-transparent border-none p-0 focus:ring-0 cursor-pointer pointer-events-none truncate max-w-[150px]">
                            </div>
                        </button>
                        
                        {{-- Dropdown Content --}}
                        <div id="location-dropdown" class="search-dropdown hidden absolute top-full left-0 mt-3 w-80 bg-white rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.1)] p-6 z-50 border border-gray-100">
                            <ul class="space-y-2">
                                <li><button type="button" onclick="selectLocation('Australia')" class="w-full text-left text-gray-600 hover:text-[#4b8df8] hover:bg-blue-50 px-4 py-2.5 rounded-xl transition text-[15px]">Australia</button></li>
                                <li><button type="button" onclick="selectLocation('India')" class="w-full text-left text-gray-600 hover:text-[#4b8df8] hover:bg-blue-50 px-4 py-2.5 rounded-xl transition text-[15px]">India</button></li>
                                <li><button type="button" onclick="selectLocation('Andaman')" class="w-full text-left flex items-center gap-3 text-gray-600 hover:text-[#4b8df8] hover:bg-blue-50 px-4 py-2.5 rounded-xl transition text-[15px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                                    Andaman
                                </button></li>
                                <li><button type="button" onclick="selectLocation('Goa')" class="w-full text-left flex items-center gap-3 text-gray-600 hover:text-[#4b8df8] hover:bg-blue-50 px-4 py-2.5 rounded-xl transition text-[15px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                                    Goa
                                </button></li>
                                <li><button type="button" onclick="selectLocation('Himachal Pradesh')" class="w-full text-left flex items-center gap-3 text-gray-600 hover:text-[#4b8df8] hover:bg-blue-50 px-4 py-2.5 rounded-xl transition text-[15px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                                    Himachal Pradesh
                                </button></li>
                                <li><button type="button" onclick="selectLocation('Manali')" class="w-full text-left flex items-center gap-3 text-gray-600 hover:text-[#4b8df8] hover:bg-blue-50 px-4 py-2.5 rounded-xl transition text-[15px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                                    Manali
                                </button></li>
                            </ul>
                        </div>
                    </div>

                    <div class="hidden md:block w-px h-10 bg-gray-200"></div>

                    {{-- Dates Selector --}}
                    <div class="relative flex-[1.8] w-full">
                        <div class="flex items-center w-full px-2 py-3 hover:bg-gray-50 rounded-[32px] transition-colors cursor-pointer focus-within:bg-gray-50" id="date-picker-trigger">
                            <div class="text-gray-400 mx-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" /></svg>
                            </div>
                            <div class="flex flex-col flex-1 min-w-0">
                                <span id="date-label-1" class="text-[15px] font-semibold text-gray-900 leading-tight mb-0.5">Check in</span>
                                <input type="text" id="checkin-date" placeholder="Add date" class="text-sm text-gray-500 bg-transparent border-none p-0 focus:ring-0 cursor-pointer pointer-events-none w-full" readonly>
                            </div>
                            <div class="text-gray-300 mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
                            </div>
                            <div class="text-gray-400 mr-3 ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" /></svg>
                            </div>
                            <div class="flex flex-col flex-1 min-w-0">
                                <span id="date-label-2" class="text-[15px] font-semibold text-gray-900 leading-tight mb-0.5">Check out</span>
                                <input type="text" id="checkout-date" placeholder="Add date" class="text-sm text-gray-500 bg-transparent border-none p-0 focus:ring-0 cursor-pointer pointer-events-none w-full" readonly>
                            </div>
                        </div>
                    </div>

                    <div id="guests-divider" class="hidden md:block w-px h-10 bg-gray-200 transition-all duration-300"></div>

                    {{-- Guests Dropdown --}}
                    <div id="guests-column" class="relative flex-1 w-full transition-all duration-300 overflow-visible">
                        <button type="button" onclick="toggleDropdown('guests-dropdown')" class="flex items-center gap-3 px-6 py-3 w-full hover:bg-gray-50 rounded-[32px] transition-colors text-left focus:outline-none focus:bg-gray-50">
                            <div class="text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>
                            </div>
                            <div class="flex flex-col flex-1">
                                <span class="text-[15px] font-semibold text-gray-900 leading-tight mb-0.5">Guests</span>
                                <input type="text" id="guests-input" value="1 guest, 1 room" readonly class="text-sm text-gray-500 bg-transparent border-none p-0 focus:ring-0 cursor-pointer pointer-events-none truncate max-w-[120px]">
                            </div>
                        </button>

                        {{-- Dropdown Content --}}
                        <div id="guests-dropdown" class="search-dropdown hidden absolute top-full right-0 mt-3 w-80 bg-white rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.1)] p-6 z-50 border border-gray-100">
                            <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                                <div class="font-medium text-[15px] text-gray-900">Rooms</div>
                                <div class="flex items-center gap-4">
                                    <button type="button" onclick="updateGuest('rooms', -1, event)" class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-500 hover:border-gray-800 hover:text-gray-800 transition"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" /></svg></button>
                                    <span id="rooms-count" class="w-4 text-center font-medium">1</span>
                                    <button type="button" onclick="updateGuest('rooms', 1, event)" class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-500 hover:border-gray-800 hover:text-gray-800 transition"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg></button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between py-4 border-b border-gray-100">
                                <div class="font-medium text-[15px] text-gray-900">Adults</div>
                                <div class="flex items-center gap-4">
                                    <button type="button" onclick="updateGuest('adults', -1, event)" class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-500 hover:border-gray-800 hover:text-gray-800 transition"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" /></svg></button>
                                    <span id="adults-count" class="w-4 text-center font-medium">1</span>
                                    <button type="button" onclick="updateGuest('adults', 1, event)" class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-500 hover:border-gray-800 hover:text-gray-800 transition"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg></button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between pt-4">
                                <div class="font-medium text-[15px] text-gray-900">Children</div>
                                <div class="flex items-center gap-4">
                                    <button type="button" onclick="updateGuest('children', -1, event)" class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-500 hover:border-gray-800 hover:text-gray-800 transition"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" /></svg></button>
                                    <span id="children-count" class="w-4 text-center font-medium">0</span>
                                    <button type="button" onclick="updateGuest('children', 1, event)" class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-500 hover:border-gray-800 hover:text-gray-800 transition"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Search Button --}}
                    <div class="pr-2 pl-2 md:pl-0 w-full md:w-auto pb-2 md:pb-0 pt-2 md:pt-0">
                        <button class="w-full md:w-auto bg-[#4b8df8] hover:bg-blue-600 text-white font-medium py-3.5 px-8 md:px-10 rounded-[32px] transition-all active:scale-95 flex items-center justify-center gap-2 text-[15px] shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-saffron font-bold tracking-wider uppercase text-sm">Why Choose Us</span>
                <h2 class="text-3xl md:text-4xl font-bold text-navy mt-2">Experience The Best Travel Services</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Feature 1 --}}
                <div class="text-center p-10 rounded-3xl hover:-translate-y-2 transition-all duration-300 bg-white shadow-sm hover:shadow-xl border border-gray-100 group">
                    <div class="w-20 h-20 bg-navy/5 text-navy rounded-2xl flex items-center justify-center mx-auto mb-8 text-3xl group-hover:bg-navy group-hover:text-white transition-all duration-300 rotate-3 group-hover:rotate-0">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Worldwide Coverage</h3>
                    <p class="text-gray-500 leading-relaxed">Discover hidden gems and iconic landmarks across the globe with our extensive network of premium partners.</p>
                </div>
                {{-- Feature 2 --}}
                <div class="text-center p-10 rounded-3xl hover:-translate-y-2 transition-all duration-300 bg-white shadow-sm hover:shadow-xl border border-gray-100 group">
                    <div class="w-20 h-20 bg-saffron/10 text-saffron rounded-2xl flex items-center justify-center mx-auto mb-8 text-3xl group-hover:bg-saffron group-hover:text-white transition-all duration-300 -rotate-3 group-hover:rotate-0">
                        <i class="fa-solid fa-tags"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Competitive Pricing</h3>
                    <p class="text-gray-500 leading-relaxed">Enjoy luxury experiences without the premium price tag. We guarantee the best value for your hard-earned money.</p>
                </div>
                {{-- Feature 3 --}}
                <div class="text-center p-10 rounded-3xl hover:-translate-y-2 transition-all duration-300 bg-white shadow-sm hover:shadow-xl border border-gray-100 group">
                    <div class="w-20 h-20 bg-india-green/10 text-india-green rounded-2xl flex items-center justify-center mx-auto mb-8 text-3xl group-hover:bg-india-green group-hover:text-white transition-all duration-300 rotate-3 group-hover:rotate-0">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">24/7 Premium Support</h3>
                    <p class="text-gray-500 leading-relaxed">Travel with absolute peace of mind knowing our dedicated expert support team is available round-the-clock.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Top Destinations Section --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div>
                    <span class="text-saffron font-bold tracking-wider uppercase text-sm">Top Destinations</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-navy mt-2">Popular Destinations</h2>
                </div>
                <a href="#" class="text-navy font-semibold hover:text-saffron transition-colors flex items-center gap-2 group">
                    View All Destinations <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                {{-- Main Large Item --}}
                <a href="#" class="md:col-span-2 md:row-span-2 relative group overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all h-[400px] md:h-auto">
                    <img src="https://images.unsplash.com/photo-1562016600-ece13e8ba570?auto=format&fit=crop&q=80&w=1200" alt="Jammu and Kashmir" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-8 w-full">
                        <div class="bg-white/20 backdrop-blur-md w-fit px-3 py-1 rounded-full text-xs font-bold text-white mb-3">Featured</div>
                        <h3 class="text-3xl font-bold text-white mb-2 drop-shadow-md">Jammu & Kashmir</h3>
                        <p class="text-sm text-gray-200 font-medium">40 Tours • 8 Activities</p>
                    </div>
                </a>

                {{-- Other Items --}}
                <a href="#" class="relative group overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all h-64 md:h-60">
                    <img src="https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?auto=format&fit=crop&q=80&w=800" alt="Kerala" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-xl font-bold text-white mb-1 drop-shadow-md">Kerala</h3>
                        <p class="text-xs text-gray-300 font-medium">7 Tours</p>
                    </div>
                </a>

                <a href="#" class="relative group overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all h-64 md:h-60">
                    <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&q=80&w=800" alt="Bali" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-xl font-bold text-white mb-1 drop-shadow-md">Bali</h3>
                        <p class="text-xs text-gray-300 font-medium">3 Tours</p>
                    </div>
                </a>

                <a href="#" class="relative group overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all h-64 md:h-60">
                    <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&q=80&w=800" alt="Dubai" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-xl font-bold text-white mb-1 drop-shadow-md">Dubai</h3>
                        <p class="text-xs text-gray-300 font-medium">2 Tours</p>
                    </div>
                </a>

                <a href="#" class="relative group overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all h-64 md:h-60">
                    <img src="https://images.unsplash.com/photo-1543731068-7e0f5beff43a?auto=format&fit=crop&q=80&w=800" alt="Mauritius" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-xl font-bold text-white mb-1 drop-shadow-md">Mauritius</h3>
                        <p class="text-xs text-gray-300 font-medium">8 Tours</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    {{-- Packages & Deals Section --}}
    <section class="py-20 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-saffron font-bold tracking-wider uppercase text-sm">Best Offers</span>
                <h2 class="text-3xl md:text-4xl font-bold text-navy mt-2">Featured Packages & Deals</h2>
            </div>

            {{-- Tabs --}}
            <div class="flex flex-wrap justify-center gap-3 mb-12 bg-white p-2 rounded-full shadow-sm w-fit mx-auto border border-gray-100">
                <button id="btn-tour" onclick="switchCategory('tour')"
                    class="px-8 py-3 rounded-full bg-navy text-white font-semibold transition-all tab-btn active">Tours</button>
                <button id="btn-hotel" onclick="switchCategory('hotel')"
                    class="px-8 py-3 rounded-full bg-transparent text-gray-600 font-semibold hover:text-navy hover:bg-gray-50 transition-all tab-btn">Hotels</button>
                <button id="btn-activity" onclick="switchCategory('activity')"
                    class="px-8 py-3 rounded-full bg-transparent text-gray-600 font-semibold hover:text-navy hover:bg-gray-50 transition-all tab-btn">Activities</button>
                <button id="btn-car" onclick="switchCategory('car')"
                    class="px-8 py-3 rounded-full bg-transparent text-gray-600 font-semibold hover:text-navy hover:bg-gray-50 transition-all tab-btn">Cars</button>
            </div>

            {{-- Tours Grid --}}
            <div id="grid-tour" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 category-grid">
                @forelse($featuredTours as $tour)
                    <x-tour-card 
                        :image="$tour->primary_image ?: (!empty($tour->images) && is_array($tour->images) ? $tour->images[0] : 'https://images.unsplash.com/photo-1595815771614-ade9d652a65d?auto=format&fit=crop&q=80&w=800')"
                        :featured="true"
                        :title="$tour->title"
                        :location="$tour->location"
                        :price="'₹' . number_format($tour->price, 2)"
                        :duration="($tour->duration_nights > 0 ? $tour->duration_nights . ' Nights' : 'Day Tour')"
                        :link="url('/tour/' . $tour->slug)"
                    />
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-gray-100">
                        <i class="fa-solid fa-suitcase-rolling text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 font-medium">No featured tours available at the moment.</p>
                    </div>
                @endforelse
            </div>
            
            <div id="pagination-tour" class="mt-12 flex justify-center items-center pagination-container">
                {{ $featuredTours->links() }}
            </div>

            {{-- Hotels Grid --}}
            <div id="grid-hotel" class="hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 category-grid">
                @forelse($featuredHotels as $hotel)
                    <x-hotel-card 
                        :image="$hotel->primary_image ?: (!empty($hotel->images) && is_array($hotel->images) ? $hotel->images[0] : 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&q=80&w=800')"
                        :title="$hotel->name"
                        :location="$hotel->city . ', ' . $hotel->state"
                        :stars="$hotel->star_rating ?? 3"
                        :featured="true"
                        :price="'₹' . number_format($hotel->price, 2)"
                        :link="url('/hotel/' . $hotel->slug)"
                    />
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-gray-100">
                        <i class="fa-solid fa-hotel text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 font-medium">No featured hotels available at the moment.</p>
                    </div>
                @endforelse
            </div>
            
            <div id="pagination-hotel" class="hidden mt-12 flex justify-center items-center pagination-container">
                {{ $featuredHotels->links() }}
            </div>

            {{-- Activity Grid --}}
            <div id="grid-activity" class="hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 category-grid">
                @forelse($featuredActivities as $activity)
                    <x-activity-card 
                        :image="$activity->primary_image ?: (!empty($activity->images) && is_array($activity->images) ? $activity->images[0] : 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&q=80&w=800')"
                        :featured="true"
                        :location="$activity->location ?? $activity->city"
                        :title="$activity->title"
                        rating="4.5"
                        :price="'₹' . number_format($activity->price, 2)"
                        :duration="$activity->duration_hours . ' Hours'"
                        :link="url('/activity/' . $activity->slug)"
                    />
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-gray-100">
                        <i class="fa-solid fa-person-hiking text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 font-medium">No featured activities available at the moment.</p>
                    </div>
                @endforelse
            </div>
            
            <div id="pagination-activity" class="hidden mt-12 flex justify-center items-center pagination-container">
                {{ $featuredActivities->links() }}
            </div>

            {{-- Car Grid --}}
            <div id="grid-car" class="hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 category-grid">
                @forelse($featuredCars as $car)
                    <x-car-card 
                        :image="$car->primary_image ?: (!empty($car->images) && is_array($car->images) ? $car->images[0] : 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?auto=format&fit=crop&q=80&w=800')"
                        :featured="true"
                        :type="$car->category"
                        :title="$car->name"
                        :pax="$car->passengers"
                        :transmission="$car->transmission"
                        :bags="$car->bags"
                        :doors="$car->doors"
                        :price="'₹' . number_format($car->price, 0)"
                        :link="url('/car/' . $car->slug)"
                    />
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-gray-100">
                        <i class="fa-solid fa-car text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 font-medium">No featured cars available at the moment.</p>
                    </div>
                @endforelse
            </div>
            
            <div id="pagination-car" class="hidden mt-12 flex justify-center items-center pagination-container">
                {{ $featuredCars->links() }}
            </div>
        </div>
    </section>

    {{-- Testimonials Section --}}
    <section class="py-20 bg-white overflow-hidden relative">
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-saffron/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-96 h-96 bg-navy/10 rounded-full blur-3xl"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-saffron font-bold tracking-wider uppercase text-sm">Testimonials</span>
                <h2 class="text-3xl md:text-4xl font-bold text-navy mt-2">What Our Clients Say</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Review 1 --}}
                <div class="bg-white p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-50 relative">
                    <div class="text-saffron text-4xl absolute top-6 right-8 opacity-20"><i class="fa-solid fa-quote-right"></i></div>
                    <div class="flex items-center gap-2 text-saffron mb-4 text-sm">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"Our trip to Bali was absolutely perfect. Travel Shravel handled everything seamlessly, from flights to accommodations. Highly recommend!"</p>
                    <div class="flex items-center gap-4">
                        <img src="https://ui-avatars.com/api/?name=Sarah+Johnson&background=random" alt="User" class="w-12 h-12 rounded-full">
                        <div>
                            <h4 class="font-bold text-gray-900">Sarah Johnson</h4>
                            <p class="text-xs text-gray-500">Traveler</p>
                        </div>
                    </div>
                </div>
                {{-- Review 2 --}}
                <div class="bg-white p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-50 relative">
                    <div class="text-saffron text-4xl absolute top-6 right-8 opacity-20"><i class="fa-solid fa-quote-right"></i></div>
                    <div class="flex items-center gap-2 text-saffron mb-4 text-sm">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"The best travel agency I've ever used. The attention to detail in our Kashmir itinerary was outstanding. Will definitely book again."</p>
                    <div class="flex items-center gap-4">
                        <img src="https://ui-avatars.com/api/?name=Michael+Chen&background=random" alt="User" class="w-12 h-12 rounded-full">
                        <div>
                            <h4 class="font-bold text-gray-900">Michael Chen</h4>
                            <p class="text-xs text-gray-500">Traveler</p>
                        </div>
                    </div>
                </div>
                {{-- Review 3 --}}
                <div class="bg-white p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-50 relative">
                    <div class="text-saffron text-4xl absolute top-6 right-8 opacity-20"><i class="fa-solid fa-quote-right"></i></div>
                    <div class="flex items-center gap-2 text-saffron mb-4 text-sm">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star-half-stroke"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"Great prices and excellent customer service. They helped us find a last-minute luxury hotel in Dubai that fit our budget perfectly."</p>
                    <div class="flex items-center gap-4">
                        <img src="https://ui-avatars.com/api/?name=Emma+Williams&background=random" alt="User" class="w-12 h-12 rounded-full">
                        <div>
                            <h4 class="font-bold text-gray-900">Emma Williams</h4>
                            <p class="text-xs text-gray-500">Traveler</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA / Newsletter Section --}}
    <section class="py-20 relative">
        <div class="absolute inset-0 bg-navy">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        </div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">Ready for your next adventure?</h2>
            <p class="text-gray-300 mb-10 max-w-2xl mx-auto text-lg">Subscribe to our newsletter to receive exclusive offers, travel tips, and early access to our premium holiday packages.</p>
            
            <form class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">
                <input type="email" placeholder="Enter your email address" class="flex-1 px-6 py-4 rounded-full border-none focus:ring-2 focus:ring-saffron text-gray-800 shadow-lg" required>
                <button type="submit" class="bg-saffron hover:bg-yellow-500 text-white font-bold py-4 px-10 rounded-full transition-all active:scale-95 shadow-lg shadow-saffron/30">
                    Subscribe Now
                </button>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if there is an active tab in the URL
            const urlParams = new URLSearchParams(window.location.search);
            let activeCategory = 'tour'; // Default
            
            if (urlParams.has('hotel_page')) {
                activeCategory = 'hotel';
            } else if (urlParams.has('activity_page')) {
                activeCategory = 'activity';
            } else if (urlParams.has('car_page')) {
                activeCategory = 'car';
            }
            
            switchCategory(activeCategory);
        });

        function switchCategory(category) {
            // Update active button state
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('bg-navy', 'text-white');
                btn.classList.add('bg-transparent', 'text-gray-600');
            });
            const activeBtn = document.getElementById(`btn-${category}`);
            if (activeBtn) {
                activeBtn.classList.add('bg-navy', 'text-white');
                activeBtn.classList.remove('bg-transparent', 'text-gray-600', 'hover:bg-gray-50', 'hover:text-navy');
            } else {
                // re-add hover classes to inactive buttons
                document.querySelectorAll('.tab-btn:not(.active)').forEach(btn => {
                     btn.classList.add('hover:bg-gray-50', 'hover:text-navy');
                });
            }

            // Toggle grid visibility
            document.querySelectorAll('.category-grid').forEach(grid => {
                grid.classList.add('hidden');
                // add simple fade in animation
                grid.classList.remove('animate-[fade-in_0.3s_ease-out]');
            });
            const activeGrid = document.getElementById(`grid-${category}`);
            if (activeGrid) {
                activeGrid.classList.remove('hidden');
                // trigger reflow
                void activeGrid.offsetWidth;
                activeGrid.classList.add('animate-[fade-in_0.3s_ease-out]');
            }
            
            // Toggle pagination visibility
            document.querySelectorAll('.pagination-container').forEach(pagination => {
                pagination.classList.add('hidden');
            });
            const activePagination = document.getElementById(`pagination-${category}`);
            if (activePagination) {
                activePagination.classList.remove('hidden');
            }
        }

        function switchHeroTab(element) {
            document.querySelectorAll('.hero-tab').forEach(tab => {
                tab.classList.remove('text-white', 'border-white');
                tab.classList.add('text-white/80', 'border-transparent');
            });
            element.classList.remove('text-white/80', 'border-transparent');
            element.classList.add('text-white', 'border-white');
            
            // Dynamic Form Fields Logic
            const tabText = element.innerText.trim().toLowerCase();
            const guestsColumn = document.getElementById('guests-column');
            const guestsDivider = document.getElementById('guests-divider');
            const dateLabel1 = document.getElementById('date-label-1');
            const dateLabel2 = document.getElementById('date-label-2');

            if (tabText === 'tours' || tabText === 'activity') {
                guestsColumn.style.display = 'none';
                guestsDivider.style.display = 'none';
                dateLabel1.innerText = 'Date';
                dateLabel2.innerText = 'Checkout';
            } else if (tabText === 'cars rental') {
                guestsColumn.style.display = 'none';
                guestsDivider.style.display = 'none';
                dateLabel1.innerText = 'Pickup';
                dateLabel2.innerText = 'Drop off';
            } else {
                // Hotel, Rental
                guestsColumn.style.display = '';
                guestsDivider.style.display = ''; 
                dateLabel1.innerText = 'Check in';
                dateLabel2.innerText = 'Check out';
            }
        }
        
        // Search Dropdown Logic
        let currentGuestState = { rooms: 1, adults: 1, children: 0 };

        function toggleDropdown(id) {
            // Close all dropdowns first
            document.querySelectorAll('.search-dropdown').forEach(el => {
                if(el.id !== id) el.classList.add('hidden');
            });
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('hidden');
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('#main-search-bar')) {
                document.querySelectorAll('.search-dropdown').forEach(el => {
                    el.classList.add('hidden');
                });
            }
        });

        function selectLocation(loc) {
            document.getElementById('location-input').value = loc;
            document.getElementById('location-dropdown').classList.add('hidden');
        }

        function updateGuest(type, change, event) {
            event.stopPropagation();
            const newVal = currentGuestState[type] + change;
            if (newVal < 0) return;
            if (type === 'rooms' && newVal < 1) return;
            if (type === 'adults' && newVal < 1) return;

            currentGuestState[type] = newVal;
            document.getElementById(`${type}-count`).innerText = newVal;
            
            const totalGuests = currentGuestState.adults + currentGuestState.children;
            const guestStr = totalGuests === 1 ? '1 guest' : `${totalGuests} guests`;
            const roomStr = currentGuestState.rooms === 1 ? '1 room' : `${currentGuestState.rooms} rooms`;
            
            document.getElementById('guests-input').value = `${guestStr}, ${roomStr}`;
        }
    </script>
    
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Trigger logic for the default active tab on load
            const activeTab = document.querySelector('.hero-tab.text-white');
            if (activeTab) {
                switchHeroTab(activeTab);
            }

            flatpickr("#date-picker-trigger", {
                mode: "range",
                minDate: "today",
                showMonths: window.innerWidth > 768 ? 2 : 1,
                dateFormat: "d/m/Y",
                onChange: function(selectedDates, dateStr, instance) {
                    if (selectedDates.length > 0) {
                        const checkIn = selectedDates[0];
                        document.getElementById('checkin-date').value = instance.formatDate(checkIn, "d/m/Y");
                    } else {
                        document.getElementById('checkin-date').value = "";
                    }
                    
                    if (selectedDates.length > 1) {
                        const checkOut = selectedDates[1];
                        document.getElementById('checkout-date').value = instance.formatDate(checkOut, "d/m/Y");
                    } else {
                        document.getElementById('checkout-date').value = "";
                    }
                }
            });
        });
    </script>
    @endpush
@endsection
