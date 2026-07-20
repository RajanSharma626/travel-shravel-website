<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceInquiry;
use Illuminate\Http\Request;

class AdminInsuranceInquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = InsuranceInquiry::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                  ->orWhere('last_name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('mobile', 'like', '%' . $search . '%');
            });
        }

        $inquiries = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.insurance_inquiries.index', compact('inquiries'));
    }

    public function destroy($id)
    {
        $inquiry = InsuranceInquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->route('admin.insurance-inquiries.index')->with('success', 'Insurance inquiry deleted successfully');
    }
}
