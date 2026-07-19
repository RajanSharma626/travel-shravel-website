<?php

namespace App\Http\Controllers;

use App\Models\CruiseInquiry;
use Illuminate\Http\Request;

class CruiseInquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cruise_name' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'travel_date' => 'required|date',
            'cabin_type' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'persons' => 'required|integer|min:1',
        ]);

        CruiseInquiry::create($validated);

        return redirect()->back()->with('success', 'Your cruise inquiry has been submitted successfully! We will contact you soon.');
    }
}
