@extends('layouts.app')

@section('title', 'Refund Policy - Travel Shravel')

@section('content')
    {{-- Hero Section --}}
    <div class="relative bg-navy py-24 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=1920&q=80"
                alt="Refund Policy BG" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-b from-navy/50 to-navy/90"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl text-white mb-6 tracking-tight">Refund Policy</h1>
            <nav class="flex justify-center" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/') }}" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">Home</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right text-gray-500 text-[10px] mx-2"></i>
                            <span class="text-saffron text-sm font-semibold">Refund Policy</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Content Section --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 prose prose-lg prose-navy max-w-none">
            <h2 class="text-2xl font-bold text-navy border-l-4 border-india-green pl-4 mb-6">Cancellation & Refund Policy</h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
                At Travel Shravel, we strive to ensure that you have a seamless travel experience. However, we understand that plans can change. This policy outlines the terms and conditions for cancellations and refunds for the services booked through our platform.
            </p>

            <h2 class="text-2xl font-bold text-navy border-l-4 border-india-green pl-4 mb-6">General Terms</h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
                All cancellations must be communicated in writing to our customer support team. The date of receipt of your written cancellation request will be considered the official cancellation date.
            </p>
            <ul class="list-disc pl-8 text-gray-600 mb-8 space-y-2">
                <li>Refunds, if applicable, will be processed to the original mode of payment.</li>
                <li>Processing times for refunds typically range from 7 to 14 business days, depending on your bank or payment provider.</li>
                <li>Convenience fees or payment gateway charges applied during booking are generally non-refundable.</li>
            </ul>

            <h2 class="text-2xl font-bold text-navy border-l-4 border-india-green pl-4 mb-6">Tour & Package Cancellations</h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
                Cancellation charges for tour packages depend on the proximity to the departure date. Standard cancellation fees are as follows:
            </p>
            <ul class="list-disc pl-8 text-gray-600 mb-8 space-y-2">
                <li><strong>30 days or more before departure:</strong> 10% of the total tour cost.</li>
                <li><strong>15 to 29 days before departure:</strong> 25% of the total tour cost.</li>
                <li><strong>7 to 14 days before departure:</strong> 50% of the total tour cost.</li>
                <li><strong>Less than 7 days or No Show:</strong> 100% of the total tour cost (No Refund).</li>
            </ul>
            <p class="text-gray-500 text-sm mb-8">
                <em>* Note: These are standard terms. Specific packages, particularly those involving flights or non-refundable hotel bookings, may have stricter cancellation policies. Please refer to your booking confirmation for specific details.</em>
            </p>

            <h2 class="text-2xl font-bold text-navy border-l-4 border-india-green pl-4 mb-6">Flight & Hotel Bookings</h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
                For individual flight or hotel bookings, the cancellation policy of the respective airline or hotel property will apply. Travel Shravel may charge a nominal service fee for processing these cancellations on your behalf.
            </p>

            <p class="text-sm text-gray-500 italic mt-12">
                Last updated: {{ date('F d, Y') }}
            </p>
        </div>
    </section>
@endsection
