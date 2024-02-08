<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\WorkerLoginHistory;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function form_admin() {
        if(auth()->guard('admin')->user()){
            return redirect()->route('admin.dashboard.index');
        }
        return view('auth.login.admin');
    }

    public function login_admin(Request $request) {
        if (auth()->guard('admin')->attempt($request->only('username', 'password'))) {
            return redirect()->route('admin.dashboard.index');
        } else {
            return redirect()->back()->withInput()->with('result', ['success', 'Login failed, please try again!']);
        }
    }

    public function form_worker() {
        if(auth()->guard('worker')->user()){
            return redirect()->route('worker.dashboard.index');
        }
        return view('auth.login.worker');
    }

    public function login_worker(Request $request) {
        if (auth()->guard('worker')->attempt($request->only('username', 'password'))) {
            WorkerLoginHistory::create(['worker_id' => auth()->guard('worker')->user()->id]);
            return redirect()->route('worker.dashboard.index');
        } else {
            return redirect()->back()->withInput()->with('result', ['success', 'Login failed, please try again!']);
        }
    }


}
