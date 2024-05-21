<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createRegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'hoTen'               =>  'required|min:5|max:50|regex:/^[a-zA-Z\s]+$/',
            'email'                 =>  'required|email|unique:customers,email',
            'password'              =>  'required|min:6|max:30',
            'soDienThoai'           => 'required|digits:10|regex:/^[0-9]+$/',
            'diaChi'               =>  'required|min:5|max:50',
            'gioiTinh'             =>  'required|numeric|min:0|max:1',
            'ngaySinh'             =>  'required|date',
            // 'g-recaptcha-response'  => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'hoTen.*'             =>  'Họ và tên không chứa ký tự đặc biệt và từ 6 đến 50 ký tự',
            'email.email'             =>  'Email không đúng định dạng',
            'email.unique'            =>  'Email đã tồn tại',
            'password.*'              =>  'Mật khẩu phải từ 6 đến 30 ký tự',
            'soDienThoai.*'              =>  'Số điện thoại phải đủ 10 ký tự số',
            'diaChi.*'               =>  'Địa chỉ sai',
            'gioiTinh.*'             =>  'Giới tính phải chọn theo yêu cầu',
            'ngaySinh'               => 'required|date|before_or_equal:today|after_or_equal:1940-01-01',
            'g-recaptcha-response.*'  =>  'Vui lòng phải chọn vào recaptcha'
        ];
    }
}
