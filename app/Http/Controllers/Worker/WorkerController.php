<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Worker;
use App\Models\WorkerGroup;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class WorkerController extends Controller
{
    public function index(Request $request) {
        return redirect()->route('worker.worker.edit', auth()->guard('worker')->user()->id);
    }

    public function create(){
        return view('worker.worker.create');
    }

    public function store(Request $request) {
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
                $img_name = insertImg('upload/worker/worker/');
                $request['img'] = $img_name;
            }
            $worker = Worker::create($request->all());
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$worker->name.' Berhasil Ditambahkan.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }

    public function show(Worker $worker, Request $request) {
        return view('worker.worker.show', ['data' => $worker]);
    }

    public function edit(Worker $worker) {
        return view('worker.worker.edit', ['data' => $worker]);
    }

    public function update(Request $request, Worker $worker) {
        $request->validate(
            [
                'username' => 'required|unique:workers,username,' . $worker->id,
                'name' => 'required|unique:workers,name,'. $worker->id,
                'address' => 'required',
                'phone_number' => 'required|unique:workers,phone_number,'. $worker->id,
                'email' => 'required|unique:workers,email,'. $worker->id,
                'myimg' =>'nullable|mimes:jpeg,png|max:2048',
            ], [],
            [
                'username' => 'Username',
                'name' => 'Nama',
                'address' => 'Alamat',
                'phone_number' => 'Nomor Telepon',
                'email' => 'Email',
                'myimg' => 'Gambar',
            ]);
            if($request->password || $request->password_confirmation){
                $request->validate(
                    [
                        'password' => 'required|confirmed',
                        'password_confirmation' => 'required',
                    ], [],
                    [
                        'password' => 'Password',
                        'password_confirmation' => 'Konfirmasi Password',
                    ]);
            }

        DB::beginTransaction();
        try{
            if ($request->hasFile('myimg')) {
                $request['img'] = updateImg('upload/worker/worker/', $worker->img);
            }
            
            if($request->password && $request->password_confirmation){
                $worker->update($request->all());
            }else{
                $worker->update($request->except(['password']));
            }
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$worker->name.' Berhasil Diperbaharui.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }

    public function destroy(Request $request, Worker $worker) {
        DB::beginTransaction();
        try {
            // deleteImg('upload/worker/worker/', $worker->img);

            $worker->delete();
            DB::commit();
            $result = 'Data #'.$worker->name.' Berhasil Dihapus.';
            $request->session()->flash('result', ['success', $result]);
            return response()->json(['status' => 1, 'text' => $result]);
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }


}
