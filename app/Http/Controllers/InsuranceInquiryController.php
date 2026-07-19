<?php

namespace App\Http\Controllers;

use App\Models\InsuranceInquiry;
use Illuminate\Http\Request;

class InsuranceInquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:20',
            'dob' => 'required|date',
            'travel_plan' => 'required|string|max:255',
            'travel_type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'country' => 'required|string|max:255',
            'pincode' => 'required|string|max:20',
            'ped' => 'required|string|max:10',
        ]);

        InsuranceInquiry::create($validated);

        return redirect()->back()->with('success', 'Your insurance inquiry has been submitted successfully! We will contact you soon.');
    }
}
