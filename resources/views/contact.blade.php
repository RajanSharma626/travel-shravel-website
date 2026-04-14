@extends('layouts.app')

@section('title', 'Contact Us - Travel Shravel')

@section('content')
    {{-- Hero Section --}}
    <div class="relative bg-navy py-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1920&q=80"
                alt="Contact Us BG" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-navy/60 to-navy/90"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-extrabold text-white mb-6">Contact Us</h1>
            <nav class="flex justify-center" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">Home</a></li>
                    <li><div class="flex items-center"><i class="fa-solid fa-chevron-right text-gray-500 text-[10px] mx-2"></i><span class="text-saffron text-sm font-semibold">Contact</span></div></li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Contact Section --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                {{-- Form Side --}}
                <div class="space-y-8">
                    <div>
                        <h2 class="text-3xl font-bold text-navy mb-4">We'd love to hear from you</h2>
                        <p class="text-gray-500 leading-relaxed">
                            Thank you visiting the <span class="font-bold">Travel Shravel™</span> website. If you have a query, you can send it by filling below form, and we will make sure your message query gets to the correct person.
                        </p>
                    </div>

                    <form action="#" method="POST" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-navy mb-2">Name <span class="text-red-500">*</span></label>
                                <input type="text" placeholder="Name" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-saffron/20 focus:border-saffron outline-none transition-all" required>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-navy mb-2">Email <span class="text-red-500">*</span></label>
                                <input type="email" placeholder="Email" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-saffron/20 focus:border-saffron outline-none transition-all" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-navy mb-2">Mobile <span class="text-red-500">*</span></label>
                            <input type="tel" placeholder="1234567890" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-saffron/20 focus:border-saffron outline-none transition-all" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-navy mb-2">Message <span class="text-red-500">*</span></label>
                            <textarea rows="4" placeholder="Message" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-saffron/20 focus:border-saffron outline-none transition-all resize-none" required></textarea>
                        </div>

                        <button type="submit" class="w-full py-4 bg-navy text-white font-bold rounded-2xl hover:bg-navy/90 hover:shadow-xl transition-all active:scale-[0.98]">
                            Send
                        </button>
                    </form>
                </div>

                {{-- Image & Info Side --}}
                <div class="relative flex flex-col items-center">
                    {{-- Images Background Layout --}}
                    <div class="grid grid-cols-2 gap-4 w-full h-[600px]">
                        <div class="rounded-[40px] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover">
                        </div>
                        <div class="rounded-[40px] overflow-hidden mt-12">
                            <img src="https://images.unsplash.com/photo-1542332213-31f87348057f?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover">
                        </div>
                    </div>

                    {{-- Floating Info Box --}}
                    <div class="absolute inset-x-4 top-1/2 -translate-y-1/2 bg-red-600/90 backdrop-blur-md p-10 md:p-14 rounded-[40px] text-white shadow-2xl z-10 border border-white/20">
                        <h3 class="text-3xl font-extrabold mb-8 tracking-tight">Travel Shravel</h3>
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <i class="fa-solid fa-phone text-xl text-saffron"></i>
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-widest opacity-70 mb-1">Tel</p>
                                    <p class="text-lg font-medium">+91 90 86 421601</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <i class="fa-solid fa-envelope text-xl text-saffron"></i>
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-widest opacity-70 mb-1">Email</p>
                                    <p class="text-lg font-medium">travelshravel@hotmail.com</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <i class="fa-solid fa-location-dot text-xl text-saffron"></i>
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-widest opacity-70 mb-1">Address</p>
                                    <p class="text-lg font-medium leading-relaxed">Akalpur Sarora Road, Near Tagore College, Jammu, Jammu and Kashmir, India - 180002</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Map Section --}}
    <section class="py-0">
        <div class="w-full h-[500px] grayscale transition-all duration-700 hover:grayscale-0 overflow-hidden">
            <iframe 
                src="https://maps.google.com/maps?q=32.737197799182695%2C%2074.77650185258123&t=m&z=12&output=embed&iwloc=near" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>
@endsection
