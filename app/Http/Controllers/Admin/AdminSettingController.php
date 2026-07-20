<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\SiteSetting;

class AdminSettingController extends Controller
{
    public function index()
    {
        $siteSetting = SiteSetting::first();
        return view('admin.settings', compact('siteSetting'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'current_password' => ['nullable', 'required_with:password', 'current_password'],
            'password' => 'nullable|min:8',
        ]);

        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updateSiteSettings(Request $request)
    {
        $setting = SiteSetting::firstOrCreate(['id' => 1]);
        $setting->update($request->only([
            'contact_email', 'contact_phone', 'address', 'location_url',
            'facebook_url', 'twitter_url', 'instagram_url', 'linkedin_url', 'youtube_url'
        ]));

        return back()->with('success', 'Site settings updated successfully.');
    }
}
