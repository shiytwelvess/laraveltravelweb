<?php

namespace App\Http\Controllers;

use App\Models\Hoadonkhachsan;
use App\Models\Khachsan;
use Illuminate\Http\Request;

class HoaDonKhachSanController extends Controller
{
    public function taoChiTietHoaDon(Request $request)
    {
        // dd($request->all());
        $khach_san = Khachsan::find($request->idKhachSan);
        $tongTien = $request->soPhong * $khach_san->gia;
        if($request->soPhong >=2 && $request->soPhong <5) {
            $tongTien = $tongTien - ($tongTien * 0.05);
        } else if($request->soPhong >= 5 && $request->soPhong <10) {
            $tongTien = $tongTien - ($tongTien * 0.10);
        }else if($request->soPhong >=10) {
            $tongTien = $tongTien - ($tongTien * 0.15);
        }
        HoaDonKhachSan::create([
            'idKhachSan'      => $request->idKhachSan,
            'idCustomer'     => $request->id,
            'hoTen'         => $request->hoTen,
            'email'             => $request->email,
            'soDienThoai'     => $request->soDienThoai,
            'diaChi'           => $request->diaChi,
            'soPhong'          => $request->soPhong,
            'tongTien'         => $tongTien,
        ]);

        return response()->json([
            'status' => true,
            'message'=> 'Đã đặt Phòng  thành công'
        ]);
    }

}
