@extends('admin.layout')

@section('title', 'Users')
@section('page_title', 'Users')

@section('content')
<div class="space-y-4">
    <!-- Filters & Search Bar -->
    <div class="bg-white p-2.5 rounded-xl border border-slate-200 shadow-sm flex flex-col md:flex-row items-center justify-between gap-3">
        <!-- Search & Filter Forms -->
        <form action="{{ route('admin.users') }}" method="GET" class="w-full flex flex-col sm:flex-row gap-2.5">
            <div class="relative flex-1">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search by name, email or username..." 
                       class="w-full pl-9 pr-3 py-1.5 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
            </div>

            <div class="w-full sm:w-40">
                <select name="type" onchange="this.form.submit()" 
                        class="w-full px-2.5 py-1.5 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary transition bg-white">
                    <option value="">All Account Types</option>
                    <option value="normal" {{ request('type') === 'normal' ? 'selected' : '' }}>Traveler (Normal)</option>
                    <option value="partner" {{ request('type') === 'partner' ? 'selected' : '' }}>Partner (Local Expert)</option>
                    <option value="admin" {{ request('type') === 'admin' ? 'selected' : '' }}>Administrator</option>
                </select>
            </div>

            <button type="submit" class="py-1.5 px-4 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-blue-700 transition">
                Apply Filters
            </button>
            @if(request('search') || request('type'))
                <a href="{{ route('admin.users') }}" class="py-1.5 px-3 bg-slate-100 text-slate-600 rounded-lg text-xs font-semibold hover:bg-slate-200 transition text-center flex items-center justify-center">
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Users Table Card -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-100 text-slate-400 text-[10px] font-bold uppercase tracking-wider">
                        <th class="py-2 px-4">Name / Details</th>
                        <th class="py-2 px-4">Username</th>
                        <th class="py-2 px-4">Account Role</th>
                        <th class="py-2 px-4">Joined Date</th>
                        <th class="py-2 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($users as $user)
                    <tr class="hover:bg-slate-50/50 transition">
                        <!-- Name / Details -->
                        <td class="py-1.5 px-4 flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-slate-100 to-slate-200 text-slate-600 font-bold flex items-center justify-center text-[10px] shadow-inner flex-shrink-0">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            <div class="overflow-hidden">
                                <p class="font-semibold text-slate-800 text-xs truncate max-w-[150px]">{{ $user->name }}</p>
                                <p class="text-[10px] text-slate-400 truncate max-w-[180px]">{{ $user->email }}</p>
                                @if($user->phone_number)
                                    <p class="text-[9px] text-slate-400"><i class="fa-solid fa-phone text-[8px] mr-1"></i>{{ $user->phone_number }}</p>
                                @endif
                            </div>
                        </td>
                        <!-- Username -->
                        <td class="py-1.5 px-4 text-slate-600 font-medium">
                            {{ $user->username }}
                        </td>
                        <!-- Account Role -->
                        <td class="py-1.5 px-4">
                            @if($user->id === Auth::id())
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-rose-50 text-rose-700 border border-rose-100">
                                    <i class="fa-solid fa-shield-halved text-[8px]"></i> Active Admin
                                </span>
                            @else
                                @if($user->user_type === 'admin')
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-rose-50 text-rose-700 border border-rose-100">
                                        <i class="fa-solid fa-shield-halved text-[8px]"></i> Admin
                                    </span>
                                @elseif($user->user_type === 'partner')
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-amber-50 text-amber-700 border border-amber-100">
                                        <i class="fa-solid fa-handshake text-[8px]"></i> Partner
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                                        <i class="fa-solid fa-user text-[8px]"></i> Traveler
                                    </span>
                                @endif
                            @endif
                        </td>
                        <!-- Joined Date -->
                        <td class="py-1.5 px-4 text-[11px] text-slate-500 font-medium">
                            {{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}
                            <span class="block text-[9px] text-slate-400">{{ $user->created_at ? $user->created_at->diffForHumans() : '' }}</span>
                        </td>
                        <!-- Actions -->
                        <td class="py-1.5 px-4 text-center">
                            @if($user->id === Auth::id())
                                <span class="text-[10px] text-slate-400 italic">Self</span>
                            @else
                                <div class="flex items-center justify-center gap-0.5">
                                    <!-- Edit Button -->
                                    <button type="button" 
                                            onclick='openEditModal({!! json_encode([
                                                "id" => $user->id,
                                                "name" => $user->name,
                                                "username" => $user->username,
                                                "email" => $user->email,
                                                "user_type" => $user->user_type
                                            ]) !!})'
                                            class="p-1.5 text-slate-400 hover:text-primary hover:bg-blue-50 rounded-lg transition duration-150" 
                                            title="Edit User">
                                        <i class="fa-regular fa-pen-to-square text-base"></i>
                                    </button>
                                    
                                    <!-- Delete Button -->
                                    <button type="button" 
                                            onclick="openDeleteModal({{ $user->id }}, '{{ addslashes($user->name) }}')"
                                            class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition duration-150" 
                                            title="Delete User">
                                        <i class="fa-regular fa-trash-can text-base"></i>
                                    </button>
                                </div>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-slate-400 font-medium">
                            <i class="fa-solid fa-user-slash text-2xl mb-2 block text-slate-300"></i>
                            No users found matching the query.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        @if($users->hasPages())
            <div class="px-4 py-2.5 border-t border-slate-100 bg-slate-50/50">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Edit User Modal -->
