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
    public function rules(): array
    {
        return [
            'ho_va_ten' => 'required|string|max:255',
            'so_dien_thoai' => 'required|string|digits:10',
            'email' => 'required|email',
            'loi_nhan' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'ho_va_ten.required' => 'Bạn chưa nhập họ và tên.',
            'ho_va_ten.max' => 'Họ và tên không được vượt quá 255 ký tự.',
            'so_dien_thoai.required' => 'Bạn chưa nhập số điện thoại.',
            'so_dien_thoai.digits' => 'Số điện thoại phải đủ 10 chữ số.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Email phải có định dạng hợp lệ.',
            'loi_nhan.required' => 'Bạn chưa nhập lời nhắn.',
        ];
    }
}
