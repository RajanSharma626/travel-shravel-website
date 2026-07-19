<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Activity;
use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        $featuredTours = Tour::where('is_featured', true)->paginate(6, ['*'], 'tour_page');
        $featuredHotels = Hotel::where('is_featured', true)->paginate(6, ['*'], 'hotel_page');
        $featuredActivities = Activity::where('is_featured', true)->paginate(6, ['*'], 'activity_page');
        $featuredCars = Car::where('is_featured', true)->paginate(6, ['*'], 'car_page');

        return view('welcome', compact(
            'featuredTours',
            'featuredHotels',
            'featuredActivities',
            'featuredCars'
        ));
    }
}
