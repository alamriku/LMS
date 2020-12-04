<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate(5);
        return view('admin.user.list', compact('users'));
    }

    public function ban(User $user)
    {
        if ($user->is_banned == User::BANNED) {
            $user->is_banned = 0;
        } else {
            $user->is_banned = 1;
        }
        $user->update();
        return redirect()->back()->with('success', 'User Status Changed');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User Deleted');
    }
}
