<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TrainInquiry;

class TrainInquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'travel_date' => 'required|date',
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'persons' => 'required|integer|min:1|max:10',
            'quota' => 'required|string|max:100',
            'travel_class' => 'required|string|max:100',
        ]);

        TrainInquiry::create($validated);

        return redirect()->back()->with('success', 'Your train tickets inquiry has been submitted successfully! Our team will get back to you soon.');
    }
}
