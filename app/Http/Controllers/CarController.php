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
        if ($request->filled('min_price') && $request->input('min_price') > 0) {
            $query->where('price', '>=', $request->input('min_price'));
        }
        if ($request->filled('max_price') && $request->input('max_price') > 0) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        // Sorting logic
        $sortBy = $request->input('sort_by', 'recommended');
        switch ($sortBy) {
            case 'new':
                $query->orderBy('created_at', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            default: // recommended
                $query->orderBy('id', 'asc');
                break;
        }

        $cars = $query->paginate(9)->withQueryString();

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
