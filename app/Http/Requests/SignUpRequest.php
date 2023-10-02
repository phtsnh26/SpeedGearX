<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "ho_va_ten"      => "required|min:5",
            "so_dien_thoai"  => "required|digits:10",
            "email"          => "required|email|unique:clients,email",
            "ngay_sinh"      => "required|date",
            "password"       => "required|min:6|max:30",
            "re_password"    => "required|same:password",
            "ten_dang_nhap"  => "required|min:5|unique:clients,ten_dang_nhap",
            "dia_chi"        => "required|min:5",
        ];
    }

    public function messages()
    {
        return [
            "ho_va_ten.*"       => "Họ và tên phải từ 5 ký tự",
            "so_dien_thoai.*"   => "Số điện thoại phải là 10 số",
            "email.required"    => "Email phải đúng định dạng",
            "email.email"       => "Email phải đúng định dạng",
            "email.unique"      => "Email này đã đăng ký tài khoản trước đó",
            "ngay_sinh.*"       => "Ngày sinh phải đúng định dạng",
            "password.*"        => "Mật khẩu phải từ 6 đến 30 ký tự",
            "re_password.*"     => "Mật khẩu nhập lại phải trùng khớp",
            "ten_dang_nhap.*"   => "Tên đăng nhập phải từ 5 ký tự và không trùng với tên đăng nhập khác",
            "dia_chi.*"         => "Địa chỉ phải từ 5 ký tự",
        ];
    }
}
