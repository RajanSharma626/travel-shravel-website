@extends('layouts.app')

@section('title', 'Privacy Policy - Travel Shravel')

@section('content')
    {{-- Hero Section --}}
    <div class="relative bg-navy py-24 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=1920&q=80"
                alt="Privacy Policy BG" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-b from-navy/50 to-navy/90"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl text-white mb-6 tracking-tight">Privacy Policy</h1>
            <nav class="flex justify-center" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/') }}" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">Home</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right text-gray-500 text-[10px] mx-2"></i>
                            <span class="text-saffron text-sm font-semibold">Privacy Policy</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Content Section --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 prose prose-lg prose-navy max-w-none">
            <h2 class="text-2xl font-bold text-navy border-l-4 border-india-green pl-4 mb-6">Introduction</h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
                Welcome to Travel Shravel. We respect your privacy and are committed to protecting your personal data. This privacy policy will inform you as to how we look after your personal data when you visit our website (regardless of where you visit it from) and tell you about your privacy rights and how the law protects you.
            </p>

            <h2 class="text-2xl font-bold text-navy border-l-4 border-india-green pl-4 mb-6">The Data We Collect About You</h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
                Personal data, or personal information, means any information about an individual from which that person can be identified. It does not include data where the identity has been removed (anonymous data). We may collect, use, store and transfer different kinds of personal data about you which we have grouped together as follows:
            </p>
            <ul class="list-disc pl-8 text-gray-600 mb-8 space-y-2">
                <li><strong>Identity Data</strong> includes first name, maiden name, last name, username or similar identifier, marital status, title, date of birth and gender.</li>
                <li><strong>Contact Data</strong> includes billing address, delivery address, email address and telephone numbers.</li>
                <li><strong>Financial Data</strong> includes bank account and payment card details.</li>
                <li><strong>Transaction Data</strong> includes details about payments to and from you and other details of products and services you have purchased from us.</li>
            </ul>

            <h2 class="text-2xl font-bold text-navy border-l-4 border-india-green pl-4 mb-6">How We Use Your Personal Data</h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
                We will only use your personal data when the law allows us to. Most commonly, we will use your personal data in the following circumstances:
            </p>
            <ul class="list-disc pl-8 text-gray-600 mb-8 space-y-2">
                <li>Where we need to perform the contract we are about to enter into or have entered into with you.</li>
                <li>Where it is necessary for our legitimate interests (or those of a third party) and your interests and fundamental rights do not override those interests.</li>
                <li>Where we need to comply with a legal obligation.</li>
            </ul>

            <h2 class="text-2xl font-bold text-navy border-l-4 border-india-green pl-4 mb-6">Data Security</h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
                We have put in place appropriate security measures to prevent your personal data from being accidentally lost, used or accessed in an unauthorised way, altered or disclosed. In addition, we limit access to your personal data to those employees, agents, contractors and other third parties who have a business need to know.
            </p>

            <p class="text-sm text-gray-500 italic mt-12">
                Last updated: {{ date('F d, Y') }}
            </p>
        </div>
    </section>
@endsection
