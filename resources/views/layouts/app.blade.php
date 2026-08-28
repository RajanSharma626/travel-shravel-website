<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <link rel="icon" type="image/png" href="/assets/img/favicons/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/assets/img/favicons/favicon.svg" />
    <link rel="shortcut icon" href="/assets/img/favicons/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicons/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Travel Shravel" />
    <link rel="manifest" href="/assets/img/favicons/site.webmanifest" />

    @stack('meta')

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    @stack('styles')
    {{-- Google Fonts - Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    {{-- Slick Slider --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
</head>

<body class="min-h-screen flex flex-col bg-gray-50 text-gray-900">
    {{-- Top Bar (Hidden on Mobile) --}}
    <div class="hidden lg:block bg-saffron text-white text-sm py-2.5 relative z-[60]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div class="flex gap-3 items-center border-r border-white/20 pr-4">
                    <a href="#" class="hover:text-white/80 transition"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="hover:text-white/80 transition"><i
                            class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#" class="hover:text-white/80 transition"><i class="fa-brands fa-youtube"></i></a>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa-regular fa-envelope text-white"></i>
                    <a href="mailto:tsxj@hotmail.com" class="hover:underline">tsxj@hotmail.com</a>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2 border-r border-white/20 pr-4">
                    <i class="fa-solid fa-phone text-white"></i>
                    <span>+91 90 86 421601</span>
                </div>
                @auth
                    <div class="relative border-r border-white/20 pr-4">
                        <button id="profile-dropdown-btn" class="flex items-center gap-1.5 cursor-pointer text-white hover:text-white/90 transition-all py-1 bg-transparent border-none outline-none focus:outline-none select-none">
                            <i class="fa-solid fa-circle-user text-base"></i>
                            <span class="font-semibold">{{ explode(' ', trim(Auth::user()->name))[0] }}</span>
                            <i id="profile-dropdown-arrow" class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300"></i>
                        </button>
                        
                        {{-- Dropdown Menu --}}
                        <div id="profile-dropdown-menu" class="invisible absolute top-full right-0 mt-2 w-40 opacity-0 translate-y-2 transition-all duration-300 z-50">
                            <div class="bg-white shadow-xl rounded-xl border border-gray-100 overflow-hidden py-1">
                                <a href="{{ route('profile') }}" class="block px-4 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50 hover:text-navy transition-colors border-b border-gray-50">
                                    <i class="fa-regular fa-user mr-2 text-gray-400"></i> My Profile
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-xs font-semibold text-red-600 hover:bg-red-50 hover:text-red-700 transition-all cursor-pointer">
                                        <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex items-center gap-4 border-r border-white/20 pr-4 text-sm">
                        <a href="{{ url('/login') }}" class="hover:text-white/85 transition">Login</a>
                        <a href="{{ url('/register') }}" class="hover:text-white/85 transition">Sign Up</a>
                    </div>
                @endauth
                <div class="flex items-center gap-1 group cursor-pointer text-sm">
                    <span>INR</span>
                    <i class="fa-solid fa-chevron-down text-[10px] group-hover:text-white/80 transition"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Navbar --}}
    <header class="bg-navy border-b border-white/10 shadow-lg sticky top-0 z-50">
        <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Main navigation">
            <div class="flex h-16 sm:h-20 items-center justify-between">
                {{-- Logo Section --}}
                <div class="flex flex-shrink-0 items-center">
                    <a href="{{ url('/') }}" class="group">
                        <img src="{{ asset('assets/img/logo-travel-shravel.png') }}" alt="Travel Shravel"
                            class="h-12 sm:h-16 w-auto transition-transform duration-300 group-hover:scale-105">
                    </a>
                </div>

                {{-- Desktop Navigation --}}
                <div class="hidden lg:flex lg:items-center lg:gap-x-8">
                    <a href="{{ url('/') }}"
                        class="text-xs tracking-widest {{ url('/') == Request::url() ? 'text-saffron ' : 'text-white hover:text-saffron' }} transition-all">HOME</a>
                    <a href="{{ url('/flights') }}"
                        class="text-xs tracking-widest {{ url('/flights') == Request::url() ? 'text-saffron ' : 'text-white hover:text-saffron' }} transition-all">FLIGHTS</a>
                    <a href="{{ url('/hotel-search-layout') }}"
                        class="text-xs tracking-widest {{ url('/hotel-search-layout') == Request::url() ? 'text-saffron ' : 'text-white hover:text-saffron' }} transition-all">HOTEL</a>
                    <a href="{{ url('/train') }}"
                        class="text-xs tracking-widest {{ url('/train') == Request::url() ? 'text-saffron ' : 'text-white hover:text-saffron' }} transition-all">TRAIN</a>
                    <a href="{{ url('/tour') }}"
                        class="text-xs tracking-widest {{ url('/tour') == Request::url() ? 'text-saffron ' : 'text-white hover:text-saffron' }} transition-all">TOUR</a>
                    <a href="{{ url('/activities') }}"
                        class="text-xs tracking-widest {{ url('/activities') == Request::url() ? 'text-saffron ' : 'text-white hover:text-saffron' }} transition-all">ACTIVITIES</a>
                    <a href="{{ url('/cars') }}"
                        class="text-xs tracking-widest {{ url('/cars') == Request::url() ? 'text-saffron ' : 'text-white hover:text-saffron' }} transition-all">CAR</a>
                    {{-- More Dropdown --}}
                    <div class="relative group">
                        <button
                            class="flex items-center gap-1.5 text-xs tracking-widest {{ url('/more') == Request::url() ? 'text-saffron ' : 'text-white hover:text-saffron' }} transition-all h-20">
                            MORE <i class="fa-solid fa-chevron-down text-[10px]"></i>
                        </button>
                        {{-- Dropdown Menu --}}
                        <div
                            class="invisible absolute top-full left-0 w-48 opacity-0 translate-y-2 group-hover:visible group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 z-50">
                            <div class="bg-white shadow-2xl border-t-2 border-navy-deep overflow-hidden">
                                <a href="{{ url('/bus') }}"
                                    class="block px-4 py-3 text-[13px] font-medium text-gray-700 hover:bg-gray-50 hover:text-india-green border-b border-gray-100 transition-colors">Bus</a>
                                <a href="{{ url('/cruise') }}"
                                    class="block px-4 py-3 text-[13px] font-medium text-gray-700 hover:bg-gray-50 hover:text-india-green border-b border-gray-100 transition-colors">Cruise</a>
                                <a href="{{ url('/insurance') }}"
                                    class="block px-4 py-3 text-[13px] font-medium text-gray-700 hover:bg-gray-50 hover:text-india-green border-b border-gray-100 transition-colors">Insurance</a>
                                <a href="{{ url('/visa') }}"
                                    class="block px-4 py-3 text-[13px] font-medium text-gray-700 hover:bg-gray-50 hover:text-india-green transition-colors">Visa</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Mobile Menu Button --}}
                <div class="flex lg:hidden">
                    <button type="button" id="mobile-menu-toggle-btn"
                        class="inline-flex items-center justify-center rounded-xl p-2.5 text-white hover:bg-white/10 focus:outline-none transition-colors"
                        aria-label="Open mobile menu">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    {{-- Mobile Sidebar Drawer --}}
    <div id="mobile-sidebar-container" class="fixed inset-0 z-[100] lg:hidden invisible pointer-events-none transition-all duration-300">
        {{-- Backdrop Overlay --}}
        <div id="mobile-sidebar-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

        {{-- Sidebar Panel --}}
        <div id="mobile-sidebar" class="fixed top-0 left-0 bottom-0 w-[350px] sm:w-[420px] max-w-[92vw] bg-navy text-white shadow-2xl flex flex-col z-10 -translate-x-full transition-transform duration-300 ease-in-out border-r border-white/10">
            {{-- Sidebar Header --}}
            <div class="flex items-center justify-between px-6 h-20 border-b border-white/10 flex-shrink-0">
                <a href="{{ url('/') }}" class="group">
                    <img src="{{ asset('assets/img/logo-travel-shravel.png') }}" alt="Travel Shravel"
                        class="h-12 w-auto transition-transform group-hover:scale-105">
                </a>
                <button type="button" id="mobile-sidebar-close-btn"
                    class="h-10 w-10 rounded-xl bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors focus:outline-none"
                    aria-label="Close mobile menu">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            {{-- Sidebar Navigation Menu (All Normal Menu Items) --}}
            <div class="flex-1 overflow-y-auto py-5 px-4 space-y-1.5 no-scrollbar">
                <a href="{{ url('/') }}"
                    class="flex items-center px-5 py-3.5 rounded-xl text-xs font-semibold tracking-widest {{ url('/') == Request::url() ? 'bg-saffron text-white shadow-sm' : 'text-white/90 hover:bg-white/10 hover:text-white' }} transition-all">HOME</a>
                <a href="{{ url('/flights') }}"
                    class="flex items-center px-5 py-3.5 rounded-xl text-xs font-semibold tracking-widest {{ url('/flights') == Request::url() ? 'bg-saffron text-white shadow-sm' : 'text-white/90 hover:bg-white/10 hover:text-white' }} transition-all">FLIGHTS</a>
                <a href="{{ url('/hotel-search-layout') }}"
                    class="flex items-center px-5 py-3.5 rounded-xl text-xs font-semibold tracking-widest {{ url('/hotel-search-layout') == Request::url() ? 'bg-saffron text-white shadow-sm' : 'text-white/90 hover:bg-white/10 hover:text-white' }} transition-all">HOTEL</a>
                <a href="{{ url('/train') }}"
                    class="flex items-center px-5 py-3.5 rounded-xl text-xs font-semibold tracking-widest {{ url('/train') == Request::url() ? 'bg-saffron text-white shadow-sm' : 'text-white/90 hover:bg-white/10 hover:text-white' }} transition-all">TRAIN</a>
                <a href="{{ url('/tour') }}"
                    class="flex items-center px-5 py-3.5 rounded-xl text-xs font-semibold tracking-widest {{ url('/tour') == Request::url() ? 'bg-saffron text-white shadow-sm' : 'text-white/90 hover:bg-white/10 hover:text-white' }} transition-all">TOUR</a>
                <a href="{{ url('/activities') }}"
                    class="flex items-center px-5 py-3.5 rounded-xl text-xs font-semibold tracking-widest {{ url('/activities') == Request::url() ? 'bg-saffron text-white shadow-sm' : 'text-white/90 hover:bg-white/10 hover:text-white' }} transition-all">ACTIVITIES</a>
                <a href="{{ url('/cars') }}"
                    class="flex items-center px-5 py-3.5 rounded-xl text-xs font-semibold tracking-widest {{ url('/cars') == Request::url() ? 'bg-saffron text-white shadow-sm' : 'text-white/90 hover:bg-white/10 hover:text-white' }} transition-all">CAR</a>
                <a href="{{ url('/bus') }}"
                    class="flex items-center px-5 py-3.5 rounded-xl text-xs font-semibold tracking-widest {{ url('/bus') == Request::url() ? 'bg-saffron text-white shadow-sm' : 'text-white/90 hover:bg-white/10 hover:text-white' }} transition-all">BUS</a>
                <a href="{{ url('/cruise') }}"
                    class="flex items-center px-5 py-3.5 rounded-xl text-xs font-semibold tracking-widest {{ url('/cruise') == Request::url() ? 'bg-saffron text-white shadow-sm' : 'text-white/90 hover:bg-white/10 hover:text-white' }} transition-all">CRUISE</a>
                <a href="{{ url('/insurance') }}"
                    class="flex items-center px-5 py-3.5 rounded-xl text-xs font-semibold tracking-widest {{ url('/insurance') == Request::url() ? 'bg-saffron text-white shadow-sm' : 'text-white/90 hover:bg-white/10 hover:text-white' }} transition-all">INSURANCE</a>
                <a href="{{ url('/visa') }}"
                    class="flex items-center px-5 py-3.5 rounded-xl text-xs font-semibold tracking-widest {{ url('/visa') == Request::url() ? 'bg-saffron text-white shadow-sm' : 'text-white/90 hover:bg-white/10 hover:text-white' }} transition-all">VISA</a>
            </div>

            {{-- Sidebar Footer (Auth / Actions) --}}
            <div class="p-5 border-t border-white/10 bg-navy/50 flex-shrink-0">
                @auth
                    <div class="flex items-center justify-between px-2 py-1 mb-3">
                        <div class="flex items-center gap-2 text-white">
                            <i class="fa-solid fa-circle-user text-lg text-saffron"></i>
                            <span class="font-semibold text-xs truncate max-w-[140px]">{{ Auth::user()->name }}</span>
                        </div>
                        <a href="{{ route('profile') }}" class="text-xs text-white/90 hover:text-saffron underline font-medium">My Profile</a>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button type="submit" class="w-full text-center py-2.5 rounded-xl text-xs font-bold bg-white/10 text-red-300 hover:bg-red-500/20 hover:text-red-200 transition-all flex items-center justify-center gap-2">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                        </button>
                    </form>
                @else
                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ url('/login') }}" class="text-center py-2.5 rounded-xl text-xs font-bold bg-white/10 text-white hover:bg-white/20 transition-all">Login</a>
                        <a href="{{ url('/register') }}" class="text-center py-2.5 rounded-xl text-xs font-bold bg-saffron text-white hover:bg-saffron/90 transition-all shadow-sm">Sign Up</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
        </nav>
    </header>

    {{-- Main content --}}
    <main class="flex-1 w-full">
        @yield('content')
    </main>

    @if (!Route::is('login') && !Route::is('register') && !Route::is('password.request'))
        @if (!Route::is('profile*'))
            {{-- Recognised By Section --}}
            <section class="py-12 bg-gray-50 overflow-hidden">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <h2 class="text-xl font-semibold text-navy mb-10 border-l-4 border-india-green pl-4">Recognised By</h2>
    
                    <div class="logo-carousel">
                        @php
                            $partners = \App\Models\Partner::where('is_active', true)->orderBy('created_at', 'asc')->get();
                        @endphp

                        @foreach($partners as $partner)
                        <div class="px-8 outline-none">
                            <img src="{{ str_starts_with($partner->image_url, 'http') ? $partner->image_url : asset($partner->image_url) }}"
                                alt="{{ $partner->name }}"
                                class="h-10 w-auto grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all duration-300 mx-auto object-contain">
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
    
        @endif
    
        {{-- Footer --}}
        <footer class="bg-grey-50 border-t border-gray-100">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-10 lg:gap-8">
                    {{-- Column 1: NEED HELP? --}}
                    <div>
                        <h3 class="text-[15px] font-semibold text-navy uppercase tracking-widest mb-4">Need Help?</h3>
                        <div class="h-0.5 w-20 bg-gray-100 mb-10"></div>

                        <div class="space-y-8">
                            <div class="border-l-2 border-india-green pl-5 transition-transform hover:translate-x-1">
                                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-tighter mb-1">Call
                                    Us
                                </p>
                                <a href="tel:+919086421601"
                                    class="text-lg  text-navy hover:text-india-green transition-colors">+ 91
                                    90 86 421601</a>
                            </div>

                            <div class="border-l-2 border-india-green pl-5 transition-transform hover:translate-x-1">
                                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-tighter mb-1">
                                    Email
                                    for Us</p>
                                <a href="mailto:tsixj@hotmail.com"
                                    class="text-lg  text-navy hover:text-india-green transition-colors">tsixj@hotmail.com</a>
                            </div>

                            <div class="border-l-2 border-india-green pl-5">
                                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-tighter mb-4">
                                    Follow
                                    Us</p>
                                <div class="flex items-center gap-5">
                                    <a href="#"
                                        class="text-xl text-navy/60 hover:text-[#1877F2] transition-all"><i
                                            class="fa-brands fa-facebook"></i></a>
                                    <a href="#"
                                        class="text-xl text-navy/60 hover:text-[#E4405F] transition-all"><i
                                            class="fa-brands fa-instagram"></i></a>
                                    <a href="#"
                                        class="text-xl text-navy/60 hover:text-[#0A66C2] transition-all"><i
                                            class="fa-brands fa-linkedin"></i></a>
                                    <a href="#"
                                        class="text-xl text-navy/60 hover:text-[#1DA1F2] transition-all"><i
                                            class="fa-brands fa-twitter"></i></a>
                                    <a href="#"
                                        class="text-xl text-navy/60 hover:text-[#FF0000] transition-all"><i
                                            class="fa-brands fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Column 2: Travel Shravel --}}
                    <div>
                        <h3 class="text-[15px] font-semibold text-navy uppercase tracking-widest mb-4">Travel Shravel
                        </h3>
                        <div class="h-0.5 w-20 bg-gray-100 mb-10"></div>
                        <ul class="space-y-4">
                            <li><a href="{{ url('/about-us') }}"
                                    class="text-[15px] text-navy hover:text-india-green transition-colors">About
                                    Us</a></li>
                            <li><a href="{{ url('/become-local-expert') }}"
                                    class="text-[15px] text-navy hover:text-india-green transition-colors">Become
                                    Local Expert</a></li>
                            <li><a href="{{ url('/contact') }}"
                                    class="text-[15px] text-navy hover:text-india-green transition-colors">Contact
                                    Us</a></li>
                            <li><a href="{{ url('/privacy-policy') }}"
                                    class="text-[15px] text-navy hover:text-india-green transition-colors">Privacy
                                    Policy</a></li>
                            <li><a href="{{ url('/refund-policy') }}"
                                    class="text-[15px] text-navy hover:text-india-green transition-colors">Refund
                                    Policy</a></li>
                            <li><a href="#"
                                    class="text-[15px] text-navy hover:text-india-green transition-colors">Social
                                    Responsibility</a></li>
                            <li><a href="{{ url('/terms-conditions') }}"
                                    class="text-[15px] text-navy hover:text-india-green transition-colors">Terms
                                    and Conditions</a></li>
                        </ul>
                    </div>

                    {{-- Column 3: Useful Links --}}
                    <div>
                        <h3 class="text-[15px] font-semibold text-navy uppercase tracking-widest mb-4">Useful Links
                        </h3>
                        <div class="h-0.5 w-20 bg-gray-100 mb-10"></div>
                        <ul class="space-y-4">
                            <li><a href="#"
                                    class="text-[15px] text-navy hover:text-india-green transition-colors">Affiliate
                                    Programme</a></li>
                            <li><a href="#"
                                    class="text-[15px] text-navy hover:text-india-green transition-colors">Career
                                    Opportunities</a></li>
                            <li><a href="{{ url('/faqs') }}"
                                    class="text-[15px] text-navy hover:text-india-green transition-colors">FAQ</a></li>
                            <li><a href="#"
                                    class="text-[15px] text-navy hover:text-india-green transition-colors">Make
                                    Payment</a></li>
                            <li><a href="#"
                                    class="text-[15px] text-navy hover:text-india-green transition-colors">Press</a>
                            </li>
                            <li><a href="{{ url('/reviews') }}"
                                    class="text-[15px] text-navy hover:text-india-green transition-colors">Reviews</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Column 4: SETTINGS --}}
                    <div>
                        <h3 class="text-[15px] font-semibold text-navy uppercase tracking-widest mb-4">SETTINGS</h3>
                        <div class="h-0.5 w-20 bg-gray-100 mb-10"></div>
                        <div>
                            <p class="text-[15px] text-gray-400 mb-4">Currencies</p>
                            <div class="relative group">
                                <select
                                    class="w-full appearance-none bg-white border border-gray-200 rounded-lg px-5 py-3 pr-10 text-[15px] text-navy focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all cursor-pointer">
                                    <option>INR</option>
                                    <option>USD</option>
                                    <option>EUR</option>
                                </select>
                                <div
                                    class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 text-xs">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bottom Bar --}}
            <div class="border-t border-gray-100 py-8">
                <div
                    class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-center sm:text-left">
                    <p class="text-[14px] font-medium text-gray-500">
                        Copyright © {{ date('Y') }} by <span class="text-navy font-semibold">Travel Shravel</span>. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>

        {{-- Scripts --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof $ !== 'undefined' && $.fn.slick) {
                    $('.logo-carousel').slick({
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 2000,
                        speed: 800,
                        infinite: true,
                        arrows: false,
                        dots: false,
                        pauseOnHover: true,
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 4
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 3
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 2
                                }
                            }
                        ]
                    });
                }

                // Profile Dropdown Toggle Logic
                (function() {
                    const btn = document.getElementById('profile-dropdown-btn');
                    const menu = document.getElementById('profile-dropdown-menu');
                    const arrow = document.getElementById('profile-dropdown-arrow');

                    if (btn && menu) {
                        btn.addEventListener('click', function(e) {
                            e.stopPropagation();
                            const isOpen = !menu.classList.contains('invisible');
                            if (isOpen) {
                                closeDropdown();
                            } else {
                                openDropdown();
                            }
                        });

                        document.addEventListener('click', function(e) {
                            if (!menu.contains(e.target) && !btn.contains(e.target)) {
                                closeDropdown();
                            }
                        });

                        function openDropdown() {
                            menu.classList.remove('invisible', 'opacity-0', 'translate-y-2');
                            menu.classList.add('opacity-100', 'translate-y-0');
                            if (arrow) arrow.classList.add('rotate-180');
                        }

                        function closeDropdown() {
                            menu.classList.add('invisible', 'opacity-0', 'translate-y-2');
                            menu.classList.remove('opacity-100', 'translate-y-0');
                            if (arrow) arrow.classList.remove('rotate-180');
                        }
                    }
                })();

                // Mobile Sidebar Drawer Logic
                (function() {
                    const openBtn = document.getElementById('mobile-menu-toggle-btn');
                    const closeBtn = document.getElementById('mobile-sidebar-close-btn');
                    const container = document.getElementById('mobile-sidebar-container');
                    const backdrop = document.getElementById('mobile-sidebar-backdrop');
                    const sidebar = document.getElementById('mobile-sidebar');

                    function openSidebar() {
                        if (!container || !sidebar || !backdrop) return;
                        container.classList.remove('invisible', 'pointer-events-none');
                        void container.offsetWidth;
                        backdrop.classList.remove('opacity-0');
                        backdrop.classList.add('opacity-100');
                        sidebar.classList.remove('-translate-x-full');
                        sidebar.classList.add('translate-x-0');
                        document.body.style.overflow = 'hidden';
                    }

                    function closeSidebar() {
                        if (!container || !sidebar || !backdrop) return;
                        backdrop.classList.remove('opacity-100');
                        backdrop.classList.add('opacity-0');
                        sidebar.classList.remove('translate-x-0');
                        sidebar.classList.add('-translate-x-full');
                        document.body.style.overflow = '';
                        setTimeout(function() {
                            container.classList.add('invisible', 'pointer-events-none');
                        }, 300);
                    }

                    if (openBtn) openBtn.addEventListener('click', openSidebar);
                    if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
                    if (backdrop) backdrop.addEventListener('click', closeSidebar);

                    document.addEventListener('keydown', function(e) {
                        if (e.key === 'Escape' && container && !container.classList.contains('invisible')) {
                            closeSidebar();
                        }
                    });
                })();
            });
        </script>
    @endif
    @stack('scripts')
</body>

</html>
