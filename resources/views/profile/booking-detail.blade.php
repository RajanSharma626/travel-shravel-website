@extends('layouts.app')

@section('title', 'Booking Details | Travel Shravel')

@section('content')
<div class="min-h-screen bg-gray-50/50 py-12 w-full">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            {{-- Reusable Sidebar --}}
            @include('profile.partials.sidebar', ['active' => 'bookings'])

            {{-- Right Column: Panel --}}
            <div class="col-span-3">
                
                {{-- Booking Detail Card --}}
                <div class="bg-white rounded-[32px] p-8 md:p-10 shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-gray-100 flex flex-col gap-8">
                    
                    {{-- Header with Back Button --}}
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-gray-100">
                        <div class="space-y-1">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('profile.bookings') }}" class="w-8 h-8 rounded-full border border-gray-100 text-gray-500 hover:bg-navy hover:text-white flex items-center justify-center transition-all">
                                    <i class="fa-solid fa-arrow-left text-xs"></i>
                                </a>
                                <h3 class="text-xl font-bold text-navy flex items-center gap-2">
                                    Booking Details
                                </h3>
                            </div>
                            <p class="text-xs text-gray-400 font-medium">Viewing invoice and ticket information for Booking ID #TSB-40912</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-wider bg-green-tint text-india-green border border-india-green/10">
                                Completed & Ticket Issued
                            </span>
                        </div>
                    </div>

                    {{-- Tour Header Info --}}
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 bg-gray-50/30 p-6 rounded-2xl border border-gray-100">
                        <div class="lg:col-span-2 space-y-2">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest"><i class="fa-solid fa-location-dot text-india-green mr-1"></i> Jammu & Kashmir, India</p>
                            <h4 class="text-lg font-black text-navy">Darshan of Shri Mata Vaishno Devi // TSP 075</h4>
                            <p class="text-xs text-gray-400 font-medium">Package includes accommodation, Katra transfers, helicopter assist, and premium darshan slips.</p>
                        </div>
                        <div class="lg:col-span-1 flex flex-col justify-center lg:items-end border-t lg:border-t-0 lg:border-l border-gray-100 pt-4 lg:pt-0 lg:pl-6 space-y-1">
                            <p class="text-xs text-gray-400 uppercase font-semibold">Total Cost</p>
                            <p class="text-2xl font-black text-navy">₹8,499.00</p>
                            <p class="text-[10px] text-india-green font-bold uppercase tracking-wider">All Taxes Included</p>
                        </div>
                    </div>

                    {{-- Content Details Grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        
                        {{-- Passenger & Ticket Info --}}
                        <div class="space-y-4">
                            <h5 class="text-xs font-bold text-navy uppercase tracking-wider border-b border-gray-50 pb-2">Traveler Details</h5>
                            
                            <div class="space-y-3.5">
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-400 font-semibold">Lead Passenger</span>
                                    <span class="text-navy font-bold">{{ $user->name }}</span>
                                </div>
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-400 font-semibold">Email Address</span>
                                    <span class="text-navy font-bold">{{ $user->email }}</span>
                                </div>
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-400 font-semibold">Phone Number</span>
                                    <span class="text-navy font-bold">{{ $user->phone_number ?? '+91 9086421601' }}</span>
                                </div>
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-400 font-semibold">Travel Date</span>
                                    <span class="text-navy font-bold">12 Oct 2026 - 14 Oct 2026</span>
                                </div>
                            </div>
                        </div>

                        {{-- Payment Summary --}}
                        <div class="space-y-4">
                            <h5 class="text-xs font-bold text-navy uppercase tracking-wider border-b border-gray-50 pb-2">Payment Summary</h5>
                            
                            <div class="space-y-3.5">
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-400 font-semibold">Basic Package Cost</span>
                                    <span class="text-navy font-bold">₹7,500.00</span>
                                </div>
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-400 font-semibold">GST / Service Tax (18%)</span>
                                    <span class="text-navy font-bold">₹999.00</span>
                                </div>
                                <div class="border-t border-gray-100 my-2 pt-2 flex justify-between items-center text-base">
                                    <span class="text-navy font-bold">Amount Paid</span>
                                    <span class="text-navy font-extrabold text-lg">₹8,499.00</span>
                                </div>
                                <div class="flex justify-between items-center text-xs">
                                    <span class="text-gray-400 font-semibold">Payment Mode</span>
                                    <span class="text-india-green font-bold uppercase tracking-wider">UPI / Instant Transfer</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Tour Itinerary Preview --}}
                    <div class="space-y-4 border-t border-gray-100 pt-6">
                        <h5 class="text-xs font-bold text-navy uppercase tracking-wider mb-4">Brief Package Itinerary</h5>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            {{-- Day 1 --}}
                            <div class="p-4 rounded-xl border border-gray-100 bg-gray-50/20 space-y-1.5">
                                <span class="text-[10px] font-black uppercase text-india-green tracking-widest">Day 1</span>
                                <h6 class="text-xs font-bold text-navy">Katra Arrival & Hotel Check-in</h6>
                                <p class="text-[11px] text-gray-400 font-medium">Pickup from Jammu airport/station, transfer to Katra, and check-in to your premium hotel rooms.</p>
                            </div>
                            
                            {{-- Day 2 --}}
                            <div class="p-4 rounded-xl border border-gray-100 bg-gray-50/20 space-y-1.5">
                                <span class="text-[10px] font-black uppercase text-india-green tracking-widest">Day 2</span>
                                <h6 class="text-xs font-bold text-navy">Trek & Vaishno Devi Darshan</h6>
                                <p class="text-[11px] text-gray-400 font-medium">Early morning trek to Vaishno Devi Shrine (helicopter slips optionally used). Return trek by evening.</p>
                            </div>

                            {{-- Day 3 --}}
                            <div class="p-4 rounded-xl border border-gray-100 bg-gray-50/20 space-y-1.5">
                                <span class="text-[10px] font-black uppercase text-india-green tracking-widest">Day 3</span>
                                <h6 class="text-xs font-bold text-navy">Departure Transfer to Jammu</h6>
                                <p class="text-[11px] text-gray-400 font-medium">Enjoy breakfast, check-out from hotel, and transfer back to Jammu airport/railway station.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Actions Footer --}}
                    <div class="border-t border-gray-100 pt-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                        <p class="text-xs text-gray-400 font-medium text-center sm:text-left"><i class="fa-solid fa-circle-info text-navy/20 mr-1.5"></i> Need custom changes or cancellation? Please contact support.</p>
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <button onclick="window.print()" class="w-full sm:w-auto px-6 py-3 rounded-xl border border-gray-200 text-navy hover:bg-gray-50 text-xs font-bold uppercase tracking-wider transition-all cursor-pointer">
                                <i class="fa-solid fa-print mr-2"></i> Print Ticket
                            </button>
                            <a href="mailto:tsxj@hotmail.com" class="w-full sm:w-auto px-6 py-3 rounded-xl bg-india-green text-white hover:bg-india-green/90 text-xs font-bold uppercase tracking-wider text-center transition-all">
                                Contact Support
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
@endsection
