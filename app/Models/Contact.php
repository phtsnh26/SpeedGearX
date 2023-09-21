<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = [
        'ho_va_ten',
        'email',
        'so_dien_thoai',
        'loi_nhan',
    ];
}
