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
    {{-- Top Bar --}}
    <div class="bg-saffron text-white text-sm py-2.5 relative z-[60]">
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
                    <div class="flex items-center gap-4 border-r border-white/20 pr-4">
                        <a href="{{ url('/login') }}" class="hover:text-white/85 transition">Login</a>
                        <a href="{{ url('/register') }}" class="hover:text-white/85 transition">Sign Up</a>
                    </div>
                @endauth
                <div class="flex items-center gap-1 group cursor-pointer">
                    <span>INR</span>
                    <i class="fa-solid fa-chevron-down text-[10px] group-hover:text-white/80 transition"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Navbar --}}
    <header class="bg-navy border-b border-white/10 shadow-lg sticky top-0 z-50">
        <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Main navigation">
            <div class="flex h-20 items-center justify-between">
                {{-- Logo Section --}}
                <div class="flex flex-shrink-0 items-center">
                    <a href="{{ url('/') }}" class="group">
                        <img src="{{ asset('assets/img/logo-travel-shravel.png') }}" alt="Travel Shravel"
                            class="h-16 w-auto transition-transform duration-300 group-hover:scale-105">
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
                    <a href="{{ url('/trains') }}"
                        class="text-xs tracking-widest {{ url('/trains') == Request::url() ? 'text-saffron ' : 'text-white hover:text-saffron' }} transition-all">TRAIN</a>
                    <a href="{{ url('/tour') }}"
                        class="text-xs tracking-widest {{ url('/tour') == Request::url() ? 'text-saffron ' : 'text-white hover:text-saffron' }} transition-all">TOUR</a>
                    <a href="{{ url('/activities') }}"
                        class="text-xs tracking-widest {{ url('/activities') == Request::url() ? 'text-saffron ' : 'text-white hover:text-saffron' }} transition-all">ACTIVITIES</a>
                    <a href="{{ url('/car') }}"
                        class="text-xs tracking-widest {{ url('/car') == Request::url() ? 'text-saffron ' : 'text-white hover:text-saffron' }} transition-all">CAR</a>
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
                    <button type="button"
                        class="inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-white/10 focus:outline-none">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
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
    
                        <div class="px-8 outline-none">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/Booking.com_logo.svg/1200px-Booking.com_logo.svg.png"
                                alt="Booking.com"
                                class="h-8 w-auto grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-300 mx-auto">
                        </div>
    
                        <div class="px-8 outline-none">
                            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9b/Qatar_Airways_Logo.svg/1920px-Qatar_Airways_Logo.svg.png"
                                alt="Qatar Airways"
                                class="h-12 w-auto grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-300 mx-auto">
                        </div>
                        <div class="px-8 outline-none">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Emirates_logo.svg/1200px-Emirates_logo.svg.png"
                                alt="Emirates"
                                class="h-10 w-auto grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-300 mx-auto">
                        </div>
    
                        <div class="px-8 outline-none">
                            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/6/6b/Singapore_Airlines_Logo_2.svg/1200px-Singapore_Airlines_Logo_2.svg.png"
                                alt="Singapore Airlines"
                                class="h-8 w-auto grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-300 mx-auto">
                        </div>
    
                        <div class="px-8 outline-none">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Kayak_Logo.svg/1200px-Kayak_Logo.svg.png"
                                alt="Kayak"
                                class="h-10 w-auto grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-300 mx-auto">
                        </div>
                    </div>
                </div>
            </section>
    
            {{-- Newsletter Section --}}
            <section class="py-20 bg-white">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div
                        class="bg-gray-50 rounded-[40px] px-8 py-16 md:px-16 md:py-20 flex flex-col lg:flex-row items-center justify-between gap-12 overflow-hidden relative group">
                        {{-- Decorative background elements --}}
                        <div
                            class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-india-green/5 rounded-full blur-3xl group-hover:bg-india-green/10 transition-all duration-700">
                        </div>
                        <div
                            class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-saffron/5 rounded-full blur-3xl group-hover:bg-saffron/10 transition-all duration-700">
                        </div>
    
                        <div class="relative z-10 max-w-xl text-center lg:text-left">
                            <h2 class="text-3xl font-bold text-navy mb-3 tracking-tight">
                                Get Updates & More
                            </h2>
                            <p class="text-gray-500 text-xl font-medium">
                                Thoughtful thoughts to your inbox
                            </p>
                        </div>
    
                        <div class="relative z-10 w-full max-w-md">
                            <form action="#" class="relative group/form">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-india-green/20 to-saffron/20 rounded-3xl blur opacity-0 group-focus-within/form:opacity-100 transition duration-500">
                                </div>
                                <div class="relative flex flex-col sm:flex-row gap-3">
                                    <input type="email" placeholder="Your email address"
                                        class="flex-1 px-8 py-3 rounded-2xl bg-white border border-gray-200 focus:outline-none focus:ring-2 focus:ring-india-green/30 focus:border-india-green transition-all shadow-sm text-lg font-medium">
                                    <button type="submit"
                                        class="px-10 bg-india-green text-white rounded-2xl hover:bg-india-green/90 transition-all shadow-lg shadow-india-green/20 active:scale-95 whitespace-nowrap">
                                        Subscribe
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    
        {{-- Footer --}}
        <footer class="bg-grey-50 border-t border-gray-100">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8">
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
                    class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
                    <p class="text-[14px] font-medium text-gray-500">
                        Copyright © {{ date('Y') }} by <span class="text-navy">Travel Shravel</span>
                    </p>
                    <div class="flex items-center gap-3">
                        {{-- Simulated Payment Icons matching design --}}
                        <div
                            class="h-10 w-10 rounded-full bg-[#2D3436] flex items-center justify-center group cursor-help transition-all hover:scale-110">
                            <span class="text-[8px] text-[#55EFC4] leading-tight text-center">₹<br>NEFT</span>
                        </div>
                        <div
                            class="h-10 w-10 rounded-full bg-[#2D3436] flex items-center justify-center group cursor-help transition-all hover:scale-110">
                            <span class="text-[8px] text-[#55EFC4] leading-tight text-center">₹<br>RTGS</span>
                        </div>
                        <div
                            class="h-10 w-10 rounded-full bg-[#2D3436] flex items-center justify-center group cursor-help transition-all hover:scale-110">
                            <span class="text-[8px] text-[#55EFC4] leading-tight text-center">₹<br>IMPS</span>
                        </div>
                        <div
                            class="h-10 w-10 rounded-full bg-[#2D3436] flex items-center justify-center group cursor-help transition-all hover:scale-110">
                            <span class="text-[8px] text-[#55EFC4] leading-tight text-center">₹<br>UPI</span>
                        </div>
                    </div>
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
            });
        </script>
    @endif
    @stack('scripts')
</body>

</html>
