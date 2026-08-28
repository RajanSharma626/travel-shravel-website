@extends('admin.layout')

@section('title', 'Add New Hotel')
@section('page_title', 'Add New Hotel')

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
            <h3 class="text-sm font-bold text-slate-800">Hotel Details Form</h3>
            <p class="text-[11px] text-slate-400 font-medium">Add a new hotel, set pricing, upload photos, and list amenities/room types.</p>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.hotels.store') }}" method="POST" enctype="multipart/form-data" class="p-5 space-y-6">
            @csrf

            <!-- Section: General Info -->
            <div class="space-y-4">
                <h4 class="text-xs font-bold text-primary uppercase tracking-wider border-b border-slate-100 pb-2">1. General Information</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Hotel Name -->
                    <div>
                        <label for="name" class="block text-xs font-semibold text-slate-600 mb-1">Hotel Name <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('name') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Stars -->
                    <div>
                        <label for="stars" class="block text-xs font-semibold text-slate-600 mb-1">Star Rating <span class="text-rose-500">*</span></label>
                        <select name="stars" id="stars" required 
                                class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition bg-white">
                            <option value="3" {{ old('stars') == 3 ? 'selected' : '' }}>3 Stars</option>
                            <option value="1" {{ old('stars') == 1 ? 'selected' : '' }}>1 Star</option>
                            <option value="2" {{ old('stars') == 2 ? 'selected' : '' }}>2 Stars</option>
                            <option value="4" {{ old('stars') == 4 ? 'selected' : '' }}>4 Stars</option>
                            <option value="5" {{ old('stars') == 5 ? 'selected' : '' }}>5 Stars</option>
                        </select>
                        @error('stars') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Price per Night -->
                    <div>
                        <label for="price" class="block text-xs font-semibold text-slate-600 mb-1">Base Price / Night (INR) <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-xs text-slate-400 font-bold">₹</span>
                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', '0.00') }}" required 
                                   class="w-full pl-7 pr-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        </div>
                        @error('price') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Toggles: Active & Featured -->
                    <div class="flex items-center gap-6 pt-5">
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
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-xs font-semibold text-slate-600 mb-1">Description</label>
                    <textarea name="description" id="description" rows="4" 
                              class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">{{ old('description') }}</textarea>
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
                        <input type="text" name="location" id="location" value="{{ old('location') }}" required placeholder="e.g. Near Dal Lake" 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('location') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-xs font-semibold text-slate-600 mb-1">Full Street Address <span class="text-rose-500">*</span></label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}" required 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('address') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- City -->
                    <div>
                        <label for="city" class="block text-xs font-semibold text-slate-600 mb-1">City <span class="text-rose-500">*</span></label>
                        <input type="text" name="city" id="city" value="{{ old('city') }}" required 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('city') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- State -->
                    <div>
                        <label for="state" class="block text-xs font-semibold text-slate-600 mb-1">State / Province <span class="text-rose-500">*</span></label>
                        <input type="text" name="state" id="state" value="{{ old('state') }}" required 
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

                    <!-- Google Map URL -->
                    <div class="md:col-span-2">
                        <label for="map_url" class="block text-xs font-semibold text-slate-600 mb-1">Google Map URL</label>
                        <input type="url" name="map_url" id="map_url" value="{{ old('map_url') }}" placeholder="https://maps.google.com/..." 
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
                        <input type="text" name="check_in_time" id="check_in_time" value="{{ old('check_in_time', '12:00 PM') }}" required placeholder="e.g. 12:00 PM" 
                               class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                        @error('check_in_time') <p class="text-rose-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Check-out Time -->
                    <div>
                        <label for="check_out_time" class="block text-xs font-semibold text-slate-600 mb-1">Check-out Time <span class="text-rose-500">*</span></label>
                        <input type="text" name="check_out_time" id="check_out_time" value="{{ old('check_out_time', '11:00 AM') }}" required placeholder="e.g. 11:00 AM" 
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
                    <!-- Prepopulated common amenities -->
                    @php
                        $commonAmenities = old('amenities', ['Free Wi-Fi', 'Swimming Pool', 'Room Service', 'Restaurant', 'Gym', 'Free Parking', 'Airport Shuttle']);
                    @endphp
                    @foreach($commonAmenities as $index => $amenity)
                    @php
                        $amenityVal = is_array($amenity) ? ($amenity['name'] ?? ($amenity['title'] ?? '')) : (is_object($amenity) ? ($amenity->name ?? '') : (string)$amenity);
                    @endphp
                    <div class="flex items-center gap-2" id="amenity-row-{{ $index }}">
                        <input type="text" name="amenities[]" value="{{ $amenityVal }}" 
                               class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                        <button type="button" onclick="removeElement('amenity-row-{{ $index }}')" class="w-8 h-8 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg flex items-center justify-center transition flex-shrink-0 shadow-sm" title="Remove">
                            <i class="fa-solid fa-trash-can text-[10px]"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Section: Room Types (Dynamic list with Name, Price, Capacity, Description & Image) -->
            <div class="space-y-4 pt-2">
                <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                    <div>
                        <h4 class="text-xs font-bold text-primary uppercase tracking-wider">5. Room Types & Rates</h4>
                        <p class="text-[10px] text-slate-400">Configure different room categories, custom prices per night, guest capacity, and room photos.</p>
                    </div>
                    <button type="button" onclick="addRoomType()" class="px-3 py-1 bg-blue-50 hover:bg-blue-100 text-primary border border-blue-200 rounded-lg text-[10px] font-bold transition flex items-center gap-1 shadow-sm">
                        <i class="fa-solid fa-plus"></i> Add Room Category
                    </button>
                </div>
                
                <div id="room-types-container" class="space-y-4">
                    @php
                        $roomTypes = old('room_types', [
                            ['name' => 'Deluxe Room', 'price' => old('price', 4999), 'capacity' => '2 Adults', 'description' => 'Comfortable and spacious room with modern amenities.', 'image' => null],
                            ['name' => 'Executive Suite', 'price' => old('price', 7999), 'capacity' => '2 Adults, 1 Child', 'description' => 'Luxury suite featuring extra living space and premium views.', 'image' => null],
                        ]);
                    @endphp
                    @foreach($roomTypes as $index => $room)
                    @php
                        $rName = is_array($room) ? ($room['name'] ?? '') : (string)$room;
                        $rPrice = is_array($room) && isset($room['price']) ? $room['price'] : '';
                        $rCapacity = is_array($room) && isset($room['capacity']) ? $room['capacity'] : '2 Adults';
                        $rDesc = is_array($room) && isset($room['description']) ? $room['description'] : '';
                        $rImage = is_array($room) && isset($room['image']) ? $room['image'] : '';
                    @endphp
                    <div class="p-4 bg-slate-50/70 border border-slate-200 rounded-xl space-y-3 relative group" id="room-card-{{ $index }}">
                        <div class="flex items-center justify-between border-b border-slate-200/60 pb-2">
                            <span class="text-xs font-bold text-slate-700 flex items-center gap-2">
                                <i class="fa-solid fa-door-open text-primary"></i>
                                <span class="room-title-label">Room Category #{{ $index + 1 }}</span>
                            </span>
                            <button type="button" onclick="removeRoomType('room-card-{{ $index }}')" class="px-2 py-1 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg text-[10px] font-bold transition flex items-center gap-1 shadow-sm" title="Remove Room">
                                <i class="fa-solid fa-trash-can"></i> Remove
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                            <!-- Room Name -->
                            <div class="sm:col-span-2">
                                <label class="block text-[11px] font-semibold text-slate-600 mb-1">Room Name <span class="text-rose-500">*</span></label>
                                <input type="text" name="room_types[{{ $index }}][name]" value="{{ $rName }}" placeholder="e.g. Deluxe Mountain View Room" required
                                       class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                            </div>
                            
                            <!-- Room Price -->
                            <div>
                                <label class="block text-[11px] font-semibold text-slate-600 mb-1">Price / Night (₹) <span class="text-rose-500">*</span></label>
                                <input type="number" step="0.01" name="room_types[{{ $index }}][price]" value="{{ $rPrice }}" placeholder="e.g. 5999" required
                                       class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                            </div>

                            <!-- Capacity -->
                            <div>
                                <label class="block text-[11px] font-semibold text-slate-600 mb-1">Guests / Capacity</label>
                                <input type="text" name="room_types[{{ $index }}][capacity]" value="{{ $rCapacity }}" placeholder="e.g. 2 Adults, 1 Child"
                                       class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                            </div>

                            <!-- Room Description -->
                            <div class="sm:col-span-2">
                                <label class="block text-[11px] font-semibold text-slate-600 mb-1">Bed & Feature Details (Optional)</label>
                                <input type="text" name="room_types[{{ $index }}][description]" value="{{ $rDesc }}" placeholder="e.g. 1 King Bed, Mountain View, Private Balcony"
                                       class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                            </div>

                            <!-- Room Image Upload -->
                            <div class="sm:col-span-2">
                                <label class="block text-[11px] font-semibold text-slate-600 mb-1">Room Photo Upload</label>
                                <input type="hidden" name="room_types[{{ $index }}][existing_image]" id="room-existing-img-{{ $index }}" value="{{ $rImage }}">
                                
                                <div class="flex items-center gap-3">
                                    <div class="w-16 h-12 rounded-lg bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center flex-shrink-0" id="room-preview-box-{{ $index }}">
                                        @if($rImage)
                                            <img src="{{ $rImage }}" class="w-full h-full object-cover">
                                        @else
                                            <i class="fa-regular fa-image text-slate-300 text-lg"></i>
                                        @endif
                                    </div>
                                    <input type="file" name="room_type_images[{{ $index }}]" accept="image/*" onchange="previewRoomImage(this, {{ $index }})" 
                                           class="text-[11px] text-slate-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[10px] file:font-semibold file:bg-blue-50 file:text-primary hover:file:bg-blue-100 transition cursor-pointer">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Section: Gallery & Images (Direct Upload Only) -->
            <div class="space-y-4 pt-2">
                <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                    <div>
                        <h4 class="text-xs font-bold text-primary uppercase tracking-wider">6. Hotel Photo Gallery</h4>
                        <p class="text-[10px] text-slate-400">Directly upload hotel images from your device. Click the gold star to set the primary cover image.</p>
                    </div>
                </div>
                
                <!-- Hidden input to track primary image selection -->
                <input type="hidden" name="primary_image" id="primary-image-input" value="{{ old('primary_image') }}">

                <!-- Hidden inputs container for existing saved images -->
                <div id="existing-images-hidden-container"></div>

                <!-- File uploads drag & drop dropzone -->
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Upload Gallery Images</label>
                    <div class="relative bg-slate-50 border-2 border-dashed border-slate-300 hover:border-primary/50 rounded-xl p-8 transition flex flex-col items-center justify-center text-center cursor-pointer group" id="dropzone" onclick="document.getElementById('local-file-selector').click()">
                        <!-- File input -->
                        <input type="file" name="image_files[]" id="local-file-selector" multiple accept="image/*" onchange="handleLocalFileSelect(this)" class="hidden">
                        <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400 group-hover:text-primary transition mb-2"></i>
                        <p class="text-xs font-bold text-slate-700">Drag & drop photos here, or <span class="text-primary hover:underline">Browse from Computer</span></p>
                        <p class="text-[10px] text-slate-400 mt-1">Supports JPG, PNG, WEBP, GIF. You can select multiple images at once.</p>
                    </div>
                </div>

                <!-- Hidden inputs container for local uploads -->
                <div id="hidden-file-inputs-container" class="hidden"></div>

                <!-- Gallery Preview Grid -->
                <div class="space-y-2 mt-4">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold text-slate-700">Photo Previews & Primary Cover</label>
                        <span class="text-[10px] text-slate-400 flex items-center gap-1"><i class="fa-solid fa-star text-amber-400"></i> Gold star indicates Primary Cover</span>
                    </div>
                    
                    <div id="gallery-preview-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 p-4 bg-slate-50/70 rounded-xl border border-slate-200 min-h-[120px] items-center">
                        <p id="empty-gallery-msg" class="col-span-full text-slate-400 text-xs py-6 text-center">
                            <i class="fa-regular fa-images text-2xl text-slate-300 block mb-1"></i>
                            No photos uploaded yet. Drag & drop or browse photos above.
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
                    Create Hotel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let amenityCounter = {{ count($commonAmenities) }};
    let roomCounter = {{ count($roomTypes) }};
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
        const id = roomCounter;
        const cardId = `room-card-${id}`;

        const html = `
            <div class="p-4 bg-slate-50/70 border border-slate-200 rounded-xl space-y-3 relative group" id="${cardId}">
                <div class="flex items-center justify-between border-b border-slate-200/60 pb-2">
                    <span class="text-xs font-bold text-slate-700 flex items-center gap-2">
                        <i class="fa-solid fa-door-open text-primary"></i>
                        <span class="room-title-label">Room Category #${id + 1}</span>
                    </span>
                    <button type="button" onclick="removeRoomType('${cardId}')" class="px-2 py-1 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100 rounded-lg text-[10px] font-bold transition flex items-center gap-1 shadow-sm" title="Remove Room">
                        <i class="fa-solid fa-trash-can"></i> Remove
                    </button>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                    <div class="sm:col-span-2">
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Room Name <span class="text-rose-500">*</span></label>
                        <input type="text" name="room_types[${id}][name]" placeholder="e.g. Executive Suite Room" required
                               class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                    </div>
                    
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Price / Night (₹) <span class="text-rose-500">*</span></label>
                        <input type="number" step="0.01" name="room_types[${id}][price]" placeholder="e.g. 7499" required
                               class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                    </div>

                    <div>
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Guests / Capacity</label>
                        <input type="text" name="room_types[${id}][capacity]" value="2 Adults" placeholder="e.g. 2 Adults"
                               class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Bed & Feature Details (Optional)</label>
                        <input type="text" name="room_types[${id}][description]" placeholder="e.g. 1 King Bed, Panoramic Views"
                               class="w-full px-3 py-1.5 border border-slate-200 rounded-lg text-xs outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition bg-white">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Room Photo Upload</label>
                        <input type="hidden" name="room_types[${id}][existing_image]" id="room-existing-img-${id}" value="">
                        
                        <div class="flex items-center gap-3">
                            <div class="w-16 h-12 rounded-lg bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center flex-shrink-0" id="room-preview-box-${id}">
                                <i class="fa-regular fa-image text-slate-300 text-lg"></i>
                            </div>
                            <input type="file" name="room_type_images[${id}]" accept="image/*" onchange="previewRoomImage(this, ${id})" 
                                   class="text-[11px] text-slate-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[10px] file:font-semibold file:bg-blue-50 file:text-primary hover:file:bg-blue-100 transition cursor-pointer">
                        </div>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        roomCounter++;
    }

    function removeRoomType(cardId) {
        const el = document.getElementById(cardId);
        if (el) {
            el.remove();
        }
    }

    function previewRoomImage(input, index) {
        const box = document.getElementById(`room-preview-box-${index}`);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                box.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeElement(id) {
        const el = document.getElementById(id);
        if (el) {
            el.remove();
        }
    }

    // Direct Image Gallery Uploader functions
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

            // Add preview card
            const html = `
                <div class="relative group rounded-xl overflow-hidden border border-slate-200 aspect-video bg-white shadow-sm" id="preview-${fileId}">
                    <img src="${objectUrl}" class="w-full h-full object-cover">
                    <button type="button" onclick="setPrimaryImage(this, '${file.name}')" class="primary-star absolute top-2 left-2 w-7 h-7 bg-black/50 backdrop-blur rounded-full flex items-center justify-center ${isPrimary ? 'text-amber-400' : 'text-white/70 hover:text-amber-400'} transition z-10" title="Set as Primary Cover">
                        <i class="fa-solid fa-star text-xs"></i>
                    </button>
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center p-2">
                        <button type="button" onclick="removeLocalFile('${fileId}', '${file.name}')" class="w-8 h-8 bg-rose-600 hover:bg-rose-700 text-white rounded-full flex items-center justify-center transition shadow" title="Delete Photo">
                            <i class="fa-solid fa-trash-can text-xs"></i>
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

    function setPrimaryImage(buttonEl, value) {
        document.getElementById('primary-image-input').value = value;
        
        // Reset all star buttons to default style and remove badges
        document.querySelectorAll('.primary-star').forEach(starBtn => {
            starBtn.classList.remove('text-amber-400');
            starBtn.classList.add('text-white/70', 'hover:text-amber-400');
        });
        document.querySelectorAll('.primary-badge').forEach(badge => badge.remove());
        
        // Highlight clicked star
        buttonEl.classList.remove('text-white/70', 'hover:text-amber-400');
        buttonEl.classList.add('text-amber-400');

        // Add badge to parent
        const parentCard = buttonEl.closest('.relative');
        if (parentCard) {
            parentCard.insertAdjacentHTML('beforeend', '<span class="primary-badge absolute bottom-2 left-2 px-2 py-0.5 bg-amber-500 text-white text-[9px] font-extrabold rounded-md shadow uppercase tracking-wider z-10">Primary Cover</span>');
        }
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
