<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of active cars.
     */
    public function index(Request $request)
    {
        $query = Car::where('is_active', true);

        // Optional search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        // Optional category filter
        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        // Optional price ranges
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        $cars = $query->orderBy('created_at', 'desc')->paginate(9)->withQueryString();

        return view('car', compact('cars'));
    }

    /**
     * Display the specified car details.
     */
    public function show($slug)
    {
        $car = Car::where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('car-detail', compact('car'));
    }
}