<div id="edit-user-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeEditModal()"></div>

        <!-- Center modal content -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        
        <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full border border-slate-200">
            <form id="edit-user-form" method="POST" class="m-0">
                @csrf
                <div class="bg-white px-5 pt-5 pb-3">
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                        <h3 class="text-sm font-bold text-slate-800" id="modal-title">
                            <i class="fa-regular fa-pen-to-square text-primary mr-1.5"></i>Edit User Details
                        </h3>
                        <button type="button" onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600 transition">
                            <i class="fa-solid fa-xmark text-lg"></i>
                        </button>
                    </div>

                    <div class="mt-3 space-y-3">
                        <!-- Name -->
                        <div>
                            <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Full Name</label>
                            <input type="text" id="edit-name" name="name" required
                                   class="w-full px-2.5 py-1.5 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent focus:outline-none transition">
                        </div>

                        <!-- Username -->
                        <div>
                            <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Username</label>
                            <input type="text" id="edit-username" name="username" required
                                   class="w-full px-2.5 py-1.5 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent focus:outline-none transition">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Email Address</label>
                            <input type="email" id="edit-email" name="email" required
                                   class="w-full px-2.5 py-1.5 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent focus:outline-none transition">
                        </div>

                        <!-- Account Role -->
                        <div>
                            <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Account Role</label>
                            <select id="edit-role" name="user_type" required
                                    class="w-full px-2.5 py-1.5 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-primary focus:border-transparent focus:outline-none transition bg-white">
                                <option value="normal">Traveler (Normal)</option>
                                <option value="partner">Partner (Local Expert)</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="bg-slate-50 px-5 py-3 flex flex-row-reverse gap-2 border-t border-slate-100">
                    <button type="submit" class="py-1.5 px-4 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-blue-750 transition">
                        Save Changes
                    </button>
                    <button type="button" onclick="closeEditModal()" class="py-1.5 px-3 bg-white border border-slate-200 text-slate-600 rounded-lg text-xs font-semibold hover:bg-slate-50 transition">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Custom Delete Confirmation Modal -->
<div id="delete-user-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
                            Delete Account
                        </h3>
                        <div class="mt-1">
                            <p class="text-xs text-slate-500">
                                Are you sure you want to permanently delete the user account for <span id="delete-user-name" class="font-semibold text-slate-700"></span>? This action cannot be undone.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-slate-50 px-5 py-3 flex flex-row-reverse gap-2 border-t border-slate-100">
                <button type="button" onclick="submitDeleteForm()" class="py-1.5 px-4 bg-rose-600 text-white rounded-lg text-xs font-semibold hover:bg-rose-700 transition">
                    Yes, Delete User
                </button>
                <button type="button" onclick="closeDeleteModal()" class="py-1.5 px-3 bg-white border border-slate-200 text-slate-600 rounded-lg text-xs font-semibold hover:bg-slate-50 transition">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden Delete Form -->
<form id="global-delete-user-form" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

@push('scripts')
<script>
    let activeDeleteUserId = null;
    const adminPath = "{{ env('ADMIN_PATH', 'portal-tsh-78a9c2') }}";

    // Edit Modal Operations
    function openEditModal(user) {
        document.getElementById('edit-name').value = user.name;
        document.getElementById('edit-username').value = user.username;
        document.getElementById('edit-email').value = user.email;
        document.getElementById('edit-role').value = user.user_type;
        
        const form = document.getElementById('edit-user-form');
        form.action = `/${adminPath}/users/${user.id}`;
        
        const modal = document.getElementById('edit-user-modal');
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeEditModal() {
        const modal = document.getElementById('edit-user-modal');
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Delete Modal Operations
    function openDeleteModal(id, name) {
        activeDeleteUserId = id;
        document.getElementById('delete-user-name').textContent = name;
        
        const modal = document.getElementById('delete-user-modal');
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeDeleteModal() {
        activeDeleteUserId = null;
        const modal = document.getElementById('delete-user-modal');
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function submitDeleteForm() {
        if (!activeDeleteUserId) return;
        const form = document.getElementById('global-delete-user-form');
        form.action = `/${adminPath}/users/${activeDeleteUserId}`;
        form.submit();
    }
</script>
@endpush
@endsection
