@extends('layouts.app')

@section('title', 'Forgot Password | Travel Shravel')

@section('content')
<div class="min-h-[80vh] bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-semibold text-navy tracking-tight">
            Reset Password
        </h2>
        <p class="mt-2 text-center text-sm text-gray-500 font-medium px-4">
            Enter your email address and we'll send you a link to reset your password.
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-10 px-6 shadow-[0_20px_50px_rgba(0,0,0,0.05)] rounded-[32px] sm:px-10 border border-gray-100">
            @if (session('status'))
                <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-100 text-green-700 text-sm font-semibold flex items-center gap-3">
                    <i class="fa-solid fa-circle-check text-lg"></i>
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                {{-- Email Address --}}
                <div class="relative group">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           class="block w-full px-5 py-3 rounded-xl bg-white border border-gray-200 text-navy font-medium placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('email') border-red-500 @enderror"
                           placeholder="Enter your email">
                    <div class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-india-green transition-colors">
                        <i class="fa-solid fa-envelope text-lg"></i>
                    </div>
                </div>
                @error('email')
                    <p class="mt-1 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                @enderror

                <div>
                    <button type="submit" 
                            class="w-full flex justify-center py-2 px-6 rounded-xl shadow-lg shadow-india-green/20 bg-india-green text-white tracking-widest uppercase hover:bg-india-green/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-india-green transition-all active:scale-[0.98]">
                        Send Reset Link
                    </button>
                </div>
            </form>

            <div class="mt-10 pt-8 border-t border-gray-50 text-center">
                <a href="{{ url('/login') }}" class="text-navy font-semibold hover:text-india-green transition-colors flex items-center justify-center gap-2">
                    <i class="fa-solid fa-arrow-left text-[10px]"></i> Back to Login
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
