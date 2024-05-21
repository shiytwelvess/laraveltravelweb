<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'hoTen'               =>  'required|min:5|max:50|regex:/^[a-zA-Z\s]+$/',
            'email'                 =>  'required|email|unique:contacts,email',
            'soDienThoai'           => 'required|digits:10|regex:/^[0-9]+$/',
            'noiDung'               =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'hoTen.*'                  =>  'Họ và tên phải từ 6 đến 50 ký tự và không chứa ký tự đặc biệt',
            'email.*'                    =>  'Email không được để trống',
            'email.email'                =>  'Email không đúng định dạng',
            'noiDung.*'                  =>  'Bạn chưa nhập nội dung',
            'soDienThoai.*'              =>  'Số điện thoại phải đủ 10 ký tự số',
        ];
    }
}
