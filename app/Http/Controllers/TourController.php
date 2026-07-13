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
                $query->orderBy('title', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('title', 'desc');
                break;
            default: // recommended
                $query->orderBy('id', 'asc');
                break;
        }

        $tours = $query->paginate(9)->withQueryString();

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
