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
            $query->where('stars', $request->input('stars'));
        }

        // Optional price ranges
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        $hotels = $query->orderBy('created_at', 'desc')->paginate(9)->withQueryString();

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
