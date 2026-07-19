@extends('admin.layout')

@section('title', 'Cruise Tickets Inquiries')
@section('page_title', 'Cruise Tickets Inquiries')

@section('content')
<div class="space-y-4">
    <!-- Filters & Search -->
    <div class="bg-white p-2.5 rounded-xl border border-slate-200 shadow-sm flex flex-col md:flex-row items-center justify-between gap-3">
        <!-- Search Form -->
        <form action="{{ route('admin.cruise-inquiries.index') }}" method="GET" class="w-full md:max-w-md flex flex-col sm:flex-row gap-2.5">
            <div class="relative flex-1">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search by name, email, or mobile..." 
                       class="w-full pl-9 pr-3 py-1.5 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            </div>

            <button type="submit" class="py-1.5 px-4 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-blue-700 transition">
                Search
            </button>
            @if(request('search'))
                <a href="{{ route('admin.cruise-inquiries.index') }}" class="py-1.5 px-3 bg-slate-100 text-slate-600 rounded-lg text-xs font-semibold hover:bg-slate-200 transition text-center flex items-center justify-center">
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Inquiries List -->
    @if(count($inquiries) > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($inquiries as $inquiry)
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow relative">
            <div class="p-4 border-b border-slate-100 flex justify-between items-start">
                <div>
                    <h4 class="text-sm font-bold text-slate-800">{{ $inquiry->name }}</h4>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" 
                            onclick="openDeleteModal({{ $inquiry->id }}, '{{ addslashes($inquiry->name) }}')"
                            class="w-7 h-7 bg-rose-50 hover:bg-rose-600 hover:text-white rounded flex items-center justify-center text-rose-600 transition shadow-sm border border-rose-100" 
                            title="Delete Inquiry">
                        <i class="fa-solid fa-trash-can text-[10px]"></i>
                    </button>
                </div>
            </div>
            
            <div class="p-4 space-y-3">
                <!-- Journey Info -->
                <div class="flex flex-col gap-2 bg-slate-50 p-3 rounded-lg border border-slate-100">
                    <div class="flex items-center justify-between text-xs">
                        <div class="flex-1">
                            <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block mb-0.5">From</span>
                            <span class="font-semibold text-slate-700">{{ $inquiry->origin }}</span>
                        </div>
                        <i class="fa-solid fa-arrow-right text-slate-300 text-[10px] shrink-0 mx-2"></i>
                        <div class="flex-1 text-right">
                            <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block mb-0.5">To</span>
                            <span class="font-semibold text-slate-700">{{ $inquiry->destination }}</span>
                        </div>
                    </div>
                </div>

                <!-- Date & Class -->
                <div class="grid grid-cols-2 gap-2">
                    <div class="bg-blue-50/50 p-2 rounded-lg border border-blue-100/50">
                        <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block mb-0.5">Date</span>
                        <div class="flex items-center gap-1.5 text-[11px] font-medium text-primary">
                            <i class="fa-regular fa-calendar-days"></i> {{ \Carbon\Carbon::parse($inquiry->travel_date)->format('d M, Y') }}
                        </div>
                    </div>
                    <div class="bg-slate-50 p-2 rounded-lg border border-slate-100">
                        <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block mb-0.5">Cabin Type</span>
                        <span class="text-[11px] font-semibold text-slate-600">
                            {{ $inquiry->cabin_type }}
                        </span>
                    </div>
                </div>

                <!-- Preferences Grid -->
                <div class="grid grid-cols-2 gap-2 text-[10px]">
                    <div class="bg-slate-50 p-2 rounded border border-slate-100">
                        <p class="text-slate-400 mb-0.5 uppercase tracking-wider text-[9px] font-bold">Cruise Line</p>
                        <p class="text-slate-700 font-semibold">{{ $inquiry->cruise_name }}</p>
                    </div>
                    <div class="bg-slate-50 p-2 rounded border border-slate-100">
                        <p class="text-slate-400 mb-0.5 uppercase tracking-wider text-[9px] font-bold">Passengers</p>
                        <p class="text-slate-700 font-semibold">{{ $inquiry->persons }}</p>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="pt-2 border-t border-slate-100 space-y-1">
                    <p class="text-[11px] text-slate-600 flex items-center gap-2">
                        <i class="fa-solid fa-envelope text-slate-400 w-3 text-center"></i> {{ $inquiry->email }}
                    </p>
                    <p class="text-[11px] text-slate-600 flex items-center gap-2">
                        <i class="fa-solid fa-phone text-slate-400 w-3 text-center"></i> {{ $inquiry->mobile }}
                    </p>
                </div>
            </div>

            <div class="bg-slate-50 px-4 py-2 text-[9px] font-medium text-slate-400 text-right border-t border-slate-100">
                Submitted At: {{ $inquiry->created_at->format('d M Y, h:i A') }}
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    @if($inquiries->hasPages())
    <div class="mt-4 bg-white p-3 rounded-xl border border-slate-200 shadow-sm">
        {{ $inquiries->links() }}
    </div>
    @endif

    @else
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-12 text-center text-slate-400 font-medium">
        <i class="fa-solid fa-ship text-4xl mb-3 text-slate-300 block"></i>
        No cruise inquiries found. 
    </div>
    @endif
</div>

<!-- Custom Delete Confirmation Modal -->
<div id="delete-inquiry-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeDeleteModal()"></div>

        <!-- Center modal content -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        
        <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full border border-slate-200">
            <div class="bg-white px-5 pt-5 pb-3">
                <div class="sm:flex sm:items-start gap-3">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-full bg-rose-50 text-rose-600 sm:mx-0 border border-rose-100">
                        <i class="fa-solid fa-triangle-exclamation text-base"></i>
                    </div>
                    <div class="mt-2 text-center sm:mt-0 sm:text-left">
                        <h3 class="text-sm font-bold text-slate-800" id="modal-title">
                            Delete Inquiry
                        </h3>
                        <div class="mt-1">
                            <p class="text-xs text-slate-500">
                                Are you sure you want to permanently delete the inquiry from <span id="delete-inquiry-name" class="font-semibold text-slate-700"></span>? This action cannot be undone.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-slate-50 px-5 py-3 flex flex-row-reverse gap-2 border-t border-slate-100">
                <button type="button" onclick="submitDeleteForm()" class="py-1.5 px-4 bg-rose-600 text-white rounded-lg text-xs font-semibold hover:bg-rose-700 transition">
                    Yes, Delete Inquiry
                </button>
                <button type="button" onclick="closeDeleteModal()" class="py-1.5 px-3 bg-white border border-slate-200 text-slate-600 rounded-lg text-xs font-semibold hover:bg-slate-50 transition">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden Delete Form -->
<form id="global-delete-inquiry-form" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

@push('scripts')
<script>
    let activeDeleteInquiryId = null;
    const adminPath = "{{ env('ADMIN_PATH', 'portal-tsh-78a9c2') }}";

    function openDeleteModal(id, name) {
        activeDeleteInquiryId = id;
        document.getElementById('delete-inquiry-name').textContent = name;
        
        const modal = document.getElementById('delete-inquiry-modal');
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeDeleteModal() {
        activeDeleteInquiryId = null;
        const modal = document.getElementById('delete-inquiry-modal');
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function submitDeleteForm() {
        if (!activeDeleteInquiryId) return;
        const form = document.getElementById('global-delete-inquiry-form');
        form.action = `/${adminPath}/cruise-inquiries/${activeDeleteInquiryId}`;
        form.submit();
    }
</script>
@endpush
@endsection
