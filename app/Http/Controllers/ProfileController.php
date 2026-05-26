<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Show the user profile form.
     */
    public function show(Request $request)
    {
        return view('profile.show', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Show the user's booking history.
     */
    public function bookingHistory(Request $request)
    {
        return view('profile.bookings', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Show details for a specific booking.
     */
    public function bookingDetail(Request $request)
    {
        return view('profile.booking-detail', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Show the user's wishlist.
     */
    public function wishlist(Request $request)
    {
        return view('profile.wishlist', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user profile information.
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $user->id],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone_number' => ['nullable', 'string', 'max:255'],
            'about_yourself' => ['nullable', 'string'],
            'street_address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'zip_code' => ['nullable', 'string', 'max:255'],
        ]);

        $user->fill([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'about_yourself' => $request->about_yourself,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zip_code' => $request->zip_code,
        ]);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return back()->with('status', 'profile-updated');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'password-updated');
    }
}
