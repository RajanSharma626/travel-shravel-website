@extends('admin.layout')

@section('title', 'Edit Hotel - ' . $hotel->name)
@section('page_title', 'Edit Hotel')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('admin.hotels.index') }}" class="inline-flex items-center gap-1 text-xs text-slate-500 hover:text-primary transition font-semibold">
            <i class="fa-solid fa-arrow-left"></i> Back to Hotel List
        </a>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="bg-slate-50 border-b border-slate-100 p-4">
            <h3 class="text-sm font-bold text-slate-800">Edit Hotel details</h3>
            <p class="text-[11px] text-slate-400 font-medium">Update details, images, room types, and amenities for "{{ $hotel->name }}".</p>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.hotels.update', $hotel->id) }}" method="POST" enctype="multipart/form-data" class="p-5 space-y-6">
            @csrf
            @method('PUT')

            <!-- Section: General Info -->
            <div class="space-y-4">
                <h4 class="text-xs font-bold text-primary uppercase tracking-wider border-b border-slate-100 pb-2">1. General Information</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Hotel Name -->
                    <div>
                        <label for="name" class="block text-xs font-semibold text-slate-600 mb-1">Hotel Name <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $hotel->name) }}" required 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('name') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Stars -->
                    <div>
                        <label for="stars" class="block text-xs font-semibold text-slate-600 mb-1">Star Rating <span class="text-rose-500">*</span></label>
                        <select name="stars" id="stars" required 
                                class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition bg-white">
                            <option value="1" {{ old('stars', $hotel->stars) == 1 ? 'selected' : '' }}>1 Star</option>
                            <option value="2" {{ old('stars', $hotel->stars) == 2 ? 'selected' : '' }}>2 Stars</option>
                            <option value="3" {{ old('stars', $hotel->stars) == 3 ? 'selected' : '' }}>3 Stars</option>
                            <option value="4" {{ old('stars', $hotel->stars) == 4 ? 'selected' : '' }}>4 Stars</option>
                            <option value="5" {{ old('stars', $hotel->stars) == 5 ? 'selected' : '' }}>5 Stars</option>
                        </select>
                        @error('stars') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Price per Night -->
                    <div>
                        <label for="price" class="block text-xs font-semibold text-slate-600 mb-1">Base Price / Night (INR) <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-xs text-slate-400 font-bold">₹</span>
                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $hotel->price) }}" required 
                                   class="w-full pl-7 pr-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        </div>
                        @error('price') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Toggles: Active & Featured -->
                    <div class="flex items-center gap-6 pt-5">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $hotel->is_active) ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
                            <span class="ml-2 text-xs font-semibold text-slate-600">Active</span>
                        </label>

                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $hotel->is_featured) ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-amber-500"></div>
                            <span class="ml-2 text-xs font-semibold text-slate-600">Featured</span>
                        </label>
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-xs font-semibold text-slate-600 mb-1">Description</label>
                    <textarea name="description" id="description" rows="4" 
                              class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">{{ old('description', $hotel->description) }}</textarea>
                    @error('description') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Section: Location details -->
            <div class="space-y-4 pt-2">
                <h4 class="text-xs font-bold text-primary uppercase tracking-wider border-b border-slate-100 pb-2">2. Location Details</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Location Summary -->
                    <div>
                        <label for="location" class="block text-xs font-semibold text-slate-600 mb-1">Location Area Description <span class="text-rose-500">*</span></label>
                        <input type="text" name="location" id="location" value="{{ old('location', $hotel->location) }}" required placeholder="e.g. Near Dal Lake" 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('location') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-xs font-semibold text-slate-600 mb-1">Full Street Address <span class="text-rose-500">*</span></label>
                        <input type="text" name="address" id="address" value="{{ old('address', $hotel->address) }}" required 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('address') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- City -->
                    <div>
                        <label for="city" class="block text-xs font-semibold text-slate-600 mb-1">City <span class="text-rose-500">*</span></label>
                        <input type="text" name="city" id="city" value="{{ old('city', $hotel->city) }}" required 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('city') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- State -->
                    <div>
                        <label for="state" class="block text-xs font-semibold text-slate-600 mb-1">State / Province <span class="text-rose-500">*</span></label>
                        <input type="text" name="state" id="state" value="{{ old('state', $hotel->state) }}" required 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('state') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Country -->
                    <div>
                        <label for="country" class="block text-xs font-semibold text-slate-600 mb-1">Country <span class="text-rose-500">*</span></label>
                        <input type="text" name="country" id="country" value="{{ old('country', $hotel->country) }}" required 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('country') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Google Map URL -->
                    <div class="md:col-span-2">
                        <label for="map_url" class="block text-xs font-semibold text-slate-600 mb-1">Google Map URL</label>
                        <input type="url" name="map_url" id="map_url" value="{{ old('map_url', $hotel->map_url) }}" placeholder="https://maps.google.com/..." 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('map_url') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Section: Schedule & Times -->
            <div class="space-y-4 pt-2">
                <h4 class="text-xs font-bold text-primary uppercase tracking-wider border-b border-slate-100 pb-2">3. Policies & Timings</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Check-in Time -->
                    <div>
                        <label for="check_in_time" class="block text-xs font-semibold text-slate-600 mb-1">Check-in Time <span class="text-rose-500">*</span></label>
                        <input type="text" name="check_in_time" id="check_in_time" value="{{ old('check_in_time', $hotel->check_in_time) }}" required placeholder="e.g. 12:00 PM" 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('check_in_time') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Check-out Time -->
                    <div>
                        <label for="check_out_time" class="block text-xs font-semibold text-slate-600 mb-1">Check-out Time <span class="text-rose-500">*</span></label>
                        <input type="text" name="check_out_time" id="check_out_time" value="{{ old('check_out_time', $hotel->check_out_time) }}" required placeholder="e.g. 11:00 AM" 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('check_out_time') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Section: Amenities (Dynamic list) -->
            <div class="space-y-4 pt-2">
                <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                    <h4 class="text-xs font-bold text-primary uppercase tracking-wider">4. Amenities</h4>
                    <button type="button" onclick="addAmenity()" class="px-3 py-1 bg-blue-50 hover:bg-blue-100 text-primary border border-blue-200 rounded-lg text-[10px] font-bold transition flex items-center gap-1 shadow-sm">
                        <i class="fa-solid fa-plus"></i> Add Amenity
                    </button>
                </div>
                <div id="amenities-container" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @php
                        $amenities = old('amenities', $hotel->amenities ?? []);
                    @endphp
                    @foreach($amenities as $index => $amenity)
                    <div class="flex items-center gap-2" id="amenity-row-{{ $index }}">
                        <input type="text" name="amenities[]" value="{{ $amenity }}" 
                               class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                        <button type="button" onclick="removeElement('amenity-row-{{ $index }}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm" title="Remove">
                            <i class="fa-solid fa-trash-can text-[10px]"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Section: Room Types (Dynamic list) -->
            <div class="space-y-4 pt-2">
                <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                    <h4 class="text-xs font-bold text-primary uppercase tracking-wider">5. Room Types</h4>
                    <button type="button" onclick="addRoomType()" class="px-3 py-1 bg-blue-50 hover:bg-blue-100 text-primary border border-blue-200 rounded-lg text-[10px] font-bold transition flex items-center gap-1 shadow-sm">
                        <i class="fa-solid fa-plus"></i> Add Room Type
                    </button>
                </div>
                <div id="room-types-container" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @php
                        $roomTypes = old('room_types', $hotel->room_types ?? []);
                    @endphp
                    @foreach($roomTypes as $index => $room)
                    <div class="flex items-center gap-2" id="room-row-{{ $index }}">
                        <input type="text" name="room_types[]" value="{{ $room }}" 
                               class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                        <button type="button" onclick="removeElement('room-row-{{ $index }}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm" title="Remove">
                            <i class="fa-solid fa-trash-can text-[10px]"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Section: Gallery & Images -->
            <div class="space-y-4 pt-2">
                <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                    <h4 class="text-xs font-bold text-primary uppercase tracking-wider">6. Gallery & Images</h4>
                    <button type="button" onclick="addImageUrl()" class="px-3 py-1 bg-blue-50 hover:bg-blue-100 text-primary border border-blue-200 rounded-lg text-[10px] font-bold transition flex items-center gap-1 shadow-sm">
                        <i class="fa-solid fa-plus"></i> Add Image URL
                    </button>
                </div>
                
                <!-- Hidden input to track primary image selection -->
                <input type="hidden" name="primary_image" id="primary-image-input" value="{{ old('primary_image', $hotel->primary_image ?? '') }}">

                <!-- URL list -->
                <div class="space-y-2">
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Image URLs</label>
                    <div id="image-urls-container" class="space-y-2">
                        @php
                            $images = old('images', $hotel->images ?? []);
                            $externalImages = [];
                            $localImages = [];
                            foreach ($images as $img) {
                                if (str_contains($img, '/storage/')) {
                                    $localImages[] = $img;
                                } else {
                                    $externalImages[] = $img;
                                }
                            }
                        @endphp
                        
                        <!-- Hidden container for preloaded local images so they submit with the form -->
                        <div id="local-images-hidden-container" class="hidden">
                            @foreach($localImages as $index => $localImg)
                            <input type="hidden" name="images[]" id="local-img-input-{{ $index }}" value="{{ $localImg }}">
                            @endforeach
                        </div>

                        @foreach($externalImages as $index => $imageUrl)
                        <div class="flex items-center gap-2" id="image-url-{{ $index }}">
                            <input type="url" name="images[]" value="{{ $imageUrl }}" oninput="updateUrlPreview(this, {{ $index }})" placeholder="https://example.com/hotel-image.jpg" 
                                   class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                            <button type="button" onclick="removeImageUrlInput({{ $index }}, '{{ $imageUrl }}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm" title="Remove">
                                <i class="fa-solid fa-trash-can text-[10px]"></i>
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- File uploads wrapper -->
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Upload Local Image Files</label>
                    <div class="relative bg-slate-50 border-2 border-dashed border-slate-300 hover:border-primary/50 rounded-xl p-6 transition flex flex-col items-center justify-center text-center cursor-pointer group" id="dropzone" onclick="document.getElementById('local-file-selector').click()">
                        <!-- Hidden file input -->
                        <input type="file" id="local-file-selector" multiple accept="image/*" onchange="handleLocalFileSelect(this)" class="hidden">
                        <i class="fa-solid fa-cloud-arrow-up text-2xl text-slate-400 group-hover:text-primary transition mb-2 animate-bounce-slow"></i>
                        <p class="text-xs font-semibold text-slate-600">Drag & drop your images here, or <span class="text-primary hover:underline">browse</span></p>
                        <p class="text-[9px] text-slate-400 mt-1">Supports JPG, PNG, GIF, WebP. Multiple selections allowed.</p>
                    </div>
                </div>

                <!-- Hidden inputs container for local uploads -->
                <div id="hidden-file-inputs-container" class="hidden"></div>

                <!-- Preview Gallery Grid -->
                <div class="space-y-2 mt-4">
                    <label class="block text-xs font-semibold text-slate-600">Gallery Previews</label>
                    <div id="gallery-preview-grid" class="grid grid-cols-2 sm:grid-cols-4 gap-4 p-3 bg-slate-50 rounded-xl border border-slate-200 min-h-[100px] items-center justify-center text-center">
                        <!-- Preloaded local images -->
                        @foreach($localImages as $index => $localImg)
                        @php
                            $isPrimary = ($localImg === ($hotel->primary_image ?? ''));
                            $starClass = $isPrimary ? 'text-amber-400' : 'text-slate-400 hover:text-amber-400';
                        @endphp
                        <div class="relative group rounded-lg overflow-hidden border border-slate-200 aspect-video bg-white shadow-sm" id="preview-preloaded-{{ $index }}">
                            <img src="{{ $localImg }}" class="w-full h-full object-cover">
                            <button type="button" onclick="setPrimaryImage(this, '{{ $localImg }}')" class="primary-star absolute top-1.5 left-1.5 w-6 h-6 bg-black/45 rounded-full flex items-center justify-center {{ $starClass }} transition cursor-pointer z-10" title="Set as Primary">
                                <i class="fa-solid fa-star text-xs"></i>
                            </button>
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center p-2">
                                <button type="button" onclick="removePreloadedLocalImage({{ $index }}, '{{ $localImg }}')" class="w-8 h-8 bg-rose-600 hover:bg-rose-700 text-white rounded-full flex items-center justify-center transition shadow">
                                    <i class="fa-solid fa-xmark text-sm"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach

                        <p id="empty-gallery-msg" class="col-span-full text-slate-400 text-xs py-4" style="{{ count($images) > 0 ? 'display: none;' : '' }}">
                            No images added yet. Paste a URL above or upload local files to see previews.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Submit Section -->
            <div class="border-t border-slate-100 pt-5 flex items-center justify-end gap-3">
                <a href="{{ route('admin.hotels.index') }}" class="py-2 px-4 bg-slate-100 text-slate-600 hover:bg-slate-200 rounded-lg text-xs font-semibold transition">
                    Cancel
                </a>
                <button type="submit" class="py-2 px-6 bg-primary text-white hover:bg-blue-700 rounded-lg text-xs font-semibold shadow-md transition">
                    Update Hotel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let amenityCounter = {{ count($amenities) }};
    let roomCounter = {{ count($roomTypes) }};
    let imageCounter = {{ max(count($images), 1) }};
    let localFileCounter = 0;

    function addAmenity() {
        const container = document.getElementById('amenities-container');
        const rowId = `amenity-row-${amenityCounter}`;
        
        const html = `
            <div class="flex items-center gap-2" id="${rowId}">
                <input type="text" name="amenities[]" placeholder="Enter Amenity" 
                       class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                <button type="button" onclick="removeElement('${rowId}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm" title="Remove">
                    <i class="fa-solid fa-trash-can text-[10px]"></i>
                </button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        amenityCounter++;
    }

    function addRoomType() {
        const container = document.getElementById('room-types-container');
        const rowId = `room-row-${roomCounter}`;

        const html = `
            <div class="flex items-center gap-2" id="${rowId}">
                <input type="text" name="room_types[]" placeholder="Enter Room Type" 
                       class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                <button type="button" onclick="removeElement('${rowId}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm" title="Remove">
                    <i class="fa-solid fa-trash-can text-[10px]"></i>
                </button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        roomCounter++;
    }

    function addImageUrl() {
        const container = document.getElementById('image-urls-container');
        const id = imageCounter;
        const rowId = `image-url-${id}`;

        const html = `
            <div class="flex items-center gap-2" id="${rowId}">
                <input type="url" name="images[]" oninput="updateUrlPreview(this, ${id})" placeholder="https://example.com/hotel-image.jpg" 
                       class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                <button type="button" onclick="removeImageUrlInput(${id})" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm" title="Remove">
                    <i class="fa-solid fa-trash-can text-[10px]"></i>
                </button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        imageCounter++;
    }

    function removeElement(id) {
        const el = document.getElementById(id);
        if (el) {
            el.remove();
        }
    }

    // New Image Gallery functions
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
                    <button type="button" onclick="setPrimaryImage(this, '${url}')" class="primary-star absolute top-1.5 left-1.5 w-6 h-6 bg-black/45 rounded-full flex items-center justify-center ${starClass} transition cursor-pointer z-10" title="Set as Primary">
                        <i class="fa-solid fa-star text-xs"></i>
                    </button>
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center p-2">
                        <button type="button" onclick="removeImageUrlInput(${id}, '${url}')" class="w-8 h-8 bg-rose-600 hover:bg-rose-700 text-white rounded-full flex items-center justify-center transition shadow">
                            <i class="fa-solid fa-xmark text-sm"></i>
                        </button>
                    </div>
                </div>
            `;
            grid.insertAdjacentHTML('beforeend', html);
            autoSelectFirstImageAsPrimary();
        } else {
            const img = previewCard.querySelector('img');
            if (img) img.src = url;

            const starBtn = previewCard.querySelector('.primary-star');
            if (starBtn) {
                starBtn.setAttribute('onclick', `setPrimaryImage(this, '${url}')`);
            }
        }
    }

    function removeImageUrlInput(id, url) {
        const row = document.getElementById(`image-url-${id}`);
        if (row) row.remove();
        
        const previewCard = document.getElementById(`preview-url-${id}`);
        if (previewCard) previewCard.remove();

        const primaryInput = document.getElementById('primary-image-input');
        if (primaryInput.value === url) {
            primaryInput.value = '';
        }
        
        checkEmptyGallery();
        autoSelectFirstImageAsPrimary();
    }

    function handleLocalFileSelect(selectorInput) {
        const files = selectorInput.files;
        if (!files.length) return;

        const grid = document.getElementById('gallery-preview-grid');
        const emptyMsg = document.getElementById('empty-gallery-msg');
        const hiddenInputsContainer = document.getElementById('hidden-file-inputs-container');

        if (emptyMsg) emptyMsg.style.display = 'none';

        const primaryValue = document.getElementById('primary-image-input').value;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const fileId = `file-${localFileCounter}`;
            localFileCounter++;

            const objectUrl = URL.createObjectURL(file);

            // Create individual hidden file input
            const newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.name = 'image_files[]';
            newInput.id = `input-${fileId}`;
            newInput.className = 'hidden';

            const dt = new DataTransfer();
            dt.items.add(file);
            newInput.files = dt.files;
            
            hiddenInputsContainer.appendChild(newInput);

            const isPrimary = (file.name === primaryValue);
            const starClass = isPrimary ? 'text-amber-400' : 'text-slate-400 hover:text-amber-400';

            // Add preview card
            const html = `
                <div class="relative group rounded-lg overflow-hidden border border-slate-200 aspect-video bg-white shadow-sm" id="preview-${fileId}">
                    <img src="${objectUrl}" class="w-full h-full object-cover">
                    <button type="button" onclick="setPrimaryImage(this, '${file.name}')" class="primary-star absolute top-1.5 left-1.5 w-6 h-6 bg-black/45 rounded-full flex items-center justify-center ${starClass} transition cursor-pointer z-10" title="Set as Primary">
                        <i class="fa-solid fa-star text-xs"></i>
                    </button>
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center p-2">
                        <button type="button" onclick="removeLocalFile('${fileId}', '${file.name}')" class="w-8 h-8 bg-rose-600 hover:bg-rose-700 text-white rounded-full flex items-center justify-center transition shadow">
                            <i class="fa-solid fa-xmark text-sm"></i>
                        </button>
                    </div>
                </div>
            `;
            grid.insertAdjacentHTML('beforeend', html);
        }

        selectorInput.value = '';
        autoSelectFirstImageAsPrimary();
    }

    function removeLocalFile(fileId, fileName) {
        const input = document.getElementById(`input-${fileId}`);
        if (input) input.remove();

        const previewCard = document.getElementById(`preview-${fileId}`);
        if (previewCard) previewCard.remove();

        const primaryInput = document.getElementById('primary-image-input');
        if (primaryInput.value === fileName) {
            primaryInput.value = '';
        }

        checkEmptyGallery();
        autoSelectFirstImageAsPrimary();
    }

    function removePreloadedLocalImage(index, imageUrl) {
        const hiddenInput = document.getElementById(`local-img-input-${index}`);
        if (hiddenInput) hiddenInput.remove();

        const previewCard = document.getElementById(`preview-preloaded-${index}`);
        if (previewCard) previewCard.remove();

        const primaryInput = document.getElementById('primary-image-input');
        if (primaryInput.value === imageUrl) {
            primaryInput.value = '';
        }

        checkEmptyGallery();
        autoSelectFirstImageAsPrimary();
    }

    function setPrimaryImage(buttonEl, value) {
        document.getElementById('primary-image-input').value = value;
        
        // Reset all star buttons to default style
        document.querySelectorAll('.primary-star').forEach(starBtn => {
            starBtn.classList.remove('text-amber-400');
            starBtn.classList.add('text-slate-400', 'hover:text-amber-400');
        });
        
        // Highlight clicked star
        buttonEl.classList.remove('text-slate-400', 'hover:text-amber-400');
        buttonEl.classList.add('text-amber-400');
    }

    function autoSelectFirstImageAsPrimary() {
        const primaryInput = document.getElementById('primary-image-input');
        if (!primaryInput.value || primaryInput.value === '') {
            const firstStar = document.querySelector('.primary-star');
            if (firstStar) {
                firstStar.click();
            }
        }
    }

    function checkEmptyGallery() {
        const grid = document.getElementById('gallery-preview-grid');
        const cards = grid.querySelectorAll('.relative.group');
        const emptyMsg = document.getElementById('empty-gallery-msg');
        
        if (cards.length === 0) {
            if (emptyMsg) emptyMsg.style.display = 'block';
            document.getElementById('primary-image-input').value = '';
        }
    }

    // Initialize previews for existing images on load
    document.addEventListener("DOMContentLoaded", () => {
        const urlInputs = document.querySelectorAll("#image-urls-container input[type='url']");
        urlInputs.forEach((input, index) => {
            if (input.value.trim() !== '') {
                updateUrlPreview(input, index);
            }
        });
    });

    // Drag & Drop event listeners
    const dropzone = document.getElementById('dropzone');
    if (dropzone) {
        ['dragenter', 'dragover'].forEach(eventName => {
            dropzone.addEventListener(eventName, (e) => {
                e.preventDefault();
                dropzone.classList.add('border-primary', 'bg-blue-50/50');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, (e) => {
                e.preventDefault();
                dropzone.classList.remove('border-primary', 'bg-blue-50/50');
            }, false);
        });

        dropzone.addEventListener('drop', (e) => {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length) {
                const selector = document.getElementById('local-file-selector');
                const imageFilesDT = new DataTransfer();
                for (let i = 0; i < files.length; i++) {
                    if (files[i].type.startsWith('image/')) {
                        imageFilesDT.items.add(files[i]);
                    }
                }
                if (imageFilesDT.files.length) {
                    selector.files = imageFilesDT.files;
                    handleLocalFileSelect(selector);
                }
            }
        });
    }
</script>
@endpush
