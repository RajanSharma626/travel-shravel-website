@extends('admin.layout')

@section('title', 'Edit Activity')
@section('page_title', 'Edit Activity')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('admin.activities.index') }}" class="inline-flex items-center gap-1 text-xs text-slate-500 hover:text-primary transition font-semibold">
            <i class="fa-solid fa-arrow-left"></i> Back to Activity List
        </a>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="bg-slate-50 border-b border-slate-100 p-4">
            <h3 class="text-sm font-bold text-slate-800">Edit Activity Details</h3>
            <p class="text-[11px] text-slate-400 font-medium">Update the activity details, adjust prices, edit highlights, and manage photo gallery.</p>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data" class="p-5 space-y-6">
            @csrf
            @method('PUT')

            <!-- Section 1: General Info -->
            <div class="space-y-4">
                <h4 class="text-xs font-bold text-primary uppercase tracking-wider border-b border-slate-100 pb-2">1. General Information</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Title -->
                    <div class="md:col-span-2">
                        <label for="title" class="block text-xs font-semibold text-slate-600 mb-1">Activity Title <span class="text-rose-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title', $activity->title) }}" required 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
                               placeholder="e.g. Day Trip to Patnitop">
                        @error('title') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-xs font-semibold text-slate-600 mb-1">Starting Price (INR) <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-xs text-slate-400 font-bold">₹</span>
                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $activity->price) }}" required 
                                   class="w-full pl-7 pr-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        </div>
                        @error('price') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Duration -->
                    <div>
                        <label for="duration" class="block text-xs font-semibold text-slate-600 mb-1">Duration <span class="text-rose-500">*</span></label>
                        <input type="text" name="duration" id="duration" value="{{ old('duration', $activity->duration) }}" required 
                               placeholder="e.g. 3 Hours, 1 Day"
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('duration') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Cancellation Policy -->
                    <div>
                        <label for="cancellation_policy" class="block text-xs font-semibold text-slate-600 mb-1">Cancellation Policy</label>
                        <input type="text" name="cancellation_policy" id="cancellation_policy" value="{{ old('cancellation_policy', $activity->cancellation_policy) }}" 
                               placeholder="e.g. Free cancellation up to 24h, Non-refundable"
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('cancellation_policy') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Group Size -->
                    <div>
                        <label for="group_size" class="block text-xs font-semibold text-slate-600 mb-1">Max Group Size (Guests)</label>
                        <input type="number" name="group_size" id="group_size" value="{{ old('group_size', $activity->group_size) }}" min="1" placeholder="e.g. 15"
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('group_size') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Languages -->
                    <div class="md:col-span-2">
                        <label for="languages" class="block text-xs font-semibold text-slate-600 mb-1">Supported Languages</label>
                        <input type="text" name="languages" id="languages" value="{{ old('languages', $activity->languages) }}" placeholder="e.g. English, Hindi"
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('languages') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Toggles: Active & Featured -->
                <div class="flex items-center gap-6 pt-2">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ $activity->is_active ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
                        <span class="ml-2 text-xs font-semibold text-slate-600">Active</span>
                    </label>

                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ $activity->is_featured ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-amber-500"></div>
                        <span class="ml-2 text-xs font-semibold text-slate-600">Featured</span>
                    </label>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-xs font-semibold text-slate-600 mb-1">Activity Description</label>
                    <textarea name="description" id="description" rows="4" placeholder="Describe the activity, itinerary flow, details, etc."
                              class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">{{ old('description', $activity->description) }}</textarea>
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
                        <input type="text" name="location" id="location" value="{{ old('location', $activity->location) }}" required placeholder="e.g. Patnitop, Jammu and Kashmir, India" 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('location') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- City -->
                    <div>
                        <label for="city" class="block text-xs font-semibold text-slate-600 mb-1">City</label>
                        <input type="text" name="city" id="city" value="{{ old('city', $activity->city) }}" placeholder="e.g. Patnitop" 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('city') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- State -->
                    <div>
                        <label for="state" class="block text-xs font-semibold text-slate-600 mb-1">State / Province</label>
                        <input type="text" name="state" id="state" value="{{ old('state', $activity->state) }}" placeholder="e.g. Jammu & Kashmir" 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('state') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Country -->
                    <div>
                        <label for="country" class="block text-xs font-semibold text-slate-600 mb-1">Country <span class="text-rose-500">*</span></label>
                        <input type="text" name="country" id="country" value="{{ old('country', $activity->country) }}" required 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('country') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Map URL -->
                    <div class="md:col-span-2">
                        <label for="map_url" class="block text-xs font-semibold text-slate-600 mb-1">Google Maps Embed URL</label>
                        <textarea name="map_url" id="map_url" rows="2" placeholder="https://www.google.com/maps/embed?..."
                                  class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">{{ old('map_url', $activity->map_url) }}</textarea>
                        @error('map_url') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Section 3: Activity Features (Highlights, Inclusions, Exclusions) -->
            <div class="space-y-4 pt-2">
                <h4 class="text-xs font-bold text-primary uppercase tracking-wider border-b border-slate-100 pb-2">3. Highlights, Inclusions & Exclusions</h4>
                
                <div class="grid grid-cols-1 gap-6">
                    <!-- Highlights -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-xs font-bold text-slate-700">Activity Highlights</label>
                            <button type="button" onclick="addHighlight()" class="px-2 py-1 bg-primary/10 hover:bg-primary/20 text-primary text-[10px] font-bold rounded flex items-center gap-1 transition">
                                <i class="fa-solid fa-plus"></i> Add Highlight
                            </button>
                        </div>
                        <div id="highlights-container" class="space-y-2">
                            @php
                                $highlights = old('highlights', $activity->highlights ?? []);
                            @endphp
                            @forelse($highlights as $idx => $highlight)
                                <div class="flex items-center gap-2" id="highlight-row-{{ $idx }}">
                                    <input type="text" name="highlights[]" value="{{ $highlight }}" placeholder="Enter Highlight" 
                                           class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                                    <button type="button" onclick="removeElement('highlight-row-{{ $idx }}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm">
                                        <i class="fa-solid fa-trash-can text-[10px]"></i>
                                    </button>
                                </div>
                            @empty
                                <div class="flex items-center gap-2" id="highlight-row-0">
                                    <input type="text" name="highlights[]" placeholder="Enter Highlight" 
                                           class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                                </div>
                            @endforelse
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
                            @php
                                $inclusions = old('inclusions', $activity->inclusions ?? []);
                            @endphp
                            @forelse($inclusions as $idx => $inclusion)
                                <div class="flex items-center gap-2" id="inclusion-row-{{ $idx }}">
                                    <input type="text" name="inclusions[]" value="{{ $inclusion }}" placeholder="Enter Inclusion" 
                                           class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                                    <button type="button" onclick="removeElement('inclusion-row-{{ $idx }}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm">
                                        <i class="fa-solid fa-trash-can text-[10px]"></i>
                                    </button>
                                </div>
                            @empty
                                <div class="flex items-center gap-2" id="inclusion-row-0">
                                    <input type="text" name="inclusions[]" placeholder="Enter Inclusion" 
                                           class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                                </div>
                            @endforelse
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
                            @php
                                $exclusions = old('exclusions', $activity->exclusions ?? []);
                            @endphp
                            @forelse($exclusions as $idx => $exclusion)
                                <div class="flex items-center gap-2" id="exclusion-row-{{ $idx }}">
                                    <input type="text" name="exclusions[]" value="{{ $exclusion }}" placeholder="Enter Exclusion" 
                                           class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                                    <button type="button" onclick="removeElement('exclusion-row-{{ $idx }}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm">
                                        <i class="fa-solid fa-trash-can text-[10px]"></i>
                                    </button>
                                </div>
                            @empty
                                <div class="flex items-center gap-2" id="exclusion-row-0">
                                    <input type="text" name="exclusions[]" placeholder="Enter Exclusion" 
                                           class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 4: Image Gallery -->
            <div class="space-y-4 pt-2">
                <h4 class="text-xs font-bold text-primary uppercase tracking-wider border-b border-slate-100 pb-2">4. Photo Gallery</h4>
                
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
                            @php
                                $existingImages = old('images', $activity->images ?? []);
                            @endphp
                            @foreach($existingImages as $idx => $img)
                                <div class="flex items-center gap-2" id="image-url-row-{{ $idx }}">
                                    <input type="url" name="images[]" value="{{ $img }}" oninput="updateUrlPreview(this, {{ $idx }})" placeholder="https://example.com/activity-image.jpg" 
                                           class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                                    <button type="button" onclick="removeImageUrl({{ $idx }}, 'image-url-row-{{ $idx }}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm">
                                        <i class="fa-solid fa-trash-can text-[10px]"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Selected Primary Image Identifier -->
                    <input type="hidden" name="primary_image" id="primary-image-input" value="{{ old('primary_image', $activity->primary_image) }}">

                    <!-- Gallery Preview Grid -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2">Gallery & Primary Cover Preview</label>
                        <p class="text-[10px] text-slate-400 mb-3"><i class="fa-solid fa-circle-info text-amber-500"></i> Click the gold star (<i class="fa-solid fa-star text-amber-400"></i>) on any preview to set it as the primary cover image.</p>
                        
                        <div id="gallery-preview-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                            <!-- Preview cards appear here -->
                            @foreach($existingImages as $idx => $img)
                                <div class="relative group rounded-lg overflow-hidden border border-slate-200 aspect-video bg-white shadow-sm" id="preview-url-{{ $idx }}">
                                    <img src="{{ $img }}" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/600x400?text=Invalid+Image+URL'">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-2 z-10">
                                        <button type="button" onclick="setAsPrimary('{{ $img }}')" class="w-7 h-7 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-sm select-star-btn" title="Set as Cover Image">
                                            <i class="fa-solid fa-star {{ $activity->primary_image === $img ? 'text-amber-400' : 'text-slate-400 hover:text-amber-400' }}"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-span-full py-8 text-center text-slate-400 border border-dashed border-slate-200 rounded-lg bg-slate-50/20" id="empty-gallery-msg" style="{{ count($existingImages) > 0 ? 'display: none;' : '' }}">
                                <i class="fa-regular fa-image text-3xl mb-1.5 text-slate-300 block"></i>
                                No photos added yet. Upload files or enter URLs.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="border-t border-slate-100 pt-5 flex items-center justify-end gap-3">
                <a href="{{ route('admin.activities.index') }}" class="py-2 px-4 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-lg text-xs font-semibold transition">
                    Cancel
                </a>
                <button type="submit" class="py-2 px-6 bg-primary text-white hover:bg-blue-700 rounded-lg text-xs font-semibold shadow-md transition">
                    Update Activity
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let highlightCounter = {{ count($highlights) }};
    let inclusionCounter = {{ count($inclusions) }};
    let exclusionCounter = {{ count($exclusions) }};
    let urlImageCounter = {{ count($existingImages) }};
    
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

    // Dynamic Image URLs & uploads
    function addImageUrl() {
        const container = document.getElementById('image-urls-container');
        const id = urlImageCounter++;
        const rowId = `image-url-row-${id}`;
        
        const html = `
            <div class="flex items-center gap-2" id="${rowId}">
                <input type="url" name="images[]" oninput="updateUrlPreview(this, ${id})" placeholder="https://example.com/activity-image.jpg" 
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
