@extends('layouts.app')

@section('title', 'Activities | Travel Shravel')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    /* Default Card View styles */
    .card-divider {
        border-top: 1px solid #e5e7eb;
        margin-top: 0.75rem;
        margin-bottom: 0.75rem;
    }

    /* Checked radio button state */
    input[type="radio"]:checked + div > div {
        transform: scale(1) !important;
    }

    /* Custom Dual Range Slider */
    .price-slider-container {
        position: relative;
        width: 100%;
        height: 6px;
        display: flex;
        align-items: center;
    }
    .price-slider-container input[type="range"] {
        position: absolute;
        width: 100%;
        height: 6px;
        background: none;
        pointer-events: none;
        -webkit-appearance: none;
        appearance: none;
        border: none;
        outline: none;
        margin: 0;
        padding: 0;
        z-index: 10;
    }
    .price-slider-container input[type="range"]::-webkit-slider-runnable-track {
        -webkit-appearance: none;
        background: transparent;
        border: none;
        height: 6px;
    }
    .price-slider-container input[type="range"]::-moz-range-track {
        background: transparent;
        border: none;
        height: 6px;
    }
    .price-slider-container input[type="range"]::-webkit-slider-thumb {
        height: 16px;
        width: 16px;
        border-radius: 50%;
        border: 2px solid #2563EB;
        background: #ffffff;
        pointer-events: auto;
        -webkit-appearance: none;
        cursor: pointer;
        box-shadow: 0 1px 3px rgba(0,0,0,0.15);
        margin-top: -5px;
    }
    .price-slider-container input[type="range"]::-moz-range-thumb {
        height: 16px;
        width: 16px;
        border-radius: 50%;
        border: 2px solid #2563EB;
        background: #ffffff;
        pointer-events: auto;
        cursor: pointer;
        box-shadow: 0 1px 3px rgba(0,0,0,0.15);
    }
    .price-slider-container .slider-track {
        position: absolute;
        width: 100%;
        height: 4px;
        background: #f3f4f6;
        border-radius: 9999px;
        z-index: 1;
    }

    /* List Layout styles */
    .list-layout .list-view-horizontal {
        flex-direction: row !important;
        height: auto;
    }
    @media (min-width: 768px) {
        .list-layout .md\:list-view-image-w {
            width: 300px !important;
            height: 100% !important;
        }
        .list-layout .md\:list-view-image-h {
            height: 100% !important;
        }
        .list-layout .md\:list-view-title-h {
            height: auto !important;
            line-clamp: none !important;
            -webkit-line-clamp: none !important;
        }
    }
