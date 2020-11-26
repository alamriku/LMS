<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::paginate(5);
        return view('user.list', compact('users'));
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

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success','User Deleted');
    }
}
