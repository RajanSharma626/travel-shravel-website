@extends('admin.layout')

@section('title', 'Edit Car')
@section('page_title', 'Edit Car')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('admin.cars.index') }}" class="inline-flex items-center gap-1 text-xs text-slate-500 hover:text-primary transition font-semibold">
            <i class="fa-solid fa-arrow-left"></i> Back to Car List
        </a>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="bg-slate-50 border-b border-slate-100 p-4">
            <h3 class="text-sm font-bold text-slate-800">Edit Car Details</h3>
            <p class="text-[11px] text-slate-400 font-medium">Update the rental vehicle specifications, pricing, specs, features, and manage photos.</p>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data" class="p-5 space-y-6">
            @csrf
            @method('PUT')

            <!-- Section 1: General Info -->
            <div class="space-y-4">
                <h4 class="text-xs font-bold text-primary uppercase tracking-wider border-b border-slate-100 pb-2">1. General Information</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-xs font-semibold text-slate-600 mb-1">Car Model Name <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $car->name) }}" required 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
                               placeholder="e.g. Toyota Innova Crysta">
                        @error('name') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-xs font-semibold text-slate-600 mb-1">Category / Body Type <span class="text-rose-500">*</span></label>
                        <select name="category" id="category" required 
                                class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition bg-white">
                            <option value="Sedan" {{ old('category', $car->category) == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                            <option value="SUVs" {{ old('category', $car->category) == 'SUVs' ? 'selected' : '' }}>SUVs</option>
                            <option value="MUV" {{ old('category', $car->category) == 'MUV' ? 'selected' : '' }}>MUV</option>
                            <option value="Minivans" {{ old('category', $car->category) == 'Minivans' ? 'selected' : '' }}>Minivans</option>
                            <option value="Hatchback" {{ old('category', $car->category) == 'Hatchback' ? 'selected' : '' }}>Hatchback</option>
                        </select>
                        @error('category') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-xs font-semibold text-slate-600 mb-1">Rental Price / Day (INR) <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-xs text-slate-400 font-bold">₹</span>
                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $car->price) }}" required 
                                   class="w-full pl-7 pr-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        </div>
                        @error('price') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Transmission -->
                    <div>
                        <label for="transmission" class="block text-xs font-semibold text-slate-600 mb-1">Transmission <span class="text-rose-500">*</span></label>
                        <select name="transmission" id="transmission" required 
                                class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition bg-white">
                            <option value="Manual" {{ old('transmission', $car->transmission) == 'Manual' ? 'selected' : '' }}>Manual</option>
                            <option value="Automatic" {{ old('transmission', $car->transmission) == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                        </select>
                        @error('transmission') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Passengers -->
                    <div>
                        <label for="passengers" class="block text-xs font-semibold text-slate-600 mb-1">Passengers Capacity <span class="text-rose-500">*</span></label>
                        <input type="number" name="passengers" id="passengers" value="{{ old('passengers', $car->passengers) }}" required min="1"
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('passengers') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Bags -->
                    <div>
                        <label for="bags" class="block text-xs font-semibold text-slate-600 mb-1">Luggage Bags Capacity <span class="text-rose-500">*</span></label>
                        <input type="number" name="bags" id="bags" value="{{ old('bags', $car->bags) }}" required min="0"
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('bags') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Doors -->
                    <div>
                        <label for="doors" class="block text-xs font-semibold text-slate-600 mb-1">Doors Count <span class="text-rose-500">*</span></label>
                        <input type="number" name="doors" id="doors" value="{{ old('doors', $car->doors) }}" required min="1"
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('doors') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Toggles: Active & Featured -->
                <div class="flex items-center gap-6 pt-2">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ $car->is_active ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
                        <span class="ml-2 text-xs font-semibold text-slate-600">Active</span>
                    </label>

                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ $car->is_featured ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-amber-500"></div>
                        <span class="ml-2 text-xs font-semibold text-slate-600">Featured</span>
                    </label>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-xs font-semibold text-slate-600 mb-1">Vehicle Description</label>
                    <textarea name="description" id="description" rows="4" placeholder="Describe the vehicle's features, mileage, condition, etc."
                              class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">{{ old('description', $car->description) }}</textarea>
                    @error('description') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Section 2: Map Integration (Optional) -->
            <div class="space-y-4 pt-2">
                <h4 class="text-xs font-bold text-primary uppercase tracking-wider border-b border-slate-100 pb-2">2. Map Integration (Optional)</h4>
                <div>
                    <label for="map_url" class="block text-xs font-semibold text-slate-600 mb-1">Google Maps Embed URL (e.g. for pickup office location)</label>
                    <textarea name="map_url" id="map_url" rows="2" placeholder="https://www.google.com/maps/embed?..."
                              class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">{{ old('map_url', $car->map_url) }}</textarea>
                    @error('map_url') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Section 3: Vehicle Features -->
            <div class="space-y-4 pt-2">
                <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                    <h4 class="text-xs font-bold text-primary uppercase tracking-wider">3. Rental Features & Perks</h4>
                    <button type="button" onclick="addFeature()" class="px-2 py-1 bg-primary/10 hover:bg-primary/20 text-primary text-[10px] font-bold rounded flex items-center gap-1 transition">
                        <i class="fa-solid fa-plus"></i> Add Feature
                    </button>
                </div>
                
                <div id="features-container" class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    @php
                        $features = old('features', $car->features ?? []);
                    @endphp
                    @forelse($features as $idx => $feature)
                        <div class="flex items-center gap-2" id="feature-row-{{ $idx }}">
                            <input type="text" name="features[]" value="{{ $feature }}" placeholder="Enter Feature (e.g. GPS Navigation)" 
                                   class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                            <button type="button" onclick="removeElement('feature-row-{{ $idx }}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm">
                                <i class="fa-solid fa-trash-can text-[10px]"></i>
                            </button>
                        </div>
                    @empty
                        <div class="flex items-center gap-2" id="feature-row-0">
                            <input type="text" name="features[]" value="Free Cancellation" placeholder="e.g. Free Cancellation" 
                                   class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                        </div>
                    @endforelse
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
                                $existingImages = old('images', $car->images ?? []);
                            @endphp
                            @foreach($existingImages as $idx => $img)
                                <div class="flex items-center gap-2" id="image-url-row-{{ $idx }}">
                                    <input type="url" name="images[]" value="{{ $img }}" oninput="updateUrlPreview(this, {{ $idx }})" placeholder="https://example.com/car-image.jpg" 
                                           class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                                    <button type="button" onclick="removeImageUrl({{ $idx }}, 'image-url-row-{{ $idx }}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm">
                                        <i class="fa-solid fa-trash-can text-[10px]"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Selected Primary Image Identifier -->
                    <input type="hidden" name="primary_image" id="primary-image-input" value="{{ old('primary_image', $car->primary_image) }}">

                    <!-- Gallery Preview Grid -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2">Gallery & Primary Cover Preview</label>
                        <p class="text-[10px] text-slate-400 mb-3"><i class="fa-solid fa-circle-info text-amber-500"></i> Click the gold star (<i class="fa-solid fa-star text-amber-400"></i>) on any preview to set it as the primary cover image.</p>
                        
                        <div id="gallery-preview-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                            <!-- Preview cards appear here -->
                            @foreach($existingImages as $idx => $img)
                                <div class="relative group rounded-lg overflow-hidden border border-slate-200 aspect-video bg-white shadow-sm flex items-center justify-center p-2" id="preview-url-{{ $idx }}">
                                    <img src="{{ $img }}" class="max-w-full max-h-full object-contain" onerror="this.src='https://placehold.co/600x400?text=Invalid+Image+URL'">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-2 z-10">
                                        <button type="button" onclick="setAsPrimary('{{ $img }}')" class="w-7 h-7 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-sm select-star-btn" title="Set as Cover Image">
                                            <i class="fa-solid fa-star {{ $car->primary_image === $img ? 'text-amber-400' : 'text-slate-400 hover:text-amber-400' }}"></i>
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
                <a href="{{ route('admin.cars.index') }}" class="py-2 px-4 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-lg text-xs font-semibold transition">
                    Cancel
                </a>
                <button type="submit" class="py-2 px-6 bg-primary text-white hover:bg-blue-700 rounded-lg text-xs font-semibold shadow-md transition">
                    Update Car listing
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let featureCounter = {{ count($features) }};
    let urlImageCounter = {{ count($existingImages) }};
    
    // Dynamic lists add/remove
    function addFeature() {
        const container = document.getElementById('features-container');
        const id = `feature-row-${featureCounter++}`;
        const html = `
            <div class="flex items-center gap-2" id="${id}">
                <input type="text" name="features[]" placeholder="Enter Feature (e.g. GPS Navigation)" 
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
                <input type="url" name="images[]" oninput="updateUrlPreview(this, ${id})" placeholder="https://example.com/car-image.jpg" 
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
                <div class="relative group rounded-lg overflow-hidden border border-slate-200 aspect-video bg-white shadow-sm flex items-center justify-center p-2" id="preview-url-${id}">
                    <img src="${url}" class="max-w-full max-h-full object-contain" onerror="this.src='https://placehold.co/600x400?text=Invalid+Image+URL'">
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
                    <div class="relative group rounded-lg overflow-hidden border border-slate-200 aspect-video bg-white shadow-sm flex items-center justify-center p-2 preview-local-file" id="preview-local-${index}">
                        <img src="${e.target.result}" class="max-w-full max-h-full object-contain">
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
