<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CruiseInquiry;
use Illuminate\Http\Request;

class AdminCruiseInquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = CruiseInquiry::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('mobile', 'like', '%' . $search . '%');
            });
        }

        $inquiries = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.cruise_inquiries.index', compact('inquiries'));
    }

    public function destroy($id)
    {
        $inquiry = CruiseInquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->route('admin.cruise-inquiries.index')->with('success', 'Cruise inquiry deleted successfully');
    }
}
