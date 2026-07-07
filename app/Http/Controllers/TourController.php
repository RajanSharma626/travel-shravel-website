<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of active tours.
     */
    public function index(Request $request)
    {
        $query = Tour::where('is_active', true);

        // Optional search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%");
            });
        }

        // Optional category / tour type filter
        if ($request->filled('category')) {
            $query->where('tour_type', $request->input('category'));
        }

        // Optional price ranges
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        $tours = $query->orderBy('created_at', 'desc')->paginate(9)->withQueryString();

        return view('tour', compact('tours'));
    }

    /**
     * Display the specified tour details.
     */
    public function show($slug)
    {
        $tour = Tour::where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('tour-detail', compact('tour'));
    }
}
