@extends('layouts.app')

@section('title', 'Sign Up | Travel Shravel')

@section('content')
<div class="min-h-[85vh] bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">

        <h2 class="mt-6 text-center text-3xl font-semibold text-navy tracking-tight">
            Join Travel Shravel
        </h2>
        <p class="mt-2 text-center text-sm text-gray-500 font-medium">
            Start your journey with us today
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-lg">
        <div class="bg-white py-10 px-6 shadow-[0_20px_50px_rgba(0,0,0,0.05)] rounded-[32px] sm:px-10 border border-gray-100">
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    {{-- Username --}}
                    <div>
                        <div class="relative group">
                            <input id="username" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus
                                   class="block w-full px-5 py-3 rounded-xl bg-white border border-gray-200 text-navy font-medium placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('username') border-red-500 @enderror"
                                   placeholder="Username *">
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-india-green transition-colors">
                                <i class="fa-solid fa-user text-lg"></i>
                            </div>
                        </div>
                        @error('username')
                            <p class="mt-1 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Full Name --}}
                    <div>
                        <div class="relative group">
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
                                   class="block w-full px-5 py-3 rounded-xl bg-white border border-gray-200 text-navy font-medium placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('name') border-red-500 @enderror"
                                   placeholder="Full Name">
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-india-green transition-colors">
                                <i class="fa-solid fa-circle-question text-lg"></i>
                            </div>
                        </div>
                        @error('name')
                            <p class="mt-1 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Email --}}
                <div class="relative group">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                           class="block w-full px-5 py-3 rounded-xl bg-white border border-gray-200 text-navy font-medium placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('email') border-red-500 @enderror"
                           placeholder="Email *">
                    <div class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-india-green transition-colors">
                        <i class="fa-solid fa-envelope text-lg"></i>
                    </div>
                </div>
                @error('email')
                    <p class="mt-1 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                @enderror

                {{-- Password --}}
                <div class="relative group">
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                           class="block w-full px-5 py-3 rounded-xl bg-white border border-gray-200 text-navy font-medium placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('password') border-red-500 @enderror"
                           placeholder="Password *">
                    <div class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-india-green transition-colors">
                        <i class="fa-solid fa-lock text-lg"></i>
                    </div>
                </div>
                @error('password')
                    <p class="mt-1 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                @enderror

                {{-- Select User Type --}}
                <div class="pt-2">
                    <p class="text-[15px] font-semibold text-navy mb-4">Select User Type</p>
                    <div class="flex items-center gap-8">
                        <label class="flex items-center cursor-pointer group">
                            <input type="radio" name="user_type" value="normal" checked class="hidden peer">
                            <div class="w-6 h-6 rounded-full border-2 border-gray-200 peer-checked:border-india-green flex items-center justify-center transition-all group-hover:border-india-green/50 peer-checked:[&>div]:scale-100">
                                <div class="w-3 h-3 rounded-full bg-india-green scale-0 transition-transform"></div>
                            </div>
                            <span class="ml-3 text-sm font-semibold text-gray-500 peer-checked:text-navy transition-colors">Normal User</span>
                        </label>
                        <label class="flex items-center cursor-pointer group">
                            <input type="radio" name="user_type" value="partner" class="hidden peer">
                            <div class="w-6 h-6 rounded-full border-2 border-gray-200 peer-checked:border-india-green flex items-center justify-center transition-all group-hover:border-india-green/50 peer-checked:[&>div]:scale-100">
                                <div class="w-3 h-3 rounded-full bg-india-green scale-0 transition-transform"></div>
                            </div>
                            <span class="ml-3 text-sm font-semibold text-gray-500 peer-checked:text-navy transition-colors">Partner User</span>
                        </label>
                    </div>
                </div>

                {{-- Terms Checkbox --}}
                <div class="pt-4 flex items-center">
                    <input id="terms" name="terms" type="checkbox" required
                           class="h-5 w-5 rounded border-gray-300 text-india-green focus:ring-india-green transition-all cursor-pointer">
                    <label for="terms" class="ml-3 block text-sm text-gray-500 font-semibold cursor-pointer">
                        I have read and accept the <a href="#" class="text-india-green hover:underline">Terms and Privacy Policy</a>
                    </label>
                </div>

                <div class="pt-4">
                    <button type="submit" 
                            class="w-full flex justify-center py-2 px-6 rounded-xl shadow-lg shadow-india-green/20 bg-india-green text-white font-semibold tracking-widest uppercase hover:bg-india-green/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-india-green transition-all active:scale-[0.98]">
                        Sign Up
                    </button>
                </div>
            </form>

            <div class="mt-10 pt-8 border-t border-gray-50 text-center">
                <p class="text-sm text-gray-500 font-semibold">
                    Already have an account? 
                    <a href="{{ url('/login') }}" class="text-navy font-semibold hover:text-india-green transition-colors ml-1">
                        Log In
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
