<?php

namespace App\Http\Requests;

use App\Models\Vehicle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateGioHangRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $vehicle = Vehicle::find($this->id);

        return [
            'so_luong' => [
                'required',
                'integer',
                'min:1',
                'max:100',
            ],
            'ngay_dat' => 'required|date|after_or_equal:today',
            'ngay_tra' => 'required|date|after:ngay_dat|before_or_equal:' . now()->addDays(30)->toDateString(),
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Vui lòng điền đủ thông tin',
            'so_luong.min' => 'Số lượng phải lớn hơn hoặc bằng 1',
            'so_luong.max' => 'Số lượng > 100, giá thuê/sỉ sẽ không được áp dụng, liên hệ trực tiếp chúng tôi để biết thêm thông tin',
            'ngay_dat.required' => 'Vui lòng chọn ngày đặt xe',
            'ngay_dat.date' => 'Ngày đặt xe phải là một ngày hợp lệ',
            'ngay_dat.after_or_equal' => 'Ngày đặt xe phải là ngày hiện tại hoặc sau ngày hiện tại',
            'ngay_tra.required' => 'Vui lòng chọn ngày trả xe',
            'ngay_tra.date' => 'Ngày trả xe phải là một ngày hợp lệ',
            'ngay_tra.after' => 'Ngày trả xe phải sau ngày đặt xe',
            'ngay_tra.before_or_equal' => 'Ngày trả xe không được quá 30 ngày kể từ ngày đặt',
        ];
    }
}
