<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Personnel extends Authenticatable
{
    use HasFactory;
    protected $table = 'personnels';
    protected $fillable = [
        'ho_va_ten',
        'ten_dang_nhap',
        'email',
        'password',
        'dia_chi',
        'ngay_sinh',
        'gioi_tinh',
        'so_dien_thoai',
        'cccd',
        'anh_minh_chung',
        'tinh_trang',
        'id_phan_quyen',
    ];
}
