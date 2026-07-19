<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TrainInquiry;

class AdminTrainInquiryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $inquiries = TrainInquiry::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('mobile', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);
            
        return view('admin.train_inquiries.index', compact('inquiries'));
    }

    public function destroy(TrainInquiry $trainInquiry)
    {
        $trainInquiry->delete();
        return redirect()->route('admin.train-inquiries.index')->with('success', 'Inquiry deleted successfully.');
    }
}
