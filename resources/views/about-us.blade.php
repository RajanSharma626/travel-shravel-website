@extends('layouts.app')

@section('title', 'About Us - Travel Shravel')

@section('content')
    {{-- Hero Section --}}
    <div class="relative bg-navy py-24 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?auto=format&fit=crop&w=1920&q=80"
                alt="About Us BG" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-b from-navy/50 to-navy/90"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl text-white mb-6 tracking-tight">About Us</h1>
            <nav class="flex justify-center" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/') }}" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">Home</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right text-gray-500 text-[10px] mx-2"></i>
                            <span class="text-saffron text-sm font-semibold">About Us</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Who We Are & Mission --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
                {{-- Who We Are --}}
                <div class="space-y-6">
                    <div class="rounded-3xl overflow-hidden shadow-2xl mb-8 group">
                        <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?auto=format&fit=crop&w=800&q=80"
                            alt="Who We Are"
                            class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <h2 class="text-2xl font-bold text-navy border-l-4 border-india-green pl-4">Who We Are?</h2>
                    <p class="text-gray-600 leading-relaxed text-[15px]">
                        Shravel is derived from the word Shrive which means to Shrink. So the Philosophy is to Shrink your
                        busy schedule and Book the tour with Travel Shravel. We are an Indian Travel Agency, registered with
                        the Department of Tourism, Government of Jammu and Kashmir. It has been geared to help every Indian
                        citizen to realize his dream of touring and Travel Shravel has at its Holiday Packages for the needs
                        of people from all walks of society as per their tastes, status and pocket.
                    </p>
                </div>

                {{-- Our Mission --}}
                <div class="space-y-6">
                    <div class="rounded-3xl overflow-hidden shadow-2xl mb-8 group">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80"
                            alt="Our Mission"
                            class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <h2 class="text-2xl font-bold text-navy border-l-4 border-india-green pl-4">Our Mission</h2>
                    <p class="text-gray-600 leading-relaxed text-[15px]">
                        Travel Shravel brings the world closer to you. Travel Shravel means travelling hassle free by
                        shrinking your busy schedule to have some joy and fun. We believe in "Well begun is half done" and
                        not in "All is well that ends well". And to begin well and end well you need to plan, prepare and
                        perform. Travel Shravel believe that the best travel experience happen when creativity, care and
                        attention to the traveller come first.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- We Can Help You --}}
    <section class="py-20 bg-gray-50">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-navy mb-8">We Can Help You!</h2>
            <div class="bg-white p-10 rounded-[40px] shadow-xl border border-gray-100">
                <p class="text-gray-600 leading-relaxed text-lg">
                    To meet customer needs and valuable information on existing / new products. Whether we are creating a
                    custom itinerary for you, or booking you on one of our existing itineraries, rest assured that we are
                    actually the agency planning and operating your vacation. At the end of the day, nothing gives you peace
                    of mind like knowing you have a human being on the other side that is looking out for you and puts your
                    safety and needs first.
                </p>
            </div>
        </div>
    </section>

    {{-- YouTube Video Section --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-[40px] overflow-hidden shadow-2xl pt-[56.25%]">
                <iframe class="absolute top-0 left-0 w-full h-full"
                    src="https://www.youtube.com/embed/0gi5L3l-5lM?controls=1&rel=0&playsinline=0&cc_load_policy=0&autoplay=0&enablejsapi=1&origin=https%3A%2F%2Fwww.travelshravel.com&widgetid=1&forigin=https%3A%2F%2Fwww.travelshravel.com%2Fabout-us%2F&aoriginsup=1&gporigin=https%3A%2F%2Fwww.travelshravel.com%2F&vf=1"
                    {{-- Placeholder URL --}} title="Travel Shravel Promo" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    {{-- Stats Bar --}}
    <section class="py-12 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div
                    class="bg-white border-2 border-primary/20 p-8 rounded-3xl text-center hover:border-india-green hover:shadow-lg transition-all duration-300">
                    <div class="text-3xl font-bold text-navy mb-1">50+</div>
                    <div class="text-gray-500 uppercase text-xs tracking-widest font-semibold">partner</div>
                </div>
                <div
                    class="bg-white border-2 border-primary/20 p-8 rounded-3xl text-center hover:border-india-green hover:shadow-lg transition-all duration-300">
                    <div class="text-3xl font-bold text-navy mb-1">2K+</div>
                    <div class="text-gray-500 uppercase text-xs tracking-widest font-semibold">properties</div>
                </div>
                <div
                    class="bg-white border-2 border-primary/20 p-8 rounded-3xl text-center hover:border-india-green hover:shadow-lg transition-all duration-300">
                    <div class="text-3xl font-bold text-navy mb-1">100+</div>
                    <div class="text-gray-500 uppercase text-xs tracking-widest font-semibold">destinations</div>
                </div>
                <div
                    class="bg-white border-2 border-primary/20 p-8 rounded-3xl text-center hover:border-india-green hover:shadow-lg transition-all duration-300">
                    <div class="text-3xl font-bold text-navy mb-1">10K+</div>
                    <div class="text-gray-500 uppercase text-xs tracking-widest font-semibold">booking</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Founder Quote --}}
    <section class="py-24 bg-gray-50">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center">
            <div class="relative">
                <i class="fa-solid fa-quote-left text-5xl text-india-green/10 absolute -top-12 -left-8"></i>
                <p class="text-2xl italic text-navy font-medium mb-10 leading-relaxed">
                    "Do not make yourself FOOL by assuring yourself that I am planning something BiG. Rather Execute it
                    Right Away!"
                </p>
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-white shadow-lg mb-4">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=200&q=80"
                            alt="Vipul Mahajan" class="w-full h-full object-cover">
                    </div>
                    <h4 class="text-lg font-bold text-navy">Vipul Mahajan</h4>
                    <p class="text-india-green font-medium text-sm">Founder</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Life at Travel Shravel --}}
    <section class="py-20 bg-white overflow-hidden">
        <div class="relative group max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <div class="relative w-full rounded-[40px] overflow-hidden aspect-[21/9] shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1600&q=80"
                        alt="Life" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8 md:p-16 text-center items-center">
                        <h3 class="text-3xl md:text-4xl font-bold text-white mb-6">Life at Travel Shravel</h3>
                        <button
                            class="px-10 py-4 bg-red-600 text-white font-bold rounded-2xl hover:bg-red-700 transition-all shadow-xl">
                            Join Our Team
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Team --}}
    <section class="py-20 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-navy mb-4">Our Team</h2>
                <div class="h-1 w-20 bg-india-green mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">
                @php
                    $positions = [
                        'Accounts Executive',
                        'Escalation & Feedback',
                        'Marketing Executive',
                        'Operations Executive',
                        'Q C Executive',
                        'Sales Support',
                        'Sales Support',
                        'Sales Support',
                        'Ticketing Support',
                        'Transport Executive',
                        'Visa Executive',
                        'Web Designer',
                    ];
                @endphp

                @foreach ($positions as $pos)
                    <div class="group">
                        <div
                            class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 transition-all duration-300 group-hover:shadow-xl group-hover:-translate-y-2 text-center">
                            <div
                                class="w-20 h-20 bg-gray-50 rounded-2xl flex items-center justify-center mx-auto mb-6 text-gray-300">
                                <i class="fa-solid fa-user text-3xl"></i>
                            </div>
                            <h4 class="text-md font-bold text-navy mb-1 uppercase tracking-tight">To Be Announced</h4>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest">{{ $pos }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
