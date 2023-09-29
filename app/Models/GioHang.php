<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    protected $table = 'gio-gio_hangs';
    protected $fillable = [
        'id_xe',
        'so_luong',
    ];
}
