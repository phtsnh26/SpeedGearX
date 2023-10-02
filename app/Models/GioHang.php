<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    protected $table = 'gio_hangs';
    protected $fillable = [
        'ten_xe',
        'so_luong',
        'ngay_dat',
        'ngay_tra',
        'tong_tien',
        'tien_coc',
        'id_khach_hang',
        'id_xe',
        'id_thue_xe',
    ];
}
