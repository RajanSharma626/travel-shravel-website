<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminTourController extends Controller
{
    /**
     * Display a listing of tours.
     */
    public function index(Request $request)
    {
        $query = Tour::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%");
            });
        }

        $tours = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

        return view('admin.tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new tour.
     */
    public function create()
    {
        return view('admin.tours.create');
    }

    /**
     * Store a newly created tour in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'duration_days' => 'required|integer|min:1',
            'duration_nights' => 'required|integer|min:0',
            'tour_type' => 'nullable|string|max:255',
            'group_size' => 'nullable|integer|min:1',
            'languages' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'highlights' => 'nullable|array',
            'inclusions' => 'nullable|array',
            'exclusions' => 'nullable|array',
            'itinerary' => 'nullable|array',
            'itinerary.*.title' => 'required_with:itinerary|string|max:255',
            'itinerary.*.content' => 'required_with:itinerary|string',
            'images' => 'nullable|array',
            'images.*' => 'nullable|string',
            'primary_image' => 'nullable|string',
            'map_url' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        // Clean array inputs
        $validated['highlights'] = array_values(array_filter($request->input('highlights', [])));
        $validated['inclusions'] = array_values(array_filter($request->input('inclusions', [])));
        $validated['exclusions'] = array_values(array_filter($request->input('exclusions', [])));
        $validated['images'] = array_values(array_filter($request->input('images', [])));

        // Handle itinerary cleanup
        $itineraries = $request->input('itinerary', []);
        $cleanItinerary = [];
        foreach ($itineraries as $item) {
            if (!empty($item['title']) || !empty($item['content'])) {
                $cleanItinerary[] = [
                    'title' => $item['title'] ?? '',
                    'content' => $item['content'] ?? ''
                ];
            }
        }
        $validated['itinerary'] = $cleanItinerary;

        // Handle Image uploads
        $primaryInputValue = $request->input('primary_image');
        if (!empty($primaryInputValue) && in_array($primaryInputValue, $validated['images'])) {
            $validated['primary_image'] = $primaryInputValue;
        } else {
            $validated['primary_image'] = null;
        }

        if ($request->hasFile('image_files')) {
            $uploadedImages = [];
            foreach ($request->file('image_files') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('tours', 'public');
                    $fullUrl = asset('storage/' . $path);
                    $uploadedImages[] = $fullUrl;

                    if ($primaryInputValue === $file->getClientOriginalName()) {
                        $validated['primary_image'] = $fullUrl;
                    }
                }
            }
            $validated['images'] = array_merge($validated['images'], $uploadedImages);
        }

        if (empty($validated['primary_image']) && !empty($validated['images'])) {
            $validated['primary_image'] = $validated['images'][0];
        }

        Tour::create($validated);

        return redirect()->route('admin.tours.index')->with('success', 'Tour Package created successfully!');
    }

    /**
     * Show the form for editing the specified tour.
     */
    public function edit($id)
    {
        $tour = Tour::findOrFail($id);
        return view('admin.tours.edit', compact('tour'));
    }

    /**
     * Update the specified tour in storage.
     */
    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'duration_days' => 'required|integer|min:1',
            'duration_nights' => 'required|integer|min:0',
            'tour_type' => 'nullable|string|max:255',
            'group_size' => 'nullable|integer|min:1',
            'languages' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'highlights' => 'nullable|array',
            'inclusions' => 'nullable|array',
            'exclusions' => 'nullable|array',
            'itinerary' => 'nullable|array',
            'itinerary.*.title' => 'required_with:itinerary|string|max:255',
            'itinerary.*.content' => 'required_with:itinerary|string',
            'images' => 'nullable|array',
            'images.*' => 'nullable|string',
            'primary_image' => 'nullable|string',
            'map_url' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        $validated['highlights'] = array_values(array_filter($request->input('highlights', [])));
        $validated['inclusions'] = array_values(array_filter($request->input('inclusions', [])));
        $validated['exclusions'] = array_values(array_filter($request->input('exclusions', [])));
        $validated['images'] = array_values(array_filter($request->input('images', [])));

        $itineraries = $request->input('itinerary', []);
        $cleanItinerary = [];
        foreach ($itineraries as $item) {
            if (!empty($item['title']) || !empty($item['content'])) {
                $cleanItinerary[] = [
                    'title' => $item['title'] ?? '',
                    'content' => $item['content'] ?? ''
                ];
            }
        }
        $validated['itinerary'] = $cleanItinerary;

        $primaryInputValue = $request->input('primary_image');
        if (!empty($primaryInputValue) && in_array($primaryInputValue, $validated['images'])) {
            $validated['primary_image'] = $primaryInputValue;
        } else {
            $validated['primary_image'] = null;
        }

        if ($request->hasFile('image_files')) {
            $uploadedImages = [];
            foreach ($request->file('image_files') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('tours', 'public');
                    $fullUrl = asset('storage/' . $path);
                    $uploadedImages[] = $fullUrl;

                    if ($primaryInputValue === $file->getClientOriginalName()) {
                        $validated['primary_image'] = $fullUrl;
                    }
                }
            }
            $validated['images'] = array_merge($validated['images'], $uploadedImages);
        }

        if (empty($validated['primary_image']) && !empty($validated['images'])) {
            $validated['primary_image'] = $validated['images'][0];
        }

        $tour->update($validated);

        return redirect()->route('admin.tours.index')->with('success', 'Tour Package updated successfully!');
    }

    /**
     * Remove the specified tour from storage.
     */
    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);
        $tour->delete();

        return redirect()->route('admin.tours.index')->with('success', 'Tour Package deleted successfully!');
    }
}
