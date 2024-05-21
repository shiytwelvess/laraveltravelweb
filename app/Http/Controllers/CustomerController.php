<?php

namespace App\Http\Controllers;
use App\Http\Controllers\toastr;
use App\Http\Requests\CapNhatRequest;
use App\Http\Requests\createLoginRequest;
use App\Http\Requests\createRegisterRequest;
use App\Http\Requests\createResetPasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Jobs\sendMailActiveAccountJob;
use App\Models\ChiTietDonDatTour;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Hoadonkhachsan;
use App\Models\Hoadontour;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function active($hash)
    {
        $acc = Customer::where('hash_mail', $hash)->first();
        if($acc) {
            $acc->trangThai = 1;
            $acc->save();
        }

        toastr()->success('Đã kích hoạt tài khoản thành công');
        return redirect('/');
    }

    //register client
    public function viewRegister()
    {
        return view('client.register');
    }

    public function dataRegister()
    {
        $data = Customer::get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function storeRegister(createRegisterRequest $request)
    {
        $data = $request->all();
        $hash = Str::uuid();
        // dd($hash);
        $data['hash_mail'] = $hash;
        $data['password'] = bcrypt($request->password);

        Customer::create($data);
        $datamail['hash_mail']  = $hash;
        $datamail['hoTen']  = $request->hoTen;
        $datamail['email']  = $request->email;
        // dd($datamail);
        // for($i = 0; $i < 10;$i++) {

        // }
        sendMailActiveAccountJob::dispatch($datamail);

        return redirect('/login');
    }

    //login client
    public function viewLogin()
    {
        return view('client.login');
    }
    public function actionLogin(createLoginRequest $request)
    {
        $data['email']      = $request->email;
        $data['password']   = $request->password;
        Auth::guard('customer')->attempt($data);
        $check = Auth::guard('customer')->check();
        if($check) {
            $customer = Auth::guard('customer')->user();
            if($customer->trangThai == -1) {
                toastr()->error("Tài khoản đã bị khóa!");
                Auth::guard('customer')->logout();
            } else if($customer->trangThai == 0) {
                toastr()->warning("Tài khoản chưa được kích hoạt!");
                Auth::guard('customer')->logout();
            } else {
                toastr()->success("Đã đăng nhập thành công!");
                return redirect('/');
            }
        } else {
            toastr()->error("Tài khoản hoặc mật khẩu không đúng!");
        }

        return redirect()->back();
    }

    //View quên mật khẩu và xữ lý xác nhận mật khẩu
    public function viewResetPassword(){
        return view('client.quen_mat_khau');
    }


    public function actionResetPassword(createResetPasswordRequest $request){
        $customer = Customer::where('email', $request->email)->first();
        $hash     = Str::uuid();


        $customer->hash_reset = $hash;

        $customer->save();

         toastr()->success('Xác Nhận Thành Công email');

        return redirect('/update-password/'.$hash);

    }
    //Hiển thị view và Xữ lý cập nhật lại mật khẩu
    public function viewUpdatePassword($hash){
        $customer = Customer::where('hash_reset', $hash)->first();

        if($customer) {
            return view('client.cap_nhat_mat_khau', compact('hash'));
        } else {
            toastr()->error('Liên kết không tồn tại!');
            return redirect('/');
        }

    }
    public function actionUpdatePassword(UpdatePasswordRequest $request){
        // dd($request->all());
        $customer = Customer::where('hash_reset', $request->hash_reset)->first();

        $customer->hash_reset = '';
        $customer->password = bcrypt($request->password);
        $customer->save();

        toastr()->success('Đã cập nhật mật khẩu thành công!');

        return redirect('/login');
    }

    //Thay Đổi thông tin khách hàng

    public function viewThongTin()
    {
        return view('admin.khach_hang');
    }
    public function getData(){
        $data = Customer::get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function destroy(Request $request){
        $account = Customer::where('id', $request->id)->first();
        $account->delete();
    }
    public function update(Request $request){
        $data    = $request->all();
        $account = Customer::where('id', $request->id)->first();
        $account->update($data);
        return redirect()->json([
            'account' => $account
        ]);
    }
    public function changeStatus($id){
        $change = Customer::where('id',$id)->first();

        if($change->trangThai == 1){
            $change->trangThai = -1;
        }else if($change->trangThai == -1){
            $change->trangThai = 0;
        }else{
            $change->trangThai =1;
        }
        $change->save();
    }

    //end
    // Đăng Xuất tài khoản
    public function actionLogout()
    {
        Auth::guard('customer')->logout();
        toastr()->warning('Tài Khoản Đã Thoát');
        return redirect('/');
    }
    // cập nhật Thông tin cá Nhân

    public function viewCapNhapThongTin()
    {

        return view('client.profile');
    }

    public function capNhapThongTin(CapNhatRequest $request)
    {
        $data = $request->all();
        $id = Auth::guard('customer')->user()->id;
        $user = Customer::find($id);
        $user->update($data);

        $hoaDonTour = Hoadontour::where('idCustomer', $id)->get();
        foreach($hoaDonTour as $key => $value) {
            $value->hoTen = $user->hoTen;
            $value->save();
        }

        $hoaDonKhachSan = HoaDonKhachSan::where('idCustomer', $id)->get();
        foreach($hoaDonKhachSan as $key => $value) {
            $value->hoTen = $user->hoTen;
            $value->save();
        }

        toastr()->success("Đã cập nhập thông tin thành công!!");

        return redirect()->back();
    }
    //end
    // bill khách sạn
    public function viewHoaDon()
    {
        return view('client.bill_khach_san');
    }
    public function getDataHoaDon()
    {
        $user = Auth::guard('customer')->user()->id;
        // dd($user);
        $data = HoaDonKhachSan::join('customers', 'hoadonkhachsans.idCustomer', 'customers.id')
                              ->join('khachsans', 'hoadonkhachsans.idKhachSan', 'khachsans.id')
                              ->where('hoadonkhachsans.idCustomer', $user)
                              ->get();

        return response()->json([
            'data' => $data
        ]);
    }

}
