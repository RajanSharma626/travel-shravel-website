@extends('admin.layout')

@section('title', 'Add New Tour Package')
@section('page_title', 'Add New Tour Package')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('admin.tours.index') }}" class="inline-flex items-center gap-1 text-xs text-slate-500 hover:text-primary transition font-semibold">
            <i class="fa-solid fa-arrow-left"></i> Back to Tour List
        </a>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="bg-slate-50 border-b border-slate-100 p-4">
            <h3 class="text-sm font-bold text-slate-800">Tour Package Details Form</h3>
            <p class="text-[11px] text-slate-400 font-medium">Create a new premium tour package, set itinerary, pricing, duration details, highlights, and images.</p>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.tours.store') }}" method="POST" enctype="multipart/form-data" class="p-5 space-y-6">
            @csrf

            <!-- Section 1: General Info -->
            <div class="space-y-4">
                <h4 class="text-xs font-bold text-primary uppercase tracking-wider border-b border-slate-100 pb-2">1. General Information</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Title -->
                    <div class="md:col-span-2">
                        <label for="title" class="block text-xs font-semibold text-slate-600 mb-1">Tour Package Title <span class="text-rose-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
                               placeholder="e.g. Jannat-e-Kashmir (4N Srinagar) - TSP-161">
                        @error('title') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-xs font-semibold text-slate-600 mb-1">Starting Price (INR) <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-xs text-slate-400 font-bold">₹</span>
                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', '0.00') }}" required 
                                   class="w-full pl-7 pr-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        </div>
                        @error('price') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Tour Type -->
                    <div>
                        <label for="tour_type" class="block text-xs font-semibold text-slate-600 mb-1">Tour Type / Category</label>
                        <input type="text" name="tour_type" id="tour_type" value="{{ old('tour_type') }}" 
                               placeholder="e.g. Honeymoon, Adventure, Border Tourism"
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('tour_type') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Duration Days -->
                    <div>
                        <label for="duration_days" class="block text-xs font-semibold text-slate-600 mb-1">Duration Days <span class="text-rose-500">*</span></label>
                        <input type="number" name="duration_days" id="duration_days" value="{{ old('duration_days', '1') }}" required min="1"
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('duration_days') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Duration Nights -->
                    <div>
                        <label for="duration_nights" class="block text-xs font-semibold text-slate-600 mb-1">Duration Nights <span class="text-rose-500">*</span></label>
                        <input type="number" name="duration_nights" id="duration_nights" value="{{ old('duration_nights', '0') }}" required min="0"
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('duration_nights') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Group Size -->
                    <div>
                        <label for="group_size" class="block text-xs font-semibold text-slate-600 mb-1">Max Group Size (Guests)</label>
                        <input type="number" name="group_size" id="group_size" value="{{ old('group_size') }}" min="1" placeholder="e.g. 10"
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('group_size') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Languages -->
                    <div>
                        <label for="languages" class="block text-xs font-semibold text-slate-600 mb-1">Supported Languages</label>
                        <input type="text" name="languages" id="languages" value="{{ old('languages', 'English, Hindi') }}" placeholder="e.g. English, Hindi"
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('languages') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Toggles: Active & Featured -->
                <div class="flex items-center gap-6 pt-2">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" checked class="sr-only peer">
                        <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
                        <span class="ml-2 text-xs font-semibold text-slate-600">Active</span>
                    </label>

                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" class="sr-only peer">
                        <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-amber-500"></div>
                        <span class="ml-2 text-xs font-semibold text-slate-600">Featured</span>
                    </label>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-xs font-semibold text-slate-600 mb-1">Package Description</label>
                    <textarea name="description" id="description" rows="4" placeholder="Describe the tour highlights, details, etc."
                              class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">{{ old('description') }}</textarea>
                    @error('description') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Section 2: Location Details -->
            <div class="space-y-4 pt-2">
                <h4 class="text-xs font-bold text-primary uppercase tracking-wider border-b border-slate-100 pb-2">2. Location details</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Location -->
                    <div>
                        <label for="location" class="block text-xs font-semibold text-slate-600 mb-1">Location Area / Label <span class="text-rose-500">*</span></label>
                        <input type="text" name="location" id="location" value="{{ old('location') }}" required placeholder="e.g. Jammu and Kashmir, India" 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('location') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- City -->
                    <div>
                        <label for="city" class="block text-xs font-semibold text-slate-600 mb-1">City</label>
                        <input type="text" name="city" id="city" value="{{ old('city') }}" placeholder="e.g. Srinagar" 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('city') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- State -->
                    <div>
                        <label for="state" class="block text-xs font-semibold text-slate-600 mb-1">State / Province</label>
                        <input type="text" name="state" id="state" value="{{ old('state') }}" placeholder="e.g. Jammu & Kashmir" 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('state') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Country -->
                    <div>
                        <label for="country" class="block text-xs font-semibold text-slate-600 mb-1">Country <span class="text-rose-500">*</span></label>
                        <input type="text" name="country" id="country" value="{{ old('country', 'India') }}" required 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('country') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Map URL -->
                    <div class="md:col-span-2">
                        <label for="map_url" class="block text-xs font-semibold text-slate-600 mb-1">Google Maps Embed URL</label>
                        <textarea name="map_url" id="map_url" rows="2" placeholder="https://www.google.com/maps/embed?..."
                                  class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">{{ old('map_url') }}</textarea>
                        @error('map_url') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Section 3: Package Features (Highlights, Inclusions, Exclusions) -->
            <div class="space-y-4 pt-2">
                <h4 class="text-xs font-bold text-primary uppercase tracking-wider border-b border-slate-100 pb-2">3. Highlights, Inclusions & Exclusions</h4>
                
                <div class="grid grid-cols-1 gap-6">
                    <!-- Highlights -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-xs font-bold text-slate-700">Tour Highlights</label>
                            <button type="button" onclick="addHighlight()" class="px-2 py-1 bg-primary/10 hover:bg-primary/20 text-primary text-[10px] font-bold rounded flex items-center gap-1 transition">
                                <i class="fa-solid fa-plus"></i> Add Highlight
                            </button>
                        </div>
                        <div id="highlights-container" class="space-y-2">
                            <div class="flex items-center gap-2">
                                <input type="text" name="highlights[]" placeholder="e.g. Shikara ride on Dal lake" 
                                       class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                            </div>
                        </div>
                    </div>

                    <!-- Inclusions -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-xs font-bold text-slate-700">Inclusions</label>
                            <button type="button" onclick="addInclusion()" class="px-2 py-1 bg-emerald-50 hover:bg-emerald-100 text-emerald-600 text-[10px] font-bold rounded flex items-center gap-1 border border-emerald-100 transition">
                                <i class="fa-solid fa-plus"></i> Add Inclusion
                            </button>
                        </div>
                        <div id="inclusions-container" class="space-y-2">
                            <div class="flex items-center gap-2">
                                <input type="text" name="inclusions[]" placeholder="e.g. Daily breakfast & dinner included" 
                                       class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                            </div>
                        </div>
                    </div>

                    <!-- Exclusions -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-xs font-bold text-slate-700">Exclusions</label>
                            <button type="button" onclick="addExclusion()" class="px-2 py-1 bg-rose-50 hover:bg-rose-100 text-rose-600 text-[10px] font-bold rounded flex items-center gap-1 border border-rose-100 transition">
                                <i class="fa-solid fa-plus"></i> Add Exclusion
                            </button>
                        </div>
                        <div id="exclusions-container" class="space-y-2">
                            <div class="flex items-center gap-2">
                                <input type="text" name="exclusions[]" placeholder="e.g. Airfare or train tickets" 
                                       class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 4: Day-by-Day Itinerary -->
            <div class="space-y-4 pt-2">
                <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                    <h4 class="text-xs font-bold text-primary uppercase tracking-wider">4. Day-by-Day Itinerary</h4>
                    <button type="button" onclick="addItineraryDay()" class="px-2.5 py-1 bg-primary text-white hover:bg-blue-700 text-[10px] font-bold rounded flex items-center gap-1 transition shadow-sm">
                        <i class="fa-solid fa-plus"></i> Add Day Detail
                    </button>
                </div>

                <div id="itinerary-container" class="space-y-4">
                    <!-- Day Card 1 -->
                    <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 space-y-3 relative" id="itinerary-day-0">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-700 uppercase tracking-wider flex items-center gap-1.5">
                                <i class="fa-solid fa-calendar-day text-slate-400"></i> Day <span class="day-index">1</span>
                            </span>
                            <button type="button" onclick="removeItineraryDay('itinerary-day-0')" class="text-rose-500 hover:text-rose-700 text-xs font-semibold flex items-center gap-1">
                                <i class="fa-solid fa-trash-can"></i> Remove
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-1 gap-3">
                            <div>
                                <label class="block text-[10px] font-semibold text-slate-500 mb-1">Day Title *</label>
                                <input type="text" name="itinerary[0][title]" required placeholder="e.g. Day 1: Arrival & Hotel Transfer" 
                                       class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-slate-500 mb-1">Day Activities & Description *</label>
                                <textarea name="itinerary[0][content]" required rows="3" placeholder="Describe the itinerary details for this day..."
                                          class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 5: Image Gallery -->
            <div class="space-y-4 pt-2">
                <h4 class="text-xs font-bold text-primary uppercase tracking-wider border-b border-slate-100 pb-2">5. Photo Gallery</h4>
                
                <div class="space-y-4">
                    <!-- Upload local files -->
                    <div class="border-2 border-dashed border-slate-200 hover:border-primary/50 transition rounded-xl p-6 bg-slate-50/50 text-center relative cursor-pointer">
                        <input type="file" name="image_files[]" id="image-files-input" multiple accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="handleFileSelect(this)">
                        <div class="space-y-1">
                            <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400"></i>
                            <p class="text-xs font-bold text-slate-700">Drag & Drop or Click to Upload Local Files</p>
                            <p class="text-[10px] text-slate-400">Supported formats: JPEG, PNG, JPG, WEBP. You can select multiple images.</p>
                        </div>
                    </div>

                    <!-- Or add Image URLs -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-xs font-semibold text-slate-600">Or Add Direct Image URLs</label>
                            <button type="button" onclick="addImageUrl()" class="px-2 py-1 bg-slate-100 hover:bg-slate-200 text-slate-600 text-[10px] font-bold rounded flex items-center gap-1 transition">
                                <i class="fa-solid fa-link"></i> Add Image URL
                            </button>
                        </div>
                        <div id="image-urls-container" class="space-y-2">
                            <!-- Input rows will render here -->
                        </div>
                    </div>

                    <!-- Selected Primary Image Identifier -->
                    <input type="hidden" name="primary_image" id="primary-image-input">

                    <!-- Gallery Preview Grid -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2">Gallery & Primary Cover Preview</label>
                        <p class="text-[10px] text-slate-400 mb-3"><i class="fa-solid fa-circle-info text-amber-500"></i> Click the gold star (<i class="fa-solid fa-star text-amber-400"></i>) on any preview to set it as the primary cover image.</p>
                        
                        <div id="gallery-preview-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                            <!-- Preview cards appear here -->
                            <div class="col-span-full py-8 text-center text-slate-400 border border-dashed border-slate-200 rounded-lg bg-slate-50/20" id="empty-gallery-msg">
                                <i class="fa-regular fa-image text-3xl mb-1.5 text-slate-300 block"></i>
                                No photos added yet. Upload files or enter URLs.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="border-t border-slate-100 pt-5 flex items-center justify-end gap-3">
                <a href="{{ route('admin.tours.index') }}" class="py-2 px-4 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-lg text-xs font-semibold transition">
                    Cancel
                </a>
                <button type="submit" class="py-2 px-6 bg-primary text-white hover:bg-blue-700 rounded-lg text-xs font-semibold shadow-md transition">
                    Create Tour Package
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let highlightCounter = 1;
    let inclusionCounter = 1;
    let exclusionCounter = 1;
    let itineraryDayCounter = 1;
    let urlImageCounter = 0;
    
    // Dynamic lists add/remove
    function addHighlight() {
        const container = document.getElementById('highlights-container');
        const id = `highlight-row-${highlightCounter++}`;
        const html = `
            <div class="flex items-center gap-2" id="${id}">
                <input type="text" name="highlights[]" placeholder="Enter Highlight" 
                       class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                <button type="button" onclick="removeElement('${id}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm">
                    <i class="fa-solid fa-trash-can text-[10px]"></i>
                </button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }

    function addInclusion() {
        const container = document.getElementById('inclusions-container');
        const id = `inclusion-row-${inclusionCounter++}`;
        const html = `
            <div class="flex items-center gap-2" id="${id}">
                <input type="text" name="inclusions[]" placeholder="Enter Inclusion" 
                       class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                <button type="button" onclick="removeElement('${id}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm">
                    <i class="fa-solid fa-trash-can text-[10px]"></i>
                </button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }

    function addExclusion() {
        const container = document.getElementById('exclusions-container');
        const id = `exclusion-row-${exclusionCounter++}`;
        const html = `
            <div class="flex items-center gap-2" id="${id}">
                <input type="text" name="exclusions[]" placeholder="Enter Exclusion" 
                       class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                <button type="button" onclick="removeElement('${id}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm">
                    <i class="fa-solid fa-trash-can text-[10px]"></i>
                </button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }

    function removeElement(id) {
        const el = document.getElementById(id);
        if (el) el.remove();
    }

    // Dynamic itinerary adding/removing
    function addItineraryDay() {
        const container = document.getElementById('itinerary-container');
        const idIndex = itineraryDayCounter++;
        const rowId = `itinerary-day-${idIndex}`;
        
        const html = `
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 space-y-3 relative" id="${rowId}">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-700 uppercase tracking-wider flex items-center gap-1.5">
                        <i class="fa-solid fa-calendar-day text-slate-400"></i> Day <span class="day-index">1</span>
                    </span>
                    <button type="button" onclick="removeItineraryDay('${rowId}')" class="text-rose-500 hover:text-rose-700 text-xs font-semibold flex items-center gap-1">
                        <i class="fa-solid fa-trash-can"></i> Remove
                    </button>
                </div>
                
                <div class="grid grid-cols-1 gap-3">
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Day Title *</label>
                        <input type="text" name="itinerary[${idIndex}][title]" required placeholder="e.g. Day ${idIndex + 1}: Sightseeing" 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                    </div>
                    <div>
                        <label class="block text-[10px] font-semibold text-slate-500 mb-1">Day Activities & Description *</label>
                        <textarea name="itinerary[${idIndex}][content]" required rows="3" placeholder="Describe the itinerary details for this day..."
                                  class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white"></textarea>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        reindexDays();
    }

    function removeItineraryDay(id) {
        removeElement(id);
        reindexDays();
    }

    function reindexDays() {
        const days = document.querySelectorAll('#itinerary-container > div');
        days.forEach((day, index) => {
            day.querySelector('.day-index').innerText = index + 1;
        });
    }

    // Dynamic Image URLs & uploads
    function addImageUrl() {
        const container = document.getElementById('image-urls-container');
        const id = urlImageCounter++;
        const rowId = `image-url-row-${id}`;
        
        const html = `
            <div class="flex items-center gap-2" id="${rowId}">
                <input type="url" name="images[]" oninput="updateUrlPreview(this, ${id})" placeholder="https://example.com/tour-image.jpg" 
                       class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                <button type="button" onclick="removeImageUrl(${id}, '${rowId}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm">
                    <i class="fa-solid fa-trash-can text-[10px]"></i>
                </button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }

    function removeImageUrl(id, rowId) {
        removeElement(rowId);
        const preview = document.getElementById(`preview-url-${id}`);
        if (preview) preview.remove();
        checkEmptyGallery();
    }

    function updateUrlPreview(input, id) {
        const url = input.value.trim();
        const grid = document.getElementById('gallery-preview-grid');
        const emptyMsg = document.getElementById('empty-gallery-msg');
        let previewCard = document.getElementById(`preview-url-${id}`);

        if (!url) {
            if (previewCard) previewCard.remove();
            checkEmptyGallery();
            return;
        }

        if (emptyMsg) emptyMsg.style.display = 'none';

        const primaryValue = document.getElementById('primary-image-input').value;
        const isPrimary = (url === primaryValue);
        const starClass = isPrimary ? 'text-amber-400' : 'text-slate-400 hover:text-amber-400';

        if (!previewCard) {
            const html = `
                <div class="relative group rounded-lg overflow-hidden border border-slate-200 aspect-video bg-white shadow-sm" id="preview-url-${id}">
                    <img src="${url}" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/600x400?text=Invalid+Image+URL'">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-2 z-10">
                        <button type="button" onclick="setAsPrimary('${url}')" class="w-7 h-7 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-sm select-star-btn" title="Set as Cover Image">
                            <i class="fa-solid fa-star ${starClass}"></i>
                        </button>
                    </div>
                </div>
            `;
            grid.insertAdjacentHTML('beforeend', html);
        } else {
            previewCard.querySelector('img').src = url;
            previewCard.querySelector('button').setAttribute('onclick', `setAsPrimary('${url}')`);
        }

        // Auto select first image as cover if none set
        if (!document.getElementById('primary-image-input').value) {
            setAsPrimary(url);
        }
    }

    // Local Files Previews
    function handleFileSelect(input) {
        const files = input.files;
        const grid = document.getElementById('gallery-preview-grid');
        const emptyMsg = document.getElementById('empty-gallery-msg');
        
        // Remove existing local previews
        const existingLocalPreviews = document.querySelectorAll('.preview-local-file');
        existingLocalPreviews.forEach(el => el.remove());

        if (files.length === 0) {
            checkEmptyGallery();
            return;
        }

        if (emptyMsg) emptyMsg.style.display = 'none';

        const primaryValue = document.getElementById('primary-image-input').value;

        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const isPrimary = (file.name === primaryValue);
                const starClass = isPrimary ? 'text-amber-400' : 'text-slate-400 hover:text-amber-400';

                const html = `
                    <div class="relative group rounded-lg overflow-hidden border border-slate-200 aspect-video bg-white shadow-sm preview-local-file" id="preview-local-${index}">
                        <img src="${e.target.result}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-2 z-10">
                            <button type="button" onclick="setAsPrimary('${file.name}')" class="w-7 h-7 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-sm select-star-btn" title="Set as Cover Image">
                                <i class="fa-solid fa-star ${starClass}"></i>
                            </button>
                        </div>
                        <span class="absolute bottom-1 right-1 bg-slate-900/60 text-white text-[7px] font-bold uppercase px-1.5 py-0.5 rounded tracking-wide backdrop-blur-sm">Local File</span>
                    </div>
                `;
                grid.insertAdjacentHTML('beforeend', html);

                // Auto select first file as cover if none set
                if (!document.getElementById('primary-image-input').value) {
                    setAsPrimary(file.name);
                }
            }
            reader.readAsDataURL(file);
        });
    }

    function setAsPrimary(value) {
        document.getElementById('primary-image-input').value = value;
        
        // Update all preview stars representation
        const allStarButtons = document.querySelectorAll('.select-star-btn i');
        allStarButtons.forEach(star => {
            star.className = 'fa-solid fa-star text-slate-400 hover:text-amber-400';
        });

        // Find the matching button and highlight it
        // We'll update the layout star color dynamically
        const urlInputs = document.querySelectorAll('#image-urls-container input');
        urlInputs.forEach((input, index) => {
            if (input.value.trim() === value) {
                const preview = document.getElementById(`preview-url-${index}`);
                if (preview) {
                    preview.querySelector('.select-star-btn i').className = 'fa-solid fa-star text-amber-400';
                }
            }
        });

        const filesInput = document.getElementById('image-files-input');
        if (filesInput && filesInput.files) {
            Array.from(filesInput.files).forEach((file, index) => {
                if (file.name === value) {
                    const preview = document.getElementById(`preview-local-${index}`);
                    if (preview) {
                        preview.querySelector('.select-star-btn i').className = 'fa-solid fa-star text-amber-400';
                    }
                }
            });
        }
    }

    function checkEmptyGallery() {
        const grid = document.getElementById('gallery-preview-grid');
        const emptyMsg = document.getElementById('empty-gallery-msg');
        const count = grid.querySelectorAll('div[id^="preview-"]').length;
        
        if (count === 0) {
            if (emptyMsg) emptyMsg.style.display = 'block';
            document.getElementById('primary-image-input').value = '';
        } else {
            if (emptyMsg) emptyMsg.style.display = 'none';
        }
    }
</script>
@endpush
