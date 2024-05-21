<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonDatTour;
use App\Models\DiaDiem;
use App\Models\GoiTour;
use App\Models\Hoadontour;
use App\Models\Tour;
use Illuminate\Http\Request;

class ChiTietDonDatTourController extends Controller
{

    public function taoChiTietHoaDon(Request $request)
    {
        $goi_tour = Tour::find($request->idTour);
        $tongTien= $request->soVe * $goi_tour->gia;
        if($request->soVe >= 3 && $request->soVe <6)
        {
            $tongTien= $tongTien- ($tongTien* 0.1);
        } else if($request->soVe >= 6)
        {
            $tongTien= $tongTien- ($tongTien * 0.15);
        }
        Hoadontour::create([
            'idTour'       => $request->idTour,
            'idCustomer'     => $request->id,
            'hoTen'          => $request->hoTen,
            'email'              => $request->email,
            'soDienThoai'     => $request->soDienThoai,
            'diaChi'             => $request->diaChi,
            'soVe'           => $request->soVe,
            'tongTien'         => $tongTien,
        ]);

        return response()->json([
            'status' => true,
            'message'=> 'Đã đặt tour thành công'
        ]);
    }
}