</style>
@endpush

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
                <form action="" method="GET"
                    class="bg-white rounded-full shadow-[0_20px_50px_rgba(0,0,0,0.3)] p-2 md:p-3 flex flex-col md:flex-row items-center gap-0 w-full">
                    
                    {{-- Location --}}
                    <div class="flex-1 flex items-center gap-4 px-8 py-3 border-r border-gray-100 group cursor-pointer hover:bg-gray-50/50 rounded-l-full transition-all">
                        <div class="w-10 h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors">
                            <i class="fa-solid fa-location-dot text-xl"></i>
                        </div>
                        <div class="text-left flex-1 min-w-0">
                            <p class="text-[13px] font-semibold text-gray-900 leading-tight">Location</p>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Where are you going?" 
                                class="w-full bg-transparent border-none p-0 text-[13px] text-gray-900 focus:ring-0 placeholder-gray-400 font-medium outline-none">
                        </div>
                    </div>

                    {{-- Date --}}
                    <div id="check_in_container" class="flex-none flex items-center gap-4 px-8 py-3 border-r border-gray-100 group cursor-pointer hover:bg-gray-50/50 transition-all">
                        <div class="w-10 h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors">
                            <i class="fa-regular fa-calendar-plus text-xl"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[13px] font-semibold text-gray-900 leading-tight">Date</p>
                            <input type="text" id="check_in_input" name="check_in" value="{{ request('check_in', '13/03/2026') }}" placeholder="Add date" 
                                class="w-24 bg-transparent border-none p-0 text-[13px] text-gray-900 focus:ring-0 placeholder-gray-400 font-medium outline-none cursor-pointer">
                        </div>
                    </div>

                    {{-- Arrow --}}
                    <div class="flex-none px-2 text-gray-300">
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </div>

                    {{-- Check Out --}}
                    <div id="check_out_container" class="flex-none flex items-center gap-4 px-8 py-3 group cursor-pointer hover:bg-gray-50/50 transition-all">
                        <div class="w-10 h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors">
                            <i class="fa-regular fa-calendar-check text-xl"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[13px] font-semibold text-gray-900 leading-tight">Check out</p>
                            <input type="text" id="check_out_input" name="check_out" value="{{ request('check_out', '14/03/2026') }}" placeholder="Add date" 
                                class="w-24 bg-transparent border-none p-0 text-[13px] text-gray-900 focus:ring-0 placeholder-gray-400 font-medium outline-none cursor-pointer">
                        </div>
                    </div>

                    {{-- Search Button --}}
                    <div class="ml-auto p-1">
                        <button type="submit" class="bg-saffron text-white px-12 py-5 rounded-full shadow-lg hover:bg-saffron/90 transition-all active:scale-95 flex items-center justify-center gap-3 font-semibold text-sm">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Main Content Section --}}
    <section class="py-12 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- List Header --}}
            @php
                $currentSort = request('sort_by', 'recommended');
                $sortLabels = [
                    'recommended' => 'Recommended',
                    'new' => 'New activity',
                    'price_asc' => 'Low to High',
                    'price_desc' => 'High to Low',
                    'name_asc' => 'a - z',
                    'name_desc' => 'z - a'
                ];
                $currentLabel = $sortLabels[$currentSort] ?? 'Recommended';
            @endphp
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 pb-2 border-b border-gray-100 gap-4">
                <div>
                    <p class="text-gray-900 flex items-center gap-2.5">
                        {{ $activities->total() }} Activities Found
                    </p>
                </div>
                <div class="flex items-center gap-4 w-full sm:w-auto justify-between sm:justify-start">
                    <div class="relative" id="sort-dropdown-container">
                        <button id="sort-dropdown-button"
                            class="flex items-center gap-2.5 px-4 py-2 bg-gray-50/80 border border-gray-200/50 rounded-full cursor-pointer hover:bg-gray-100/50 hover:border-gray-200 transition-all group">
                            <i class="fa-solid fa-arrow-down-wide-short text-[13px] text-gray-400 group-hover:text-saffron transition-colors"></i>
                            <span class="text-[13px] font-medium text-gray-500">Sort by:</span>
                            <span class="text-[13px] font-medium text-gray-900">{{ $currentLabel }}</span>
                            <i id="sort-dropdown-arrow" class="fa-solid fa-chevron-down text-[10px] text-gray-400 ml-1 transition-transform duration-200"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div id="sort-dropdown-menu" class="hidden absolute right-0 mt-2 w-56 rounded-2xl bg-white p-4 shadow-xl border border-gray-100/80 z-50">
                            <div class="space-y-4">
                                {{-- Option: New activity --}}
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="sort_by" value="new" class="peer hidden" {{ $currentSort == 'new' ? 'checked' : '' }} onclick="applySort('new')">
                                    <div class="w-4 h-4 rounded-full border border-gray-300 flex items-center justify-center peer-checked:border-saffron group-hover:border-saffron transition-all">
                                        <div class="w-2 h-2 rounded-full bg-saffron scale-0 peer-checked:scale-100 transition-transform"></div>
                                    </div>
                                    <span class="text-[14px] text-gray-600 font-medium group-hover:text-gray-900 peer-checked:text-gray-950 transition-colors">New activity</span>
                                </label>

                                {{-- Section: Price --}}
                                <div class="space-y-2">
                                    <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block">Price</span>
                                    <div class="space-y-3 pl-1">
                                        <label class="flex items-center gap-3 cursor-pointer group">
                                            <input type="radio" name="sort_by" value="price_asc" class="peer hidden" {{ $currentSort == 'price_asc' ? 'checked' : '' }} onclick="applySort('price_asc')">
                                            <div class="w-4 h-4 rounded-full border border-gray-300 flex items-center justify-center peer-checked:border-saffron group-hover:border-saffron transition-all">
                                                <div class="w-2 h-2 rounded-full bg-saffron scale-0 peer-checked:scale-100 transition-transform"></div>
                                            </div>
                                            <span class="text-[14px] text-gray-600 font-medium group-hover:text-gray-900 peer-checked:text-gray-950 transition-colors">Low to High</span>
                                        </label>
                                        <label class="flex items-center gap-3 cursor-pointer group">
                                            <input type="radio" name="sort_by" value="price_desc" class="peer hidden" {{ $currentSort == 'price_desc' ? 'checked' : '' }} onclick="applySort('price_desc')">
                                            <div class="w-4 h-4 rounded-full border border-gray-300 flex items-center justify-center peer-checked:border-saffron group-hover:border-saffron transition-all">
                                                <div class="w-2 h-2 rounded-full bg-saffron scale-0 peer-checked:scale-100 transition-transform"></div>
                                            </div>
                                            <span class="text-[14px] text-gray-600 font-medium group-hover:text-gray-900 peer-checked:text-gray-950 transition-colors">High to Low</span>
                                        </label>
                                    </div>
                                </div>

                                {{-- Section: Name --}}
                                <div class="space-y-2">
                                    <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block">Name</span>
                                    <div class="space-y-3 pl-1">
                                        <label class="flex items-center gap-3 cursor-pointer group">
                                            <input type="radio" name="sort_by" value="name_asc" class="peer hidden" {{ $currentSort == 'name_asc' ? 'checked' : '' }} onclick="applySort('name_asc')">
                                            <div class="w-4 h-4 rounded-full border border-gray-300 flex items-center justify-center peer-checked:border-saffron group-hover:border-saffron transition-all">
                                                <div class="w-2 h-2 rounded-full bg-saffron scale-0 peer-checked:scale-100 transition-transform"></div>
                                            </div>
                                            <span class="text-[14px] text-gray-600 font-medium group-hover:text-gray-900 peer-checked:text-gray-950 transition-colors">a - z</span>
                                        </label>
                                        <label class="flex items-center gap-3 cursor-pointer group">
                                            <input type="radio" name="sort_by" value="name_desc" class="peer hidden" {{ $currentSort == 'name_desc' ? 'checked' : '' }} onclick="applySort('name_desc')">
                                            <div class="w-4 h-4 rounded-full border border-gray-300 flex items-center justify-center peer-checked:border-saffron group-hover:border-saffron transition-all">
                                                <div class="w-2 h-2 rounded-full bg-saffron scale-0 peer-checked:scale-100 transition-transform"></div>
                                            </div>
                                            <span class="text-[14px] text-gray-600 font-medium group-hover:text-gray-900 peer-checked:text-gray-950 transition-colors">z - a</span>
                                        </label>
                                    </div>
                                </div>

                                @if ($currentSort !== 'recommended')
                                    {{-- Clear option --}}
                                    <div class="border-t border-gray-100/80 pt-3 flex justify-end items-center mt-2">
                                        <button onclick="applySort('recommended')" class="text-[12px] font-semibold text-gray-400 hover:text-saffron transition-colors flex items-center gap-1.5">
                                            <i class="fa-solid fa-rotate-left text-[10px]"></i> Clear Sort
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center bg-gray-100/80 p-1 rounded-full border border-gray-200/20">
                        <button id="view-mode-list"
                            class="w-8 h-8 flex items-center justify-center rounded-full text-gray-400 hover:text-gray-900 transition-all">
                            <i class="fa-solid fa-list-ul text-[13px]"></i>
                        </button>
                        <button id="view-mode-grid"
                            class="w-8 h-8 flex items-center justify-center rounded-full text-saffron bg-white shadow-sm border border-gray-200/20">
                            <i class="fa-solid fa-table-cells text-[13px]"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                
                {{-- Left Sidebar: Filters --}}
                <aside class="w-full lg:w-[280px]">
                    <form id="filters-form" method="GET" action="" class="flex flex-col gap-6">
                        {{-- Preserve other URL query parameter states --}}
                        @foreach(request()->except(['min_price', 'max_price', 'page']) as $key => $value)
                            @if(is_array($value))
                                @foreach($value as $v)
                                    <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                                @endforeach
                            @else
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endif
                        @endforeach

                        {{-- Filter Price --}}
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-[15px] font-semibold text-gray-900">Filter Price</h3>
                            </div>
                            
                            {{-- Range Slider --}}
                            <div class="relative w-full h-8 flex items-center mb-4">
                                <div class="w-full price-slider-container">
                                    <div id="slider_track" class="slider-track"></div>
                                    <input type="range" id="price_range_min" min="0" max="3000" step="50" value="{{ request('min_price', 0) }}">
                                    <input type="range" id="price_range_max" min="0" max="3000" step="50" value="{{ request('max_price', 0) }}">
                                </div>
                            </div>

                            <div class="flex items-center gap-3 mb-8">
                                <div class="flex-1">
                                    <label class="text-[10px] text-gray-400 uppercase font-semibold mb-1 block">Min price</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[13px] text-gray-900">₹</span>
                                        <input type="number" id="filter_min_price" name="min_price" value="{{ request('min_price', 0) }}" placeholder="0"
                                            class="w-full pl-6 pr-3 py-2 bg-gray-50 border-none rounded-lg text-[13px] font-medium focus:ring-1 focus:ring-saffron/20">
                                    </div>
                                </div>
                                <span class="text-gray-300 mt-5">—</span>
                                <div class="flex-1">
                                    <label class="text-[10px] text-gray-400 uppercase font-semibold mb-1 block">Max price</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[13px] text-gray-900">₹</span>
                                        <input type="number" id="filter_max_price" name="max_price" value="{{ request('max_price', 0) }}" placeholder="3000"
                                            class="w-full pl-6 pr-3 py-2 bg-gray-50 border-none rounded-lg text-[13px] font-medium focus:ring-1 focus:ring-saffron/20">
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between border-t border-gray-50 pt-5">
                                @if ((request()->filled('min_price') && request('min_price') > 0) || (request()->filled('max_price') && request('max_price') > 0))
                                    <button type="button" onclick="document.getElementById('filter_min_price').value='0'; document.getElementById('filter_max_price').value='0'; document.getElementById('filters-form').submit();" 
                                        class="text-[13px] font-semibold text-saffron hover:underline">Clear</button>
                                @else
                                    <div></div>
                                @endif
                                <button type="submit"
                                    class="bg-saffron text-white px-6 py-2 rounded-xl text-[13px] font-semibold shadow-md shadow-saffron/20 hover:bg-saffron/90 transition-all">Apply</button>
                            </div>
                        </div>

                        {{-- Review Score --}}
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-[15px] font-semibold text-gray-900">Review Score</h3>
                            </div>
                            <div class="space-y-4">
                                @for($i = 5; $i >= 1; $i--)
                                <label class="flex items-center gap-3 group cursor-pointer">
                                    <div class="w-5 h-5 rounded border border-gray-200 flex items-center justify-center group-hover:border-saffron transition-colors">
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
                            </div>
                            <div class="space-y-3 mb-4">
                                @foreach(['Sightseeing', 'Adventure', 'Culture', 'Food & Drink'] as $attraction)
                                <label class="flex items-center gap-3 group cursor-pointer">
                                    <div class="w-5 h-5 rounded border border-gray-200 flex items-center justify-center group-hover:border-saffron transition-colors">
                                        <input type="checkbox" class="hidden">
                                    </div>
                                    <span class="text-[14px] text-gray-600 truncate">{{ $attraction }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </aside>

                {{-- Right Content: Activity List --}}
                <div class="flex-1 min-w-0">

                    {{-- Activity Grid --}}
                    <div id="activity-list-container" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2">
                        @forelse($activities as $activity)
                            <x-activity-card 
                                :title="$activity->title"
                                :image="$activity->primary_image ?: (!empty($activity->images) && is_array($activity->images) ? $activity->images[0] : 'https://images.unsplash.com/photo-1598305072040-590fb86444fd?auto=format&fit=crop&q=80&w=800')"
                                :location="$activity->location"
                                :price="'₹' . number_format($activity->price, 0)"
                                :duration="$activity->duration"
                                :rating="0"
                                :featured="$activity->is_featured"
                                :link="url('/activity/' . $activity->slug)"
                            />
                        @empty
                            <div class="col-span-full py-20 flex flex-col items-center justify-center text-center">
                                <div class="w-20 h-20 bg-saffron-tint text-saffron rounded-full flex items-center justify-center mb-6">
                                    <i class="fa-solid fa-person-hiking text-3xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">No Activities Found</h3>
                                <p class="text-gray-500 text-[14px] max-w-md leading-relaxed mb-8">
                                    We couldn't find any activities matching your current search or filters.
                                </p>
                                @if(request()->filled('search') || (request()->filled('min_price') && request('min_price') > 0) || (request()->filled('max_price') && request('max_price') > 0))
                                    <a href="{{ request()->url() }}" class="inline-flex items-center gap-2 px-6 py-3 bg-saffron text-white rounded-xl text-[13px] font-semibold hover:bg-saffron/90 shadow-lg shadow-saffron/10 hover:shadow-saffron/20 transition-all duration-200">
                                        <i class="fa-solid fa-rotate-right text-xs"></i>
                                        Reset Search & Filters
                                    </a>
                                @endif
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Flatpickr initialization
            const checkInInput = document.getElementById('check_in_input');
            const checkOutInput = document.getElementById('check_out_input');

            if (checkInInput && checkOutInput) {
                const inPicker = flatpickr(checkInInput, {
                    dateFormat: "d/m/Y",
                    minDate: "today",
                    onChange: function(selectedDates, dateStr, instance) {
                        outPicker.set('minDate', dateStr);
                    }
                });

                const outPicker = flatpickr(checkOutInput, {
                    dateFormat: "d/m/Y",
                    minDate: "today"
                });

                // Open calendar when clicking anywhere inside the check-in or check-out sections
                const checkInContainer = document.getElementById('check_in_container');
                const checkOutContainer = document.getElementById('check_out_container');

                if (checkInContainer) {
                    checkInContainer.addEventListener('click', function(e) {
                        if (e.target !== checkInInput) {
                            inPicker.open();
                        }
                    });
                }

                if (checkOutContainer) {
                    checkOutContainer.addEventListener('click', function(e) {
                        if (e.target !== checkOutInput) {
                            outPicker.open();
                        }
                    });
                }
            }

            // Sort Dropdown
            const btn = document.getElementById('sort-dropdown-button');
            const menu = document.getElementById('sort-dropdown-menu');
            const arrow = document.getElementById('sort-dropdown-arrow');

            if (btn && menu) {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isHidden = menu.classList.contains('hidden');
                    if (isHidden) {
                        openDropdown();
                    } else {
                        closeDropdown();
                    }
                });

                document.addEventListener('click', function(e) {
                    if (!menu.contains(e.target) && !btn.contains(e.target)) {
                        closeDropdown();
                    }
                });

                function openDropdown() {
                    menu.classList.remove('hidden');
                    if (arrow) arrow.classList.add('rotate-180');
                }

                function closeDropdown() {
                    menu.classList.add('hidden');
                    if (arrow) arrow.classList.remove('rotate-180');
                }
            }

            // List/Grid View Toggle
            const listBtn = document.getElementById('view-mode-list');
            const gridBtn = document.getElementById('view-mode-grid');
            const container = document.getElementById('activity-list-container');

            // Check stored view mode preference
            const currentMode = localStorage.getItem('activity_view_mode') || 'grid';
            if (currentMode === 'list') {
                setListView();
            } else {
                setGridView();
            }

            if (listBtn && gridBtn && container) {
                listBtn.addEventListener('click', setListView);
                gridBtn.addEventListener('click', setGridView);
            }

            function setListView() {
                localStorage.setItem('activity_view_mode', 'list');
                if (container) {
                    container.className = "grid grid-cols-1 gap-6 list-layout";
                }
                if (listBtn) {
                    listBtn.className = "w-8 h-8 flex items-center justify-center rounded-full text-saffron bg-white shadow-sm border border-gray-200/20";
                }
                if (gridBtn) {
                    gridBtn.className = "w-8 h-8 flex items-center justify-center rounded-full text-gray-400 hover:text-gray-900 transition-all";
                }
            }

            function setGridView() {
                localStorage.setItem('activity_view_mode', 'grid');
                if (container) {
                    container.className = "grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2";
                }
                if (gridBtn) {
                    gridBtn.className = "w-8 h-8 flex items-center justify-center rounded-full text-saffron bg-white shadow-sm border border-gray-200/20";
                }
                if (listBtn) {
                    listBtn.className = "w-8 h-8 flex items-center justify-center rounded-full text-gray-400 hover:text-gray-900 transition-all";
                }
            }

            // Dual Price Slider initialization
            const minRange = document.getElementById('price_range_min');
            const maxRange = document.getElementById('price_range_max');
            const sliderTrack = document.getElementById('slider_track');
            const minValInput = document.getElementById('filter_min_price');
            const maxValInput = document.getElementById('filter_max_price');

            function updateTrack() {
                if (!minRange || !maxRange || !sliderTrack) return;
                const min = parseInt(minRange.min);
                const max = parseInt(minRange.max);
                const val1 = parseInt(minRange.value);
                const val2 = parseInt(maxRange.value);

                const percent1 = ((val1 - min) / (max - min)) * 100;
                const percent2 = ((val2 - min) / (max - min)) * 100;

                // Track color: #f3f4f6 (default gray), primary saffron/blue (#2563EB) between handles
                sliderTrack.style.background = `linear-gradient(to right, #f3f4f6 ${percent1}%, #2563EB ${percent1}%, #2563EB ${percent2}%, #f3f4f6 ${percent2}%)`;
            }

            if (minRange && maxRange) {
                // Sync range inputs from text inputs on page load
                if (minValInput) {
                    minRange.value = minValInput.value || 0;
                }
                if (maxValInput) {
                    maxRange.value = maxValInput.value || 0;
                }

                minRange.addEventListener('input', () => {
                    if (parseInt(maxRange.value) - parseInt(minRange.value) < 50) {
                        minRange.value = parseInt(maxRange.value) - 50;
                    }
                    if (minValInput) minValInput.value = minRange.value;
                    updateTrack();
                });

                maxRange.addEventListener('input', () => {
                    if (parseInt(maxRange.value) - parseInt(minRange.value) < 50) {
                        maxRange.value = parseInt(minRange.value) + 50;
                    }
                    if (maxValInput) maxValInput.value = maxRange.value;
                    updateTrack();
                });

                if (minValInput) {
                    minValInput.addEventListener('change', () => {
                        minRange.value = minValInput.value;
                        updateTrack();
                    });
                }

                if (maxValInput) {
                    maxValInput.addEventListener('change', () => {
                        maxRange.value = maxValInput.value;
                        updateTrack();
                    });
                }

                updateTrack();
            }
        });

        function applySort(val) {
            const url = new URL(window.location.href);
            url.searchParams.set('sort_by', val);
            window.location.href = url.toString();
        }
    </script>
@endpush
