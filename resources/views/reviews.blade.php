@extends('layouts.app')

@section('title', 'Traveler Reviews - Travel Shravel')

@section('content')
    {{-- Hero Section --}}
    <div class="relative bg-navy py-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1920&q=80"
                alt="Reviews BG" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-b from-navy/60 to-navy/90"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-extrabold text-white mb-6">Traveler Reviews</h1>
            <p class="text-gray-300 text-lg max-w-2xl mx-auto mb-8">See what our travelers have to say about their unforgettable adventures with Travel Shravel.</p>
            <nav class="flex justify-center" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">Home</a></li>
                    <li><div class="flex items-center"><i class="fa-solid fa-chevron-right text-gray-400 text-[10px] mx-2"></i><span class="text-saffron text-sm font-semibold">Reviews</span></div></li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Stats Bar --}}
    <section class="py-12 bg-white border-b border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center gap-12 md:gap-24 text-center">
                <div>
                    <div class="text-4xl font-extrabold text-navy">4.9/5</div>
                    <div class="flex text-saffron mt-1 justify-center">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star text-saffron/30"></i>
                    </div>
                    <div class="text-gray-500 text-sm mt-2 uppercase tracking-widest font-semibold">Average Rating</div>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-navy">10K+</div>
                    <div class="text-gray-500 text-sm mt-3 uppercase tracking-widest font-semibold">Happy Travelers</div>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-navy">15+</div>
                    <div class="text-gray-500 text-sm mt-3 uppercase tracking-widest font-semibold">Years of Trust</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Reviews Grid --}}
    <section class="py-24 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $reviews = [
                        [
                            'name' => 'Rahul Sharma',
                            'rating' => 5,
                            'date' => '2 weeks ago',
                            'text' => 'A truly seamless experience! Our family trip to Kashmir was perfectly managed from start to finish. The local knowledge and coordination were exceptional.',
                            'image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f'
                        ],
                        [
                            'name' => 'Sneha Kapoor',
                            'rating' => 4,
                            'date' => '1 month ago',
                            'text' => 'Great value for money. The hotel selections were top-notch and the itinerary was well-balanced. Highly recommend Travel Shravel for hassle-free bookings.',
                            'image' => 'https://images.unsplash.com/photo-1494726161322-53b60bfdf719'
                        ],
                        [
                            'name' => 'Rohan Mehta',
                            'rating' => 5,
                            'date' => '2 months ago',
                            'text' => 'Exceptional service during our international tour to Thailand. The 24/7 support was a lifesaver when our flight was delayed. Professional and reliable!',
                            'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d'
                        ],
                        [
                            'name' => 'Priya Verma',
                            'rating' => 5,
                            'date' => '3 months ago',
                            'text' => 'Best travel agency in Jammu. They handled all our group tour requirements flawlessly. The guides were professional and very knowledgeable about local culture.',
                            'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80'
                        ],
                        [
                            'name' => 'Amitabh Das',
                            'rating' => 5,
                            'date' => '4 months ago',
                            'text' => 'Highly satisfied with the customized itinerary to Ladakh. The attention to detail and ground support were impressive. Will definitely book again!',
                            'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e'
                        ],
                        [
                            'name' => 'Deepika Iyer',
                            'rating' => 5,
                            'date' => '5 months ago',
                            'text' => 'Travel Shravel truly brings the world closer. Our honeymoon trip was magical, thanks to their thoughtful planning and great local transport service.',
                            'image' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9'
                        ]
                    ];
                @endphp

                @foreach ($reviews as $review)
                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full overflow-hidden border-2 border-gray-100">
                                <img src="{{ $review['image'] }}?auto=format&fit=crop&w=100&q=80" alt="{{ $review['name'] }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-navy">{{ $review['name'] }}</h4>
                                <p class="text-xs text-gray-400 font-medium">{{ $review['date'] }}</p>
                            </div>
                        </div>
                        <div class="flex text-saffron text-sm mb-4">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa-solid fa-star {{ $i <= $review['rating'] ? '' : 'text-gray-200' }}"></i>
                            @endfor
                        </div>
                        <p class="text-gray-600 leading-relaxed italic text-[15px]">"{{ $review['text'] }}"</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Review Form Section --}}
    <section class="py-24 bg-white">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="bg-navy rounded-[50px] overflow-hidden shadow-2xl flex flex-col md:flex-row">
                <div class="md:w-1/2 p-12 md:p-16 flex flex-col justify-center bg-navy relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -mr-16 -mt-16"></div>
                    <div class="relative z-10">
                        <h2 class="text-3xl font-bold text-white mb-6 leading-tight">Share Your Experience</h2>
                        <p class="text-gray-400 mb-8 leading-relaxed italic">"Your feedback helps us create better adventures for everyone."</p>
                        <ul class="space-y-4">
                            <li class="flex items-center gap-3 text-gray-300">
                                <i class="fa-solid fa-circle-check text-india-green"></i>
                                <span>Tell us about your trip</span>
                            </li>
                            <li class="flex items-center gap-3 text-gray-300">
                                <i class="fa-solid fa-circle-check text-india-green"></i>
                                <span>Rate our service</span>
                            </li>
                            <li class="flex items-center gap-3 text-gray-300">
                                <i class="fa-solid fa-circle-check text-india-green"></i>
                                <span>Help fellow travelers</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="md:w-1/2 p-12 md:p-16 bg-white">
                    <form action="#" class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-navy mb-2">Rating</label>
                            <div class="flex text-2xl text-gray-200 gap-2">
                                <i class="fa-solid fa-star hover:text-saffron cursor-pointer"></i>
                                <i class="fa-solid fa-star hover:text-saffron cursor-pointer"></i>
                                <i class="fa-solid fa-star hover:text-saffron cursor-pointer"></i>
                                <i class="fa-solid fa-star hover:text-saffron cursor-pointer"></i>
                                <i class="fa-solid fa-star hover:text-saffron cursor-pointer"></i>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-navy mb-2">Your Review</label>
                            <textarea rows="4" placeholder="Write your feedback..." class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-saffron/20 focus:border-saffron outline-none transition-all resize-none"></textarea>
                        </div>
                        <button class="w-full py-4 bg-red-600 text-white font-bold rounded-2xl hover:bg-red-700 hover:shadow-xl transition-all active:scale-[0.98]">
                            Submit Review
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
