<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Client extends Authenticatable
{
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = [
        'email',
        'ho_va_ten',
        'ten_dang_nhap',
        'password',
        'dia_chi',
        'ngay_sinh',
        'gioi_tinh',
        'so_dien_thoai',
        'cccd',
        'bang_lai_xe',
        'tinh_trang',
        'is_active',
        'hash_reset',
        'hash_active',
    ];
}
