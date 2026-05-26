{{-- Left Column: User Card & Menu --}}
<div class="col-span-1 flex flex-col gap-6 sticky top-24 self-start">
    <div class="bg-white rounded-[32px] p-6 shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-gray-100 flex flex-col gap-6">
        
        {{-- User Header --}}
        @php
            $names = explode(' ', trim($user->name));
            $initials = strtoupper(substr($names[0], 0, 1) . (isset($names[1]) ? substr($names[1], 0, 1) : ''));
        @endphp
        <div class="flex items-center gap-4 pb-6 border-b border-gray-50">
            <div class="w-14 h-14 rounded-full bg-navy-tint text-navy flex items-center justify-center text-xl font-bold border border-navy/10 shadow-inner select-none flex-shrink-0">
                {{ $initials }}
            </div>
            <div class="min-w-0">
                <h2 class="text-lg font-bold text-navy truncate">{{ $user->name }}</h2>
                <p class="text-xs text-gray-400 font-semibold truncate">{{ '@' . $user->username }}</p>
            </div>
        </div>

        {{-- Navigation Menu --}}
        <nav class="flex flex-col gap-1.5">
            <a href="{{ route('profile') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm font-semibold transition-all w-full text-left cursor-pointer {{ $active === 'profile' ? 'bg-navy text-white shadow-md shadow-navy/10' : 'text-gray-500 hover:bg-gray-50 hover:text-navy' }}">
                <i class="fa-regular fa-user text-base"></i> My Profile
            </a>
            <a href="{{ route('profile.bookings') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm font-semibold transition-all w-full text-left cursor-pointer {{ $active === 'bookings' ? 'bg-navy text-white shadow-md shadow-navy/10' : 'text-gray-500 hover:bg-gray-50 hover:text-navy' }}">
                <i class="fa-regular fa-calendar-check text-base"></i> Booking History
            </a>
            <a href="{{ route('profile.wishlist') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm font-semibold transition-all w-full text-left cursor-pointer {{ $active === 'wishlist' ? 'bg-navy text-white shadow-md shadow-navy/10' : 'text-gray-500 hover:bg-gray-50 hover:text-navy' }}">
                <i class="fa-regular fa-heart text-base"></i> Wishlist
            </a>
            
            <div class="border-t border-gray-100 my-2"></div>
            
            {{-- Back to Website --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm font-semibold text-gray-500 hover:bg-gray-50 hover:text-navy transition-all">
                <i class="fa-solid fa-arrow-left text-base"></i> Back to Website
            </a>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}" class="block">
                @csrf
                <button type="submit" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm font-semibold text-red-600 hover:bg-red-50 hover:text-red-700 transition-all w-full text-left cursor-pointer">
                    <i class="fa-solid fa-arrow-right-from-bracket text-base"></i> Logout
                </button>
            </form>
        </nav>
    </div>
</div>
