<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryWareHouse extends Model
{
    use HasFactory;
    protected $table = 'temporary_ware_houses';

    protected $fillable = [
        'id_xe',
        'so_luong',
        'don_gia',
        'thanh_tien',
        'ghi_chu',
    ];
}
