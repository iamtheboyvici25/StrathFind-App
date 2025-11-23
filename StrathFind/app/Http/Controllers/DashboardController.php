<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LostItem;
use App\Models\Claim;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    // Admin only: Manage users
    public function manageUsers()
    {
        $users = User::with('role')->get();
        return view('admin.users', compact('users'));
    }

    // Admin only: Manage items
    public function manageItems()
    {
        $items = LostItem::with('finder')->get();
        return view('admin.items', compact('items'));
    }

    // Staff only: Verify claims
    public function verifyClaims()
    {
        $claims = Claim::with(['item', 'claimer'])->where('status', 'pending')->get();
        return view('staff.verify', compact('claims'));
    }
}