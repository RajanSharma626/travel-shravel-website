@props([
    'image' => '',
    'featured' => false,
    'location' => 'Location',
    'title' => 'Activity Title',
    'rating' => '0',
    'reviewCount' => '0',
    'price' => '₹0.00',
    'duration' => '0 Hours',
    'link' => '#'
])

<div class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300">
    <div class="relative h-60 overflow-hidden">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        
        @if($featured)
            <span class="absolute top-4 left-4 bg-red-600 text-white text-[10px] font-semibold uppercase tracking-wider px-3 py-1 rounded-sm shadow-sm">Featured</span>
        @endif
        
        <button class="absolute top-4 right-4 h-8 w-8 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white hover:text-red-500 transition-all">
            <i class="fa-regular fa-heart"></i>
        </button>
    </div>
    <div class="p-6">
        <div class="flex items-center gap-1.5 text-gray-400 text-[11px] font-medium mb-3">
            <i class="fa-solid fa-location-dot"></i>
            <span>{{ $location }}</span>
        </div>
        
        <h3 class="text-lg font-semibold text-gray-900 mb-3 leading-snug group-hover:text-navy transition-colors h-14 line-clamp-2">
            <a href="{{ $link }}">{{ $title }}</a>
        </h3>
        
        <div class="flex items-center gap-1 text-[11px] mb-6">
            <i class="fa-solid fa-star text-saffron text-[10px]"></i>
            <span class="text-gray-900 font-semibold ml-0.5">{{ $rating }}</span>
            <span class="text-gray-400">({{ $reviewCount == 0 ? 'No Review' : $reviewCount . ' Reviews' }})</span>
        </div>
        
        <div class="flex items-center justify-between pt-5 border-t border-gray-50">
            <div class="flex items-center gap-1">
                <span class="text-[11px] text-gray-500">From</span>
                <span class="text-xl font-semibold text-navy">{{ $price }}</span>
            </div>
            <div class="flex items-center gap-1.5 text-gray-500 text-xs font-medium">
                <i class="fa-regular fa-clock"></i>
                <span>{{ $duration }}</span>
            </div>
        </div>
    </div>
</div>
