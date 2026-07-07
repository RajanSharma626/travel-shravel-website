@extends('admin.layout')

@section('title', 'Admin Dashboard')
@section('page_title', 'Dashboard Overview')

@section('content')
<div class="space-y-4">
    <!-- Stat Cards Group -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card: Total Users -->
        <div class="bg-white p-3.5 rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition duration-300 flex items-center justify-between">
            <div class="space-y-1">
                <span class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider">Total Users</span>
                <h3 class="text-xl font-extrabold text-slate-800">{{ $stats['total_users'] }}</h3>
                <span class="inline-flex items-center gap-1 text-[10px] font-medium text-emerald-600">
                    <i class="fa-solid fa-arrow-trend-up"></i> System Growth
                </span>
            </div>
            <div class="p-2.5 bg-primary/10 text-primary rounded-xl">
                <i class="fa-solid fa-users text-lg"></i>
            </div>
        </div>

        <!-- Card: Normal Users -->
        <div class="bg-white p-3.5 rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition duration-300 flex items-center justify-between">
            <div class="space-y-1">
                <span class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider">Normal Travelers</span>
                <h3 class="text-xl font-extrabold text-slate-800">{{ $stats['normal_users'] }}</h3>
                <span class="text-[10px] font-semibold text-slate-500">
                    {{ $stats['total_users'] > 0 ? round(($stats['normal_users'] / $stats['total_users']) * 100, 1) : 0 }}% of total
                </span>
            </div>
            <div class="p-2.5 bg-emerald-500/10 text-emerald-600 rounded-xl">
                <i class="fa-solid fa-user text-lg"></i>
            </div>
        </div>

        <!-- Card: Partner Users -->
        <div class="bg-white p-3.5 rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition duration-300 flex items-center justify-between">
            <div class="space-y-1">
                <span class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider">Local Experts / Partners</span>
                <h3 class="text-xl font-extrabold text-slate-800">{{ $stats['partner_users'] }}</h3>
                <span class="text-[10px] font-semibold text-slate-500">
                    {{ $stats['total_users'] > 0 ? round(($stats['partner_users'] / $stats['total_users']) * 100, 1) : 0 }}% of total
                </span>
            </div>
            <div class="p-2.5 bg-amber-500/10 text-amber-600 rounded-xl">
                <i class="fa-solid fa-handshake text-lg"></i>
            </div>
        </div>

        <!-- Card: Admin Users -->
        <div class="bg-white p-3.5 rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition duration-300 flex items-center justify-between">
            <div class="space-y-1">
                <span class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider">Administrators</span>
                <h3 class="text-xl font-extrabold text-slate-800">{{ $stats['admin_users'] }}</h3>
                <span class="text-[10px] font-semibold text-rose-500">
                    System Managers
                </span>
            </div>
            <div class="p-2.5 bg-rose-500/10 text-rose-600 rounded-xl">
                <i class="fa-solid fa-shield-halved text-lg"></i>
            </div>
        </div>
    </div>

    <!-- Quick Insights and Recent Registered Users -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <!-- Left: Distribution chart (SVG/CSS progress bar) -->
        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm space-y-4">
            <div>
                <h3 class="font-bold text-slate-800 text-sm">User Type Distribution</h3>
                <p class="text-slate-400 text-[10px] font-medium">Relative share of roles across the portal</p>
            </div>

            <div class="space-y-2.5">
                <!-- Normal Travelers -->
                @php
                    $normalPct = $stats['total_users'] > 0 ? ($stats['normal_users'] / $stats['total_users']) * 100 : 0;
                    $partnerPct = $stats['total_users'] > 0 ? ($stats['partner_users'] / $stats['total_users']) * 100 : 0;
                    $adminPct = $stats['total_users'] > 0 ? ($stats['admin_users'] / $stats['total_users']) * 100 : 0;
                @endphp
                <div class="space-y-1">
                    <div class="flex justify-between text-[10px] font-semibold">
                        <span class="text-slate-600">Travelers (Normal)</span>
                        <span class="text-slate-800">{{ round($normalPct, 1) }}%</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-1.5">
                        <div class="bg-primary h-1.5 rounded-full" style="width: {{ $normalPct }}%"></div>
                    </div>
                </div>

                <!-- Partners -->
                <div class="space-y-1">
                    <div class="flex justify-between text-[10px] font-semibold">
                        <span class="text-slate-600">Partners (Local Experts)</span>
                        <span class="text-slate-800">{{ round($partnerPct, 1) }}%</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-1.5">
                        <div class="bg-amber-500 h-1.5 rounded-full" style="width: {{ $partnerPct }}%"></div>
                    </div>
                </div>

                <!-- Admin -->
                <div class="space-y-1">
                    <div class="flex justify-between text-[10px] font-semibold">
                        <span class="text-slate-600">Admins</span>
                        <span class="text-slate-800">{{ round($adminPct, 1) }}%</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-1.5">
                        <div class="bg-rose-500 h-1.5 rounded-full" style="width: {{ $adminPct }}%"></div>
                    </div>
                </div>
            </div>
            <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                <a href="{{ route('admin.users') }}" class="text-[10px] font-bold text-primary hover:underline">
                    Manage Roles &rarr;
                </a>
            </div>
        </div>

        <!-- Right: Recent Registrations -->
        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm lg:col-span-2 space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-slate-800 text-sm">Recent Registered Users</h3>
                    <p class="text-slate-400 text-[10px] font-medium">Newest members of the community</p>
                </div>
                <a href="{{ route('admin.users') }}" class="py-1 px-2.5 bg-slate-50 hover:bg-slate-100 rounded-lg text-slate-600 text-[10px] font-semibold transition">
                    View All Users
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-100 text-slate-400 text-[10px] font-bold uppercase tracking-wider">
                            <th class="pb-1.5">User</th>
                            <th class="pb-1.5">Username</th>
                            <th class="pb-1.5">Type</th>
                            <th class="pb-1.5 text-right">Joined</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-[11px]">
                        @forelse($recentUsers as $user)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-1.5 flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-slate-100 text-slate-600 font-bold flex items-center justify-center text-[9px]">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800 text-xs">{{ $user->name }}</p>
                                    <p class="text-[10px] text-slate-400">{{ $user->email }}</p>
                                </div>
                            </td>
                            <td class="py-1.5 text-slate-600 font-medium">
                                {{ $user->username }}
                            </td>
                            <td class="py-1.5">
                                @if($user->user_type === 'admin')
                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded-full text-[9px] font-semibold bg-rose-50 text-rose-700 border border-rose-100">Admin</span>
                                @elseif($user->user_type === 'partner')
                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded-full text-[9px] font-semibold bg-amber-50 text-amber-700 border border-amber-100">Partner</span>
                                @else
                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded-full text-[9px] font-semibold bg-blue-50 text-blue-700 border border-blue-100">Traveler</span>
                                @endif
                            </td>
                            <td class="py-1.5 text-right text-[10px] text-slate-400 font-medium">
                                {{ $user->created_at->diffForHumans() }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-6 text-center text-slate-400 font-medium">No users registered yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
