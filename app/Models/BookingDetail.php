<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;
    protected $table = 'booking_details';
    protected $fillable = [
        'gia_thue',
        'id_thue_xe',
        'id_xe',
    ];
}
