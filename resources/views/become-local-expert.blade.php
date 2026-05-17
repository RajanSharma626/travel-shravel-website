@extends('layouts.app')

@section('title', 'Become Local Expert - Travel Shravel')

@section('content')
    {{-- Hero Section --}}
    <div class="relative bg-navy py-24 overflow-hidden h-[400px]">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?auto=format&fit=crop&w=1920&q=80"
                alt="Become Local Expert" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <div
            class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center h-full flex flex-col justify-center items-center mt-10">
            <h1 class="text-4xl text-white font-bold mb-4 tracking-tight drop-shadow-md">Know your city?</h1>
            <p class="text-white mb-8">Earn locals & start tours from travelers & more.</p>
            <a href="{{ url('/register') }}"
                class="bg-navy hover:bg-blue-600 text-white px-8 py-3 rounded-md font-medium transition-colors shadow-lg bg-navy">Register
                Now</a>
        </div>
    </div>

    {{-- How does it work? --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-navy mb-16">How does it work?</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                {{-- Step 1 --}}
                <div class="flex flex-col items-center">
                    <div
                        class="w-20 h-20 mb-6 flex items-center justify-center border-2 border-navy rounded-full text-navy">
                        <i class="fa-solid fa-arrow-right-to-bracket text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navy mb-4">Sign up</h3>
                    <p class="text-gray-500 text-sm leading-relaxed px-4">
                        It's time to get healthy. Start taking advice from the dark side.
                    </p>
                </div>

                {{-- Step 2 --}}
                <div class="flex flex-col items-center">
                    <div
                        class="w-20 h-20 mb-6 flex items-center justify-center border-2 border-navy rounded-full text-navy">
                        <i class="fa-solid fa-tents text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navy mb-4">Add your services</h3>
                    <p class="text-gray-500 text-sm leading-relaxed px-4">
                        Fill out fields to provide details about the services you provide.
                    </p>
                </div>

                {{-- Step 3 --}}
                <div class="flex flex-col items-center">
                    <div
                        class="w-20 h-20 mb-6 flex items-center justify-center border-2 border-navy rounded-full text-navy">
                        <i class="fa-solid fa-shop text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navy mb-4">Get bookings</h3>
                    <p class="text-gray-500 text-sm leading-relaxed px-4">
                        Showcase yourself and start earning money with Travel Shravel.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- YouTube Video Section --}}
    <section class="py-16 bg-white">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="relative w-full overflow-hidden pt-[56.25%]">
                <iframe class="absolute top-0 left-0 w-full h-full"
                    src="https://www.youtube.com/embed/kroXVig0QRc?controls=1&rel=0&playsinline=0&cc_load_policy=0&autoplay=0&enablejsapi=1&origin=https%3A%2F%2Fwww.travelshravel.com&widgetid=1&forigin=https%3A%2F%2Fwww.travelshravel.com%2Fbecome-local-expert%2F&aoriginsup=1&gporigin=https%3A%2F%2Fwww.travelshravel.com%2Fcorporate-social-responsibility%2F&vf=4"
                    title="Travel Shravel Local Expert" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    {{-- Why be a Local Expert --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-navy text-center mb-16">Why be a Local Expert</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Reason 1 --}}
                <div
                    class="bg-white border border-gray-100 p-10 rounded-xl shadow-sm text-center hover:shadow-md transition-shadow">
                    <div class="text-navy text-4xl mb-6">
                        <i class="fa-solid fa-money-check-dollar"></i>
                    </div>
                    <h3 class="text-lg font-bold text-navy mb-4">Earn an additional income</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Earning an additional income is like cherry on the cake. If you have made your mind for additional
                        income, we are waiting for you!
                    </p>
                </div>

                {{-- Reason 2 --}}
                <div
                    class="bg-white border border-gray-100 p-10 rounded-xl shadow-sm text-center hover:shadow-md transition-shadow">
                    <div class="text-navy text-4xl mb-6">
                        <i class="fa-solid fa-network-wired"></i>
                    </div>
                    <h3 class="text-lg font-bold text-navy mb-4">Open your network</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Exchange your culture with your clients. They may become your new friends across the globe. Interest
                        in signup now!
                    </p>
                </div>

                {{-- Reason 3 --}}
                <div
                    class="bg-white border border-gray-100 p-10 rounded-xl shadow-sm text-center hover:shadow-md transition-shadow">
                    <div class="text-navy text-4xl mb-6">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <h3 class="text-lg font-bold text-navy mb-4">Practice your language</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        With Travel Shravel, you will be able to practice your language more often, and that, we believe, is
                        the best way to learn.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQs --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-navy text-center mb-16">FAQs</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-12">
                {{-- FAQ 1 --}}
                <div>
                    <div class="flex gap-4 items-start mb-2">
                        <div class="w-8 h-8 rounded bg-gray-100 flex items-center justify-center text-navy shrink-0 mt-1">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <h4 class="text-md font-bold text-navy mt-1">How will I receive my payment?</h4>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed ml-12">
                        To receive payments through Travel Shravel as a local expert, you just need to update your bank
                        details and get direct deposits into your bank account.
                    </p>
                </div>

                {{-- FAQ 2 --}}
                <div>
                    <div class="flex gap-4 items-start mb-2">
                        <div class="w-8 h-8 rounded bg-gray-100 flex items-center justify-center text-navy shrink-0 mt-1">
                            <i class="fa-solid fa-box-open"></i>
                        </div>
                        <h4 class="text-md font-bold text-navy mt-1">How do I upload products?</h4>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed ml-12">
                        To upload products on Travel Shravel, you need to sign up and create a Partner User account. Enter
                        the details and submit the product for approval.
                    </p>
                </div>

                {{-- FAQ 3 --}}
                <div>
                    <div class="flex gap-4 items-start mb-2">
                        <div class="w-8 h-8 rounded bg-gray-100 flex items-center justify-center text-navy shrink-0 mt-1">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <h4 class="text-md font-bold text-navy mt-1">How do I update or extend my availabilities?</h4>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed ml-12">
                        Access your dashboard to update your offers, go to the availability section. Make the changes and
                        confirm it to save your updates. This will ensure your product's availability to be reflected
                        accurately.
                    </p>
                </div>

                {{-- FAQ 4 --}}
                <div>
                    <div class="flex gap-4 items-start mb-2">
                        <div class="w-8 h-8 rounded bg-gray-100 flex items-center justify-center text-navy shrink-0 mt-1">
                            <i class="fa-solid fa-arrow-trend-up"></i>
                        </div>
                        <h4 class="text-md font-bold text-navy mt-1">How do I increase conversion rate?</h4>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed ml-12">
                        To increase your conversion rate, Special Promotions by using high-quality images and detailed,
                        appealing descriptions, highlight Unique Selling Feature and Offer competitive rates.
                    </p>
                </div>
            </div>

            <div class="flex justify-center mt-16 border-b border-gray-100">
            </div>
        </div>
    </section>

@endsection
