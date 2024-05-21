<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoiTourRequest;
use App\Models\Customer;
use App\Models\Diadiem;
use App\Models\Hoadontour;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;


class GoiTuorController extends Controller
{
    public function index()
    {
        return view('admin.goi_tour');
    }

    public function store(GoiTourRequest $request)
    {
        $data = $request->all();
        Tour::create($data);
    }

    public function getData()
    {
        $data = Tour::join('diadiems', 'tours.idDiaDiem', 'diadiems.id')
            ->select('diadiems.tenDiaDiem', 'tours.*')
            ->get();
        return response()->json([
            'data'  => $data,
        ]);
    }

    public function destroy($id)
    {
        $data = Tour::where('id', $id)->first();
        $data->delete();
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $goi_tour = Tour::where('id', $request->id)->first();
        $goi_tour->update($data);
    }

    // Xữ lý hóa đơn gói tour

    public function viewHoaDon()
    {
        return view('admin.hoa_don_tour');
    }

    public function getDataHoaDon()
    {
        $data = Hoadontour::get();
        // $result = [];
        // foreach($data as $i)
        // {
        //     $p = $data[$i]->idCustomer;
        //     dd($p);
        // }
        return response()->json([
            'data' => $data
        ]);
    }
    public function destroyHoaDon(Request $request)
    {
        $hoa_don_tour = Hoadontour::where('id', $request->id)->first();
        $hoa_don_tour->delete();
    }
    public function updateHoaDon(Request $request)
    {
        $data = $request->all();
        $hoa_don_tour = Hoadontour::where('id', $request->id)->first();
        $hoa_don_tour->update($data);
    }
    //end
    public function changeStatus($id){
        $change = Hoadontour::where('id',$id)->first();
        if($change->trangThai == 0){
            $change->trangThai = 1;
        }else{
            $change->trangThai = 0;
        }
        $change->save();
    }

}
