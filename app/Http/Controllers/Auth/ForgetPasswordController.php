<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPasswordNotificationMail;
use App\Models\ChangePassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function form_admin()
    {
        return view('auth.forget_password.admin');
    }
      
    public function forget_admin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
        ]);

        $token = Str::random(64);

        ChangePassword::create([
            'email' => $request->email, 
            'token' => $token, 
            'user_type' => 'admin', 
            'created_at' => Carbon::now()
        ]);

        // Mail::send('emails.forget_password', ['token' => $token, 'user_type' => 'admin'], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });
        $details = [
            'token' => $token,
            'user_type' => 'admin',
        ];
        Mail::to($request->email)->send(new ForgetPasswordNotificationMail($details));

        // return back()->with('message', 'We have e-mailed your password reset link!');
        // return redirect()->route('auth.reset_password.form_admin', $token)->with('result', ['success', 'Please Enter Your New Password']);
        return redirect()->route('auth.forget_password.form_admin')->with('result', ['success', 'Please Check Your Email']);
    }
    public function form_staff()
    {
        return view('auth.forget_password.staff');
    }
      
    public function forget_staff(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:staff',
        ]);

        $token = Str::random(64);

        ChangePassword::create([
            'email' => $request->email, 
            'token' => $token, 
            'user_type' => 'staff', 
            'created_at' => Carbon::now()
        ]);
        $details = [
            'token' => $token,
            'user_type' => 'staff',
        ];
        Mail::to($request->email)->send(new ForgetPasswordNotificationMail($details));

        // Mail::send('emails.forget_password', ['token' => $token, 'user_type' => 'staff'], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });

        // return back()->with('message', 'We have e-mailed your password reset link!');
        // return redirect()->route('auth.reset_password.form_staff', $token)->with('result', ['success', 'Please Enter Your New Password']);
        return redirect()->route('auth.forget_password.form_staff')->with('result', ['success', 'Please Check Your Email']);
    }
}
