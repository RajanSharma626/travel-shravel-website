<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Navbar Placeholder Routes
Route::get('/flights', function () { return view('welcome'); });
Route::get('/hotels', function () { return view('welcome'); });
Route::get('/trains', function () { return view('welcome'); });
Route::get('/tours', function () { return view('welcome'); });
Route::get('/activities', function () { return view('welcome'); });
Route::get('/cars', function () { return view('welcome'); });
Route::get('/bus', function () { return view('welcome'); });
Route::get('/cruise', function () { return view('welcome'); });
Route::get('/insurance', function () { return view('welcome'); });
Route::get('/visa', function () { return view('welcome'); });

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function () {
    return back()->with('status', 'We have emailed your password reset link!');
})->name('password.email');

Route::get('/hotel-search-layout', function () {
    return view('hotel');   
});

Route::get('/tour', function () {
    return view('tour');
});

Route::get('/activities', function () {
    return view('activities');
});

Route::get('/car', function () {
    return view('car');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/faqs', function () {
    return view('faqs');
});

Route::get('/reviews', function () {
    return view('reviews');
});

Route::get('/tour/{slug}', function () {
    return view('tour-detail');
});

Route::get('/hotel/{slug}', function () {
    return view('hotel-detail');
});

Route::get('/activity/{slug}', function () {
    return view('activity-detail');
});

Route::get('/car/{slug}', function () {
    return view('car-detail');
});

Route::get('/become-local-expert', function () {
    return view('become-local-expert');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/refund-policy', function () {
    return view('refund-policy');
});

Route::get('/terms-conditions', function () {
    return view('terms-conditions');
});
