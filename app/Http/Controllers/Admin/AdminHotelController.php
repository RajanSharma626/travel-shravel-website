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

        $hotels = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

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
            'hotel_rules' => 'nullable|array',
            'hotel_rules.*.title' => 'nullable|string|max:255',
            'hotel_rules.*.description' => 'nullable|string',
            'existing_images' => 'nullable|array',
            'primary_image' => 'nullable|string',
            'map_url' => 'nullable|string',
        ]);

        // Default properties
        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['is_featured'] = $request->has('is_featured') ? true : false;
        
        // Clean amenities
        $validated['amenities'] = array_values(array_filter($request->input('amenities', [])));

        // Process structured hotel rules
        $rawRules = $request->input('hotel_rules', []);
        $processedRules = [];
        if (is_array($rawRules)) {
            foreach ($rawRules as $rule) {
                if (is_array($rule)) {
                    $rTitle = trim($rule['title'] ?? '');
                    $rDesc = trim($rule['description'] ?? '');
                    if ($rTitle !== '' || $rDesc !== '') {
                        $processedRules[] = [
                            'title' => $rTitle,
                            'description' => $rDesc,
                        ];
                    }
                }
            }
        }
        $validated['hotel_rules'] = !empty($processedRules) ? $processedRules : null;

        // Process structured room types with images and pricing
        $rawRoomTypes = $request->input('room_types', []);
        $processedRooms = [];
        $roomFiles = $request->file('room_type_images', []);

        foreach ($rawRoomTypes as $idx => $roomData) {
            if (is_string($roomData)) {
                if (trim($roomData) !== '') {
                    $processedRooms[] = [
                        'name' => trim($roomData),
                        'price' => (float)($validated['price'] ?? 0),
                        'capacity' => '2 Adults',
                        'description' => 'Comfortable and spacious room with modern amenities.',
                        'image' => null,
                    ];
                }
                continue;
            }

            if (empty($roomData['name']) && empty($roomData['price'])) {
                continue;
            }

            $room = [
                'name' => $roomData['name'] ?? 'Deluxe Room',
                'price' => !empty($roomData['price']) ? (float)$roomData['price'] : (float)($validated['price'] ?? 0),
                'capacity' => !empty($roomData['capacity']) ? $roomData['capacity'] : '2 Adults',
                'description' => $roomData['description'] ?? 'Comfortable and spacious room with modern amenities.',
                'image' => $roomData['existing_image'] ?? null,
            ];

            if (isset($roomFiles[$idx]) && $roomFiles[$idx]->isValid()) {
                $path = $roomFiles[$idx]->store('hotels/rooms', 'public');
                $room['image'] = asset('storage/' . $path);
            }

            $processedRooms[] = $room;
        }
        $validated['room_types'] = $processedRooms;

        // Process gallery images (direct upload & existing)
        $existingImages = $request->input('existing_images', []);
        $galleryImages = is_array($existingImages) ? array_values(array_filter($existingImages)) : [];

        $primaryInputValue = $request->input('primary_image');

        if ($request->hasFile('image_files')) {
            foreach ($request->file('image_files') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('hotels', 'public');
                    $fullUrl = asset('storage/' . $path);
                    $galleryImages[] = $fullUrl;

                    if ($primaryInputValue === $file->getClientOriginalName()) {
                        $validated['primary_image'] = $fullUrl;
                    }
                }
            }
        }
        $validated['images'] = $galleryImages;

        // Resolve primary image
        if (!empty($primaryInputValue) && in_array($primaryInputValue, $galleryImages)) {
            $validated['primary_image'] = $primaryInputValue;
        } elseif (empty($validated['primary_image']) && !empty($galleryImages)) {
            $validated['primary_image'] = $galleryImages[0];
        } else {
            $validated['primary_image'] = null;
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
            'hotel_rules' => 'nullable|array',
            'hotel_rules.*.title' => 'nullable|string|max:255',
            'hotel_rules.*.description' => 'nullable|string',
            'existing_images' => 'nullable|array',
            'primary_image' => 'nullable|string',
            'map_url' => 'nullable|string',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['is_featured'] = $request->has('is_featured') ? true : false;
        
        // Clean amenities
        $validated['amenities'] = array_values(array_filter($request->input('amenities', [])));

        // Process structured hotel rules
        $rawRules = $request->input('hotel_rules', []);
        $processedRules = [];
        if (is_array($rawRules)) {
            foreach ($rawRules as $rule) {
                if (is_array($rule)) {
                    $rTitle = trim($rule['title'] ?? '');
                    $rDesc = trim($rule['description'] ?? '');
                    if ($rTitle !== '' || $rDesc !== '') {
                        $processedRules[] = [
                            'title' => $rTitle,
                            'description' => $rDesc,
                        ];
                    }
                }
            }
        }
        $validated['hotel_rules'] = !empty($processedRules) ? $processedRules : null;

        // Process structured room types with images and pricing
        $rawRoomTypes = $request->input('room_types', []);
        $processedRooms = [];
        $roomFiles = $request->file('room_type_images', []);

        foreach ($rawRoomTypes as $idx => $roomData) {
            if (is_string($roomData)) {
                if (trim($roomData) !== '') {
                    $processedRooms[] = [
                        'name' => trim($roomData),
                        'price' => (float)($validated['price'] ?? 0),
                        'capacity' => '2 Adults',
                        'description' => 'Comfortable and spacious room with modern amenities.',
                        'image' => null,
                    ];
                }
                continue;
            }

            if (empty($roomData['name']) && empty($roomData['price'])) {
                continue;
            }

            $room = [
                'name' => $roomData['name'] ?? 'Deluxe Room',
                'price' => !empty($roomData['price']) ? (float)$roomData['price'] : (float)($validated['price'] ?? 0),
                'capacity' => !empty($roomData['capacity']) ? $roomData['capacity'] : '2 Adults',
                'description' => $roomData['description'] ?? 'Comfortable and spacious room with modern amenities.',
                'image' => $roomData['existing_image'] ?? null,
            ];

            if (isset($roomFiles[$idx]) && $roomFiles[$idx]->isValid()) {
                $path = $roomFiles[$idx]->store('hotels/rooms', 'public');
                $room['image'] = asset('storage/' . $path);
            }

            $processedRooms[] = $room;
        }
        $validated['room_types'] = $processedRooms;

        // Process gallery images (direct upload & existing)
        $existingImages = $request->input('existing_images', []);
        $galleryImages = is_array($existingImages) ? array_values(array_filter($existingImages)) : [];

        $primaryInputValue = $request->input('primary_image');

        if ($request->hasFile('image_files')) {
            foreach ($request->file('image_files') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('hotels', 'public');
                    $fullUrl = asset('storage/' . $path);
                    $galleryImages[] = $fullUrl;

                    if ($primaryInputValue === $file->getClientOriginalName()) {
                        $validated['primary_image'] = $fullUrl;
                    }
                }
            }
        }
        $validated['images'] = $galleryImages;

        // Resolve primary image
        if (!empty($primaryInputValue) && in_array($primaryInputValue, $galleryImages)) {
            $validated['primary_image'] = $primaryInputValue;
        } elseif (empty($validated['primary_image']) && !empty($galleryImages)) {
            $validated['primary_image'] = $galleryImages[0];
        } else {
            $validated['primary_image'] = null;
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
