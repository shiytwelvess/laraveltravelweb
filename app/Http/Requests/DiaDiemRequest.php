<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaDiemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'tenDiaDiem'        =>  'required',
            'diaChi'            =>  'required',
            'hinh_anh'          =>  'required',
            'moTa'              =>  'required',
            'lienLac'           => 'required|regex:/^[0-9]+$/',
            'trangThai'         =>  'required',

        ];
    }

    public function messages()
    {
        return [
            'tenDiaDiem.*'       =>  'Chưa Nhập Tên Địa Điểm !!',
            'diaChi.*'           =>  'Chưa Nhập Địa Điểm Bắt Đầu !!',
            'hinh_anh.*'           =>  'Chưa Chọn Hình Ảnh',
            'moTa.*'              =>  'Chưa Nhập Mô tả',
            'lienLac.*'          =>  'Liên Lạc Sai',
            'trangThai.*'         =>  'Hãy Chọn Tình Trạng',
        ];
    }
}
