@extends('admin.layout')

@section('title', 'Settings')
@section('page_title', 'Settings')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto w-full">

    @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Profile Settings -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-4 border-b border-slate-200 bg-slate-50">
            <h3 class="font-semibold text-slate-800">Admin Profile Settings</h3>
            <p class="text-xs text-slate-500">Update your email and password.</p>
        </div>
        <form action="{{ route('admin.settings.profile') }}" method="POST" class="p-4 space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Current Password</label>
                    <input type="password" name="current_password" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Required to change password">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">New Password</label>
                    <input type="password" name="password" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Leave blank to keep current">
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition">Update Profile</button>
            </div>
        </form>
    </div>

    <!-- Site Settings -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-4 border-b border-slate-200 bg-slate-50">
            <h3 class="font-semibold text-slate-800">Site Settings (Frontend)</h3>
            <p class="text-xs text-slate-500">Update contact info, location, and social media links displayed on the website.</p>
        </div>
        <form action="{{ route('admin.settings.site') }}" method="POST" class="p-4 space-y-4">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Contact Email</label>
                    <input type="email" name="contact_email" value="{{ old('contact_email', $siteSetting->contact_email ?? '') }}" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Contact Phone No</label>
                    <input type="text" name="contact_phone" value="{{ old('contact_phone', $siteSetting->contact_phone ?? '') }}" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Address</label>
                <textarea name="address" rows="2" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">{{ old('address', $siteSetting->address ?? '') }}</textarea>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Location URL (e.g. Google Maps)</label>
                <input type="url" name="location_url" value="{{ old('location_url', $siteSetting->location_url ?? '') }}" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>

            <div class="pt-4 border-t border-slate-100">
                <h4 class="font-medium text-slate-700 mb-3 text-sm">Social Media Links</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Facebook URL</label>
                        <input type="url" name="facebook_url" value="{{ old('facebook_url', $siteSetting->facebook_url ?? '') }}" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Twitter URL</label>
                        <input type="url" name="twitter_url" value="{{ old('twitter_url', $siteSetting->twitter_url ?? '') }}" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Instagram URL</label>
                        <input type="url" name="instagram_url" value="{{ old('instagram_url', $siteSetting->instagram_url ?? '') }}" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">LinkedIn URL</label>
                        <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $siteSetting->linkedin_url ?? '') }}" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">YouTube URL</label>
                        <input type="url" name="youtube_url" value="{{ old('youtube_url', $siteSetting->youtube_url ?? '') }}" class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition">Update Site Settings</button>
            </div>
        </form>
    </div>

</div>
@endsection
