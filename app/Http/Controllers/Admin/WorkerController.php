<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Occupation;
use App\Models\Unit;
use App\Models\Worker;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class WorkerController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()){
            $data = Worker::orderBy('name', 'DESC')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        return actionBtn('Worker', route('admin.worker.index'), route('admin.worker.show', $data->id), route('admin.worker.edit', $data->id), route('admin.worker.destroy', $data->id));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $occupation = Occupation::orderBy('name', 'ASC')->get();
        $unit = Unit::orderBy('name', 'ASC')->get();
        return view('admin.worker.index', compact('occupation', 'unit'));
    }

    public function create(){
        return view('admin.worker.create');
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
            return redirect()->back()->with('result', ['success', 'Data #'.$worker->name.' Berhasil Ditambahkan.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }

    public function show(Worker $worker, Request $request) {
        return view('admin.worker.show', ['data' => $worker]);
    }

    public function edit(Worker $worker) {
        // return $worker->units;
        $occupation = Occupation::orderBy('name', 'ASC')->get();
        $unit = Unit::orderBy('name', 'ASC')->get();
        return view('admin.worker.edit', ['data' => $worker, 'occupation' => $occupation, 'unit' => $unit]);
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
                'units' => 'required|array',
                'first_occupation_id' => 'required',
            ], [],
            [
                'username' => 'Username',
                'name' => 'Nama',
                'address' => 'Alamat',
                'phone_number' => 'Nomor Telepon',
                'email' => 'Email',
                'myimg' => 'Gambar',
                'units' => 'Unit',
                'first_occupation_id' => 'Jabatan Pertama',
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
                $request['img'] = updateImg('upload/admin/worker/', $worker->img);
            }
            
            if($request->password && $request->password_confirmation){
                $worker->update($request->all());
            }else{  
                $worker->update($request->except(['password']));
            }
            $worker->units()->sync($request->units);
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
            // deleteImg('upload/admin/worker/', $worker->img);

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
