<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Partner;

class AdminPartnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $partners = Partner::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = $request->file('image_file')->store('partners', 'public');
        $imageUrl = asset('storage/' . $imagePath);

        Partner::create([
            'name' => $request->name,
            'image_url' => $imageUrl,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Partner added successfully.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $imageUrl = $partner->image_url;
        if ($request->hasFile('image_file')) {
            $imagePath = $request->file('image_file')->store('partners', 'public');
            $imageUrl = asset('storage/' . $imagePath);
        }

        $partner->update([
            'name' => $request->name,
            'image_url' => $imageUrl,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully.');
    }
}
