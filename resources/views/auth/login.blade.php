@extends('layouts.app')

@section('title', 'Login | Travel Shravel')

@section('content')
<div class="min-h-[80vh] bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">

        <h2 class="mt-6 text-center text-3xl font-semibold text-navy tracking-tight">
            Welcome Back!
        </h2>
        <p class="mt-2 text-center text-sm text-gray-500 font-medium">
            Please enter your details to login
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-10 px-6 shadow-[0_20px_50px_rgba(0,0,0,0.05)] rounded-[32px] sm:px-10 border border-gray-100">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                {{-- Email or Username --}}
                <div class="relative group">
                    <input id="email" type="text" name="email" value="{{ old('email') }}" required autocomplete="username" autofocus
                           class="block w-full px-5 py-3 rounded-xl bg-white border border-gray-200 text-navy font-medium placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('email') border-red-500 @enderror"
                           placeholder="Email or Username">
                    <div class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-india-green transition-colors">
                        <i class="fa-solid fa-envelope text-lg"></i>
                    </div>
                </div>
                @error('email')
                    <p class="mt-1 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                @enderror

                {{-- Password --}}
                <div class="relative group">
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           class="block w-full px-5 py-3 rounded-xl bg-white border border-gray-200 text-navy font-medium placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('password') border-red-500 @enderror"
                           placeholder="Password">
                    <div class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-india-green transition-colors">
                        <i class="fa-solid fa-lock text-lg"></i>
                    </div>
                </div>
                @error('password')
                    <p class="mt-1 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                @enderror

                {{-- Actions --}}
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}
                               class="h-5 w-5 rounded border-gray-300 text-india-green focus:ring-india-green transition-all cursor-pointer">
                        <label for="remember" class="ml-3 block text-sm text-gray-500 font-semibold cursor-pointer">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="{{ url('/forgot-password') }}" class="font-semibold text-navy hover:text-india-green transition-colors">
                            Forgot Password?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" 
                            class="w-full flex justify-center py-2 px-6 rounded-xl shadow-lg shadow-india-green/20 bg-india-green text-white  tracking-widest uppercase hover:bg-india-green/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-india-green transition-all active:scale-[0.98]">
                        Log In
                    </button>
                </div>
            </form>

            <div class="mt-8">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-100"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-400 ">New to Travel Shravel?</span>
                    </div>
                </div>

                <div class="mt-6 flex justify-center">
                    <a href="{{ url('/register') }}" class="text-navy font-semibold hover:text-india-green transition-colors flex items-center gap-2">
                        Create an account <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
