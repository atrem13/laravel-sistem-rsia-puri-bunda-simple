<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Occupation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class OccupationController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()){
            $data = Occupation::orderBy('name', 'DESC')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        return actionBtn('Jabatan', route('admin.occupation.index'), route('admin.occupation.show', $data->id), route('admin.occupation.edit', $data->id), route('admin.occupation.destroy', $data->id));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.occupation.index');
    }

    public function create(){
        return view('admin.occupation.create');
    }

    public function store(Request $request) {
        $request->validate(
            [
                'name' => 'required|unique:occupations,name',
            ], [],
            [
                'name' => 'Nama',
            ]);
 
        DB::beginTransaction();
        try{
            $occupation = Occupation::create($request->all());
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$occupation->name.' Berhasil Ditambahkan.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }

    public function show(Occupation $occupation) {
        return view('admin.occupation.show', ['data' => $occupation]);
    }

    public function edit(Occupation $occupation) {
        return view('admin.occupation.edit', ['data' => $occupation]);
    }

    public function update(Request $request, Occupation $occupation) {
        $request->validate(
            [
                'name' => 'required|unique:occupations,name,'. $occupation->id,
            ], [],
            [
                'name' => 'Nama',
            ]);

        DB::beginTransaction();
        try{
            $occupation->update($request->all());
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$occupation->name.' Berhasil Diperbaharui.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }

    public function destroy(Request $request, Occupation $occupation) {
        DB::beginTransaction();
        try {
            $occupation->delete();
            DB::commit();
            $result = 'Data #'.$occupation->name.' Berhasil Dihapus.';
            $request->session()->flash('result', ['success', $result]);
            return response()->json(['status' => 1, 'text' => $result]);
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }


}
