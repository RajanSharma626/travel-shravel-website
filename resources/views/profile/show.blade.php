@extends('layouts.app')

@section('title', 'My Profile | Travel Shravel')

@section('content')
<div class="min-h-screen bg-gray-50/50 py-12 w-full">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        {{-- Success Alerts --}}
        @if (session('status') === 'profile-updated')
            <div class="mb-8 p-4 bg-green-tint border-l-4 border-india-green rounded-r-xl flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-circle-check text-india-green text-lg"></i>
                    <p class="text-sm font-semibold text-green-deep">Your profile information has been successfully updated.</p>
                </div>
            </div>
        @endif

        @if (session('status') === 'password-updated')
            <div class="mb-8 p-4 bg-green-tint border-l-4 border-india-green rounded-r-xl flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-circle-check text-india-green text-lg"></i>
                    <p class="text-sm font-semibold text-green-deep">Your security password has been changed successfully.</p>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            {{-- Reusable Sidebar --}}
            @include('profile.partials.sidebar', ['active' => 'profile'])

            {{-- Right Column: Panels --}}
            <div class="col-span-3">
                
                <div class="space-y-8">
                    
                    {{-- Form 1: Edit Profile Details --}}
                    <div class="bg-white rounded-[32px] p-8 md:p-10 shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-gray-100">
                        <h3 class="text-xl font-bold text-navy mb-2 flex items-center gap-3">
                            <i class="fa-regular fa-user text-india-green"></i> Profile Information
                        </h3>
                        <p class="text-sm text-gray-400 font-medium mb-8">Update your account's profile details and email address.</p>

                        <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                            @csrf
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Full Name --}}
                                <div>
                                    <label for="name" class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">Full Name</label>
                                    <div class="relative group">
                                        <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name"
                                               class="block w-full px-5 py-3.5 rounded-xl bg-white border border-gray-200 text-navy font-semibold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('name') border-red-500 @enderror">
                                        @error('name')
                                            <p class="mt-1.5 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Username --}}
                                <div>
                                    <label for="username" class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">Username</label>
                                    <div class="relative group">
                                        <input id="username" type="text" name="username" value="{{ old('username', $user->username) }}" required autocomplete="username"
                                               class="block w-full px-5 py-3.5 rounded-xl bg-white border border-gray-200 text-navy font-semibold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('username') border-red-500 @enderror">
                                        @error('username')
                                            <p class="mt-1.5 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label for="email" class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">Email Address</label>
                                    <div class="relative group">
                                        <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email"
                                               class="block w-full px-5 py-3.5 rounded-xl bg-white border border-gray-200 text-navy font-semibold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('email') border-red-500 @enderror">
                                        @error('email')
                                            <p class="mt-1.5 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Phone Number --}}
                                <div>
                                    <label for="phone_number" class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">Phone Number</label>
                                    <div class="relative group">
                                        <input id="phone_number" type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" autocomplete="tel"
                                               class="block w-full px-5 py-3.5 rounded-xl bg-white border border-gray-200 text-navy font-semibold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('phone_number') border-red-500 @enderror">
                                        @error('phone_number')
                                            <p class="mt-1.5 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- About Yourself --}}
                            <div>
                                <label for="about_yourself" class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">About Yourself</label>
                                <div class="relative group">
                                    <textarea id="about_yourself" name="about_yourself" rows="4" placeholder="Tell us a little bit about yourself, your travel interests, etc..."
                                              class="block w-full px-5 py-3.5 rounded-xl bg-white border border-gray-200 text-navy font-semibold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('about_yourself') border-red-500 @enderror">{{ old('about_yourself', $user->about_yourself) }}</textarea>
                                    @error('about_yourself')
                                        <p class="mt-1.5 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location Details Section --}}
                            <div class="border-t border-gray-100 pt-6">
                                <h4 class="text-sm font-bold text-navy uppercase tracking-wider mb-4 flex items-center gap-2">
                                    <i class="fa-solid fa-location-dot text-india-green"></i> Location Section
                                </h4>
                                
                                <div class="space-y-6">
                                    {{-- Street Address --}}
                                    <div>
                                        <label for="street_address" class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">Street Address</label>
                                        <div class="relative group">
                                            <input id="street_address" type="text" name="street_address" value="{{ old('street_address', $user->street_address) }}" autocomplete="street-address"
                                                   class="block w-full px-5 py-3.5 rounded-xl bg-white border border-gray-200 text-navy font-semibold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('street_address') border-red-500 @enderror">
                                            @error('street_address')
                                                <p class="mt-1.5 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        {{-- City --}}
                                        <div>
                                            <label for="city" class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">City</label>
                                            <div class="relative group">
                                                <input id="city" type="text" name="city" value="{{ old('city', $user->city) }}" autocomplete="address-level2"
                                                       class="block w-full px-5 py-3.5 rounded-xl bg-white border border-gray-200 text-navy font-semibold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('city') border-red-500 @enderror">
                                                @error('city')
                                                    <p class="mt-1.5 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- State --}}
                                        <div>
                                            <label for="state" class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">State</label>
                                            <div class="relative group">
                                                <input id="state" type="text" name="state" value="{{ old('state', $user->state) }}" autocomplete="address-level1"
                                                       class="block w-full px-5 py-3.5 rounded-xl bg-white border border-gray-200 text-navy font-semibold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('state') border-red-500 @enderror">
                                                @error('state')
                                                    <p class="mt-1.5 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Country --}}
                                        <div>
                                            <label for="country" class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">Country</label>
                                            <div class="relative group">
                                                <input id="country" type="text" name="country" value="{{ old('country', $user->country) }}" autocomplete="country-name"
                                                       class="block w-full px-5 py-3.5 rounded-xl bg-white border border-gray-200 text-navy font-semibold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('country') border-red-500 @enderror">
                                                @error('country')
                                                    <p class="mt-1.5 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Zip Code --}}
                                        <div>
                                            <label for="zip_code" class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">Zip Code</label>
                                            <div class="relative group">
                                                <input id="zip_code" type="text" name="zip_code" value="{{ old('zip_code', $user->zip_code) }}" autocomplete="postal-code"
                                                       class="block w-full px-5 py-3.5 rounded-xl bg-white border border-gray-200 text-navy font-semibold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('zip_code') border-red-500 @enderror">
                                                @error('zip_code')
                                                    <p class="mt-1.5 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4 flex justify-end">
                                <button type="submit" 
                                        class="px-8 py-3 rounded-xl shadow-lg shadow-india-green/20 bg-india-green text-white font-semibold tracking-wider uppercase hover:bg-india-green/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-india-green transition-all active:scale-[0.98] cursor-pointer">
                                    Save Details
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Form 2: Update Password --}}
                    <div class="bg-white rounded-[32px] p-8 md:p-10 shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-gray-100">
                        <h3 class="text-xl font-bold text-navy mb-2 flex items-center gap-3">
                            <i class="fa-solid fa-shield-halved text-india-green"></i> Security Settings
                        </h3>
                        <p class="text-sm text-gray-400 font-medium mb-8">Ensure your account is using a long, random password to stay secure.</p>

                        <form method="POST" action="{{ route('profile.password') }}" class="space-y-6">
                            @csrf
                            
                            {{-- Current Password --}}
                            <div>
                                <label for="current_password" class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">Current Password</label>
                                <div class="relative group">
                                    <input id="current_password" type="password" name="current_password" required autocomplete="current-password"
                                           class="block w-full px-5 py-3.5 rounded-xl bg-white border border-gray-200 text-navy font-semibold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('current_password') border-red-500 @enderror">
                                    @error('current_password')
                                        <p class="mt-1.5 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- New Password --}}
                                <div>
                                    <label for="password" class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">New Password</label>
                                    <div class="relative group">
                                        <input id="password" type="password" name="password" required autocomplete="new-password"
                                               class="block w-full px-5 py-3.5 rounded-xl bg-white border border-gray-200 text-navy font-semibold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all @error('password') border-red-500 @enderror">
                                        @error('password')
                                            <p class="mt-1.5 text-xs text-red-500 font-bold tracking-tight">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Confirm Password --}}
                                <div>
                                    <label for="password_confirmation" class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">Confirm New Password</label>
                                    <div class="relative group">
                                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                                               class="block w-full px-5 py-3.5 rounded-xl bg-white border border-gray-200 text-navy font-semibold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-india-green/20 focus:border-india-green transition-all">
                                    </div>
                                </div>
                            </div>

                            <div class="pt-2 flex justify-end">
                                <button type="submit" 
                                        class="px-8 py-3 rounded-xl shadow-lg shadow-india-green/20 bg-india-green text-white font-semibold tracking-wider uppercase hover:bg-india-green/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-india-green transition-all active:scale-[0.98] cursor-pointer">
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
