<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoiTourRequest extends FormRequest
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
            'idDiaDiem'           =>  'required',
            'tenTour'          =>  'required',
            'hinh_anh'              =>  'required',
            'moTa'                 =>  'required',
            'thoiGianBatDau'     =>  'required|date|after:tomorrow',
            'thoiGianKetThuc'    =>  'required|date|after:tomorrow',
            'gia'                => 'required|numeric',
            'trangThai'           => 'required',
            'diemDon'              =>  'required',

        ];
    }

    public function messages()
    {
        return [
            'idDiaDiem.*'        =>  'Chưa  Chọn Địa Điểm !!',
            'tenTour.*'       =>  'Chưa Nhập Tên Gói Tour !!',
            'hinh_anh.*'           =>  'Chưa Chọn Hình Ảnh',
            'moTa.*'              =>  'Chưa Nhập Mô Tả',
            'thoiGianBatDau.*'  =>  'Hãy Chọn Thời Gian Bắt Đầu Và Lớn Hơn Bây Giờ 1 Ngày',
            'thoiGianKetThuc.*' =>  'Hãy Chọn Thời Gian Kết Thúc Và Lớn Hơn Bây Giờ 1 Ngày ',
            'gia.*'             =>  'Nhập Giá Sai',
            'trangThai.*' =>  'Hãy Chọn Trạng Thái ',
            'diemDon.*'           =>  'Hãy Chọn Điểm Đón',
        ];
    }
}
