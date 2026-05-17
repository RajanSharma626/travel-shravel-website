@extends('layouts.app')

@section('title', 'Toyota Innova - Travel Shravel')

@section('content')
    {{-- Top Header Section --}}
    <section class="bg-gray-50 py-8 border-b border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <nav class="flex mb-6 text-sm text-gray-400">
                <a href="{{ url('/') }}" class="hover:text-navy transition-colors">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ url('/cars') }}" class="hover:text-navy transition-colors">India</a>
                <span class="mx-2">/</span>
                <span class="text-navy font-medium">Toyota Innova</span>
            </nav>
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div>
                    <h1 class="text-3xl md:text-3xl leading-tight mb-2">Toyota Innova</h1>
                    <div class="flex items-center gap-4">
                        <div class="flex text-gray-300 text-xs">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <span class="text-gray-400 text-sm hover:text-navy cursor-pointer transition-colors hover:underline">View 0 reviews</span>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-navy hover:text-white hover:border-navy transition-all"><i class="fa-solid fa-share-nodes"></i></button>
                    <button class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-red-500 hover:text-white hover:border-red-500 transition-all"><i class="fa-regular fa-heart"></i></button>
                </div>
            </div>
            
            <div class="flex flex-wrap items-center gap-6 mt-6">
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <i class="fa-solid fa-check text-red-500"></i>
                    <span>Free Cancellation</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <i class="fa-solid fa-check text-red-500"></i>
                    <span>Pay at Pickup</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <i class="fa-solid fa-check text-red-500"></i>
                    <span>Unlimited Mileage</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <i class="fa-solid fa-check text-red-500"></i>
                    <span>Meet and Greet</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content Section --}}
    <section class="py-12 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-16">
                
                {{-- Left Column (Details) --}}
                <div class="lg:w-2/3 space-y-16">
                    
                    {{-- Hero Image --}}
                    <div class="relative bg-gray-50 rounded-2xl overflow-hidden h-[400px] border border-gray-100 flex items-center justify-center p-8 group">
                        <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?auto=format&fit=crop&w=1600&q=80" 
                            alt="Toyota Innova" class="max-w-full max-h-full object-contain mix-blend-multiply group-hover:scale-105 transition-transform duration-700">
                        
                        <div class="absolute top-6 right-6 flex flex-col gap-3">
                            <button class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center text-gray-500 hover:text-navy transition-colors"><i class="fa-solid fa-share"></i></button>
                            <button class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center text-gray-500 hover:text-red-500 transition-colors"><i class="fa-regular fa-heart"></i></button>
                        </div>
                    </div>
                    
                    {{-- Description --}}
                    <div>
                        <h2 class="text-2xl font-semibold text-navy mb-6 flex items-center gap-3 border-b border-gray-100 pb-4">
                            Description
                            <i class="fa-solid fa-chevron-up text-xs text-gray-400 ml-auto"></i>
                        </h2>
                        <div class="text-gray-600 leading-relaxed text-[15px] space-y-4">
                            <p>The Toyota Innova is the perfect MUV (Multi Utility Vehicle) for your family trips and group tours in India. Known for its reliability, comfort, and spacious interior, the Innova provides an exceptionally smooth ride even on rough terrains.</p>
                            
                            <ul class="list-disc pl-6 space-y-2 text-gray-500">
                                <li>Spacious seating for up to 6 passengers.</li>
                                <li>Powerful AC with individual vents for all rows.</li>
                                <li>Ample boot space for luggage and travel gear.</li>
                            </ul>
                            
                            <p>Whether you're planning a weekend getaway or a long-distance road trip, the Toyota Innova ensures that every passenger travels in comfort. Equipped with modern safety features and a robust engine, it stands out as the preferred choice for long rentals.</p>
                            
                            <a href="#" class="text-india-green text-sm font-semibold hover:underline">Read More</a>
                        </div>
                    </div>

                    {{-- Pickup Features --}}
                    <div>
                        <h2 class="text-2xl font-semibold text-navy mb-6 flex items-center gap-3 border-b border-gray-100 pb-4">
                            Pickup Features
                            <i class="fa-solid fa-chevron-up text-xs text-gray-400 ml-auto"></i>
                        </h2>
                        
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                            <div class="flex items-center gap-3 text-gray-600">
                                <i class="fa-solid fa-users text-xl text-navy w-6"></i>
                                <span class="font-medium">6 Pax</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-600">
                                <i class="fa-solid fa-gear text-xl text-navy w-6"></i>
                                <span class="font-medium">Manual</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-600">
                                <i class="fa-solid fa-briefcase text-xl text-navy w-6"></i>
                                <span class="font-medium">3 Bags</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-600">
                                <i class="fa-solid fa-door-open text-xl text-navy w-6"></i>
                                <span class="font-medium">4 Doors</span>
                            </div>
                        </div>
                    </div>

                    {{-- Car's Location --}}
                    <div>
                        <h2 class="text-2xl font-semibold text-navy mb-6">Car's Location</h2>
                        <div class="w-full rounded-2xl overflow-hidden shadow-sm border border-gray-100 h-[300px]">
                            <iframe 
                                src="https://maps.google.com/maps?q=Jammu&t=m&z=10&output=embed&iwloc=near" 
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>

                    {{-- Reviews Section --}}
                    <div>
                        <h2 class="text-2xl font-semibold text-navy mb-8">Reviews</h2>
                        
                        {{-- Review Summary Card --}}
                        <div class="bg-white border border-gray-100 rounded-2xl p-8 mb-8 shadow-sm">
                            <div class="flex flex-col md:flex-row items-center gap-12">
                                <div class="text-center md:border-r md:border-gray-100 md:pr-12">
                                    <div class="text-5xl font-semibold text-[#5D99FF] mb-2">0<span class="text-2xl text-gray-300 font-normal">/5</span></div>
                                    <div class="text-lg font-semibold text-navy mb-1">Not Rated</div>
                                    <p class="text-[11px] text-gray-400">Based on 0 review</p>
                                </div>
                                <div class="flex-1 w-full space-y-2">
                                    @foreach([['Excellent', 0, '0%'], ['Very Good', 0, '0%'], ['Average', 0, '0%'], ['Poor', 0, '0%'], ['Terrible', 0, '0%']] as $bar)
                                        <div class="flex items-center gap-4 text-xs font-medium">
                                            <span class="w-20 text-gray-500">{{ $bar[0] }}</span>
                                            <div class="flex-1 h-1 bg-gray-100 rounded-full overflow-hidden">
                                                <div class="h-full bg-gray-200 rounded-full" style="width: {{ $bar[2] }}"></div>
                                            </div>
                                            <span class="w-4 text-gray-400 text-right">{{ $bar[1] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <p class="text-xs text-gray-400 mb-2 border-b border-gray-100 pb-4">Showing 1 - 0 of 0 in total</p>
                        <div class="flex items-center gap-2 cursor-pointer mt-6 group">
                            <h3 class="text-[15px] font-semibold text-navy">Write a review</h3>
                            <i class="fa-solid fa-chevron-down text-gray-400 text-[10px] transition-transform duration-300 group-hover:text-navy"></i>
                        </div>
                    </div>

                </div>

                {{-- Right Column (Sidebar Widget) --}}
                <div class="lg:w-1/3">
                    <div class="sticky top-28 space-y-8">
                        
                        {{-- Booking Widget --}}
                        <div class="bg-white rounded-xl border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
                            {{-- Price Header --}}
                            <div class="bg-[#5D99FF] p-6 text-white">
                                <p class="text-[13px] opacity-90 mb-1">from <span class="text-2xl font-bold ml-1">₹5,000.00</span> /day</p>
                            </div>

                            {{-- Tab Switcher --}}
                            <div class="flex border-b border-gray-100 bg-white">
                                <button class="flex-1 py-4 text-[11px] font-bold tracking-widest text-[#5D99FF] border-b-2 border-[#5D99FF]">BOOK</button>
                                <button class="flex-1 py-4 text-[11px] font-bold tracking-widest text-gray-400 border-b-2 border-transparent hover:text-gray-600">INQUIRY</button>
                            </div>

                            {{-- Book Tab Content --}}
                            <div class="p-6 space-y-4">
                                {{-- Dates --}}
                                <div class="border border-gray-200 rounded-lg p-3 relative cursor-pointer hover:border-gray-300 transition-colors">
                                    <p class="text-[11px] text-gray-400 mb-1 font-semibold">Pick Up Date</p>
                                    <p class="text-sm text-navy font-medium">17/05/2026</p>
                                    <input type="date" class="absolute inset-0 opacity-0 cursor-pointer">
                                </div>
                                <div class="border border-gray-200 rounded-lg p-3 relative cursor-pointer hover:border-gray-300 transition-colors">
                                    <p class="text-[11px] text-gray-400 mb-1 font-semibold">Drop Off Date</p>
                                    <p class="text-sm text-navy font-medium">18/05/2026</p>
                                    <input type="date" class="absolute inset-0 opacity-0 cursor-pointer">
                                </div>

                                {{-- Times --}}
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="border border-gray-200 rounded-lg p-3 relative cursor-pointer hover:border-gray-300 transition-colors">
                                        <p class="text-[11px] text-gray-400 mb-1 font-semibold">Pick Up Time</p>
                                        <p class="text-sm text-navy font-medium">10:00 AM</p>
                                        <input type="time" class="absolute inset-0 opacity-0 cursor-pointer">
                                    </div>
                                    <div class="border border-gray-200 rounded-lg p-3 relative cursor-pointer hover:border-gray-300 transition-colors">
                                        <p class="text-[11px] text-gray-400 mb-1 font-semibold">Drop Off Time</p>
                                        <p class="text-sm text-navy font-medium">10:00 AM</p>
                                        <input type="time" class="absolute inset-0 opacity-0 cursor-pointer">
                                    </div>
                                </div>

                                <button class="w-full mt-4 py-3.5 bg-[#5D99FF] text-white font-semibold rounded-lg hover:bg-blue-500 transition-colors text-sm tracking-wide">
                                    BOOK NOW
                                </button>
                            </div>
                        </div>

                        {{-- Owner Widget --}}
                        <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm flex items-center gap-4">
                            <div class="w-14 h-14 rounded-lg bg-navy flex items-center justify-center text-white font-bold text-xl">
                                TS
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-1">Owner</p>
                                <h4 class="text-[15px] font-bold text-navy">Travel Shravel</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Member Since Nov 2023</p>
                            </div>
                        </div>
                        <button class="w-full py-3 bg-[#5D99FF] text-white font-semibold rounded-lg hover:bg-blue-500 transition-colors text-sm tracking-wide">
                            Ask a question
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- You Might Also Like --}}
    <section class="py-24 bg-gray-50 border-t border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-navy mb-10 text-center">You might also like</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                
                <x-car-card 
                    image="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?auto=format&fit=crop&q=80&w=800"
                    :featured="true"
                    type="MUV"
                    title="Toyota Innova Crysta"
                    pax="6"
                    transmission="manual"
                    bags="3"
                    doors="4"
                    price="₹6,000.00"
                    link="{{ url('/car/toyota-innova-crysta') }}"
                />

                <x-car-card 
                    image="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&q=80&w=800"
                    :featured="true"
                    type="Sedan"
                    title="Toyota Etios"
                    pax="4"
                    transmission="manual"
                    bags="0"
                    doors="0"
                    price="₹3,500.00"
                    link="{{ url('/car/toyota-etios') }}"
                />

            </div>
        </div>
    </section>

@endsection
