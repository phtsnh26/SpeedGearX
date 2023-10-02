<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WareHouseReceipt extends Model
{
    use HasFactory;
    protected  $table = "ware_house_receipts";
    protected $fillable = [
        'id_nhap_kho',
    ];
}
