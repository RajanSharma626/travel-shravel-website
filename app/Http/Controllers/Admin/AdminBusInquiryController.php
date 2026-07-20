<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusInquiry;
use Illuminate\Http\Request;

class AdminBusInquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = BusInquiry::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('mobile', 'like', '%' . $search . '%');
            });
        }

        $inquiries = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.bus_inquiries.index', compact('inquiries'));
    }

    public function destroy($id)
    {
        $inquiry = BusInquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->route('admin.bus-inquiries.index')->with('success', 'Bus inquiry deleted successfully');
    }
}
