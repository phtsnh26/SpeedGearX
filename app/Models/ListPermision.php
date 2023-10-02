<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPermision extends Model
{
    use HasFactory;
    protected $table = 'list_permisions';
    protected $fillable = [
        'ten_hanh_dong',
        'tinh_trang',
    ];
}
