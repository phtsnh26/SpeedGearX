<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';

    protected $fillable = [
        'ten_thuong_hieu',
        'slug_thuong_hieu',
        'tinh_trang',
        'hinh_anh',
    ];
}
