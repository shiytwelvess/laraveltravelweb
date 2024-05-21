<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiaDiemRequest;
use App\Models\DiaDiem;
use Illuminate\Http\Request;

class DiaDiemController extends Controller
{
    public function index(){
        return view('admin.dia_diem');
    }
    public function store(DiaDiemRequest $request){
        $data = $request->all();
        DiaDiem::create($data);
    }
    public function getData(){
        $data = DiaDiem::get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function destroy($id){
        $data = DiaDiem::where('id',$id)->first();
        $data->delete();
    }
    public function update(Request $request){
        $data = $request->all();
        $dia_diem = DiaDiem::where('id', $request->id)->first();
        $dia_diem->update($data);
    }

    public function viewDiaDiem(){
        $dia_diem = DiaDiem::orderByDESC('id')->get();
        return view('client.khampha' ,compact('dia_diem'));
    }

    public function viewDiaDiemDetail($id)
    {
        $dia_diem = DiaDiem::find($id);
        return view('client.chi_tiet_kham_pha', compact('dia_diem'));
    }
}
