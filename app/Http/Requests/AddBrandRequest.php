<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBrandRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ten_thuong_hieu'        =>  'required|between:2,50',
            'slug_thuong_hieu'       =>  'required|between:2,50|unique:brands,slug_thuong_hieu',
            'tinh_trang'            =>  'required|boolean',
            'hinh_anh'              =>  'required|max:195',
        ];
    }
    public function messages()
    {
        return [
            'ten_thuong_hieu.required'        =>  'Tên thương hiệu yêu cầu phải nhập',
            'ten_thuong_hieu.between'         =>  'Tên chuyên mục phải từ 2 đến 50 ký tự',
            'slug_thuong_hieu.required'       =>  'Slug thương hiệu yêu cầu phải nhập',
            'slug_thuong_hieu.between'        =>  'Slug thương hiệu phải từ 2 đến 50 ký tự',
            'slug_thuong_hieu.unique'         =>  'Slug thương hiệu đã tồn tại',
            'tinh_trang.*'                   =>  'Tình trạng chọn không chính xác',
            'hinh_anh.*'                     =>  'Hình ảnh phải nhập và tối đa 195 ký tự',
        ];
    }

}
