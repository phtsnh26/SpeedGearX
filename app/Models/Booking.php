<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'ngay_tra',
        'ngay_dat',
        'ghi_chu',
        'tinh_trang',
        'id_khach_hang',
        'id_hop_dong',
    ];
}
