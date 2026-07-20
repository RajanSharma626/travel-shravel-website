@extends('admin.layout')

@section('title', 'Cars')
@section('page_title', 'Cars')

@section('content')
<div class="space-y-4">
    <!-- Filters, Search & Add Button -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-3">
        <!-- Search & Filter Forms -->
        <form action="{{ route('admin.cars.index') }}" method="GET" class="w-full md:max-w-md flex flex-col sm:flex-row gap-2.5">
            <div class="relative flex-1">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search by car name or category..." 
                       class="w-full pl-9 pr-3 py-1.5 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            </div>

            <button type="submit" class="py-1.5 px-4 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-blue-700 transition">
                Search
            </button>
            @if(request('search'))
                <a href="{{ route('admin.cars.index') }}" class="py-1.5 px-3 bg-slate-100 text-slate-600 rounded-lg text-xs font-semibold hover:bg-slate-200 transition text-center flex items-center justify-center">
                    Clear
                </a>
            @endif
        </form>

        <!-- Add New Car Button -->
        <div class="w-full md:w-auto flex justify-end">
            <a href="{{ route('admin.cars.create') }}" class="py-1.5 px-4 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-blue-700 transition flex items-center gap-1.5">
                <i class="fa-solid fa-plus text-xs"></i> Add New Car
            </a>
        </div>
    </div>

    <!-- Cars Cards Grid -->
    @if(count($cars) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($cars as $car)
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col group hover:shadow-md hover:border-primary/20 transition duration-200">
            <!-- Image Header -->
            <div class="relative aspect-video bg-slate-100 overflow-hidden flex items-center justify-center p-4">
                @if($car->primary_image)
                    <img src="{{ $car->primary_image }}" alt="{{ $car->name }}" class="max-w-full max-h-full object-contain mix-blend-multiply group-hover:scale-105 transition duration-300">
                @elseif(!empty($car->images) && is_array($car->images) && count($car->images) > 0)
                    <img src="{{ $car->images[0] }}" alt="{{ $car->name }}" class="max-w-full max-h-full object-contain mix-blend-multiply group-hover:scale-105 transition duration-300">
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                        <i class="fa-solid fa-car text-4xl mb-2 text-slate-300"></i>
                        <span class="text-[10px] uppercase font-bold tracking-wider">No Image Available</span>
                    </div>
                @endif

                <!-- Status Badges -->
                <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                    @if($car->is_active)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider bg-emerald-500 text-white shadow-sm w-max">
                            Active
                        </span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider bg-slate-500 text-white shadow-sm w-max">
                            Inactive
                        </span>
                    @endif

                    @if($car->is_featured)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider bg-amber-500 text-white shadow-sm w-max">
                            Featured
                        </span>
                    @endif
                </div>

                <!-- Category Badge Overlay -->
                <div class="absolute bottom-3 left-3 bg-black/60 px-2 py-0.5 rounded-md backdrop-blur-sm flex items-center gap-1.5">
                    <span class="text-[9px] text-white font-bold uppercase tracking-wider">{{ $car->category }}</span>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-4 flex-1 flex flex-col justify-between space-y-3">
                <div class="space-y-1">
                    <h3 class="font-bold text-slate-800 text-sm leading-tight truncate group-hover:text-primary transition" title="{{ $car->name }}">{{ $car->name }}</h3>
                    <div class="flex items-center gap-3 pt-1 text-[10px] text-slate-500 font-semibold">
                        <span class="flex items-center gap-1"><i class="fa-solid fa-user text-slate-400"></i> {{ $car->passengers }} Pax</span>
                        <span class="flex items-center gap-1"><i class="fa-solid fa-gear text-slate-400"></i> {{ $car->transmission }}</span>
                        <span class="flex items-center gap-1"><i class="fa-solid fa-briefcase text-slate-400"></i> {{ $car->bags }} Bags</span>
                    </div>
                </div>

                <!-- Features Preview (First 2) -->
                @if(!empty($car->features) && is_array($car->features) && count($car->features) > 0)
                <div class="flex flex-wrap gap-1 pt-1">
                    @foreach(array_slice($car->features, 0, 2) as $feature)
                    <span class="text-[8px] font-bold text-slate-600 bg-slate-100 px-1.5 py-0.5 rounded truncate max-w-[120px]">{{ $feature }}</span>
                    @endforeach
                    @if(count($car->features) > 2)
                    <span class="text-[8px] font-bold text-primary bg-blue-50 px-1.5 py-0.5 rounded">+{{ count($car->features) - 2 }} more</span>
                    @endif
                </div>
                @endif

                <div class="border-t border-slate-100 pt-3 flex items-center justify-between">
                    <div>
                        <p class="text-[9px] text-slate-400 font-semibold uppercase tracking-wider">Rental Price / Day</p>
                        <p class="text-xs font-extrabold text-slate-800">₹{{ number_format($car->price, 2) }}</p>
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex items-center gap-1.5">
                        <a href="{{ route('admin.cars.edit', $car->id) }}" 
                           class="w-8 h-8 bg-blue-50 hover:bg-primary hover:text-white rounded-lg flex items-center justify-center text-primary transition shadow-sm border border-blue-100" 
                           title="Edit Car">
                            <i class="fa-solid fa-pen text-xs"></i>
                        </a>
                        <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this car?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-8 h-8 bg-rose-50 hover:bg-rose-600 hover:text-white rounded-lg flex items-center justify-center text-rose-600 transition shadow-sm border border-rose-100" 
                                    title="Delete Car">
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
    @if($cars->hasPages())
    <div class="mt-6 bg-white p-3 rounded-xl border border-slate-200 shadow-sm">
        {{ $cars->links() }}
    </div>
    @endif

    @else
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-12 text-center text-slate-400 font-medium">
        <i class="fa-solid fa-car text-4xl mb-3 text-slate-300 block"></i>
        No cars found. Add some cars to get started!
    </div>
    @endif
</div>
@endsection
