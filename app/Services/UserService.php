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
}
