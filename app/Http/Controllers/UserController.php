<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(User $user)
    {
        return view('profile', compact('user'));
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function profileUpdate(ProfileRequest $request, UserService $action)
    {
        $profile = $action->getUser($request->id);
        $action->updateUser($request, $profile);
        return redirect()->back()->with('success', 'Profile updated');
    }
}
