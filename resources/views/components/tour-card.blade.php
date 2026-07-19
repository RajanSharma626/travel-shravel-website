@props([
    'image' => 'https://images.unsplash.com/photo-1595815771614-ade9d652a65d?auto=format&fit=crop&q=80&w=800',
    'featured' => false,
    'location' => 'Jammu and Kashmir, India',
    'title' => 'Tour Package Title',
    'rating' => '0',
    'reviewCount' => '0',
    'price' => '₹0.00',
    'duration' => '0 Nights',
    'link' => '#'
])

<a href="{{ $link }}" class="group flex flex-col list-view-horizontal bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
    <div class="relative h-60 md:list-view-image-w md:list-view-image-h overflow-hidden flex-shrink-0">
        <img src="{{ $image }}"
            alt="{{ $title }}"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        
        @if($featured)
            <span class="absolute top-4 left-4 bg-india-green text-white text-[10px] font-semibold uppercase tracking-wider px-3 py-1 rounded-sm shadow-sm">Featured</span>
        @endif

        <button onclick="event.preventDefault(); event.stopPropagation();" class="absolute top-4 right-4 h-8 w-8 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white hover:text-red-500 transition-all z-10">
            <i class="fa-regular fa-heart"></i>
        </button>
    </div>
    <div class="flex-1 p-3 flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-1.5 text-gray-400 text-[11px] font-medium mb-2">
                <i class="fa-solid fa-location-dot"></i>
                <span>{{ $location }}</span>
            </div>
            
            <h3 class="text-lg text-gray-900 mb-3 leading-snug group-hover:text-navy transition-colors line-clamp-2 font-semibold">
                {{ $title }}
            </h3>
            
            <div class="flex items-center gap-1 text-[11px] mb-3 justify-between">
                @if($rating > 0)
                    @for($i = 0; $i < $rating; $i++)
                        <i class="fa-solid fa-star text-saffron text-[10px]"></i>
                    @endfor
                @else
                    <span class="text-gray-400">0</span>
                @endif

                <span class="text-gray-400">{{ $reviewCount == 0 ? 'No Review' : $reviewCount . ' Reviews' }}</span>
            </div>
        </div>
        
        <div class="flex items-center justify-between pt-3 border-t border-gray-50">
            <span class="text-lg font-semibold text-navy">{{ $price }}</span>
            <div class="flex items-center gap-1.5 text-gray-500 text-xs font-medium">
                <i class="fa-regular fa-clock"></i>
                <span>{{ $duration }} Night</span>
            </div>
        </div>
    </div>
</a>
