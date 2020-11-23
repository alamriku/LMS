<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function profileUpdate(Request $request){
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'sometimes|confirmed'
            ]);

            if($validator->fails()){
                return redirect(route('profile',$request->id))->withErrors($validator);
            }
            $profile=User::where('id',$request->id)->first();
            $profile->name=$request->name;
            $profile->email=$request->email;
            if($request->filled('password')){
                dd('test');
                $profile->password=$request->password;
            }
           $profile->update();
            if($profile->wasChanged()){
                return redirect()->back()->with('success','Profile updated');
            }else{
                return redirect()->back()->with('success','nothing updated');
            }



    }
}
