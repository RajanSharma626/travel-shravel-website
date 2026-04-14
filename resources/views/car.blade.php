@extends('layouts.app')

@section('title', 'Car Rental | Travel Shravel')

@section('content')
    {{-- Hero Section --}}
    <section class="relative h-[500px] w-full overflow-hidden flex items-center justify-center">
        {{-- Background Image --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1688957511049-5433847253ec?auto=format&fit=crop&q=80&w=1920" alt="Car Rental Hero"
                class="h-full w-full object-cover">
            {{-- Shadow Overlay --}}
            <div class="absolute inset-0 bg-black/55"></div>
        </div>

        {{-- Hero Content --}}
        <div class="relative w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Hero Title & Subline --}}
            <div class="text-center mb-12">
                <h1 class="text-5xl md:text-6xl text-white font-libre-baskerville mb-4 drop-shadow-lg uppercase">
                    Cars
                </h1>
                <p class="text-lg md:text-xl text-white/90 tracking-wide drop-shadow-sm">
                    Your perfect ride for every destination
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

                    {{-- Pick-up --}}
                    <div class="flex-none flex items-center gap-4 px-8 py-3 border-r border-gray-100 group cursor-pointer hover:bg-gray-50/50 transition-all">
                        <div class="w-10 h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors">
                            <i class="fa-regular fa-calendar-plus text-xl"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[13px] font-semibold text-gray-900 leading-tight">Pick-up</p>
                            <p class="text-[13px] text-gray-400 whitespace-nowrap">Add date, Add time</p>
                        </div>
                    </div>

                    {{-- Arrow --}}
                    <div class="flex-none px-2 text-gray-300">
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </div>

                    {{-- Drop-off --}}
                    <div class="flex-none flex items-center gap-4 px-8 py-3 group cursor-pointer hover:bg-gray-50/50 transition-all">
                        <div class="w-10 h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors">
                            <i class="fa-regular fa-calendar-check text-xl"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[13px] font-semibold text-gray-900 leading-tight">Drop-off</p>
                            <p class="text-[13px] text-gray-400 whitespace-nowrap">Add date, Add time</p>
                        </div>
                    </div>

                    {{-- Search Button --}}
                    <div class="ml-auto p-1">
                        <button class="bg-india-green text-white px-12 py-5 rounded-full shadow-lg hover:bg-india-green/90 transition-all active:scale-95 flex items-center justify-center gap-3 font-semibold text-sm">
                            <i class="fa-solid fa-magnifying-glass"></i>
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
                                    <input type="text" value="3,500.00" class="w-full pl-6 pr-3 py-2 bg-gray-50 border-none rounded-lg text-[13px] font-medium focus:ring-1 focus:ring-saffron/20">
                                </div>
                            </div>
                            <span class="text-gray-300 mt-5">—</span>
                            <div class="flex-1">
                                <label class="text-[10px] text-gray-400 uppercase font-semibold mb-1 block">Max price</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[13px] text-gray-900">₹</span>
                                    <input type="text" value="6,500.00" class="w-full pl-6 pr-3 py-2 bg-gray-50 border-none rounded-lg text-[13px] font-medium focus:ring-1 focus:ring-saffron/20">
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between border-t border-gray-50 pt-5">
                            <button class="text-[13px] font-semibold text-saffron hover:underline">Clear</button>
                            <button class="bg-india-green text-white px-6 py-2 rounded-xl text-[13px] font-semibold shadow-md shadow-blue-500/20 hover:bg-india-green/90 transition-all">Apply</button>
                        </div>
                    </div>

                    {{-- Categories --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-[15px] font-semibold text-gray-900">Categories</h3>
                            <i class="fa-solid fa-chevron-up text-[10px] text-gray-400"></i>
                        </div>
                        <div class="space-y-3 mb-4">
                            @foreach(['Convertibles', 'Coupes', 'Hatchbacks', 'Minivans'] as $category)
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

                {{-- Right Content: Car List --}}
                <div class="flex-1 min-w-0">
                    
                    {{-- List Header --}}
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 pb-4 border-b border-gray-100 gap-4">
                        <h2 class="text-lg text-gray-900">7 cars found</h2>
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-2 cursor-pointer group">
                                <span class="text-[14px] font-medium text-gray-400 group-hover:text-gray-900 transition-colors">Sort by:</span>
                                <span class="text-[14px] font-semibold text-gray-900 group-hover:text-india-green transition-colors">Recommended</span>
                                <i class="fa-solid fa-chevron-down text-[10px] text-gray-400"></i>
                            </div>
                            <div class="flex items-center bg-gray-50 p-1 rounded-xl">
                                <button class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-400 hover:text-gray-900 transition-all">
                                    <i class="fa-solid fa-list-ul text-sm"></i>
                                </button>
                                <button class="w-9 h-9 flex items-center justify-center rounded-lg text-india-green bg-white shadow-sm border border-gray-100">
                                    <i class="fa-solid fa-table-cells text-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Car Grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2">
                        
                        @php
                            $cars = [
                                [
                                    'name' => 'Toyota Innova',
                                    'category' => 'MUV',
                                    'price' => '₹5,000.00',
                                    'passengers' => 6,
                                    'transmission' => 'Manual',
                                    'bags' => 3,
                                    'doors' => 4,
                                    'img' => 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?auto=format&fit=crop&q=80&w=800',
                                    'featured' => true
                                ],
                                [
                                    'name' => 'Toyota Etios',
                                    'category' => 'Sedan',
                                    'price' => '₹3,500.00',
                                    'passengers' => 4,
                                    'transmission' => 'Manual',
                                    'bags' => 2,
                                    'doors' => 4,
                                    'img' => 'https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?auto=format&fit=crop&q=80&w=800',
                                    'featured' => true
                                ],
                                [
                                    'name' => 'Maruti Suzuki Dzire',
                                    'category' => 'Sedan',
                                    'price' => '₹3,500.00',
                                    'passengers' => 4,
                                    'transmission' => 'Manual',
                                    'bags' => 2,
                                    'doors' => 4,
                                    'img' => 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?auto=format&fit=crop&q=80&w=800',
                                    'featured' => true
                                ],
                                [
                                    'name' => 'Traveller',
                                    'category' => 'Minivans',
                                    'price' => '₹8,000.00',
                                    'passengers' => 12,
                                    'transmission' => 'Manual',
                                    'bags' => 5,
                                    'doors' => 3,
                                    'img' => 'https://images.unsplash.com/photo-1523983254347-9799927951f5?auto=format&fit=crop&q=80&w=800',
                                    'featured' => false
                                ],
                                [
                                    'name' => 'Toyota Innova Crysta',
                                    'category' => 'MUV',
                                    'price' => '₹6,500.00',
                                    'passengers' => 7,
                                    'transmission' => 'Manual',
                                    'bags' => 4,
                                    'doors' => 4,
                                    'img' => 'https://images.unsplash.com/photo-1550355291-bbee04a92027?auto=format&fit=crop&q=80&w=800',
                                    'featured' => false
                                ],
                                [
                                    'name' => 'Mahindra Xylo',
                                    'category' => 'SUVs',
                                    'price' => '₹5,500.00',
                                    'passengers' => 7,
                                    'transmission' => 'Manual',
                                    'bags' => 3,
                                    'doors' => 4,
                                    'img' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=800',
                                    'featured' => false
                                ],
                            ];
                        @endphp

                        @foreach($cars as $car)
                            <x-car-card 
                                :image="$car['img']"
                                :featured="$car['featured']"
                                :type="$car['category']"
                                :title="$car['name']"
                                :pax="$car['passengers']"
                                :transmission="$car['transmission']"
                                :bags="$car['bags']"
                                :doors="$car['doors']"
                                :price="$car['price']"
                            />
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-16 flex justify-center items-center gap-3">
                        <button class="h-10 w-10 flex items-center justify-center rounded-lg bg-india-green text-white shadow-md shadow-blue-500/20 transition-all">1</button>
                        <button class="h-10 w-10 flex items-center justify-center rounded-lg bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 transition-all">
                            <i class="fa-solid fa-chevron-right text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
