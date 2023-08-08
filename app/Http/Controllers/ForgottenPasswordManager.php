<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPassword;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;



class ForgottenPasswordManager extends Controller
{
    public function forgetPassword(){
        return view('forgottenPassword');
    }

    public function forgetPasswordPost(forgetPassword $request){
        $token = Str::random(64);



        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

         Mail::send('emails.forgetPassword', ['token' => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Password');
         });

        return back()->with('success', 'We have send an email to reset password');

    }

    public function resetPassword($token){
        return view('resetPassword', compact('token'));
    }

    public function resetPasswordPost(ForgetPassword $request)
    {


    $updatePassword = DB::table('password_resets')->where([
        "email" => $request->email,
        "token" => $request->token,
    ])->first();

    if (!$updatePassword){
        return redirect()->route('resetPassword', $request->token)->with('error', 'Invalid!');
    }

    User::where("email", $request->email)->update(["password" => Hash::make($request->password)]);

    DB::table('password_resets')->where(["email" => $request->email])->delete();

    return redirect()->route("login")->with("success", "Password reset success");
    }

}
