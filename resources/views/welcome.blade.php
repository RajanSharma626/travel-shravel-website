@extends('layouts.app')

@section('title', 'Home | Travel Shravel')

@section('content')
    {{-- Hero Section --}}
    <section class="relative h-[600px] w-full overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0">
            <img src="https://www.travelshravel.com/wp-content/uploads/2022/05/banner5.jpg" alt="Hero Background"
                class="h-full w-full object-cover">
            {{-- Backdrop Overlay --}}
            <div class="absolute inset-0 bg-black/50 backdrop-blur-[3px]"></div>
        </div>

        {{-- Hero Content --}}
        <div class="relative h-full flex flex-col items-center justify-center px-4">
            <h1 class="text-5xl  text-white tracking-tight mb-4 drop-shadow-md font-libre-baskerville">
                Hi There!
            </h1>
            <p class="text-lg md:text-xl text-white/90 mb-12 tracking-wide drop-shadow-sm">
                Where would you like to go?
            </p>

            {{-- Search Categories --}}
            <div class="flex items-center gap-6 mb-6">
                <a href="#"
                    class="text-sm text-white border-b-2 border-white pb-1 tracking-wider uppercase">Tours</a>
                <a href="#"
                    class="text-sm text-white/80 hover:text-white transition pb-1 tracking-wider uppercase">Hotel</a>
                <a href="#"
                    class="text-sm text-white/80 hover:text-white transition pb-1 tracking-wider uppercase">Activity</a>
                <a href="#"
                    class="text-sm text-white/80 hover:text-white transition pb-1 tracking-wider uppercase">Rental</a>
                <a href="#"
                    class="text-sm text-white/80 hover:text-white transition pb-1 tracking-wider uppercase">Cars
                    Rental</a>
            </div>

            {{-- Search Bar --}}
            <div
                class="w-full max-w-5xl bg-white rounded-full shadow-2xl p-2 md:p-3 flex flex-col md:flex-row items-center gap-4">
                {{-- Location --}}
                <div class="flex-1 flex items-center gap-4 px-6 py-2 border-r border-gray-100 group cursor-pointer w-full">
                    <i class="fa-solid fa-location-dot text-gray-400 group-hover:text-saffron transition-colors"></i>
                    <div class="text-left">
                        <p class="text-xs font-semibold text-gray-900 uppercase tracking-tighter">Location</p>
                        <input type="text" placeholder="Where are you going?"
                            class="w-full bg-transparent border-none p-0 text-sm text-gray-500 placeholder:text-gray-400 focus:ring-0">
                    </div>
                </div>

                {{-- Date --}}
                <div class="flex-1 flex items-center gap-4 px-6 py-2 border-r border-gray-100 group cursor-pointer w-full">
                    <i class="fa-regular fa-calendar text-gray-400 group-hover:text-saffron transition-colors"></i>
                    <div class="text-left">
                        <p class="text-xs font-semibold text-gray-900 uppercase tracking-tighter">Date</p>
                        <p class="text-sm text-gray-500">Add date</p>
                    </div>
                    <i class="fa-solid fa-arrow-right text-[10px] text-gray-300 ml-auto"></i>
                </div>

                {{-- Check out --}}
                <div class="flex-1 flex items-center gap-4 px-6 py-2 group cursor-pointer w-full">
                    <i class="fa-regular fa-calendar-check text-gray-400 group-hover:text-saffron transition-colors"></i>
                    <div class="text-left">
                        <p class="text-xs font-semibold text-gray-900 uppercase tracking-tighter">Check out</p>
                        <p class="text-sm text-gray-500">Add date</p>
                    </div>
                </div>

                {{-- Search Button --}}
                <div class="md:w-1/4 pl-4 border-l border-gray-100">
                    <button
                        class="w-full bg-india-green text-white  py-4 px-8 rounded-full shadow-lg shadow-india-green/20 hover:bg-india-green/90 transition-all active:scale-95">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Promotions Section --}}
    <section class="py-16 md:py-24 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                {{-- Card 1: Special Offers (Tours) --}}
                <div
                    class="relative group h-[500px] overflow-hidden rounded-xl shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <img src="https://www.travelshravel.com/wp-content/uploads/2022/05/world-map.jpg" alt="Special Offers"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    {{-- Sepia/Warm Overlay --}}
                    <div
                        class="absolute inset-0 bg-orange-900/40 mix-blend-multiply group-hover:bg-orange-800/30 transition-all">
                    </div>

                    <div
                        class="relative h-full flex flex-col justify-center items-center text-center p-8 group-hover:bg-black/10 transition-all duration-500">
                        <span
                            class="absolute top-6 left-6 bg-india-green text-white text-[10px] font-black uppercase tracking-[0.2em] px-4 py-1.5 rounded-sm shadow-lg">
                            Holiday Sale
                        </span>
                        <h3 class="text-4xl font-bold text-white mb-4 drop-shadow-lg">Special Offers</h3>
                        <p class="text-white/90 text-sm font-medium max-w-[240px] leading-relaxed mb-8 drop-shadow-md">
                            Find Your Perfect Tour Packages. Get the best prices on 100+ destinations.
                        </p>
                        <a href="#"
                            class="inline-block border-2 border-white text-white font-bold text-xs uppercase tracking-widest px-8 py-3 rounded-sm hover:bg-white hover:text-orange-900 transition-all duration-300">
                            See Deals
                        </a>
                    </div>
                </div>

                {{-- Card 2: Newsletters --}}
                <div
                    class="relative group h-[500px] overflow-hidden rounded-xl shadow-lg transition-all duration-500 hover:-translate-y-2 border-4 border-black">
                    {{-- Pattern Background --}}
                    <div class="absolute inset-0 bg-[#4A3219]">
                        <img src="https://www.travelshravel.com/wp-content/uploads/2022/05/newsletters.jpg"
                            class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                        {{-- Abstract Pattern Placeholder via background --}}
                        <div
                            class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,_rgba(0,0,0,0.4)_0%,_transparent_50%)]">
                        </div>
                    </div>

                    <div class="relative h-full flex flex-col justify-center items-center text-center p-8">
                        <span
                            class="absolute top-6 left-6 bg-india-green text-white text-[10px] font-black uppercase tracking-[0.2em] px-4 py-1.5 rounded-sm shadow-lg">
                            Holiday Sale
                        </span>
                        <h3 class="text-4xl font-bold text-white mb-4">Newsletters</h3>
                        <p class="text-white/80 text-sm font-medium max-w-[240px] leading-relaxed mb-8">
                            Join for free and get our tailored newsletters full of hot travel deals.
                        </p>
                        <a href="#"
                            class="inline-block border-2 border-white text-white font-bold text-xs uppercase tracking-widest px-8 py-3 rounded-sm hover:bg-white hover:text-orange-950 transition-all duration-300">
                            Sign Up
                        </a>
                    </div>
                </div>

                {{-- Card 3: Special Offers (Hotels) --}}
                <div
                    class="relative group h-[500px] overflow-hidden rounded-xl shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <img src="https://www.travelshravel.com/wp-content/uploads/2022/05/hotel-deals.jpg" alt="Hotel Offers"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    {{-- Sepia/Warm Overlay --}}
                    <div
                        class="absolute inset-0 bg-orange-950/50 mix-blend-multiply group-hover:bg-orange-900/40 transition-all">
                    </div>

                    <div
                        class="relative h-full flex flex-col justify-center items-center text-center p-8 group-hover:bg-black/10 transition-all duration-500">
                        <span
                            class="absolute top-6 left-6 bg-india-green text-white text-[10px] font-black uppercase tracking-[0.2em] px-4 py-1.5 rounded-sm shadow-lg">
                            Holiday Sale
                        </span>
                        <h3 class="text-4xl font-bold text-white mb-4 drop-shadow-lg">Special Offers</h3>
                        <p class="text-white/90 text-sm font-medium max-w-[240px] leading-relaxed mb-8 drop-shadow-md">
                            Find Your Perfect Hotels. Get the best prices on 20,000+ properties.
                        </p>
                        <a href="#"
                            class="inline-block border-2 border-white text-white font-bold text-xs uppercase tracking-widest px-8 py-3 rounded-sm hover:bg-white hover:text-orange-950 transition-all duration-300">
                            See Deals
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Top Destinations Section --}}
    <section class="py-16 bg-gray-50/50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-semibold text-india-green tracking-tight">Top Destinations</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Kerala --}}
                <a href="#"
                    class="relative group h-72 overflow-hidden rounded-xl shadow-md transition-all duration-300 hover:shadow-xl">
                    <img src="https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?auto=format&fit=crop&q=80&w=800"
                        alt="Kerala"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 transition-opacity group-hover:bg-black/40"></div>
                    <div class="relative h-full flex flex-col items-center justify-center text-center p-4">
                        <h3 class="text-2xl font-semibold text-white mb-1 drop-shadow-md">Kerala</h3>
                        <p class="text-sm text-white/90 font-medium">7 Tours</p>
                    </div>
                </a>

                {{-- Andaman --}}
                <a href="#"
                    class="relative group h-72 overflow-hidden rounded-xl shadow-md transition-all duration-300 hover:shadow-xl">
                    <img src="https://images.unsplash.com/photo-1642498232612-a837df233825?auto=format&fit=crop&q=80&w=800"
                        alt="Andaman"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 transition-opacity group-hover:bg-black/40"></div>
                    <div class="relative h-full flex flex-col items-center justify-center text-center p-4">
                        <h3 class="text-2xl font-semibold text-white mb-1 drop-shadow-md">Andaman</h3>
                        <p class="text-sm text-white/90 font-medium">5 Tours</p>
                    </div>
                </a>

                {{-- Thailand --}}
                <a href="#"
                    class="relative group h-72 overflow-hidden rounded-xl shadow-md transition-all duration-300 hover:shadow-xl">
                    <img src="https://images.unsplash.com/photo-1519451241324-20b4ea2c4220?auto=format&fit=crop&q=80&w=800"
                        alt="Thailand"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 transition-opacity group-hover:bg-black/40"></div>
                    <div class="relative h-full flex flex-col items-center justify-center text-center p-4">
                        <h3 class="text-2xl font-semibold text-white mb-1 drop-shadow-md">Thailand</h3>
                        <p class="text-sm text-white/90 font-medium">3 Tours</p>
                    </div>
                </a>

                {{-- Jammu and Kashmir --}}
                <a href="#"
                    class="relative group h-72 overflow-hidden rounded-xl shadow-md transition-all duration-300 hover:shadow-xl">
                    <img src="https://images.unsplash.com/photo-1562016600-ece13e8ba570?auto=format&fit=crop&q=80&w=800"
                        alt="Jammu and Kashmir"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 transition-opacity group-hover:bg-black/40"></div>
                    <div class="relative h-full flex flex-col items-center justify-center text-center p-4">
                        <h3 class="text-2xl font-bold text-white mb-1 drop-shadow-md px-2">Jammu and Kashmir</h3>
                        <p class="text-[10px] text-white/90 font-medium uppercase tracking-tighter">
                            8 Activities • 7 Cars • 2 Hotels • 40 Tours
                        </p>
                    </div>
                </a>

                {{-- Odisha --}}
                <a href="#"
                    class="relative group h-72 overflow-hidden rounded-xl shadow-md transition-all duration-300 hover:shadow-xl">
                    <img src="https://images.unsplash.com/photo-1707241934268-5a0c8e206d9c?auto=format&fit=crop&q=80&w=800"
                        alt="Odisha"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 transition-opacity group-hover:bg-black/40"></div>
                    <div class="relative h-full flex flex-col items-center justify-center text-center p-4">
                        <h3 class="text-2xl font-semibold text-white mb-1 drop-shadow-md">Odisha</h3>
                        <p class="text-sm text-white/90 font-medium">3 Tours</p>
                    </div>
                </a>

                {{-- Dubai --}}
                <a href="#"
                    class="relative group h-72 overflow-hidden rounded-xl shadow-md transition-all duration-300 hover:shadow-xl">
                    <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&q=80&w=800"
                        alt="Dubai"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 transition-opacity group-hover:bg-black/40"></div>
                    <div class="relative h-full flex flex-col items-center justify-center text-center p-4">
                        <h3 class="text-2xl font-semibold text-white mb-1 drop-shadow-md">Dubai</h3>
                        <p class="text-sm text-white/90 font-medium">2 Tours</p>
                    </div>
                </a>

                {{-- Malaysia --}}
                <a href="#"
                    class="relative group h-72 overflow-hidden rounded-xl shadow-md transition-all duration-300 hover:shadow-xl">
                    <img src="https://images.unsplash.com/photo-1596018138885-b88eb554411c?auto=format&fit=crop&q=80&w=800"
                        alt="Malaysia"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 transition-opacity group-hover:bg-black/40"></div>
                    <div class="relative h-full flex flex-col items-center justify-center text-center p-4">
                        <h3 class="text-2xl font-semibold text-white mb-1 drop-shadow-md">Malaysia</h3>
                        <p class="text-sm text-white/90 font-medium">1 Tour</p>
                    </div>
                </a>

                {{-- Mauritius --}}
                <a href="#"
                    class="relative group h-72 overflow-hidden rounded-xl shadow-md transition-all duration-300 hover:shadow-xl">
                    <img src="https://images.unsplash.com/photo-1543731068-7e0f5beff43a?auto=format&fit=crop&q=80&w=800"
                        alt="Mauritius"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 transition-opacity group-hover:bg-black/40"></div>
                    <div class="relative h-full flex flex-col items-center justify-center text-center p-4">
                        <h3 class="text-2xl font-semibold text-white mb-1 drop-shadow-md">Mauritius</h3>
                        <p class="text-sm text-white/90 font-medium">8 Tours</p>
                    </div>
                </a>

                {{-- Bali --}}
                <a href="#"
                    class="relative group h-72 overflow-hidden rounded-xl shadow-md transition-all duration-300 hover:shadow-xl">
                    <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&q=80&w=800"
                        alt="Bali"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 transition-opacity group-hover:bg-black/40"></div>
                    <div class="relative h-full flex flex-col items-center justify-center text-center p-4">
                        <h3 class="text-2xl font-semibold text-white mb-1 drop-shadow-md">Bali</h3>
                        <p class="text-sm text-white/90 font-medium">3 Tours</p>
                    </div>
                </a>

            </div>
        </div>
    </section>

    {{-- Packages & Deals Section --}}
    <section class="py-16 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Tabs --}}
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button
                    class="px-8 py-2.5 rounded-md bg-india-green text-white shadow-sm transition-all hover:bg-india-green/90">Tour</button>
                <button
                    class="px-8 py-2.5 rounded-md bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 transition-all">Hotel</button>
                <button
                    class="px-8 py-2.5 rounded-md bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 transition-all">Activity</button>
                <button
                    class="px-8 py-2.5 rounded-md bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 transition-all">Car</button>
            </div>

            {{-- Tours Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- Tour Card 1 --}}
                <div
                    class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="relative h-60 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1595815771614-ade9d652a65d?auto=format&fit=crop&q=80&w=800"
                            alt="Vaishno Devi"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <span
                            class="absolute top-4 left-4 bg-india-green text-white text-[10px] font-semibold uppercase tracking-wider px-3 py-1 rounded-sm shadow-sm">Featured</span>
                        <button
                            class="absolute top-4 right-4 h-8 w-8 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white hover:text-red-500 transition-all">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-1.5 text-gray-400 text-[11px] font-medium mb-3">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Jammu and Kashmir, India</span>
                        </div>
                        <h3
                            class="text-lg text-gray-900 mb-3 leading-snug group-hover:text-india-green transition-colors">
                            Darshan of Shri Mata Vaishno Devi // TSP 075
                        </h3>
                        <div class="flex items-center gap-1 text-[11px] mb-6">
                            <i class="fa-solid fa-star text-saffron text-[10px]"></i>
                            <span class="text-gray-900 font-semibold ml-0.5">0</span>
                            <span class="text-gray-400">(No Review)</span>
                        </div>
                        <div class="flex items-center justify-between pt-5 border-t border-gray-50">
                            <span class="text-xl font-semibold text-navy">₹0.00</span>
                            <div class="flex items-center gap-1.5 text-gray-500 text-xs font-medium">
                                <i class="fa-regular fa-clock"></i>
                                <span>2 Nights</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tour Card 2 --}}
                <div
                    class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="relative h-60 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1614056965546-42fbe24eb36c?auto=format&fit=crop&q=80&w=800"
                            alt="Srinagar"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <span
                            class="absolute top-4 left-4 bg-india-green text-white text-[10px] font-semibold uppercase tracking-wider px-3 py-1 rounded-sm shadow-sm">Featured</span>
                        <button
                            class="absolute top-4 right-4 h-8 w-8 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white hover:text-red-500 transition-all">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-1.5 text-gray-400 text-[11px] font-medium mb-3">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Kashmir, Jammu and Kashmir, India</span>
                        </div>
                        <h3
                            class="text-lg text-gray-900 mb-3 leading-snug group-hover:text-india-green transition-colors">
                            Jannat-e-Kashmir (4N Srinagar) // TSP 161
                        </h3>
                        <div class="flex items-center gap-1 text-[11px] mb-6">
                            <i class="fa-solid fa-star text-saffron text-[10px]"></i>
                            <span class="text-gray-900 font-semibold ml-0.5">5</span>
                            <span class="text-gray-400">(No Review)</span>
                        </div>
                        <div class="flex items-center justify-between pt-5 border-t border-gray-50">
                            <span class="text-xl font-semibold text-navy">₹0.00</span>
                            <div class="flex items-center gap-1.5 text-gray-500 text-xs font-medium">
                                <i class="fa-regular fa-clock"></i>
                                <span>4 Nights</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tour Card 3 --}}
                <div
                    class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="relative h-60 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1717502713522-543a97e13dab?auto=format&fit=crop&q=80&w=800"
                            alt="Katra"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <span
                            class="absolute top-4 left-4 bg-india-green text-white text-[10px] font-semibold uppercase tracking-wider px-3 py-1 rounded-sm shadow-sm">Featured</span>
                        <button
                            class="absolute top-4 right-4 h-8 w-8 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white hover:text-red-500 transition-all">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-1.5 text-gray-400 text-[11px] font-medium mb-3">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Katra, Jammu and Kashmir, India</span>
                        </div>
                        <h3
                            class="text-lg text-gray-900 mb-3 leading-snug group-hover:text-india-green transition-colors">
                            Katra with Raghunath Temple // TSP 076
                        </h3>
                        <div class="flex items-center gap-1 text-[11px] mb-6">
                            <i class="fa-solid fa-star text-saffron text-[10px]"></i>
                            <span class="text-gray-900 font-semibold ml-0.5">0</span>
                            <span class="text-gray-400">(No Review)</span>
                        </div>
                        <div class="flex items-center justify-between pt-5 border-t border-gray-50">
                            <span class="text-xl font-semibold text-navy">₹0.00</span>
                            <div class="flex items-center gap-1.5 text-gray-500 text-xs font-medium">
                                <i class="fa-regular fa-clock"></i>
                                <span>3 Nights</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Pagination --}}
            <div class="mt-16 flex justify-center items-center gap-3">
                <button
                    class="h-10 w-10 flex items-center justify-center rounded-lg bg-india-green text-white  shadow-md shadow-india-green/20 transition-all">1</button>
                <button
                    class="h-10 w-10 flex items-center justify-center rounded-lg bg-white text-gray-600 border border-gray-200  hover:bg-gray-50 hover:border-india-green/20 transition-all">2</button>
                <span class="px-2 text-gray-400 ">...</span>
                <button
                    class="h-10 w-10 flex items-center justify-center rounded-lg bg-white text-gray-600 border border-gray-200  hover:bg-gray-50 hover:border-india-green/20 transition-all">27</button>
                <button
                    class="h-10 w-10 flex items-center justify-center rounded-lg bg-white text-gray-600 border border-gray-200  hover:bg-gray-50 hover:border-india-green/20 transition-all">
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </button>
            </div>
        </div>
    </section>

@endsection
