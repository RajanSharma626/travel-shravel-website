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

<a href="{{ $link }}" class="group flex flex-col list-view-horizontal bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
    <div class="relative h-48 sm:h-52 md:h-56 lg:h-60 md:list-view-image-w md:list-view-image-h bg-gray-50 p-4 sm:p-6 flex items-center justify-center overflow-hidden flex-shrink-0">
        <img src="{{ $image }}" alt="{{ $title }}" class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover:scale-105 mx-auto">
        
        @if($featured)
            <span class="absolute top-3 sm:top-4 left-3 sm:left-4 bg-india-green text-white text-[10px] font-semibold uppercase tracking-wider px-2.5 sm:px-3 py-1 rounded-sm shadow-sm">Featured</span>
        @endif
        
        <button onclick="event.preventDefault(); event.stopPropagation();" class="absolute top-3 sm:top-4 right-3 sm:right-4 h-8 w-8 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-gray-400 hover:bg-white hover:text-red-500 transition-all border border-gray-100 z-10">
            <i class="fa-regular fa-heart"></i>
        </button>
    </div>
    <div class="flex-1 p-4 sm:p-5 flex flex-col justify-between">
        <div>
            <p class="text-[11px] sm:text-xs text-saffron mb-1 font-semibold uppercase tracking-wider">{{ $type }}</p>
            <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-3 leading-snug group-hover:text-navy transition-colors line-clamp-2 md:list-view-title-h">
                {{ $title }}
            </h3>
            
            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-2 lg:grid-cols-4 gap-1.5 sm:gap-2 mb-4 md:list-view-features-grid">
                <div class="bg-gray-50 rounded-lg p-1.5 text-center text-gray-500 border border-gray-100">
                    <i class="fa-solid fa-users text-[11px] text-gray-400 block mb-0.5"></i>
                    <span class="text-[11px] font-semibold text-gray-700">{{ $pax }}</span>
                </div>
                <div class="bg-gray-50 rounded-lg p-1.5 text-center text-gray-500 border border-gray-100">
                    <i class="fa-solid fa-gear text-[11px] text-gray-400 block mb-0.5"></i>
                    <span class="text-[11px] font-semibold text-gray-700 capitalize truncate block">{{ $transmission }}</span>
                </div>
                <div class="bg-gray-50 rounded-lg p-1.5 text-center text-gray-500 border border-gray-100">
                    <i class="fa-solid fa-briefcase text-[11px] text-gray-400 block mb-0.5"></i>
                    <span class="text-[11px] font-semibold text-gray-700">{{ $bags }}</span>
                </div>
                <div class="bg-gray-50 rounded-lg p-1.5 text-center text-gray-500 border border-gray-100">
                    <i class="fa-solid fa-door-open text-[11px] text-gray-400 block mb-0.5"></i>
                    <span class="text-[11px] font-semibold text-gray-700">{{ $doors }}</span>
                </div>
            </div>
        </div>

        <div class="pt-3 border-t border-gray-50 flex items-center justify-between mt-auto">
            <div class="flex items-baseline gap-1">
                <span class="text-base sm:text-lg font-bold text-navy">{{ $price }}</span>
                <span class="text-[11px] sm:text-xs text-gray-400 font-medium">/ day</span>
            </div>
            <span class="text-xs text-saffron font-semibold group-hover:translate-x-0.5 transition-transform flex items-center gap-1">
                View <i class="fa-solid fa-arrow-right text-[10px]"></i>
            </span>
        </div>
    </div>
</a>
