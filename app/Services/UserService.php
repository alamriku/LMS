<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getUser($user)
    {
        return User::where('id', $user)->first();
    }

    public function updateUser($request, $profile)
    {
        $profile->name = $request->name;
        $profile->email = $request->email;
        if ($request->filled('password')) {
            $profile->password = Hash::make($request->password);
        }
        $profile->update();
    }

    public function storeUser($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role = User::ROLE_LIBRARIAN;
        $user->password = Hash::make($request->password);
        $user->save();
    }

    public function banUnban($user)
    {
        if ($user->is_banned) {
            $user->is_banned = 0;
        } else {
            $user->is_banned = 1;
        }
        $user->update();
    }
}
