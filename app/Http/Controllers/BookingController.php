<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function data()
    {
        $data = Booking::leftjoin('clients', 'bookings.id_khach_hang', 'clients.id')
                        ->get();
        return response()->json([
            'data' => $data,
        ]);
    }
}
