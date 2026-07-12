<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of active hotels.
     */
    public function index(Request $request)
    {
        $query = Hotel::where('is_active', true);

        // Optional search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%");
            });
        }

        // Optional stars filter
        if ($request->filled('stars')) {
            $stars = $request->input('stars');
            if (is_array($stars)) {
                $query->whereIn('stars', $stars);
            } else {
                $query->where('stars', $stars);
            }
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

        $hotels = $query->paginate(9)->withQueryString();

        return view('hotel', compact('hotels'));
    }

    /**
     * Display the specified hotel details.
     */
    public function show($slug)
    {
        $hotel = Hotel::where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('hotel-detail', compact('hotel'));
    }
}
