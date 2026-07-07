<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminActivityController extends Controller
{
    /**
     * Display a listing of activities.
     */
    public function index(Request $request)
    {
        $query = Activity::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%");
            });
        }

        $activities = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new activity.
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    /**
     * Store a newly created activity in storage.
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
            'duration' => 'required|string|max:255',
            'cancellation_policy' => 'nullable|string|max:255',
            'group_size' => 'nullable|integer|min:1',
            'languages' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'highlights' => 'nullable|array',
            'inclusions' => 'nullable|array',
            'exclusions' => 'nullable|array',
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
                    $path = $file->store('activities', 'public');
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

        Activity::create($validated);

        return redirect()->route('admin.activities.index')->with('success', 'Activity created successfully!');
    }

    /**
     * Show the form for editing the specified activity.
     */
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('admin.activities.edit', compact('activity'));
    }

    /**
     * Update the specified activity in storage.
     */
    public function update(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'cancellation_policy' => 'nullable|string|max:255',
            'group_size' => 'nullable|integer|min:1',
            'languages' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'highlights' => 'nullable|array',
            'inclusions' => 'nullable|array',
            'exclusions' => 'nullable|array',
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
                    $path = $file->store('activities', 'public');
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

        $activity->update($validated);

        return redirect()->route('admin.activities.index')->with('success', 'Activity updated successfully!');
    }

    /**
     * Remove the specified activity from storage.
     */
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()->route('admin.activities.index')->with('success', 'Activity deleted successfully!');
    }
}
