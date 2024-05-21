<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Diadiem;
use App\Models\Tour;
use App\Models\Khachsan;
use App\Models\Baiviet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        // dd(Auth::guard('customer')->check());
        $config = Config::orderByDESC('id')->first();
        $list_dia_diem = Diadiem::where('trangThai' , '=' , 1)->get();
        $list_goi_tour = Tour::orderByDESC('id')->get();
        $list_khach_san = Khachsan::orderByDESC('id')->get();
        if($config){
            $dia_diem = Diadiem::where('id', $config->dia_diem)->first();
            $dia_diem_1 = Diadiem::where('id', $config->dia_diem_1)->first();
            $dia_diem_2 = Diadiem::where('id', $config->dia_diem_2)->first();
            return view('client.trang_chu', compact('config','list_dia_diem','dia_diem','dia_diem_1','dia_diem_2','list_goi_tour','list_khach_san'));
        }
        return view('client.trang_chu', compact('list_dia_diem','list_goi_tour','list_khach_san'));
    }

    public function lienHe(){
        return view('client.lien_he');
    }

    // public function viewChiTietTuor(){
    //     $goi_tour = GoiTour::orderByDESC('id')->first();
    //     return view('client.chi_tiet_tour' , compact('goi_tour'));
    // }

        public function search(Request $request){
        $search = $request->search;
        $list_tour = Tour::where('tenTour' , 'like' , '%' . $search . '%')
                                ->get();

        return view('client.tra_ve_tim_kiem_cua_tour' , compact('list_tour'));
    }
    public function chiTietTour($slug)
    {
        $parts = explode('-', $slug);
        preg_match('/\d+$/', $slug, $matches);
        $id = $matches[0];
        $tour = Tour::where('id' , $id)->first();
        $list_tour = Tour::where('id', $id)
                              ->where('thoiGianBatDau', '>=', Carbon::now()->toDateTimeString())
                              ->get();

        return view('client.chi_tiet_tour' , compact('tour', 'list_tour'));
    }
    public function chiTietKhachSan($slug)
    {
        $parts = explode('-', $slug);
        preg_match('/\d+$/', $slug, $matches);
        $id = $matches[0];
        $khach_san = Khachsan::where('id' , $id)->first();
        // dd($id);
        $check = Auth::guard('customer')->user();
        $tim = 0;
        $list_yeu_thich = explode(',', $khach_san->khach_hang_yeu_thich);
        if($check){
            foreach($list_yeu_thich as $key => $value) {
                if($value == $check->id) $tim = 1;
            }
        }

        return view('client.chi_tiet_khach_san' , compact('khach_san', 'tim', 'check'));
    }
    public function viewYeuThich()
    {
        return view('client.yeu_thich');
    }
}
