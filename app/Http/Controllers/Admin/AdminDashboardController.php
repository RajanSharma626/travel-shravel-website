<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'normal_users' => User::where('user_type', 'normal')->count(),
            'partner_users' => User::where('user_type', 'partner')->count(),
            'admin_users' => User::where('user_type', 'admin')->count(),
        ];

        // Recent 5 registered users
        $recentUsers = User::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentUsers'));
    }

    /**
     * Display users list with search and filter.
     */
    public function users(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('username', 'like', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $query->where('user_type', $request->input('type'));
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.users', compact('users'));
    }

    /**
     * Update user type.
     */
    public function updateUserType(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Prevent self-demotion or self-change of admin role to keep system safe
        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot change your own user type/role.');
        }

        $request->validate([
            'user_type' => 'required|in:normal,partner,admin',
        ]);

        $user->user_type = $request->input('user_type');
        $user->save();

        return back()->with('success', "User '{$user->name}' role successfully updated to '{$user->user_type}'.");
    }

    /**
     * Update user details and role.
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'user_type' => 'required|in:normal,partner,admin',
        ]);

        // Prevent self-demotion or self-change of admin role to keep system safe
        if ($user->id === Auth::id() && $request->input('user_type') !== 'admin') {
            return back()->with('error', 'You cannot demote yourself from the admin role.');
        }

        $user->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'user_type' => $request->input('user_type'),
        ]);

        return back()->with('success', "User '{$user->name}' was successfully updated.");
    }

    /**
     * Delete a user.
     */
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot delete your own admin account.');
        }

        $user->delete();

        return back()->with('success', "User '{$user->name}' was successfully deleted.");
    }
}

