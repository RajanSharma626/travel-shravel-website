@props([
    'image' => '',
    'featured' => false,
    'type' => 'Car Type',
    'title' => 'Car Model',
    'pax' => '0',
    'transmission' => 'manual',
    'bags' => '0',
    'doors' => '0',
    'price' => '₹0.00',
    'link' => '#'
])

<div class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300">
    <div class="relative h-60 bg-gray-50 p-8 flex items-center justify-center overflow-hidden">
        <a href="{{ $link }}" class="block w-full h-full">
            <img src="{{ $image }}" alt="{{ $title }}" class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover:scale-105 mx-auto">
        </a>
        
        @if($featured)
            <span class="absolute top-4 left-4 bg-red-600 text-white text-[10px] font-semibold uppercase tracking-wider px-3 py-1 rounded-sm shadow-sm">Featured</span>
        @endif
        
        <button class="absolute top-4 right-4 h-8 w-8 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-gray-400 hover:bg-white hover:text-red-500 transition-all border border-gray-100">
            <i class="fa-regular fa-heart"></i>
        </button>
    </div>
    <div class="p-6">
        <p class="text-[11px] text-gray-400 mb-1 font-medium uppercase tracking-wider">{{ $type }}</p>
        <h3 class="text-lg font-semibold text-gray-900 mb-6 group-hover:text-navy transition-colors h-14 line-clamp-2">
            <a href="{{ $link }}">{{ $title }}</a>
        </h3>
        
        <div class="grid grid-cols-4 gap-2 mb-8">
            <div class="bg-gray-50 rounded-lg p-1 text-center text-gray-500 border border-gray-50">
                <i class="fa-solid fa-users text-[11px] block mb-1"></i>
                <span class="text-[12px] font-medium">{{ $pax }}</span>
            </div>
            <div class="bg-gray-50 rounded-lg p-1 text-center text-gray-500 border border-gray-50">
                <i class="fa-solid fa-gear text-[11px] block mb-1"></i>
                <span class="text-[12px] font-medium">{{ $transmission }}</span>
            </div>
            <div class="bg-gray-50 rounded-lg p-1 text-center text-gray-500 border border-gray-50">
                <i class="fa-solid fa-briefcase text-[11px] block mb-1"></i>
                <span class="text-[12px] font-medium">{{ $bags }}</span>
            </div>
            <div class="bg-gray-50 rounded-lg p-1 text-center text-gray-500 border border-gray-50">
                <i class="fa-solid fa-door-open text-[11px] block mb-1"></i>
                <span class="text-[12px] font-medium">{{ $doors }}</span>
            </div>
        </div>

        <div class="pt-5 border-t border-gray-50 flex items-center justify-between">
            <div class="flex items-center gap-1">
                <span class="text-xl font-bold text-navy">{{ $price }}</span>
                <span class="text-[11px] text-gray-400">/ day</span>
            </div>
        </div>
    </div>
</div>
