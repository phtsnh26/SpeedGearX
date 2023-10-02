<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisionDetail extends Model
{
    use HasFactory;
    protected $table = 'permision_details';
    protected $fillable = [
        "id_quyen",
        "id_hanh_dong",
        "mieu_ta",
    ];
}
