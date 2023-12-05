<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserSet extends Controller
{
    public function PUpdate(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('body.profile_update', compact('user'));
            }
        }
    }

    public function UpdateProfile(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $user->name = $request['name'];
            $user->email = $request['email'];

            $user->save();
            return Redirect()->back()->with('success','User Profile is Update Succesfully');

        }else{
            return Redirect()->back();
        }
    }

    public function SPassword(){
        return view('body.setting_password');
    }

    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('succes', 'Passwor Is Change');
        }else{
            return redirect()->back()->with('error', 'Current Password Invalid');
        }
    }

}