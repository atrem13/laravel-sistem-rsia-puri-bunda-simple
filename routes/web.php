<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(auth()->guard('admin')->check()){
        return redirect()->route('admin.admin.index');
    }
    else if(auth()->guard('worker')->check()){
        return redirect()->route('worker.worker.index');
    }
    else{
        return redirect()->route('landing.index');
    }
});

Route::get('/landing', 'LandingController@index')->name('landing.index');

// AUTH
Route::namespace('Auth')->prefix('secure/auth/')->name('auth.')->group(function() {
    // REGISTER
    Route::prefix('register/')->name('register.')->group(function() {
        Route::get('/admin', 'RegisterController@form_admin')->name('form_admin');
        Route::post('/admin', 'RegisterController@register_admin')->name('register_admin');
        Route::get('/worker', 'RegisterController@form_worker')->name('form_worker');
        Route::post('/worker', 'RegisterController@register_worker')->name('register_worker');
    });
    // LOGIN
    Route::prefix('login/')->name('login.')->group(function() {
        Route::get('/admin', 'LoginController@form_admin')->name('form_admin');
        Route::post('/admin', 'LoginController@login_admin')->name('login_admin');
        Route::get('/worker', 'LoginController@form_worker')->name('form_worker');
        Route::post('/worker', 'LoginController@login_worker')->name('login_worker');
    }); 

    // LOGOUT
    Route::get('/logout', 'LogoutController@logout')->name('logout');

    // Forget Password
    // Route::prefix('forget_password/')->name('forget_password.')->group(function() {
    //     Route::get('/admin', 'ForgetPasswordController@form_admin')->name('form_admin');
    //     Route::post('/admin', 'ForgetPasswordController@forget_admin')->name('forget_admin');
    // }); 

    // Reset Password
    // Route::prefix('reset_password/')->name('reset_password.')->group(function() {
    //     Route::get('/admin/{token}', 'ResetPasswordController@form_admin')->name('form_admin');
    //     Route::post('/admin', 'ResetPasswordController@reset_admin')->name('reset_admin');
        
    // });
});

// admin - logged
Route::namespace('Admin')->prefix('admin/')->name('admin.')->group(function() {
    Route::middleware('IsAdmin')->group(function() {
        Route::resource('dashboard', 'DashboardController');
        Route::resource('admin', 'AdminController');
        Route::resource('worker', 'WorkerController');
        Route::resource('unit', 'UnitController');
        Route::resource('occupation', 'OccupationController');

        // IMPORT DATA
        Route::prefix('import')->name('import.')->group(function () {
            // admin
            Route::get('admin', 'AdminController@form_import')->name('form_admin');
            Route::post('admin', 'AdminController@import')->name('admin');
        });

        // EXPORT DATA
        Route::prefix('export')->name('export.')->group(function () {
            Route::get('admin', 'AdminController@export')->name('admin');
        });
    });
});

// worker - logged
Route::namespace('Worker')->prefix('worker/')->name('worker.')->group(function() {
    Route::middleware('IsWorker')->group(function() {
        Route::resource('dashboard', 'DashboardController');
        Route::resource('worker', 'WorkerController');
    });
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
