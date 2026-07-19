@extends('admin.layout')

@section('title', 'Edit FAQ')
@section('page_title', 'Edit FAQ')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('admin.faqs.index') }}" class="inline-flex items-center gap-1 text-xs text-slate-500 hover:text-primary transition font-semibold">
            <i class="fa-solid fa-arrow-left"></i> Back to FAQ List
        </a>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="bg-slate-50 border-b border-slate-100 p-4">
            <h3 class="text-sm font-bold text-slate-800">FAQ Details Form</h3>
            <p class="text-[11px] text-slate-400 font-medium">Update the frequently asked question and its answer.</p>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST" class="p-5 space-y-5">
            @csrf
            @method('PUT')

            <!-- Question -->
            <div>
                <label for="question" class="block text-xs font-semibold text-slate-600 mb-1">Question <span class="text-rose-500">*</span></label>
                <input type="text" name="question" id="question" value="{{ old('question', $faq->question) }}" required 
                       class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
                       placeholder="e.g. What is the cancellation policy?">
                @error('question') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Answer -->
            <div>
                <label for="answer" class="block text-xs font-semibold text-slate-600 mb-1">Answer <span class="text-rose-500">*</span></label>
                <textarea name="answer" id="answer" rows="5" required 
                          class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
                          placeholder="Provide a detailed answer here...">{{ old('answer', $faq->answer) }}</textarea>
                @error('answer') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Toggle: Active -->
            <div class="flex items-center pt-2">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $faq->is_active) ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
                    <span class="ml-2 text-xs font-semibold text-slate-600">Active (Visible on frontend)</span>
                </label>
            </div>

            <!-- Form Actions -->
            <div class="border-t border-slate-100 pt-5 flex items-center justify-end gap-3">
                <a href="{{ route('admin.faqs.index') }}" class="py-2 px-4 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-lg text-xs font-semibold transition">
                    Cancel
                </a>
                <button type="submit" class="py-2 px-6 bg-primary text-white hover:bg-blue-700 rounded-lg text-xs font-semibold shadow-md transition">
                    Update FAQ
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
