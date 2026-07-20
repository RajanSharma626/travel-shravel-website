@extends('admin.layout')

@section('title', 'Tour Packages')
@section('page_title', 'Tour Packages')

@section('content')
<div class="space-y-4">
    <!-- Filters, Search & Add Button -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-3">
        <!-- Search & Filter Forms -->
        <form action="{{ route('admin.tours.index') }}" method="GET" class="w-full md:max-w-md flex flex-col sm:flex-row gap-2.5">
            <div class="relative flex-1">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search by tour title, location or city..." 
                       class="w-full pl-9 pr-3 py-1.5 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            </div>

            <button type="submit" class="py-1.5 px-4 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-blue-700 transition">
                Search
            </button>
            @if(request('search'))
                <a href="{{ route('admin.tours.index') }}" class="py-1.5 px-3 bg-slate-100 text-slate-600 rounded-lg text-xs font-semibold hover:bg-slate-200 transition text-center flex items-center justify-center">
                    Clear
                </a>
            @endif
        </form>

        <!-- Add New Tour Button -->
        <div class="w-full md:w-auto flex justify-end">
            <a href="{{ route('admin.tours.create') }}" class="py-1.5 px-4 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-blue-700 transition flex items-center gap-1.5">
                <i class="fa-solid fa-plus text-xs"></i> Add New Tour Package
            </a>
        </div>
    </div>

    <!-- Tours Cards Grid -->
    @if(count($tours) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($tours as $tour)
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col group hover:shadow-md hover:border-primary/20 transition duration-200">
            <!-- Image Header -->
            <div class="relative aspect-video bg-slate-100 overflow-hidden">
                @if($tour->primary_image)
                    <img src="{{ $tour->primary_image }}" alt="{{ $tour->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                @elseif(!empty($tour->images) && is_array($tour->images) && count($tour->images) > 0)
                    <img src="{{ $tour->images[0] }}" alt="{{ $tour->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                        <i class="fa-solid fa-map-location-dot text-4xl mb-2 text-slate-300"></i>
                        <span class="text-[10px] uppercase font-bold tracking-wider">No Image Available</span>
                    </div>
                @endif

                <!-- Status Badges -->
                <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                    @if($tour->is_active)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider bg-emerald-500 text-white shadow-sm w-max">
                            Active
                        </span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider bg-slate-500 text-white shadow-sm w-max">
                            Inactive
                        </span>
                    @endif

                    @if($tour->is_featured)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider bg-amber-500 text-white shadow-sm w-max">
                            Featured
                        </span>
                    @endif
                </div>

                <!-- Duration Badge Overlay -->
                <div class="absolute bottom-3 left-3 bg-black/60 px-2 py-0.5 rounded-md backdrop-blur-sm flex items-center gap-1.5">
                    <i class="fa-regular fa-clock text-white text-[10px]"></i>
                    <span class="text-[9px] text-white font-bold uppercase tracking-wider">{{ $tour->duration_days }} Days / {{ $tour->duration_nights }} Nights</span>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-4 flex-1 flex flex-col justify-between space-y-3">
                <div class="space-y-1">
                    <div class="flex items-center justify-between">
                        <span class="text-[9px] font-bold text-primary uppercase tracking-wider bg-blue-50 px-2 py-0.5 rounded">{{ $tour->tour_type ?? 'Standard' }}</span>
                        @if($tour->group_size)
                            <span class="text-[9px] text-slate-500 font-semibold flex items-center gap-1"><i class="fa-solid fa-user-group text-slate-400"></i> Max {{ $tour->group_size }}</span>
                        @endif
                    </div>
                    <h3 class="font-bold text-slate-800 text-sm leading-tight truncate group-hover:text-primary transition mt-1" title="{{ $tour->title }}">{{ $tour->title }}</h3>
                    <p class="text-[10px] text-slate-400 font-semibold flex items-center gap-1">
                        <i class="fa-solid fa-location-dot text-slate-300"></i>
                        <span>{{ $tour->location }}</span>
                    </p>
                </div>

                <!-- Highlights Preview (First 3) -->
                @if(!empty($tour->highlights) && is_array($tour->highlights) && count($tour->highlights) > 0)
                <div class="flex flex-wrap gap-1 pt-1">
                    @foreach(array_slice($tour->highlights, 0, 2) as $highlight)
                    <span class="text-[8px] font-bold text-slate-600 bg-slate-100 px-1.5 py-0.5 rounded truncate max-w-[120px]">{{ $highlight }}</span>
                    @endforeach
                    @if(count($tour->highlights) > 2)
                    <span class="text-[8px] font-bold text-primary bg-blue-50 px-1.5 py-0.5 rounded">+{{ count($tour->highlights) - 2 }} more</span>
                    @endif
                </div>
                @endif

                <div class="border-t border-slate-100 pt-3 flex items-center justify-between">
                    <div>
                        <p class="text-[9px] text-slate-400 font-semibold uppercase tracking-wider">Starting Price</p>
                        <p class="text-xs font-extrabold text-slate-800">₹{{ number_format($tour->price, 2) }}</p>
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex items-center gap-1.5">
                        <a href="{{ route('admin.tours.edit', $tour->id) }}" 
                           class="w-8 h-8 bg-blue-50 hover:bg-primary hover:text-white rounded-lg flex items-center justify-center text-primary transition shadow-sm border border-blue-100" 
                           title="Edit Tour Package">
                            <i class="fa-solid fa-pen text-xs"></i>
                        </a>
                        <form action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tour package?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-8 h-8 bg-rose-50 hover:bg-rose-600 hover:text-white rounded-lg flex items-center justify-center text-rose-600 transition shadow-sm border border-rose-100" 
                                    title="Delete Tour Package">
                                <i class="fa-solid fa-trash-can text-xs"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    @if($tours->hasPages())
    <div class="mt-6 bg-white p-3 rounded-xl border border-slate-200 shadow-sm">
        {{ $tours->links() }}
    </div>
    @endif

    @else
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-12 text-center text-slate-400 font-medium">
        <i class="fa-solid fa-map-location-dot text-4xl mb-3 text-slate-300 block"></i>
        No tour packages found. Add some tour packages to get started!
    </div>
    @endif
</div>
@endsection
