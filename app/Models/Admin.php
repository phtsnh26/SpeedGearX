<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'ho_va_ten',
        'hinh_anh',
        'ten_dang_nhap',
        'email',
        'so_dien_thoai',
        'dia_chi',
        'password',
        'is_active',
        'hash_reset',
        'id_rule',
    ];
}
