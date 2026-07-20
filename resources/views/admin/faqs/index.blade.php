@extends('admin.layout')

@section('title', 'FAQs')
@section('page_title', 'FAQs')

@section('content')
<div class="space-y-4">
    <!-- Filters, Search & Add Button -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-3">
        <!-- Search Form -->
        <form action="{{ route('admin.faqs.index') }}" method="GET" class="w-full md:max-w-md flex flex-col sm:flex-row gap-2.5">
            <div class="relative flex-1">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search by question or answer..." 
                       class="w-full pl-9 pr-3 py-1.5 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            </div>

            <button type="submit" class="py-1.5 px-4 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-blue-700 transition">
                Search
            </button>
            @if(request('search'))
                <a href="{{ route('admin.faqs.index') }}" class="py-1.5 px-3 bg-slate-100 text-slate-600 rounded-lg text-xs font-semibold hover:bg-slate-200 transition text-center flex items-center justify-center">
                    Clear
                </a>
            @endif
        </form>

        <!-- Add New FAQ Button -->
        <div class="w-full md:w-auto flex justify-end">
            <a href="{{ route('admin.faqs.create') }}" class="py-1.5 px-4 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-blue-700 transition flex items-center gap-1.5">
                <i class="fa-solid fa-plus text-xs"></i> Add New FAQ
            </a>
        </div>
    </div>

    <!-- FAQs List -->
    @if(count($faqs) > 0)
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="py-3 px-4 text-[10px] font-bold text-slate-500 uppercase tracking-wider w-12">ID</th>
                        <th class="py-3 px-4 text-[10px] font-bold text-slate-500 uppercase tracking-wider">Question & Answer</th>
                        <th class="py-3 px-4 text-[10px] font-bold text-slate-500 uppercase tracking-wider w-24 text-center">Status</th>
                        <th class="py-3 px-4 text-[10px] font-bold text-slate-500 uppercase tracking-wider w-28 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($faqs as $faq)
                    <tr class="hover:bg-slate-50 transition duration-150 group">
                        <td class="py-3 px-4 text-xs text-slate-500 font-semibold">{{ $faq->id }}</td>
                        <td class="py-3 px-4">
                            <h4 class="text-xs font-bold text-slate-800 mb-1 group-hover:text-primary transition">{{ $faq->question }}</h4>
                            <p class="text-[11px] text-slate-500 line-clamp-2">{{ $faq->answer }}</p>
                        </td>
                        <td class="py-3 px-4 text-center">
                            @if($faq->is_active)
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[9px] font-bold uppercase tracking-wider bg-emerald-100 text-emerald-700">
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[9px] font-bold uppercase tracking-wider bg-slate-100 text-slate-600">
                                    Inactive
                                </span>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.faqs.edit', $faq->id) }}" 
                                   class="w-7 h-7 bg-blue-50 hover:bg-primary hover:text-white rounded flex items-center justify-center text-primary transition shadow-sm border border-blue-100" 
                                   title="Edit FAQ">
                                    <i class="fa-solid fa-pen text-[10px]"></i>
                                </a>
                                <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this FAQ?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="w-7 h-7 bg-rose-50 hover:bg-rose-600 hover:text-white rounded flex items-center justify-center text-rose-600 transition shadow-sm border border-rose-100" 
                                            title="Delete FAQ">
                                        <i class="fa-solid fa-trash-can text-[10px]"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($faqs->hasPages())
    <div class="mt-4 bg-white p-3 rounded-xl border border-slate-200 shadow-sm">
        {{ $faqs->links() }}
    </div>
    @endif

    @else
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-12 text-center text-slate-400 font-medium">
        <i class="fa-solid fa-circle-question text-4xl mb-3 text-slate-300 block"></i>
        No FAQs found. Add some questions to get started!
    </div>
    @endif
</div>
@endsection
