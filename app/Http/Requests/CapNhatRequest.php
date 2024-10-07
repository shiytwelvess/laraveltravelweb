<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CapNhatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'hoTen'               =>  'required|min:5|max:50|regex:/^[a-zA-Z\s]+$/',
            'soDienThoai'           => 'required|digits:10|regex:/^[0-9]+$/',
            'diaChi'               =>  'required|min:6|max:50',
            'gioiTinh'             =>  'required',
            'ngaySinh'               => 'required|date|before_or_equal:today|after_or_equal:1940-01-01',
        ];
    }

    public function messages()
    {
        return [
            'hoTen.*'             =>  'Họ và tên không chứa ký tự đặc biệt và từ 6 đến 50 ký tự',
            // 'email.*'                 =>  'Vui lòng nhập gmail !!',
            'email.email'             =>  'Email không đúng định dạng',
            'soDienThoai.*'              =>  'Số điện thoại phải đủ 10 ký tự số',
            'diaChi.*'               =>  'Địa chỉ sai',
            'gioiTinh.*'             =>  'Giới tính phải chọn theo yêu cầu',
            'ngaySinh.before_or_equal' => 'Ngày sinh phải nhỏ hơn hoặc bằng ngày hiện tại.',
            'ngaySinh.after_or_equal' => 'Ngày sinh phải lớn hơn hoặc bằng năm 1940.',
        ];
    }
}
