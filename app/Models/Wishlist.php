<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;
    protected $table = 'wishlists';

    protected $fillable = [
        'id_khach_hang',
        'id_xe',
        'so_luong',
        'tong_tien',
        'tien_coc',
    ];
}
