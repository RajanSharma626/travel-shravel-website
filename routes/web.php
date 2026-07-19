<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CarController;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Navbar Placeholder Routes
Route::get('/flights', function () { return view('welcome'); });
Route::get('/train', function () {
    return view('train');
});

Route::post('/train-inquiry', [\App\Http\Controllers\TrainInquiryController::class, 'store'])->name('train.inquiry.store');
Route::get('/bus', function () { return view('bus'); });
Route::post('/bus-inquiry', [\App\Http\Controllers\BusInquiryController::class, 'store'])->name('bus.inquiry.store');
Route::get('/cruise', function () { return view('cruise'); });
Route::post('/cruise-inquiry', [\App\Http\Controllers\CruiseInquiryController::class, 'store'])->name('cruise.inquiry.store');
Route::get('/insurance', function () { return view('insurance'); });
Route::post('/insurance-inquiry', [\App\Http\Controllers\InsuranceInquiryController::class, 'store'])->name('insurance.inquiry.store');
Route::get('/visa', function () { return view('visa'); });

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function () {
    return back()->with('status', 'We have emailed your password reset link!');
})->name('password.email');

Route::get('/hotel-search-layout', [HotelController::class, 'index']);
Route::get('/hotels', [HotelController::class, 'index']);
Route::get('/tour', [TourController::class, 'index']);
Route::get('/tours', [TourController::class, 'index']);
Route::get('/activities', [ActivityController::class, 'index']);
Route::get('/cars', [CarController::class, 'index']);

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/faqs', function () {
    $faqs = \App\Models\Faq::where('is_active', true)->get();
    return view('faqs', compact('faqs'));
});

Route::get('/reviews', function () {
    return view('reviews');
});

Route::get('/tour/{slug}', [TourController::class, 'show']);
Route::get('/hotel/{slug}', [HotelController::class, 'show']);
Route::get('/activity/{slug}', [ActivityController::class, 'show']);
Route::get('/car/{slug}', [CarController::class, 'show']);

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

use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::get('/profile/booking-history', [ProfileController::class, 'bookingHistory'])->name('profile.bookings');
    Route::get('/profile/booking-history/detail', [ProfileController::class, 'bookingDetail'])->name('profile.booking-detail');
    Route::get('/profile/wishlist', [ProfileController::class, 'wishlist'])->name('profile.wishlist');
});

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminHotelController;
use App\Http\Controllers\Admin\AdminTourController;
use App\Http\Controllers\Admin\AdminActivityController;
use App\Http\Controllers\Admin\AdminCarController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminPartnerController;
use App\Http\Controllers\Admin\AdminTrainInquiryController;
use App\Http\Middleware\AdminMiddleware;

$adminPath = env('ADMIN_PATH', 'portal-tsh-78a9c2');

Route::prefix($adminPath)->middleware([AdminMiddleware::class])->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminDashboardController::class, 'users'])->name('users');
    Route::post('/users/{id}/role', [AdminDashboardController::class, 'updateUserType'])->name('users.role');
    Route::post('/users/{id}', [AdminDashboardController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{id}', [AdminDashboardController::class, 'destroyUser'])->name('users.destroy');

    // Hotel Management Routes
    Route::resource('/hotels', AdminHotelController::class);

    // Tour Management Routes
    Route::resource('/tours', AdminTourController::class);

    // Activity Management Routes
    Route::resource('/activities', AdminActivityController::class);

    // Car Management Routes
    Route::resource('/cars', AdminCarController::class);

    // FAQ Management Routes
    Route::resource('/faqs', AdminFaqController::class);

    // Partner Management Routes
    Route::resource('/partners', AdminPartnerController::class);

    // Train Inquiry Management Routes
    Route::resource('/train-inquiries', AdminTrainInquiryController::class)->only(['index', 'destroy']);

    // Bus Inquiry Management Routes
    Route::resource('/bus-inquiries', \App\Http\Controllers\Admin\AdminBusInquiryController::class)->only(['index', 'destroy']);

    // Cruise Inquiry Management Routes
    Route::resource('/cruise-inquiries', \App\Http\Controllers\Admin\AdminCruiseInquiryController::class)->only(['index', 'destroy']);

    // Insurance Inquiry Management Routes
    Route::resource('/insurance-inquiries', \App\Http\Controllers\Admin\AdminInsuranceInquiryController::class)->only(['index', 'destroy']);
});

