@extends('layouts.app')

@section('title', 'Terms & Conditions - Travel Shravel')

@section('content')
    {{-- Hero Section --}}
    <div class="relative bg-navy py-24 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1920&q=80"
                alt="Terms and Conditions BG" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-b from-navy/50 to-navy/90"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl text-white mb-6 tracking-tight">Terms & Conditions</h1>
            <nav class="flex justify-center" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/') }}" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">Home</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right text-gray-500 text-[10px] mx-2"></i>
                            <span class="text-saffron text-sm font-semibold">Terms & Conditions</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Content Section --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 prose prose-lg prose-navy max-w-none">
            <h2 class="text-2xl font-bold text-navy border-l-4 border-india-green pl-4 mb-6">Agreement to Terms</h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
                These Terms and Conditions constitute a legally binding agreement made between you, whether personally or on behalf of an entity (“you”) and Travel Shravel ("we," "us" or "our"), concerning your access to and use of our website as well as any other media form, media channel, mobile website or mobile application related, linked, or otherwise connected thereto (collectively, the “Site”).
            </p>

            <h2 class="text-2xl font-bold text-navy border-l-4 border-india-green pl-4 mb-6">User Representations</h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
                By using the Site, you represent and warrant that: 
            </p>
            <ul class="list-disc pl-8 text-gray-600 mb-8 space-y-2">
                <li>All registration information you submit will be true, accurate, current, and complete.</li>
                <li>You will maintain the accuracy of such information and promptly update such registration information as necessary.</li>
                <li>You have the legal capacity and you agree to comply with these Terms and Conditions.</li>
                <li>You are not under the age of 18, or if you are under 18, you have received parental permission to use the Site.</li>
                <li>You will not access the Site through automated or non-human means, whether through a bot, script, or otherwise.</li>
            </ul>

            <h2 class="text-2xl font-bold text-navy border-l-4 border-india-green pl-4 mb-6">Booking & Payments</h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
                We accept various forms of payment for our services. When you book a travel product or service through our Site, you authorize us and our third-party payment processors to process your payment for the total amount of the booking, including any applicable taxes and fees. We reserve the right to correct any pricing errors on our Site and/or on pending reservations made under an incorrect price.
            </p>

            <h2 class="text-2xl font-bold text-navy border-l-4 border-india-green pl-4 mb-6">Limitation of Liability</h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
                In no event will we or our directors, employees, or agents be liable to you or any third party for any direct, indirect, consequential, exemplary, incidental, special, or punitive damages, including lost profit, lost revenue, loss of data, or other damages arising from your use of the Site, even if we have been advised of the possibility of such damages.
            </p>

            <p class="text-sm text-gray-500 italic mt-12">
                Last updated: {{ date('F d, Y') }}
            </p>
        </div>
    </section>
@endsection
