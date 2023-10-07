<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'danh_gia',
        'thoi_gian',
        'so_sao',
        'id_khach_hang',
        'id_xe',
    ];
}
