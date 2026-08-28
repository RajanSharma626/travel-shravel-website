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

<a href="{{ $link }}" class="group flex flex-col list-view-horizontal bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
    <div class="relative h-48 sm:h-52 md:h-56 lg:h-60 md:list-view-image-w md:list-view-image-h overflow-hidden flex-shrink-0">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        
        @if($featured)
            <span class="absolute top-3 sm:top-4 left-3 sm:left-4 bg-india-green text-white text-[10px] font-semibold uppercase tracking-wider px-2.5 sm:px-3 py-1 rounded-sm shadow-sm">Featured</span>
        @endif
        
        <button onclick="event.preventDefault(); event.stopPropagation();" class="absolute top-3 sm:top-4 right-3 sm:right-4 h-8 w-8 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white hover:text-red-500 transition-all z-10">
            <i class="fa-regular fa-heart"></i>
        </button>
    </div>
    <div class="flex-1 p-4 sm:p-5 flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-1.5 text-gray-400 text-[11px] sm:text-xs font-medium mb-2">
                <i class="fa-solid fa-location-dot text-saffron"></i>
                <span class="truncate">{{ $location }}</span>
            </div>
            
            <h3 class="text-base sm:text-lg text-gray-900 mb-2 leading-snug group-hover:text-navy transition-colors line-clamp-2 font-semibold md:list-view-title-h">
                {{ $title }}
            </h3>
            
            <div class="flex items-center gap-1 text-[11px] sm:text-xs mb-3 justify-between">
                @if($rating > 0)
                    <div class="flex items-center gap-0.5">
                        @for($i = 0; $i < $rating; $i++)
                            <i class="fa-solid fa-star text-saffron text-[10px]"></i>
                        @endfor
                    </div>
                @else
                    <span class="text-gray-400 text-xs">Unrated</span>
                @endif
                <span class="text-gray-400 text-xs">{{ $reviewCount == 0 ? 'No Review' : $reviewCount . ' Reviews' }}</span>
            </div>
        </div>
        
        <div class="flex items-center justify-between pt-3 border-t border-gray-50">
            <span class="text-base sm:text-lg font-bold text-navy">{{ $price }}</span>
            <div class="flex items-center gap-1.5 text-gray-500 text-xs font-medium">
                <i class="fa-regular fa-clock text-saffron"></i>
                <span>{{ $duration }}</span>
            </div>
        </div>
    </div>
</a>
