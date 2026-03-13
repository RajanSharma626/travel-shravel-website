@extends('layouts.app')

@section('title', 'Tour Packages | Travel Shravel')

@section('content')
    {{-- Hero Section --}}
    <section class="relative h-[500px] w-full overflow-hidden flex items-center justify-center">
        {{-- Background Image --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&q=80&w=1920" alt="Tour Hero"
                class="h-full w-full object-cover">
            {{-- Shadow Overlay --}}
            <div class="absolute inset-0 bg-black/55"></div>
        </div>

        {{-- Hero Content --}}
        <div class="relative w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Hero Title & Subline --}}
            <div class="text-center mb-12">
                <h1 class="text-5xl md:text-6xl text-white font-libre-baskerville mb-4 drop-shadow-lg uppercase">
                    Tours
                </h1>
                <p class="text-lg md:text-xl text-white/90 tracking-wide drop-shadow-sm">
                    Explore unforgettable journeys across the globe
                </p>
            </div>

            {{-- Search Bar Layout --}}
            <div class="w-full max-w-6xl mx-auto">
                <div class="bg-white rounded-full shadow-[0_20px_50px_rgba(0,0,0,0.3)] p-2 md:p-3 flex flex-col md:flex-row items-center gap-0">
                    
                    {{-- Location --}}
                    <div class="flex-1 flex items-center gap-4 px-8 py-3 border-r border-gray-100 group cursor-pointer hover:bg-gray-50/50 rounded-l-full transition-all">
                        <div class="w-10 h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors">
                            <i class="fa-solid fa-location-dot text-xl"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[13px] font-semibold text-gray-900 leading-tight">Location</p>
                            <p class="text-[13px] text-gray-400 whitespace-nowrap">Where are you going?</p>
                        </div>
                    </div>

                    {{-- Date --}}
                    <div class="flex-none flex items-center gap-4 px-8 py-3 border-r border-gray-100 group cursor-pointer hover:bg-gray-50/50 transition-all">
                        <div class="w-10 h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors">
                            <i class="fa-regular fa-calendar-plus text-xl"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[13px] font-semibold text-gray-900 leading-tight">Date</p>
                            <p class="text-[13px] text-gray-400 whitespace-nowrap">Add date</p>
                        </div>
                    </div>

                    {{-- Arrow --}}
                    <div class="flex-none px-2 text-gray-300">
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </div>

                    {{-- Check Out --}}
                    <div class="flex-none flex items-center gap-4 px-8 py-3 group cursor-pointer hover:bg-gray-50/50 transition-all">
                        <div class="w-10 h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors">
                            <i class="fa-regular fa-calendar-check text-xl"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[13px] font-semibold text-gray-900 leading-tight">Check out</p>
                            <p class="text-[13px] text-gray-400 whitespace-nowrap">Add date</p>
                        </div>
                    </div>

                    {{-- Search Button --}}
                    <div class="ml-auto p-1">
                        <button class="bg-india-green text-white px-12 py-5 rounded-full shadow-lg hover:bg-india-green/90 transition-all active:scale-95 flex items-center justify-center gap-3 font-semibold text-sm">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content Section --}}
    <section class="py-12 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                {{-- Left Sidebar: Filters --}}
                <aside class="w-full lg:w-[280px] flex flex-col gap-6">
                    
                    {{-- Filter Price --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-[15px] font-semibold text-gray-900">Filter Price</h3>
                            <i class="fa-solid fa-chevron-up text-[10px] text-gray-400"></i>
                        </div>
                        
                        {{-- Range Slider Simulation --}}
                        <div class="px-2 mb-6">
                            <div class="h-1 bg-gray-100 rounded-full relative">
                                <div class="absolute inset-y-0 left-0 right-0 bg-saffron rounded-full"></div>
                                <div class="absolute -top-1.5 left-0 w-4 h-4 bg-white border-2 border-saffron rounded-full cursor-pointer shadow-sm"></div>
                                <div class="absolute -top-1.5 right-0 w-4 h-4 bg-white border-2 border-saffron rounded-full cursor-pointer shadow-sm"></div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-8">
                            <div class="flex-1">
                                <label class="text-[10px] text-gray-400 uppercase font-semibold mb-1 block">Min price</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[13px] text-gray-900">₹</span>
                                    <input type="text" value="0.00" class="w-full pl-6 pr-3 py-2 bg-gray-50 border-none rounded-lg text-[13px] font-medium focus:ring-1 focus:ring-saffron/20">
                                </div>
                            </div>
                            <span class="text-gray-300 mt-5">—</span>
                            <div class="flex-1">
                                <label class="text-[10px] text-gray-400 uppercase font-semibold mb-1 block">Max price</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[13px] text-gray-900">₹</span>
                                    <input type="text" value="280,000.00" class="w-full pl-6 pr-3 py-2 bg-gray-50 border-none rounded-lg text-[13px] font-medium focus:ring-1 focus:ring-saffron/20">
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between border-t border-gray-50 pt-5">
                            <button class="text-[13px] font-semibold text-saffron hover:underline">Clear</button>
                            <button class="bg-india-green text-white px-6 py-2 rounded-xl text-[13px] font-semibold shadow-md shadow-india-green/20 hover:bg-india-green/90 transition-all">Apply</button>
                        </div>
                    </div>

                    {{-- Review Score --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-[15px] font-semibold text-gray-900">Review Score</h3>
                            <i class="fa-solid fa-chevron-up text-[10px] text-gray-400"></i>
                        </div>
                        <div class="space-y-4">
                            @for($i = 5; $i >= 1; $i--)
                            <label class="flex items-center gap-3 group cursor-pointer">
                                <div class="w-5 h-5 rounded border border-gray-200 flex items-center justify-center group-hover:border-india-green transition-colors">
                                    <input type="checkbox" class="hidden">
                                </div>
                                <div class="flex items-center gap-0.5">
                                    @for($j = 1; $j <= 5; $j++)
                                        <i class="fa-solid fa-star text-[12px] {{ $j <= $i ? 'text-saffron' : 'text-gray-200' }}"></i>
                                    @endfor
                                </div>
                            </label>
                            @endfor
                        </div>
                    </div>

                    {{-- Categories --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-[15px] font-semibold text-gray-900">Categories</h3>
                            <i class="fa-solid fa-chevron-up text-[10px] text-gray-400"></i>
                        </div>
                        <div class="space-y-3 mb-4">
                            @foreach(['Border Tourism', 'City trips', 'Customised Tour', 'Ecotourism'] as $category)
                            <label class="flex items-center gap-3 group cursor-pointer">
                                <div class="w-5 h-5 rounded border border-gray-200 flex items-center justify-center group-hover:border-india-green transition-colors">
                                    <input type="checkbox" class="hidden">
                                </div>
                                <span class="text-[14px] text-gray-600 truncate">{{ $category }}</span>
                            </label>
                            @endforeach
                        </div>
                        <button class="text-[13px] font-semibold text-india-green flex items-center gap-1">
                            See more <i class="fa-solid fa-chevron-down text-[8px]"></i>
                        </button>
                    </div>

                </aside>

                {{-- Right Content: Tour List --}}
                <div class="flex-1">
                    
                    {{-- List Header --}}
                    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-100">
                        <h2 class="text-gray-900">107 tours found</h2>
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-2 cursor-pointer group">
                                <span class="text-[14px] font-medium text-gray-500 group-hover:text-gray-900 transition-colors">Sort</span>
                                <i class="fa-solid fa-chevron-down text-[10px] text-gray-400 group-hover:text-gray-900 transition-colors"></i>
                            </div>
                            <div class="flex items-center gap-3">
                                <button class="w-10 h-10 flex items-center justify-center rounded-lg text-gray-300 hover:text-india-green hover:bg-white transition-all">
                                    <i class="fa-solid fa-list-ul text-lg"></i>
                                </button>
                                <button class="w-10 h-10 flex items-center justify-center rounded-lg text-india-green bg-white shadow-sm border border-gray-100">
                                    <i class="fa-solid fa-table-cells text-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Tour Grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        
                        @php
                            $tours = [
                                [
                                    'title' => 'UK with Scotland and Ireland // TSP 014',
                                    'location' => 'UK',
                                    'price' => '280,000.00',
                                    'rating' => 0,
                                    'reviews' => 0,
                                    'duration' => '9 Nights',
                                    'img' => 'https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?auto=format&fit=crop&q=80&w=800',
                                    'featured' => true
                                ],
                                [
                                    'title' => 'Mystic Charm of Pir Panjal // TSP 194',
                                    'location' => 'Jammu and Kashmir, India',
                                    'price' => '27,999.00',
                                    'rating' => 0,
                                    'reviews' => 0,
                                    'duration' => '5 Nights',
                                    'img' => 'https://images.unsplash.com/photo-1598305072040-590fb86444fd?auto=format&fit=crop&q=80&w=800',
                                    'featured' => true
                                ],
                                [
                                    'title' => 'Kishtwar - Jewel of Chenab // TSP 192',
                                    'location' => 'Jammu and Kashmir, India',
                                    'price' => '21,499.00',
                                    'rating' => 0,
                                    'reviews' => 0,
                                    'duration' => '4 Nights',
                                    'img' => 'https://images.unsplash.com/photo-1564501049412-61c2a3083791?auto=format&fit=crop&q=80&w=800',
                                    'featured' => true
                                ],
                                [
                                    'title' => 'Ramban Trails // TSP 193',
                                    'location' => 'Jammu and Kashmir, India',
                                    'price' => '21,499.00',
                                    'rating' => 0,
                                    'reviews' => 0,
                                    'duration' => '4 Nights',
                                    'img' => 'https://images.unsplash.com/photo-1548013146-72479768b741?auto=format&fit=crop&q=80&w=800',
                                    'featured' => true
                                ],
                                [
                                    'title' => 'Jammu Border Trails // TSP 190',
                                    'location' => 'Jammu and Kashmir, India',
                                    'price' => '14,999.00',
                                    'rating' => 0,
                                    'reviews' => 0,
                                    'duration' => '3 Nights',
                                    'img' => 'https://images.unsplash.com/photo-1592924357228-91a4daadcfea?auto=format&fit=crop&q=80&w=800',
                                    'featured' => true
                                ],
                                [
                                    'title' => 'Samba Kathua Beyond Ordinary // TSP 195',
                                    'location' => 'Jammu & Kashmir, India',
                                    'price' => '25,699.00',
                                    'rating' => 0,
                                    'reviews' => 0,
                                    'duration' => '5 Nights',
                                    'img' => 'https://images.unsplash.com/photo-1534067783941-51c9c23ecefd?auto=format&fit=crop&q=80&w=800',
                                    'featured' => true
                                ],
                            ];
                        @endphp

                        @foreach($tours as $tour)
                        <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-500 flex flex-col">
                            {{-- Image Container --}}
                            <div class="relative h-56 overflow-hidden">
                                <img src="{{ $tour['img'] }}" alt="{{ $tour['title'] }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                
                                @if(isset($tour['featured']) && $tour['featured'])
                                <span class="absolute top-4 left-4 bg-india-green text-white text-[11px] uppercase tracking-wider px-3 py-1.5 rounded-md shadow-lg">Featured</span>
                                @endif

                                <button class="absolute top-4 right-4 w-10 h-10 bg-white/30 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white hover:text-red-600 transition-all transform hover:scale-110">
                                    <i class="fa-regular fa-heart text-lg"></i>
                                </button>
                            </div>

                            {{-- Content --}}
                            <div class="p-6 flex flex-col flex-1">
                                <p class="text-[13px] text-gray-500 mb-2 flex items-center gap-1.5">
                                    <i class="fa-solid fa-location-dot text-gray-300"></i>
                                    {{ $tour['location'] }}
                                </p>

                                <h3 class="text-[16px] text-gray-900 mb-3 leading-tight group-hover:text-india-green transition-colors min-h-[44px]">
                                    {{ $tour['title'] }}
                                </h3>

                                <div class="flex items-center gap-1.5 mb-6">
                                    <i class="fa-solid fa-star text-[11px] text-saffron"></i>
                                    <span class="text-[13px] text-gray-900">{{ $tour['rating'] }}</span>
                                    <span class="text-[13px] text-gray-400">(No Review)</span>
                                </div>

                                <div class="mt-auto border-t border-gray-50 pt-5 flex items-center justify-between">
                                    <div class="flex flex-col">
                                        <span class="text-[12px] text-gray-400">From</span>
                                        <span class="text-lg font-semibold text-gray-900">₹{{ $tour['price'] }}</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 text-gray-500 text-[13px]">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>{{ $tour['duration'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-16 flex justify-center items-center gap-3">
                        <button class="h-10 w-10 flex items-center justify-center rounded-lg bg-india-green text-white shadow-md shadow-blue-500/20 transition-all">1</button>
                        <button class="h-10 w-10 flex items-center justify-center rounded-lg bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 transition-all">2</button>
                        <span class="px-2 text-gray-400">...</span>
                        <button class="h-10 w-10 flex items-center justify-center rounded-lg bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 transition-all">9</button>
                        <button class="h-10 w-10 flex items-center justify-center rounded-lg bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 transition-all">
                            <i class="fa-solid fa-chevron-right text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
