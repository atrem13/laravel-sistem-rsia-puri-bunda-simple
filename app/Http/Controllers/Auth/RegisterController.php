<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Occupation;
use App\Models\Unit;
use App\Models\Worker;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    use AuthenticatesUsers;
    public function form_admin() {
        return view('auth.register.admin');
    }

    public function register_admin(Request $request) {
        $request->validate(
            [
                'username' => 'required|unique:admins,username',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'name' => 'required|unique:admins,name',
                'address' => 'required',
                'phone_number' => 'required|unique:admins,phone_number',
                'email' => 'required|unique:admins,email',
                'myimg' =>'required|mimes:jpeg,png|max:2048',
            ], [],
            [
                'username' => 'Username',
                'password' => 'Password',
                'password_confirmation' => 'Konfirmasi Password',
                'name' => 'Nama',
                'address' => 'Alamat',
                'phone_number' => 'Nomor Telepon',
                'email' => 'Email',
                'myimg' => 'Gambar',
            ]);
 
        DB::beginTransaction();
        try{
            if ($request->hasFile('myimg')) {
                $img_name = insertImg('upload/admin/admin/');
                $request['img'] = $img_name;
            }
            $admin = Admin::create($request->all());
            DB::commit();
            return redirect()->route('auth.login.form_admin')->with('result', ['success', 'Data #'.$admin->name.' Berhasil Ditambahkan.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }
    public function form_worker() {
        $occupation = Occupation::orderBy('name', 'ASC')->get();
        $unit = Unit::orderBy('name', 'ASC')->get();
        return view('auth.register.worker', compact('occupation', 'unit'));
    }

    public function register_worker(Request $request) {
        $request->validate(
            [
                'username' => 'required|unique:workers,username',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'name' => 'required|unique:workers,name',
                'address' => 'required',
                'phone_number' => 'required|unique:workers,phone_number',
                'email' => 'required|unique:workers,email',
                'myimg' =>'required|mimes:jpeg,png|max:2048',
                'join_date' =>'required',
                'units' => 'required|array',
                'first_occupation_id' => 'required',
            ], [],
            [
                'username' => 'Username',
                'password' => 'Password',
                'password_confirmation' => 'Konfirmasi Password',
                'name' => 'Nama',
                'address' => 'Alamat',
                'phone_number' => 'Nomor Telepon',
                'email' => 'Email',
                'myimg' => 'Gambar',
                'join_date' =>'Tanggal Bergabung',
                'units' => 'Unit',
                'first_occupation_id' => 'Jabatan Pertama',
            ]);
 
        DB::beginTransaction();
        try{
            if ($request->hasFile('myimg')) {
                $img_name = insertImg('upload/admin/worker/');
                $request['img'] = $img_name;
            }
            $worker = Worker::create($request->all());
            $worker->units()->attach($request->units);
            DB::commit();
            return redirect()->route('auth.login.form_worker')->with('result', ['success', 'Data #'.$worker->name.' Berhasil Ditambahkan.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }


}
