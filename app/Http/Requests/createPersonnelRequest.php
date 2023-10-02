<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class createPersonnelRequest extends FormRequest
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
        $rules = [
            'ho_va_ten'         => 'required|string|max:255',
            'password'          => 'required|string|min:6|max:255',
            'dia_chi'           => 'required|string|max:255',
            'ngay_sinh'         => 'required|date',
            'gioi_tinh'         => 'required|in:Nam,Nữ',
            'so_dien_thoai'     => 'required|string|max:20',
            'cccd'              => 'nullable|string|max:20',
            'anh_minh_chung'    => 'required',
            'tinh_trang'        => 'nullable|int|max:255',
            'id_phan_quyen'     => 'nullable',
        ];

        // Kiểm tra email và tên đăng nhập chỉ khi chúng được thay đổi
        if ($this->isMethod('post')) {
            $rules['ten_dang_nhap'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('personnels')->ignore($this->route('personnel')),
            ];

            $rules['email'] = [
                'required',
                'email',
                'max:255',
                Rule::unique('personnels')->ignore($this->route('personnel')),
            ];
        }

        return $rules;
    }
    public function messages()
    {
        return [
            '*.required' => ':attribute là trường bắt buộc.',
            '*.max' => ':attribute không được vượt quá 255 ký tự.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng, vui lòng sử dụng email khác.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá 255 ký tự.',
            'ngay_sinh.date' => 'Ngày sinh không hợp lệ.',
            'gioi_tinh.in' => 'Giới tính phải là "Nam" hoặc "Nữ".',
            'so_dien_thoai.max' => 'Số điện thoại không được vượt quá 20 ký tự.',
            'cccd.max' => 'CCCD không được vượt quá 20 ký tự.',
            'id_phan_quyen.exists' => 'Phân quyền không hợp lệ.',
        ];
    }
}
