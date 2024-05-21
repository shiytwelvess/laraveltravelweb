<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaiVietRequest extends FormRequest
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
            'tieu_de'         =>  'required',
            'mo_ta_ngan'      =>  'required|min:10|max:250',
            'hinh_anh'        =>  'required',
            'noi_dung'        =>  'required|min:20|max:5000',

        ];
    }

    public function messages()
    {
        return [
            'tieu_de.*'             =>  'Chưa Nhập Tiêu Đề!!',
            'mo_ta_ngan.*'          =>  'Mô Tả Ngắn Từ 10 kí từ đến 250 kí tự !!',
            'noi_dung.*'            =>  'Mô Tả Ngắn Từ 20 kí từ đến 5000 kí tự !!',
            'hinh_anh.*'            =>  'Chưa Chọn Hình Ảnh',
        ];
    }
}
