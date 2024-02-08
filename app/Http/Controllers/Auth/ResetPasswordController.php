<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ChangePassword;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function form_admin($token)
    {
        $changePassword = ChangePassword::where('token', $token)->first(); 
        return view('auth.reset_password.admin', ['token' => $token, 'data' => $changePassword]);
    }
      
    public function reset_admin(Request $request)
    {
       
        $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = ChangePassword::where([
                                'email' => $request->email, 
                                'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('result', ['error', 'Invalid Token']);
        }

        $user = Admin::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        $userChangePassword = ChangePassword::where(['email'=> $request->email])->delete();
        return redirect()->route('auth.login.form_admin')->with('result', ['success', 'Your Password has been changed']);
    }
    public function form_staff($token)
    { 
        $changePassword = ChangePassword::where('token', $token)->first(); 
        return view('auth.reset_password.staff', ['token' => $token, 'data' => $changePassword]);
    }
      
    public function reset_staff(Request $request)
    {
       
        $request->validate([
            'email' => 'required|email|exists:staff',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = ChangePassword::where([
                                'email' => $request->email, 
                                'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('result', ['error', 'Invalid Token']);
        }

        $user = Staff::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);
        $userChangePassword = ChangePassword::where(['email'=> $request->email])->delete();
        return redirect()->route('auth.login.form_staff')->with('result', ['success', 'Your Password has been changed']);
    }
}
