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

<a href="{{ $link }}" class="hotel-card group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col list-view-horizontal">
    <!-- Image Section -->
    <div class="relative h-48 sm:h-52 md:h-56 lg:h-60 md:list-view-image-w md:list-view-image-h overflow-hidden flex-shrink-0">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        
        @if($featured)
            <span class="absolute top-3 sm:top-4 left-3 sm:left-4 bg-india-green text-white text-[10px] font-semibold uppercase tracking-wider px-2.5 sm:px-3 py-1 rounded-sm shadow-sm">Featured</span>
        @endif

        <button onclick="event.preventDefault(); event.stopPropagation();" class="absolute top-3 sm:top-4 right-3 sm:right-4 h-8 w-8 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white hover:text-red-500 transition-all z-10">
            <i class="fa-regular fa-heart"></i>
        </button>
    </div>

    <!-- Content Section -->
    <div class="flex-1 p-4 sm:p-5 flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-between mb-2">
                <div class="flex gap-0.5 sm:gap-1">
                    @for($i = 0; $i < $stars; $i++)
                        <i class="fa-solid fa-star text-[#FF5A3C] text-[11px] sm:text-[12px]"></i>
                    @endfor
                </div>
                <span class="text-xs sm:text-[13px] text-gray-400 font-medium">{{ $reviewCount == 1 ? '1 Review' : $reviewCount . ' Reviews' }}</span>
            </div>
            
            <h3 class="text-base sm:text-lg text-gray-900 group-hover:text-navy transition-colors line-clamp-2 mb-1.5 font-semibold leading-snug">
                {{ $title }}
            </h3>
            
            <p class="text-xs sm:text-[13px] text-gray-500 flex items-center gap-1.5 mb-4">
                <i class="fa-solid fa-location-dot text-[#FF5A3C]"></i> {{ $location }}
            </p>
        </div>

        <div class="pt-3 border-t border-gray-50 flex items-baseline gap-1 text-[13px]">
            <span class="text-gray-400 text-xs">From:</span>
            <span class="text-base sm:text-[17px] font-bold text-navy leading-none">{{ $price }}</span>
            <span class="text-gray-400 text-xs">/night</span>
        </div>
    </div>
</a>
