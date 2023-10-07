<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'ma_hoa_don',
        'thanh_tien',
        'ngay_dat',
        'ngay_tra',
        'so_luong',
        'ghi_chu',
        'tinh_trang',
        'id_khach_hang',
        'id_xe'
    ];

    const   DA_HUY                      =   -1;
    const   DANG_XU_LY                  =   0;
    const   DA_COC                      =   1;
    const   DANG_THUE                   =   2;
    const   DA_TRA                      =   3;
}
