@extends('layouts.app')

@section('title', 'My Bookings | Travel Shravel')

@section('content')
<div class="min-h-screen bg-gray-50/50 py-12 w-full">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            {{-- Reusable Sidebar --}}
            @include('profile.partials.sidebar', ['active' => 'bookings'])

            {{-- Right Column: Panels --}}
            <div class="col-span-3">
                
                {{-- Panel 2: Booking History --}}
                <div class="bg-white rounded-[32px] p-8 md:p-10 shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-gray-100">
                    <h3 class="text-xl font-bold text-navy mb-2 flex items-center gap-3">
                        <i class="fa-regular fa-calendar-check text-india-green"></i> Booking History
                    </h3>
                    <p class="text-sm text-gray-400 font-medium mb-8">View and manage your tour packages, hotel reservations, and car rentals.</p>

                    <div class="space-y-4">
                        {{-- Dummy Booking 1 --}}
                        <div class="p-6 rounded-2xl border border-gray-100 bg-gray-50/30 hover:border-navy/15 transition-all flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div class="space-y-1">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-green-tint text-india-green border border-india-green/10">
                                    Completed
                                </span>
                                <h4 class="text-base font-bold text-navy pt-1.5">Darshan of Shri Mata Vaishno Devi // TSP 075</h4>
                                <p class="text-xs text-gray-400">Booking ID: #TSB-40912 • 2 Nights • Jammu and Kashmir, India</p>
                            </div>
                            <div class="flex items-center justify-between md:justify-end gap-6 border-t md:border-none pt-4 md:pt-0">
                                <div class="text-left md:text-right">
                                    <p class="text-xs text-gray-400">Total Price</p>
                                    <p class="text-lg font-bold text-navy">₹8,499.00</p>
                                </div>
                                <a href="{{ route('profile.booking-detail') }}" class="px-5 py-2.5 rounded-lg bg-navy text-white text-xs font-semibold hover:bg-navy-deep transition-all">
                                    View Details
                                </a>
                            </div>
                        </div>

                        {{-- Dummy Booking 2 --}}
                        <div class="p-6 rounded-2xl border border-gray-100 bg-gray-50/30 hover:border-navy/15 transition-all flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div class="space-y-1">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-blue-50 text-blue-600 border border-blue-100">
                                    Upcoming
                                </span>
                                <h4 class="text-base font-bold text-navy pt-1.5">Jannat-e-Kashmir (4N Srinagar) // TSP 161</h4>
                                <p class="text-xs text-gray-400">Booking ID: #TSB-41988 • 4 Nights • Kashmir, India</p>
                            </div>
                            <div class="flex items-center justify-between md:justify-end gap-6 border-t md:border-none pt-4 md:pt-0">
                                <div class="text-left md:text-right">
                                    <p class="text-xs text-gray-400">Total Price</p>
                                    <p class="text-lg font-bold text-navy">₹18,250.00</p>
                                </div>
                                <a href="{{ route('profile.booking-detail') }}" class="px-5 py-2.5 rounded-lg bg-navy text-white text-xs font-semibold hover:bg-navy-deep transition-all">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
