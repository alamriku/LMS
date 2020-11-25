<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(User $user)
    {
        return view('profile',compact('user'));
    }

    public function profileUpdate(ProfileRequest $request)
    {
             $request->validated();

            $profile=User::where('id', $request->id)->first();
            $profile->name=$request->name;
            $profile->email=$request->email;
            if($request->filled('password')){
                $profile->password=$request->password;
            }
           $profile->update();

           return redirect()->back()->with('success','Profile updated');
    }
}
