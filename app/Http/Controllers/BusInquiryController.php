<?php

namespace App\Http\Controllers;

use App\Models\BusInquiry;
use Illuminate\Http\Request;

class BusInquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'travel_date' => 'required|date',
            'seat_type' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'persons' => 'required|integer|min:1',
        ]);

        BusInquiry::create($validated);

        return redirect()->back()->with('success', 'Your bus inquiry has been submitted successfully! We will contact you soon.');
    }
}
