<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class HomeController extends Controller
{
    public function showchangepasswordform(){
        $active = 'change-password';
        return view('admin.changepassword',compact('active'));
    }

    public function changepassword(Request $request){
        $active = 'change-password';
        $this->validate($request,[
            'current_password'=>'required',
            'password'=>'required|min:8',
            'password_confirmation'=>'required|same:password'
        ],[
            'password_confirmation.same'=> "Confirm Password does not match with New Password. Please try again!",
        ]);
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }
        if ((Hash::check($request->get('password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password and old password same please enter different.");
        }     
        
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with("success","Your password has been updated successfully!");
    }

    public function changeProfile(){
        $active = "change-profile";
        return view('admin.changeprofile',compact("active"));
    }

    public function profileUpdate(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'name'=>'required'
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->save();
        return redirect()->back()->with("success",'Profile Updated successfully');
    }
}
