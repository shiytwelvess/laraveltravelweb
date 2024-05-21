<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachSanRequest;
use App\Models\Hoadonkhachsan;
use App\Models\Khachsan;
use Illuminate\Http\Request;

class KhachSanController extends Controller
{
   public function index(){
     return view('admin.khach_san');
   }
   public function store(KhachSanRequest $request){
    $data = $request->all();
    Khachsan::create($data);
   }
   public function getData(){
    $data = Khachsan::get();
    return response()->json([
        'data' => $data
    ]);
   }
   public function destroy(Request $request){
        $khach_san = Khachsan::where('id' , $request->id)->first();
        $khach_san->delete();
   }
   public function update(Request $request){
    $data=$request->all();
    $khach_san = Khachsan::where('id' , $request->id)->first();
    $khach_san->update($data);
}
public function viewKhachSan(){
    $khach_san = Khachsan::orderByDESC('id')->get();
    return view('client.khach_san' ,compact('khach_san'));
  }

  //Hóa Đơn Khách Sạn
  public function viewHoaDon()
  {
      return view('admin.hoa_don_khach_san');
  }
  public function getDataHoaDon()
  {
      $data = Hoadonkhachsan::get();
      return response()->json([
          'data' => $data
      ]);
  }
  public function destroyHoaDon(Request $request)
  {
      $hoa_don_khach_san = Hoadonkhachsan::where('id', $request->id)->first();
      $hoa_don_khach_san->delete();
  }
  public function updateHoaDon(Request $request)
  {
      $data = $request->all();
      $hoa_don_khach_san = Hoadonkhachsan::where('id', $request->id)->first();
      $hoa_don_khach_san->update($data);
  }
  public function changeStatus($id){
      $change = Hoadonkhachsan::where('id',$id)->first();
      if($change->trangThai == 0){
          $change->trangThai = 1;
      }else{
          $change->trangThai = 0;
      }
      $change->save();
  }
  //end
}
