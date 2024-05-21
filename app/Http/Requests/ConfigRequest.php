<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            'bg_home'           =>  'required',
            'bg_home_1'         =>  'required',
            'bg_home_2'         =>  'required',
            'dia_diem'          =>  'required',
            'dia_diem_1'        =>  'required',
            'dia_diem_2'        =>  'required',


        ];
    }

    public function messages()
    {
        return [
            'bg_home.*'             =>  'Chưa Nhập Backgroud 1 !!',
            'bg_home_1.*'           =>  'Chưa Nhập Backgroud 2 !!',
            'bg_home_2.*'           =>  'Chưa Nhập Backgroud 3 !!',
            'dia_diem.*'            =>  'Chưa Chọn Địa Điểm 1',
            'dia_diem_1.*'          =>  'Chưa Chọn Địa Điểm 2',
            'dia_diem_2.*'          =>  'Chưa Chọn Địa Điểm 3',

        ];
    }
}
