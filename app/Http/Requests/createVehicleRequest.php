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
    public function rules(): array
    {
        return [
            'ten_xe'            => 'required|between:2,50',
            'slug_xe'           => 'required|between:2,50|unique:vehicles,slug_xe',
            'mo_ta_ngan'        => 'nullable|string|between:4,500',
            'mo_ta_chi_tiet'    => 'nullable|string|min:10|max:255',
            'gia_theo_gio'      => 'nullable|numeric|min:100',
            'gia_theo_ngay'     => 'nullable|numeric|min:500',
            'so_luong'          => 'nullable|numeric|min:100',
            'tinh_trang'        => 'nullable|boolean',
            'id_thuong_hieu'    => 'required|integer',
            'id_loai_xe'        => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'ten_xe.required'            => 'Tên xe là trường bắt buộc.',
            'ten_xe.between'             => 'Tên xe phải có độ dài từ :min đến :max ký tự.',
            'slug_xe.required'           => 'Slug xe là trường bắt buộc.',
            'slug_xe.between'            => 'Slug xe phải có độ dài từ :min đến :max ký tự.',
            'slug_xe.unique'             => 'Slug xe đã tồn tại trong hệ thống.',
            'mo_ta_ngan.between'         => 'Mô tả ngắn phải có độ dài từ :min đến :max ký tự.',
            'mo_ta_chi_tiet.min'         => 'Mô tả chi tiết phải có ít nhất :min ký tự.',
            'mo_ta_chi_tiet.max'         => 'Tối đa 255 ký tự',
            'gia_theo_gio.min'           => 'Giá theo giờ phải ít nhất :min.',
            'gia_theo_ngay.min'          => 'Giá theo ngày phải ít nhất :min.',
            'so_luong.min'               => 'Số lượng phải ít nhất :min.',
            'tinh_trang.boolean'         => 'Trạng thái phải là true hoặc false.',
            'id_thuong_hieu.required'    => 'Thương hiệu là trường bắt buộc.',
            'id_loai_xe.required'        => 'Loại xe là trường bắt buộc.',
            'id_thuong_hieu.integer'     => 'Thương hiệu phải là một số nguyên.',
            'id_loai_xe.integer'         => 'Loại xe phải là một số nguyên.',
        ];
    }
}
