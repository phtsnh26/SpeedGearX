<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThanhToanRequest;
use App\Models\Booking;
use App\Models\GioHang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ThanhToanController extends Controller
{
    public function thanhToanTienMat(Request $request)
    {
        $fake = Booking::max('id');
        $randomNumber = rand(10000, 99999);
        $randomNumber2 =  rand(10000, 99999);
        $maHoaDon = 'MHD' . $randomNumber . strval($fake + 1) . $randomNumber2;
        $test = 0;
        $ids = collect($request->hi)->pluck('id')->toArray();
        $abd = GioHang::whereIn('id', $ids)->get();

        foreach ($abd as $key => $value) {
            $test += $value['tong_tien'];
        }
        Booking::create([
            'ma_hoa_don' => $maHoaDon,
            'thanh_tien' => $test,
            'ngay_dat' => Carbon::now(),
            'ngay_tra' => $request->ngay_tra,
            'ngay_nhan_xe' => $request->ngay_dat,
            'ghi_chu' => $request->ghi_chu,
            'tinh_trang' => $request->tinh_trang,
            'id_khach_hang' => $request->id_khach_hang,
            'id_hop_dong' => $request->id_hop_dong,
        ]);
        dd($request->all());
        return response()->json([
            'status'    => 1,
            'message' => 'Thanh toán thành công',
        ]);
    }
}
