<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Portal') - Travel Shravel</title>

    <!-- Tailwind CDN for immediate render & custom configuration -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563EB',
                        secondary: '#10B981',
                        darkNavy: '#1E3A8A',
                        slateDark: '#0F172A',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F8FAFC;
        }
        /* Custom scrollbar for premium feel */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #CBD5E1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94A3B8;
        }
    </style>
    @stack('styles')
</head>
<body class="h-screen overflow-hidden">

    <!-- Main Container -->
    <div class="h-screen flex flex-col md:flex-row overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-full md:w-56 h-auto md:h-full bg-slateDark text-white flex flex-col z-30 transition-all duration-300 flex-shrink-0 overflow-y-auto">
            <!-- Sidebar Header / Logo -->
            <div class="py-3 px-4 border-b border-slate-800 flex items-center justify-between">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                    <img src="{{ asset('assets/img/logo-travel-shravel.png') }}" alt="Travel Shravel" class="h-6 w-auto object-contain">
                    <div>
                        <h1 class="font-extrabold text-xs tracking-tight text-white uppercase">Travel Shravel</h1>
                        <span class="text-[9px] text-slate-400 font-semibold tracking-wider uppercase block">Admin Portal</span>
                    </div>
                </a>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-2.5 py-4 space-y-1">
                @php
                    $route = Request::route()->getName();
                @endphp
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg transition duration-205 group {{ $route === 'admin.dashboard' ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-chart-line text-base {{ $route === 'admin.dashboard' ? '' : 'group-hover:scale-105 transition' }}"></i>
                    <span class="font-medium text-xs">Dashboard</span>
                </a>
                <a href="{{ route('admin.hotels.index') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg transition duration-205 group {{ str_starts_with($route, 'admin.hotels') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-hotel text-base {{ str_starts_with($route, 'admin.hotels') ? '' : 'group-hover:scale-105 transition' }}"></i>
                    <span class="font-medium text-xs">Hotels</span>
                </a>
                <a href="{{ route('admin.tours.index') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg transition duration-205 group {{ str_starts_with($route, 'admin.tours') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-map-location-dot text-base {{ str_starts_with($route, 'admin.tours') ? '' : 'group-hover:scale-105 transition' }}"></i>
                    <span class="font-medium text-xs">Tours</span>
                </a>
                <a href="{{ route('admin.activities.index') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg transition duration-205 group {{ str_starts_with($route, 'admin.activities') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-person-hiking text-base {{ str_starts_with($route, 'admin.activities') ? '' : 'group-hover:scale-105 transition' }}"></i>
                    <span class="font-medium text-xs">Activities</span>
                </a>
                <a href="{{ route('admin.cars.index') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg transition duration-205 group {{ str_starts_with($route, 'admin.cars') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-car text-base {{ str_starts_with($route, 'admin.cars') ? '' : 'group-hover:scale-105 transition' }}"></i>
                    <span class="font-medium text-xs">Cars</span>
                </a>
                <a href="{{ route('admin.users') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg transition duration-205 group {{ $route === 'admin.users' ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-users text-base {{ $route === 'admin.users' ? '' : 'group-hover:scale-105 transition' }}"></i>
                    <span class="font-medium text-xs">Users</span>
                </a>
                <a href="{{ route('admin.faqs.index') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg transition duration-205 group {{ str_starts_with($route, 'admin.faqs') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-circle-question text-base {{ str_starts_with($route, 'admin.faqs') ? '' : 'group-hover:scale-105 transition' }}"></i>
                    <span class="font-medium text-xs">FAQs</span>
                </a>
                <a href="{{ route('admin.partners.index') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg transition duration-205 group {{ str_starts_with($route, 'admin.partners') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-handshake text-base {{ str_starts_with($route, 'admin.partners') ? '' : 'group-hover:scale-105 transition' }}"></i>
                    <span class="font-medium text-xs">Partners</span>
                </a>
                <a href="{{ route('admin.train-inquiries.index') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg transition duration-205 group {{ str_starts_with($route, 'admin.train-inquiries') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-train text-base {{ str_starts_with($route, 'admin.train-inquiries') ? '' : 'group-hover:scale-105 transition' }}"></i>
                    <span class="font-medium text-xs">Train Inquiries</span>
                </a>
                <a href="{{ route('admin.bus-inquiries.index') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg transition duration-205 group {{ str_starts_with($route, 'admin.bus-inquiries') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-bus text-base {{ str_starts_with($route, 'admin.bus-inquiries') ? '' : 'group-hover:scale-105 transition' }}"></i>
                    <span class="font-medium text-xs">Bus Inquiries</span>
                </a>
                <a href="{{ route('admin.cruise-inquiries.index') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg transition duration-205 group {{ str_starts_with($route, 'admin.cruise-inquiries') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-ship text-base {{ str_starts_with($route, 'admin.cruise-inquiries') ? '' : 'group-hover:scale-105 transition' }}"></i>
                    <span class="font-medium text-xs">Cruise Inquiries</span>
                </a>
                <a href="{{ route('admin.insurance-inquiries.index') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg transition duration-205 group {{ str_starts_with($route, 'admin.insurance-inquiries') ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-shield-heart text-base {{ str_starts_with($route, 'admin.insurance-inquiries') ? '' : 'group-hover:scale-105 transition' }}"></i>
                    <span class="font-medium text-xs">Insurance Inquiries</span>
                </a>
                <a href="/" target="_blank"
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition duration-205">
                    <i class="fa-solid fa-globe text-base"></i>
                    <span class="font-medium text-xs">Go to Site</span>
                </a>
            </nav>

            <!-- Sidebar Footer / Admin Session Profile -->
            <div class="p-3 border-t border-slate-800 bg-slate-900/50">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-primary to-secondary flex items-center justify-center font-bold text-white text-xs shadow-sm">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 2)) }}
                    </div>
                    <div class="overflow-hidden">
                        <p class="font-semibold text-xs truncate">{{ Auth::user()->name ?? 'Administrator' }}</p>
                        <p class="text-[10px] text-slate-400 truncate">{{ Auth::user()->email ?? 'admin@travel.com' }}</p>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Are you sure you want to logout?')">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-1.5 py-1.5 px-3 bg-slate-800 hover:bg-rose-900/40 hover:text-rose-400 text-slate-300 rounded-lg transition duration-205 font-medium text-[10px]">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Body Panel -->
        <main class="flex-1 flex flex-col min-w-0 h-full overflow-y-auto">
            <!-- Top Navbar -->
            <header class="bg-white border-b border-slate-200 px-4 py-2 flex items-center justify-between sticky top-0 z-20">
                <div class="flex items-center gap-3">
                    <h2 class="text-base font-bold text-slate-800">@yield('page_title', 'Overview')</h2>
                </div>
                <div class="flex items-center gap-3">
                    <!-- Date badge -->
                    <div class="hidden sm:flex items-center gap-1.5 px-2 py-1 bg-slate-100 text-slate-600 rounded-md text-[10px] font-semibold">
                        <i class="fa-regular fa-calendar-days"></i>
                        <span>{{ date('F j, Y') }}</span>
                    </div>

                    <!-- Profile Dropdown -->
                    <div class="flex items-center gap-2">
                        <div class="text-right hidden sm:block">
                            <span class="block text-xs font-semibold text-slate-800">{{ Auth::user()->name }}</span>
                            <span class="block text-[9px] font-bold text-primary uppercase tracking-wider">Admin Access</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <div class="flex-1 p-4 md:p-5">
                <!-- Notifications/Alerts -->
                @if (session('success'))
                    <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg flex items-center gap-2.5 shadow-sm animate-fade-in">
                        <i class="fa-solid fa-circle-check text-emerald-500 text-base"></i>
                        <p class="text-xs font-medium">{{ session('success') }}</p>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 p-3 bg-rose-50 border border-rose-200 text-rose-800 rounded-lg flex items-center gap-2.5 shadow-sm animate-fade-in">
                        <i class="fa-solid fa-circle-xmark text-rose-500 text-base"></i>
                        <p class="text-xs font-medium">{{ session('error') }}</p>
                    </div>
                @endif

                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="bg-white border-t border-slate-200 py-2.5 px-4 text-center text-slate-400 text-[10px] font-medium">
                &copy; {{ date('Y') }} Travel Shravel. All rights reserved. Secure Portal.
            </footer>
        </main>
    </div>

    @stack('scripts')
</body>
</html>
