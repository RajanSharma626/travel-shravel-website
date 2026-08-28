@extends('layouts.app')

@section('title', 'Car Rental | Travel Shravel')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    /* Modern Flatpickr Calendar Styling */
    .flatpickr-calendar { 
        box-shadow: 0 10px 40px rgba(0,0,0,0.1) !important; 
        border: 1px solid #f3f4f6 !important; 
        border-radius: 24px !important; 
        padding: 10px !important; 
    }
    .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, .flatpickr-day.selected.inRange, .flatpickr-day.startRange.inRange, .flatpickr-day.endRange.inRange, .flatpickr-day.selected:focus, .flatpickr-day.startRange:focus, .flatpickr-day.endRange:focus, .flatpickr-day.selected:hover, .flatpickr-day.startRange:hover, .flatpickr-day.endRange:hover, .flatpickr-day.selected.prevMonthDay, .flatpickr-day.startRange.prevMonthDay, .flatpickr-day.endRange.prevMonthDay, .flatpickr-day.selected.nextMonthDay, .flatpickr-day.startRange.nextMonthDay, .flatpickr-day.endRange.nextMonthDay { 
        background: #4b8df8 !important; 
        border-color: #4b8df8 !important; 
    }
    .flatpickr-day.inRange {
        background: #e8f1fd !important;
        border-color: #e8f1fd !important;
        box-shadow: -5px 0 0 #e8f1fd, 5px 0 0 #e8f1fd !important;
        color: #1e3a8a !important;
    }

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
    .list-layout {
        display: flex !important;
        flex-direction: column !important;
        gap: 1.25rem !important;
    }
    
    /* Mobile (< 640px) List View */
    @media (max-width: 639px) {
        .list-layout .list-view-horizontal {
            flex-direction: row !important;
            height: auto !important;
            min-height: 135px;
            align-items: stretch;
            border-radius: 1rem;
            overflow: hidden;
        }
        .list-layout .list-view-horizontal > div:first-child {
            width: 120px !important;
            height: auto !important;
            min-height: 100% !important;
            flex-shrink: 0 !important;
            align-self: stretch;
            position: relative;
        }
        .list-layout .list-view-horizontal > div:first-child img {
            height: 100% !important;
            width: 100% !important;
            object-fit: cover !important;
            position: absolute;
            inset: 0;
        }
        .list-layout .list-view-horizontal > div:last-child {
            padding: 0.75rem 0.875rem !important;
            min-width: 0 !important;
            flex: 1 1 0% !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: space-between !important;
        }
        .list-layout .list-view-horizontal h3 {
            font-size: 0.875rem !important;
            line-height: 1.25rem !important;
            margin-bottom: 0.25rem !important;
            display: -webkit-box !important;
            -webkit-line-clamp: 2 !important;
            -webkit-box-orient: vertical !important;
            overflow: hidden !important;
        }
        .list-layout .list-view-horizontal p {
            font-size: 0.75rem !important;
            margin-bottom: 0.25rem !important;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .list-layout .list-view-horizontal .pt-3 {
            padding-top: 0.35rem !important;
        }
        .list-layout .list-view-horizontal button {
            width: 1.75rem !important;
            height: 1.75rem !important;
            top: 0.375rem !important;
            right: 0.375rem !important;
            font-size: 0.7rem !important;
        }
        .list-layout .list-view-horizontal span.bg-india-green,
        .list-layout .list-view-horizontal span.bg-red-600 {
            top: 0.375rem !important;
            left: 0.375rem !important;
            padding: 0.125rem 0.375rem !important;
            font-size: 8px !important;
        }
    }

    /* Tablet & Desktop (>= 640px) List View */
    @media (min-width: 640px) {
        .list-layout .list-view-horizontal {
            flex-direction: row !important;
            height: auto !important;
            align-items: stretch;
        }
        .list-layout .list-view-horizontal > div:first-child {
            width: 240px !important;
            height: auto !important;
            min-height: 100% !important;
            flex-shrink: 0 !important;
            align-self: stretch;
            position: relative;
        }
        @media (min-width: 1024px) {
            .list-layout .list-view-horizontal > div:first-child {
                width: 280px !important;
            }
        }
        .list-layout .list-view-horizontal > div:first-child img {
            height: 100% !important;
            width: 100% !important;
            object-fit: cover !important;
            position: absolute;
            inset: 0;
        }
        .list-layout .list-view-horizontal > div:last-child {
            padding: 1.5rem !important;
            min-width: 0 !important;
            flex: 1 1 0% !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: space-between !important;
        }
        .list-layout .list-view-horizontal .md\:list-view-features-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
            max-width: 100% !important;
        }
    }
