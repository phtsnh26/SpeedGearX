<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    use HasFactory;
    protected $table = 'ware_houses';

    protected $fillable = [
        'ma_nhap',
        'ngay_nhap',
        'ten_xe',
        'so_luong',
        'don_gia',
        'thanh_tien',
        'ghi_chu',
        'id_xe',
    ];
}
