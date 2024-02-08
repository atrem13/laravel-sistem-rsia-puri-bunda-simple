<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UnitController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()){
            $data = Unit::orderBy('name', 'DESC')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        return actionBtn('Unit', route('admin.unit.index'), route('admin.unit.show', $data->id), route('admin.unit.edit', $data->id), route('admin.unit.destroy', $data->id));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.unit.index');
    }

    public function create(){
        return view('admin.unit.create');
    }

    public function store(Request $request) {
        $request->validate(
            [
                'name' => 'required|unique:units,name',
            ], [],
            [
                'name' => 'Nama',
            ]);
 
        DB::beginTransaction();
        try{
            $unit = Unit::create($request->all());
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$unit->name.' Berhasil Ditambahkan.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }

    public function show(Unit $unit) {
        return view('admin.unit.show', ['data' => $unit]);
    }

    public function edit(Unit $unit) {
        return view('admin.unit.edit', ['data' => $unit]);
    }

    public function update(Request $request, Unit $unit) {
        $request->validate(
            [
                'name' => 'required|unique:units,name,'. $unit->id,
            ], [],
            [
                'name' => 'Nama',
            ]);

        DB::beginTransaction();
        try{
            $unit->update($request->all());
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$unit->name.' Berhasil Diperbaharui.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }

    public function destroy(Request $request, Unit $unit) {
        DB::beginTransaction();
        try {
            $unit->delete();
            DB::commit();
            $result = 'Data #'.$unit->name.' Berhasil Dihapus.';
            $request->session()->flash('result', ['success', $result]);
            return response()->json(['status' => 1, 'text' => $result]);
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }


}
