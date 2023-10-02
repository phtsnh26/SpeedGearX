<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createVehicleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [

            'ten_xe' => 'required|string|between:2,50',
            'slug_xe' => 'required|string|between:2,50|unique:vehicles,slug_xe',
            'mo_ta_ngan' => 'nullable|string|between:4,500',
            'mo_ta_chi_tiet' => 'nullable|string|min:5',
            'gia_theo_ngay' => 'nullable|numeric',
            'don_gia' => 'nullable|numeric',
            'so_luong' => 'nullable|integer|min:1',
            'tinh_trang' => 'nullable|boolean',
            'id_thuong_hieu' => 'required|integer',
            'id_loai_xe' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute là trường bắt buộc.',
            'between' => ':attribute phải nằm trong khoảng :min và :max ký tự.',
            'string' => ':attribute phải là chuỗi.',
            'numeric' => ':attribute phải là số.',
            'integer' => ':attribute phải là số nguyên.',
            'unique' => ':attribute đã tồn tại.',
            'min' => ':attribute phải có ít nhất :min ký tự.',
        ];
    }
}
