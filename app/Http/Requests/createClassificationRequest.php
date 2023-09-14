<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createClassificationRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'so_cho_ngoi' => 'required|unique:classifications,so_cho_ngoi'
        ];
    }
    public function messages(){
        return [
            'required' => 'Nhập số chỗ ngồi để thêm mới!',
            'unique' => 'Loại xe này đã tồn tại!',
        ];
    }
}
