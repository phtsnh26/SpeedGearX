<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileClientRequest extends FormRequest
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
            "cccd" => "required|digits:12", // Thêm quy tắc cho căn cước công dân
            "gioi_tinh"       => "required|in:Nam,Nữ,Khác", // Thêm quy tắc cho giới tính
            "bang_lai_xe"      => "required|in:B1", // Thêm quy tắc cho bằng lái xe
        ];
    }

    public function messages()
    {
        return [
            "cccd.*" => "Căn cước công dân không được để trống và phải tối đa 12 số",
            "gioi_tinh.*"               => "Giới tính không được để trống và phải là Nam hoặc Nữ hoặc Khác",
            "bang_lai_xe.*"      => "Bằng lái xe không được để trống và phải là bằng B1",
        ];
    }
}
