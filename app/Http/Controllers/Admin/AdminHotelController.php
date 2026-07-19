<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminHotelController extends Controller
{
    /**
     * Display a listing of hotels.
     */
    public function index(Request $request)
    {
        $query = Hotel::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%");
            });
        }

        $hotels = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new hotel.
     */
    public function create()
    {
        return view('admin.hotels.create');
    }

    /**
     * Store a newly created hotel in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'stars' => 'required|integer|min:1|max:5',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'description' => 'nullable|string',
            'check_in_time' => 'required|string|max:255',
            'check_out_time' => 'required|string|max:255',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'amenities' => 'nullable|array',
            'room_types' => 'nullable|array',
            'images' => 'nullable|array',
            'images.*' => 'nullable|string',
            'primary_image' => 'nullable|string',
            'map_url' => 'nullable|string',
        ]);

        // Default properties
        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['is_featured'] = $request->has('is_featured') ? true : false;
        
        // Clean array inputs
        $validated['amenities'] = array_filter($request->input('amenities', []));
        $validated['room_types'] = array_filter($request->input('room_types', []));
        $validated['images'] = array_filter($request->input('images', []));

        // Resolve primary image if it's already one of the text URL inputs
        $primaryInputValue = $request->input('primary_image');
        if (!empty($primaryInputValue) && in_array($primaryInputValue, $validated['images'])) {
            $validated['primary_image'] = $primaryInputValue;
        } else {
            $validated['primary_image'] = null;
        }

        // Handle file uploads if any
        if ($request->hasFile('image_files')) {
            $uploadedImages = [];
            foreach ($request->file('image_files') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('hotels', 'public');
                    $fullUrl = asset('storage/' . $path);
                    $uploadedImages[] = $fullUrl;
                    
                    // If the user selected this newly uploaded file as primary
                    if ($primaryInputValue === $file->getClientOriginalName()) {
                        $validated['primary_image'] = $fullUrl;
                    }
                }
            }
            $validated['images'] = array_merge($validated['images'], $uploadedImages);
        }

        // Fallback to first image if none resolved/selected
        if (empty($validated['primary_image']) && !empty($validated['images'])) {
            $validated['primary_image'] = $validated['images'][0];
        }

        Hotel::create($validated);

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel created successfully!');
    }

    /**
     * Show the form for editing the specified hotel.
     */
    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin.hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified hotel in storage.
     */
    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'stars' => 'required|integer|min:1|max:5',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'description' => 'nullable|string',
            'check_in_time' => 'required|string|max:255',
            'check_out_time' => 'required|string|max:255',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'amenities' => 'nullable|array',
            'room_types' => 'nullable|array',
            'images' => 'nullable|array',
            'images.*' => 'nullable|string',
            'primary_image' => 'nullable|string',
            'map_url' => 'nullable|string',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['is_featured'] = $request->has('is_featured') ? true : false;
        
        // Clean array inputs
        $validated['amenities'] = array_filter($request->input('amenities', []));
        $validated['room_types'] = array_filter($request->input('room_types', []));
        $validated['images'] = array_filter($request->input('images', []));

        // Resolve primary image if it's already one of the text URL inputs
        $primaryInputValue = $request->input('primary_image');
        if (!empty($primaryInputValue) && in_array($primaryInputValue, $validated['images'])) {
            $validated['primary_image'] = $primaryInputValue;
        } else {
            $validated['primary_image'] = null;
        }

        // Handle file uploads if any
        if ($request->hasFile('image_files')) {
            $uploadedImages = [];
            foreach ($request->file('image_files') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('hotels', 'public');
                    $fullUrl = asset('storage/' . $path);
                    $uploadedImages[] = $fullUrl;
                    
                    // If the user selected this newly uploaded file as primary
                    if ($primaryInputValue === $file->getClientOriginalName()) {
                        $validated['primary_image'] = $fullUrl;
                    }
                }
            }
            $validated['images'] = array_merge($validated['images'], $uploadedImages);
        }

        // Fallback to first image if none resolved/selected
        if (empty($validated['primary_image']) && !empty($validated['images'])) {
            $validated['primary_image'] = $validated['images'][0];
        }

        $hotel->update($validated);

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated successfully!');
    }

    /**
     * Remove the specified hotel from storage.
     */
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted successfully!');
    }
}
