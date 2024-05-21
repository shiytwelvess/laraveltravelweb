<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Diadiem;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
   protected function index(){
         $config = Config::orderByDESC('id')->first();
         $danh_sach_dia_diem = Diadiem::where('trangThai', '=', 1)->get();
        return view('admin.config' ,compact('config','danh_sach_dia_diem'));
   }
   public function store(Request $request)
   {
       $data = $request->all();
       Config::create($data);
       toastr()->success('Cập Nhật Thành Công !!!');
       return redirect()->back();
   }
}
