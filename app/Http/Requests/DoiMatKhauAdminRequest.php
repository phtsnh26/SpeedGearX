<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoiMatKhauAdminRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'mat_khau_moi'  =>  'required|min:6',
            'nhap_lai_mat_khau_moi'   =>  'required|same:mat_khau_moi',
        ];
    }

    public function messages()
    {
        return [
            'mat_khau_moi.*'            =>  'Mật khẩu phải từ 6 ký tự',
            'nhap_lai_mat_khau_moi.*'   =>  'Mật khẩu nhập lại không trùng khớp',
        ];
    }
}
