<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ChangePasswordClientRequest extends FormRequest
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
        $user = Auth::guard('client')->user();

        return [
            'mat_khau_cu' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Mật khẩu cũ không đúng.');
                    }
                },
            ],
            'mat_khau_moi' => 'required|min:6',
            'nhap_lai_mat_khau_moi' => 'required|same:mat_khau_moi',
        ];
    }

    public function messages()
    {
        return [
            'mat_khau_cu.required' => 'Mật khẩu cũ không được để trống',
            'mat_khau_cu.exists' => 'Mật khẩu cũ không đúng',

            'mat_khau_moi.required' => 'Mật khẩu mới không được để trống',
            'mat_khau_moi.min' => 'Mật khẩu mới phải từ 6 ký tự',

            'nhap_lai_mat_khau_moi.required' => 'Nhập lại mật khẩu mới không được để trống',
            'nhap_lai_mat_khau_moi.same' => 'Mật khẩu nhập lại không trùng khớp',
        ];
    }
}
