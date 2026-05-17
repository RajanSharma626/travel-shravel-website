@props([
    'image' => '',
    'stars' => 0,
    'title' => 'Hotel Name',
    'location' => 'Location Details',
    'ratingValue' => '0 / 5',
    'ratingLabel' => 'Not Rated',
    'reviewCount' => '0',
    'price' => '₹0.00',
    'featured' => false,
    'link' => '#'
])

<div class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300">
    <div class="relative h-60 overflow-hidden">
        <a href="{{ $link }}" class="block w-full h-full">
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        </a>
        
        @if($featured)
            <span class="absolute top-4 left-4 bg-red-600 text-white text-[10px] font-semibold uppercase tracking-wider px-3 py-1 rounded-sm shadow-sm">Featured</span>
        @endif

        <button class="absolute top-4 right-4 h-8 w-8 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white hover:text-red-500 transition-all">
            <i class="fa-regular fa-heart"></i>
        </button>
    </div>
    <div class="p-6">
        <div class="flex gap-1 mb-2">
            @for($i = 0; $i < $stars; $i++)
                <i class="fa-solid fa-star text-saffron text-[10px]"></i>
            @endfor
        </div>
        
        <h3 class="text-lg text-gray-900 mb-1 group-hover:text-navy transition-colors h-14 line-clamp-2">
            <a href="{{ $link }}">{{ $title }}</a>
        </h3>
        
        <p class="text-[11px] text-gray-400 mb-4">{{ $location }}</p>
        
        <hr class="border-gray-50 mb-4">
        
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <span class="bg-blue-50 text-[#5D99FF] text-[10px] font-bold px-2 py-1 rounded">{{ $ratingValue }}</span>
                <span class="text-[11px] font-semibold text-navy">{{ $ratingLabel }}</span>
                <span class="text-[11px] text-gray-400">({{ $reviewCount == 0 ? 'No Review' : $reviewCount . ' Reviews' }})</span>
            </div>
        </div>
        
        <div class="mt-4 pt-4 border-t border-gray-50 flex items-center gap-1">
            <span class="text-xs text-gray-500">From:</span>
            <span class="text-xl font-semibold text-navy">{{ $price }}</span>
            <span class="text-[10px] text-gray-400">/night</span>
        </div>
    </div>
</div>
