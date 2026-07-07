@extends('layouts.app')

@section('title', 'Activities | Travel Shravel')

@section('content')
    {{-- Hero Section --}}
    <section class="relative h-[500px] w-full overflow-hidden flex items-center justify-center">
        {{-- Background Image --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&q=80&w=1920" alt="Activities Hero"
                class="h-full w-full object-cover">
            {{-- Shadow Overlay --}}
            <div class="absolute inset-0 bg-black/55"></div>
        </div>

        {{-- Hero Content --}}
        <div class="relative w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Hero Title & Subline --}}
            <div class="text-center mb-12">
                <h1 class="text-5xl md:text-6xl text-white font-libre-baskerville mb-4 drop-shadow-lg uppercase">
                    Activities
                </h1>
                <p class="text-lg md:text-xl text-white/90 tracking-wide drop-shadow-sm">
                    Unforgettable experiences for every traveler
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
                                    <input type="text" value="1,149.00" class="w-full pl-6 pr-3 py-2 bg-gray-50 border-none rounded-lg text-[13px] font-medium focus:ring-1 focus:ring-saffron/20">
                                </div>
                            </div>
                            <span class="text-gray-300 mt-5">—</span>
                            <div class="flex-1">
                                <label class="text-[10px] text-gray-400 uppercase font-semibold mb-1 block">Max price</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[13px] text-gray-900">₹</span>
                                    <input type="text" value="2,299.00" class="w-full pl-6 pr-3 py-2 bg-gray-50 border-none rounded-lg text-[13px] font-medium focus:ring-1 focus:ring-saffron/20">
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

                    {{-- Attractions --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-[15px] font-semibold text-gray-900">Attractions</h3>
                            <i class="fa-solid fa-chevron-up text-[10px] text-gray-400"></i>
                        </div>
                        <div class="space-y-3 mb-4">
                            @foreach(['[Mega] Listing Activity', '[Mega] Listing Hotel', '[Mega] Listing Tour', '[Mega] Single Activity'] as $attr)
                            <label class="flex items-center gap-3 group cursor-pointer">
                                <div class="w-5 h-5 rounded border border-gray-200 flex items-center justify-center group-hover:border-india-green transition-colors">
                                    <input type="checkbox" class="hidden">
                                </div>
                                <span class="text-[14px] text-gray-600 truncate">{{ $attr }}</span>
                            </label>
                            @endforeach
                        </div>
                        <button class="text-[13px] font-semibold text-india-green flex items-center gap-1">
                            See more <i class="fa-solid fa-chevron-down text-[8px]"></i>
                        </button>
                    </div>

                </aside>

                {{-- Right Content: Activity List --}}
                <div class="flex-1 min-w-0">
                    
                    {{-- List Header --}}
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 pb-4 border-b border-gray-100 gap-4">
                        <h2 class="text-lg text-gray-900">8 activities found</h2>
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

                    {{-- Activity Grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2">
                        @forelse($activities as $activity)
                            <x-activity-card 
                                :image="$activity->primary_image ?: (!empty($activity->images) && is_array($activity->images) ? $activity->images[0] : 'https://images.unsplash.com/photo-1598305072040-590fb86444fd?auto=format&fit=crop&q=80&w=800')"
                                :featured="$activity->is_featured"
                                :location="$activity->location"
                                :title="$activity->title"
                                :rating="0"
                                :price="'₹' . number_format($activity->price, 2)"
                                :duration="$activity->duration"
                                :link="url('/activity/' . $activity->slug)"
                            />
                        @empty
                            <div class="col-span-full py-12 text-center text-gray-500 font-medium">
                                <i class="fa-solid fa-person-hiking text-4xl mb-3 text-gray-300 block"></i>
                                No activities found matching your search.
                            </div>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-16 flex justify-center items-center">
                        {{ $activities->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
