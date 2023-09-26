<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles';
    protected $fillable = [
        'ten_xe',
        'slug_xe',
        'mo_ta_ngan',
        'mo_ta_chi_tiet',
        'gia_theo_ngay',
        'don_gia',
        'so_luong',
        'tinh_trang',
        'id_thuong_hieu',
        'id_loai_xe',
    ];
}
