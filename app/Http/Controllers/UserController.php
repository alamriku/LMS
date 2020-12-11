<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $user)
    {
        $this->middleware('auth');
        $this->userService = $user;
    }

    public function profile(User $user)
    {
        return view('profile', compact('user'));
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function profileUpdate(ProfileRequest $request)
    {
        $profile = $this->userService->getUser($request->id);
        $this->userService->updateUser($request, $profile);
        return redirect()->back()->with('success', 'Profile updated');
    }
}
