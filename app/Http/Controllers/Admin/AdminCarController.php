<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCarController extends Controller
{
    /**
     * Display a listing of cars.
     */
    public function index(Request $request)
    {
        $query = Car::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        $cars = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new car.
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created car in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'passengers' => 'required|integer|min:1',
            'transmission' => 'required|string|max:255',
            'bags' => 'required|integer|min:0',
            'doors' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
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
        $validated['features'] = array_values(array_filter($request->input('features', [])));
        $validated['images'] = array_values(array_filter($request->input('images', [])));

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
                    $path = $file->store('cars', 'public');
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

        Car::create($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Car created successfully!');
    }

    /**
     * Show the form for editing the specified car.
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified car in storage.
     */
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'passengers' => 'required|integer|min:1',
            'transmission' => 'required|string|max:255',
            'bags' => 'required|integer|min:0',
            'doors' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'images' => 'nullable|array',
            'images.*' => 'nullable|string',
            'primary_image' => 'nullable|string',
            'map_url' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        $validated['features'] = array_values(array_filter($request->input('features', [])));
        $validated['images'] = array_values(array_filter($request->input('images', [])));

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
                    $path = $file->store('cars', 'public');
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

        $car->update($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully!');
    }

    /**
     * Remove the specified car from storage.
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully!');
    }
}
