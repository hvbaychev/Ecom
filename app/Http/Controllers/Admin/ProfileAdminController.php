<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileAdminRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class ProfileAdminController extends Controller
{
    public function edit(){
        return view('admin.profile.admin');
    }


    public function updateNameMail(ProfileAdminRequest $request){
        $user = User::find(Session::get('loginId'));

        $user->update($request->only('first_name', 'last_name', 'email'));
        if($user){
        return redirect()->back()->with('profile_success', 'Profile updated successfully.');
        }else{
            return redirect()->back()->with('profile_fail', 'Profile update failed. Please try again.');
        }
    }

    public function editPass(){
        return view('admin.profile.admin');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/',
            'password_confirmation' => 'required_with:password|same:password|min:6',
        ]);

        $user = User::find(Session::get('loginId'));

        if (!Hash::check($request->input('old_password'), $user->password)) {
            return redirect()->back()->with('fail', 'Invalid current password.');
        }

        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully.');
    }

}

