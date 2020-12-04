<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function profileUpdate(ProfileRequest $request)
    {

        $profile = User::where('id', $request->id)->first();
        $profile->name = $request->name;
        $profile->email = $request->email;
        if ($request->filled('password')) {
            $profile->password = Hash::make($request->password);
        }
        $profile->update();
        return redirect()->back()->with('success', 'Profile updated');
    }
}
