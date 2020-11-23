<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile($id){
        $user = User::where('id',$id)->first();
        return view('profile',compact('user'));
    }
}
