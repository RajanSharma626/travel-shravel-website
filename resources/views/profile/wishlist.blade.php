@extends('layouts.app')

@section('title', 'My Wishlist | Travel Shravel')

@section('content')
<div class="min-h-screen bg-gray-50/50 py-12 w-full">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            {{-- Reusable Sidebar --}}
            @include('profile.partials.sidebar', ['active' => 'wishlist'])

            {{-- Right Column: Panels --}}
            <div class="col-span-3">
                
                {{-- Panel 3: Wishlist --}}
                <div class="bg-white rounded-[32px] p-8 md:p-10 shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-gray-100">
                    <h3 class="text-xl font-bold text-navy mb-2 flex items-center gap-3">
                        <i class="fa-regular fa-heart text-india-green"></i> My Wishlist
                    </h3>
                    <p class="text-sm text-gray-400 font-medium mb-8">Your saved travel tours, hotel properties, and experiences.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Wishlist Card 1 --}}
                        <div class="group rounded-2xl border border-gray-100 overflow-hidden bg-white hover:shadow-lg transition-all flex flex-col">
                            <div class="h-40 overflow-hidden relative">
                                <img src="https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover transition duration-300 group-hover:scale-105" alt="Kerala">
                                <button class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/80 backdrop-blur-sm text-red-500 hover:bg-white flex items-center justify-center shadow-sm transition-all">
                                    <i class="fa-solid fa-heart"></i>
                                </button>
                            </div>
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1 flex items-center gap-1"><i class="fa-solid fa-location-dot"></i> Kerala, India</p>
                                    <h4 class="text-sm font-bold text-navy line-clamp-1">Munnar Hills & Backwaters Tour</h4>
                                </div>
                                <div class="flex items-center justify-between pt-4 border-t border-gray-50 mt-4">
                                    <div>
                                        <p class="text-[10px] text-gray-400 uppercase font-semibold">Starting from</p>
                                        <p class="text-base font-bold text-navy">₹12,499</p>
                                    </div>
                                    <a href="#" class="px-4 py-2 rounded-lg bg-india-green text-white text-[11px] font-semibold hover:bg-india-green/90 transition-all">Book Now</a>
                                </div>
                            </div>
                        </div>

                        {{-- Wishlist Card 2 --}}
                        <div class="group rounded-2xl border border-gray-100 overflow-hidden bg-white hover:shadow-lg transition-all flex flex-col">
                            <div class="h-40 overflow-hidden relative">
                                <img src="https://images.unsplash.com/photo-1617112818585-79b88ef77916?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover transition duration-300 group-hover:scale-105" alt="Mansar Lake">
                                <button class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/80 backdrop-blur-sm text-red-500 hover:bg-white flex items-center justify-center shadow-sm transition-all">
                                    <i class="fa-solid fa-heart"></i>
                                </button>
                            </div>
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1 flex items-center gap-1"><i class="fa-solid fa-location-dot"></i> Samba, Jammu, India</p>
                                    <h4 class="text-sm font-bold text-navy line-clamp-1">Day Tour to Mansar Lake</h4>
                                </div>
                                <div class="flex items-center justify-between pt-4 border-t border-gray-50 mt-4">
                                    <div>
                                        <p class="text-[10px] text-gray-400 uppercase font-semibold">Starting from</p>
                                        <p class="text-base font-bold text-navy">₹1,799</p>
                                    </div>
                                    <a href="#" class="px-4 py-2 rounded-lg bg-india-green text-white text-[11px] font-semibold hover:bg-india-green/90 transition-all">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
