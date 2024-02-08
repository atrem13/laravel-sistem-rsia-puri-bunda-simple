<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LogoutController extends Controller
{
    
    use AuthenticatesUsers;
    public function logout() {
        auth()->guard('admin')->logout();
        auth()->guard('worker')->logout();
        return redirect()->route('landing.index');
    }
}
