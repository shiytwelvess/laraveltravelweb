<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachSanRequest extends FormRequest
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
            'tenKhachSan'         =>  'required',
            'diaChi'               =>  'required',
            'hinh_anh'              =>  'required',
            'moTa'                 =>  'required|min:10|max:2500',
            'loaiPhong'                =>  'required',
            'soGiuong'                =>  'required|numeric',
            'soNgay'               =>  'required|numeric',
            'soDem'                =>  'required|numeric',
            'gia'                => 'required|numeric',
            'lienLac'           => 'required|regex:/^[0-9]+$/',
            'trangThai'            =>  'required',

        ];
    }

    public function messages()
    {
        return [
            'tenKhachSan.*'       =>  'Chưa Nhập Tên Khách Hàng !!',
            'diaChi.*'             =>  'Chưa Nhập Địa Chỉ !!',
            'hinh_anh.*'            =>  'Chưa Chọn Hình Ảnh',
            'moTa.*'               =>  'Mô Tả Phải Trên 10  kí tự',
            'loaiPhong.*'                =>  'Chưa nhập số giường',
            'soGiuong.*'                =>  'Số Giường Sai',
            'soNgay.*'             =>  'Số Ngày Sai',
            'soDem.*'              =>  'Số Đêm Sai',
            'gia.*'              =>  'Giá Tour Sai',
            'lienLac.*'              =>  'Chưa Nhập Thông Tin Liên Lạc',
            'trangThai.*'          =>  'Chọn Tình Trạng',

        ];
    }
}
