<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaiKhoanRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function actionLogin(Request $request)
    {
        $data['email']      = $request->email;
        $data['password']   = $request->password;
        $check = Auth::guard('admin')->attempt($data);
        if($check) {
            toastr()->success("Đã đăng nhập thành công!");
            return redirect('/admin/dia-diem/index');
        } else {
            toastr()->error("Tài khoản hoặc mật khẩu không đúng!");
            return redirect('/tai-khoan/index');
        }
    }

    public function viewNhanSu()
    {
        return view('admin.nhan_su');
    }

    public function getData()
    {
        $data = Admin::get();

        return response()->json([
            'data'  => $data
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        Admin::create($data);
    }
    
    public function deleteNhanSu(Request $request){
        $acc = Admin::where('id',$request->id)->first();
        $acc->delete();
    }
    public function changeStatus($id){
        $acc = Admin::where('id',$id)->first();
        if($acc->is_block == 0){
            $acc->is_block = 1 ;
        }else{
            $acc->is_block = 0 ;
        }
        $acc->save();
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        toastr()->error('Tài Khoản Đã Thoát');
        return redirect('/tai-khoan/index');
    }
}