</style>
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="relative min-h-[480px] sm:min-h-[520px] md:h-[520px] w-full flex items-center justify-center py-10 md:py-0 z-20">
        {{-- Background Image --}}
        <div class="absolute inset-0 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1688957511049-5433847253ec?auto=format&fit=crop&q=80&w=1920" alt="Car Rental Hero"
                class="h-full w-full object-cover">
            {{-- Shadow Overlay --}}
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        {{-- Hero Content --}}
        <div class="relative w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Hero Title & Subline --}}
            <div class="text-center mb-8 sm:mb-12">
                <h1 class="text-4xl sm:text-5xl md:text-6xl text-white font-libre-baskerville mb-3 sm:mb-4 drop-shadow-lg tracking-wide uppercase">
                    Cars
                </h1>
                <p class="text-sm sm:text-base md:text-xl text-white/90 tracking-wide drop-shadow-sm max-w-xl mx-auto">
                    Your perfect ride for every destination
                </p>
            </div>

            {{-- Search Bar Layout --}}
            <div class="w-full max-w-5xl mx-auto">
                <form action="" method="GET"
                    class="bg-white rounded-3xl md:rounded-full shadow-[0_20px_50px_rgba(0,0,0,0.25)] p-2.5 sm:p-3 flex flex-col md:flex-row items-stretch md:items-center gap-0 w-full">
                    
                    {{-- Location --}}
                    <div class="flex-1 flex items-center gap-3 sm:gap-4 px-4 sm:px-6 md:px-7 py-3 md:py-3 border-b md:border-b-0 md:border-r border-gray-100 group cursor-pointer hover:bg-gray-50/50 rounded-2xl md:rounded-l-full md:rounded-r-none transition-all">
                        <div class="w-10 h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors flex-shrink-0">
                            <i class="fa-solid fa-location-dot text-lg sm:text-xl"></i>
                        </div>
                        <div class="text-left flex-1 min-w-0">
                            <p class="text-[12px] sm:text-[13px] font-semibold text-gray-900 leading-tight">Location</p>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Where are you going?" 
                                class="w-full bg-transparent border-none p-0 text-[13px] sm:text-sm text-gray-900 focus:ring-0 placeholder-gray-400 font-medium outline-none">
                        </div>
                    </div>

                    {{-- Dates Range Selector --}}
                    <div id="date-picker-trigger" class="flex-none flex items-center justify-between sm:justify-start border-b md:border-b-0 md:border-r border-gray-100 cursor-pointer hover:bg-gray-50/50 transition-all py-1 md:py-0 px-2 sm:px-4 md:px-0">
                        {{-- Pick-up --}}
                        <div class="flex items-center gap-2.5 sm:gap-3 px-3 sm:px-4 md:px-6 py-2.5 md:py-3 group flex-1 sm:flex-initial">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors flex-shrink-0">
                                <i class="fa-regular fa-calendar-plus text-lg sm:text-xl"></i>
                            </div>
                            <div class="text-left min-w-0">
                                <p class="text-[12px] sm:text-[13px] font-semibold text-gray-900 leading-tight">Pick-up</p>
                                <input type="text" id="check_in_input" name="check_in" value="{{ request('check_in', '13/03/2026') }}" placeholder="Add date" readonly
                                    class="w-20 sm:w-24 bg-transparent border-none p-0 text-[12px] sm:text-[13px] text-gray-900 focus:ring-0 placeholder-gray-400 font-medium outline-none cursor-pointer pointer-events-none">
                            </div>
                        </div>

                        {{-- Arrow --}}
                        <div class="flex-none px-1 text-gray-300">
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </div>

                        {{-- Drop-off --}}
                        <div class="flex items-center gap-2.5 sm:gap-3 px-3 sm:px-4 md:px-6 py-2.5 md:py-3 group flex-1 sm:flex-initial">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 flex items-center justify-center text-gray-400 group-hover:text-saffron transition-colors flex-shrink-0">
                                <i class="fa-regular fa-calendar-check text-lg sm:text-xl"></i>
                            </div>
                            <div class="text-left min-w-0">
                                <p class="text-[12px] sm:text-[13px] font-semibold text-gray-900 leading-tight">Drop-off</p>
                                <input type="text" id="check_out_input" name="check_out" value="{{ request('check_out', '14/03/2026') }}" placeholder="Add date" readonly
                                    class="w-20 sm:w-24 bg-transparent border-none p-0 text-[12px] sm:text-[13px] text-gray-900 focus:ring-0 placeholder-gray-400 font-medium outline-none cursor-pointer pointer-events-none">
                            </div>
                        </div>
                    </div>

                    {{-- Search Button --}}
                    <div class="p-1 mt-2 md:mt-0">
                        <button type="submit" class="w-full md:w-auto bg-saffron text-white px-8 md:px-12 py-3.5 md:py-4 rounded-2xl md:rounded-full shadow-lg hover:bg-saffron/90 transition-all active:scale-95 flex items-center justify-center gap-2.5 font-semibold text-sm whitespace-nowrap">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Main Content Section --}}
    <section class="py-8 sm:py-12 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- List Header --}}
            @php
                $currentSort = request('sort_by', 'recommended');
                $sortLabels = [
                    'recommended' => 'Recommended',
                    'new' => 'New car',
                    'price_asc' => 'Low to High',
                    'price_desc' => 'High to Low',
                    'name_asc' => 'a - z',
                    'name_desc' => 'z - a'
                ];
                $currentLabel = $sortLabels[$currentSort] ?? 'Recommended';
            @endphp
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 sm:mb-8 pb-3 border-b border-gray-100 gap-4">
                <div>
                    <p class="text-base font-bold text-gray-900 flex items-center gap-2.5">
                        {{ $cars->total() }} {{ Str::plural('Car', $cars->total()) }} Found
                    </p>
                </div>
                <div class="flex items-center gap-3 w-full sm:w-auto justify-between sm:justify-start">
                    {{-- Mobile Filter Drawer Toggle Button --}}
                    <button type="button" id="mobile-filter-open-btn"
                        class="lg:hidden flex items-center gap-2 px-4 py-2 bg-navy text-white rounded-full text-xs font-semibold shadow-sm hover:bg-navy/90 active:scale-95 transition-all">
                        <i class="fa-solid fa-sliders text-[11px]"></i>
                        <span>Filters</span>
                        @if(request()->filled('category') || (request()->filled('min_price') && request('min_price') > 0) || (request()->filled('max_price') && request('max_price') > 0))
                            <span class="w-2 h-2 rounded-full bg-saffron inline-block"></span>
                        @endif
                    </button>

                    <div class="flex items-center gap-3">
                        <div class="relative" id="sort-dropdown-container">
                            <button id="sort-dropdown-button"
                                class="flex items-center gap-2 px-3.5 sm:px-4 py-2 bg-gray-50/80 border border-gray-200/50 rounded-full cursor-pointer hover:bg-gray-100/50 hover:border-gray-200 transition-all group">
                                <i class="fa-solid fa-arrow-down-wide-short text-[12px] text-gray-400 group-hover:text-saffron transition-colors"></i>
                                <span class="text-xs sm:text-[13px] font-medium text-gray-500">Sort:</span>
                                <span class="text-xs sm:text-[13px] font-medium text-gray-900">{{ $currentLabel }}</span>
                                <i id="sort-dropdown-arrow" class="fa-solid fa-chevron-down text-[10px] text-gray-400 ml-1 transition-transform duration-200"></i>
                            </button>

                            <!-- Dropdown Menu -->
                            <div id="sort-dropdown-menu" class="hidden absolute right-0 mt-2 w-56 rounded-2xl bg-white p-4 shadow-2xl border border-gray-100/80 z-50">
                                <div class="space-y-4">
                                    {{-- Option: New car --}}
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="radio" name="sort_by" value="new" class="peer hidden" {{ $currentSort == 'new' ? 'checked' : '' }} onclick="applySort('new')">
                                        <div class="w-4 h-4 rounded-full border border-gray-300 flex items-center justify-center peer-checked:border-saffron group-hover:border-saffron transition-all">
                                            <div class="w-2 h-2 rounded-full bg-saffron scale-0 peer-checked:scale-100 transition-transform"></div>
                                        </div>
                                        <span class="text-[13px] text-gray-600 font-medium group-hover:text-gray-900 peer-checked:text-gray-950 transition-colors">New car</span>
                                    </label>

                                    {{-- Section: Price --}}
                                    <div class="space-y-2">
                                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Price</span>
                                        <div class="space-y-3 pl-1">
                                            <label class="flex items-center gap-3 cursor-pointer group">
                                                <input type="radio" name="sort_by" value="price_asc" class="peer hidden" {{ $currentSort == 'price_asc' ? 'checked' : '' }} onclick="applySort('price_asc')">
                                                <div class="w-4 h-4 rounded-full border border-gray-300 flex items-center justify-center peer-checked:border-saffron group-hover:border-saffron transition-all">
                                                    <div class="w-2 h-2 rounded-full bg-saffron scale-0 peer-checked:scale-100 transition-transform"></div>
                                                </div>
                                                <span class="text-[13px] text-gray-600 font-medium group-hover:text-gray-900 peer-checked:text-gray-950 transition-colors">Low to High</span>
                                            </label>
                                            <label class="flex items-center gap-3 cursor-pointer group">
                                                <input type="radio" name="sort_by" value="price_desc" class="peer hidden" {{ $currentSort == 'price_desc' ? 'checked' : '' }} onclick="applySort('price_desc')">
                                                <div class="w-4 h-4 rounded-full border border-gray-300 flex items-center justify-center peer-checked:border-saffron group-hover:border-saffron transition-all">
                                                    <div class="w-2 h-2 rounded-full bg-saffron scale-0 peer-checked:scale-100 transition-transform"></div>
                                                </div>
                                                <span class="text-[13px] text-gray-600 font-medium group-hover:text-gray-900 peer-checked:text-gray-950 transition-colors">High to Low</span>
                                            </label>
                                        </div>
                                    </div>

                                    {{-- Section: Name --}}
                                    <div class="space-y-2">
                                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Name</span>
                                        <div class="space-y-3 pl-1">
                                            <label class="flex items-center gap-3 cursor-pointer group">
                                                <input type="radio" name="sort_by" value="name_asc" class="peer hidden" {{ $currentSort == 'name_asc' ? 'checked' : '' }} onclick="applySort('name_asc')">
                                                <div class="w-4 h-4 rounded-full border border-gray-300 flex items-center justify-center peer-checked:border-saffron group-hover:border-saffron transition-all">
                                                    <div class="w-2 h-2 rounded-full bg-saffron scale-0 peer-checked:scale-100 transition-transform"></div>
                                                </div>
                                                <span class="text-[13px] text-gray-600 font-medium group-hover:text-gray-900 peer-checked:text-gray-950 transition-colors">a - z</span>
                                            </label>
                                            <label class="flex items-center gap-3 cursor-pointer group">
                                                <input type="radio" name="sort_by" value="name_desc" class="peer hidden" {{ $currentSort == 'name_desc' ? 'checked' : '' }} onclick="applySort('name_desc')">
                                                <div class="w-4 h-4 rounded-full border border-gray-300 flex items-center justify-center peer-checked:border-saffron group-hover:border-saffron transition-all">
                                                    <div class="w-2 h-2 rounded-full bg-saffron scale-0 peer-checked:scale-100 transition-transform"></div>
                                                </div>
                                                <span class="text-[13px] text-gray-600 font-medium group-hover:text-gray-900 peer-checked:text-gray-950 transition-colors">z - a</span>
                                            </label>
                                        </div>
                                    </div>

                                    @if ($currentSort !== 'recommended')
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
            </div>

            <div class="flex flex-col lg:flex-row gap-8 items-start">
                
                {{-- Left Sidebar / Mobile Filter Drawer --}}
                <div id="filters-sidebar-container" class="fixed inset-0 z-[100] lg:relative lg:inset-auto lg:z-auto lg:w-[280px] lg:flex-shrink-0 invisible pointer-events-none lg:visible lg:pointer-events-auto transition-all duration-300">
                    {{-- Mobile Backdrop --}}
                    <div id="filters-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-sm opacity-0 transition-opacity duration-300 lg:hidden"></div>

                    {{-- Filter Panel --}}
                    <div id="filters-panel" class="fixed inset-y-0 right-0 w-[320px] sm:w-[380px] max-w-[90vw] bg-white shadow-2xl z-10 translate-x-full lg:translate-x-0 lg:static lg:w-full lg:bg-transparent lg:shadow-none transition-transform duration-300 overflow-y-auto lg:overflow-visible flex flex-col p-6 lg:p-0">
                        
                        {{-- Mobile Filter Drawer Header --}}
                        <div class="flex items-center justify-between pb-4 mb-4 border-b border-gray-100 lg:hidden">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-sliders text-navy"></i>
                                <h3 class="text-base font-bold text-navy">Filter Cars</h3>
                            </div>
                            <button type="button" id="filters-close-btn" class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-gray-200 transition-colors focus:outline-none" aria-label="Close filters">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>

                        <form id="filters-form" method="GET" action="" class="flex flex-col gap-6">
                            {{-- Preserve other URL query parameter states --}}
                            @foreach(request()->except(['min_price', 'max_price', 'category', 'page']) as $key => $value)
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
                                        <input type="range" id="price_range_min" min="0" max="10000" step="100" value="{{ request('min_price', 0) }}">
                                        <input type="range" id="price_range_max" min="0" max="10000" step="100" value="{{ request('max_price', 0) }}">
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 mb-6">
                                    <div class="flex-1">
                                        <label class="text-[10px] text-gray-400 uppercase font-semibold mb-1 block">Min price</label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[13px] text-gray-900">₹</span>
                                            <input type="number" id="filter_min_price" name="min_price" value="{{ request('min_price', 0) }}" placeholder="0"
                                                class="w-full pl-6 pr-3 py-2 bg-gray-50 border-none rounded-lg text-[13px] font-medium focus:ring-1 focus:ring-saffron/20 outline-none">
                                        </div>
                                    </div>
                                    <span class="text-gray-300 mt-5">—</span>
                                    <div class="flex-1">
                                        <label class="text-[10px] text-gray-400 uppercase font-semibold mb-1 block">Max price</label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[13px] text-gray-900">₹</span>
                                            <input type="number" id="filter_max_price" name="max_price" value="{{ request('max_price', 0) }}" placeholder="10000"
                                                class="w-full pl-6 pr-3 py-2 bg-gray-50 border-none rounded-lg text-[13px] font-medium focus:ring-1 focus:ring-saffron/20 outline-none">
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between border-t border-gray-50 pt-4">
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

                            {{-- Categories --}}
                            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                                <div class="flex items-center justify-between mb-6">
                                    <h3 class="text-[15px] font-semibold text-gray-900">Categories</h3>
                                </div>
                                <div class="space-y-3 mb-4">
                                    @foreach(['Convertibles', 'Coupes', 'Hatchbacks', 'Minivans', 'Sedan', 'SUV'] as $category)
                                    <label class="flex items-center gap-3 group cursor-pointer">
                                        <input type="radio" name="category" value="{{ $category }}" 
                                            class="w-4 h-4 border-gray-300 text-saffron focus:ring-saffron cursor-pointer" 
                                            {{ request('category') == $category ? 'checked' : '' }}
                                            onchange="document.getElementById('filters-form').submit();">
                                        <span class="text-[14px] text-gray-600 truncate">{{ $category }}</span>
                                    </label>
                                    @endforeach
                                </div>
                                @if(request()->filled('category'))
                                    <button type="button" onclick="document.querySelectorAll('input[name=\'category\']').forEach(r => r.checked = false); document.getElementById('filters-form').submit();"
                                        class="text-[13px] font-semibold text-saffron hover:underline">
                                        Clear Category
                                    </button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Right Content: Car List --}}
                <div class="flex-1 min-w-0 w-full">
                    {{-- Car Grid --}}
                    <div id="car-list-container" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5 sm:gap-6">
                        @forelse($cars as $car)
                            <x-car-card 
                                :image="$car->primary_image ?: (!empty($car->images) && is_array($car->images) ? $car->images[0] : 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?auto=format&fit=crop&q=80&w=800')"
                                :featured="$car->is_featured"
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
                            <div class="col-span-full py-16 sm:py-20 flex flex-col items-center justify-center text-center bg-gray-50/50 rounded-3xl border border-gray-100">
                                <div class="w-20 h-20 bg-saffron/10 text-saffron rounded-full flex items-center justify-center mb-6">
                                    <i class="fa-solid fa-car text-3xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">No Cars Found</h3>
                                <p class="text-gray-500 text-[14px] max-w-md leading-relaxed mb-8 px-4">
                                    We couldn't find any cars matching your current search or filters.
                                </p>
                                @if(request()->filled('search') || (request()->filled('min_price') && request('min_price') > 0) || (request()->filled('max_price') && request('max_price') > 0) || request()->filled('category'))
                                    <a href="{{ request()->url() }}" class="inline-flex items-center gap-2 px-6 py-3 bg-saffron text-white rounded-xl text-[13px] font-semibold hover:bg-saffron/90 shadow-lg shadow-saffron/20 transition-all duration-200">
                                        <i class="fa-solid fa-rotate-right text-xs"></i>
                                        Reset Search & Filters
                                    </a>
                                @endif
                            </div>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-10 sm:mt-12 flex justify-center items-center">
                        {{ $cars->links() }}
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
            // Flatpickr Range Initialization
            const checkInEl = document.getElementById('check_in_input');
            const checkOutEl = document.getElementById('check_out_input');
            const defaultDates = [];
            if (checkInEl && checkInEl.value) defaultDates.push(checkInEl.value);
            if (checkOutEl && checkOutEl.value) defaultDates.push(checkOutEl.value);

            flatpickr("#date-picker-trigger", {
                mode: "range",
                minDate: "today",
                showMonths: window.innerWidth > 768 ? 2 : 1,
                dateFormat: "d/m/Y",
                defaultDate: defaultDates.length > 0 ? defaultDates : undefined,
                onChange: function(selectedDates, dateStr, instance) {
                    const inInput = document.getElementById('check_in_input');
                    const outInput = document.getElementById('check_out_input');

                    if (selectedDates.length > 0) {
                        const checkIn = selectedDates[0];
                        if (inInput) inInput.value = instance.formatDate(checkIn, "d/m/Y");
                    } else {
                        if (inInput) inInput.value = "";
                    }
                    
                    if (selectedDates.length > 1) {
                        const checkOut = selectedDates[1];
                        if (outInput) outInput.value = instance.formatDate(checkOut, "d/m/Y");
                    } else {
                        if (outInput) outInput.value = "";
                    }
                }
            });

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
            const container = document.getElementById('car-list-container');

            // Check stored view mode preference
            const currentMode = localStorage.getItem('car_view_mode') || 'grid';
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
                localStorage.setItem('car_view_mode', 'list');
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
                localStorage.setItem('car_view_mode', 'grid');
                if (container) {
                    container.className = "grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5 sm:gap-6";
                }
                if (gridBtn) {
                    gridBtn.className = "w-8 h-8 flex items-center justify-center rounded-full text-saffron bg-white shadow-sm border border-gray-200/20";
                }
                if (listBtn) {
                    listBtn.className = "w-8 h-8 flex items-center justify-center rounded-full text-gray-400 hover:text-gray-900 transition-all";
                }
            }

            // Mobile Filter Drawer
            const mobileFilterOpenBtn = document.getElementById('mobile-filter-open-btn');
            const filtersCloseBtn = document.getElementById('filters-close-btn');
            const filtersContainer = document.getElementById('filters-sidebar-container');
            const filtersBackdrop = document.getElementById('filters-backdrop');
            const filtersPanel = document.getElementById('filters-panel');

            function openMobileFilters() {
                if (!filtersContainer || !filtersBackdrop || !filtersPanel) return;
                filtersContainer.classList.remove('invisible', 'pointer-events-none');
                filtersContainer.classList.add('visible', 'pointer-events-auto');
                filtersBackdrop.classList.remove('opacity-0');
                filtersBackdrop.classList.add('opacity-100');
                filtersPanel.classList.remove('translate-x-full');
                filtersPanel.classList.add('translate-x-0');
                document.body.classList.add('overflow-hidden');
            }

            function closeMobileFilters() {
                if (!filtersContainer || !filtersBackdrop || !filtersPanel) return;
                filtersBackdrop.classList.remove('opacity-100');
                filtersBackdrop.classList.add('opacity-0');
                filtersPanel.classList.remove('translate-x-0');
                filtersPanel.classList.add('translate-x-full');
                document.body.classList.remove('overflow-hidden');
                setTimeout(() => {
                    if (window.innerWidth < 1024) {
                        filtersContainer.classList.remove('visible', 'pointer-events-auto');
                        filtersContainer.classList.add('invisible', 'pointer-events-none');
                    }
                }, 300);
            }

            if (mobileFilterOpenBtn) mobileFilterOpenBtn.addEventListener('click', openMobileFilters);
            if (filtersCloseBtn) filtersCloseBtn.addEventListener('click', closeMobileFilters);
            if (filtersBackdrop) filtersBackdrop.addEventListener('click', closeMobileFilters);

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

                sliderTrack.style.background = `linear-gradient(to right, #f3f4f6 ${percent1}%, #2563EB ${percent1}%, #2563EB ${percent2}%, #f3f4f6 ${percent2}%)`;
            }

            if (minRange && maxRange) {
                if (minValInput) minRange.value = minValInput.value || 0;
                if (maxValInput) maxRange.value = maxValInput.value || 0;

                minRange.addEventListener('input', () => {
                    if (parseInt(maxRange.value) - parseInt(minRange.value) < 100) {
                        minRange.value = parseInt(maxRange.value) - 100;
                    }
                    if (minValInput) minValInput.value = minRange.value;
                    updateTrack();
                });

                maxRange.addEventListener('input', () => {
                    if (parseInt(maxRange.value) - parseInt(minRange.value) < 100) {
                        maxRange.value = parseInt(minRange.value) + 100;
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
