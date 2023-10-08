<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCheckOutRequest;
use App\Http\Requests\CreateGioHangRequest;
use App\Models\Booking;
use App\Models\Checkout;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function daCoc($a)
    {
        $thanh_toan = Booking::find($a);
        if ($thanh_toan) {
            $thanh_toan->tinh_trang = Booking::DA_COC;
            $thanh_toan->save();
            return redirect('/');
        } else {
            return redirect('https://www.youtube.com/');
        }
    }

    public function indexCheckOut()
    {
        return view('page.customer.checkout.index');
    }
    public function create(CreateCheckOutRequest $request)
    {
        $client = Auth::guard('client')->user();
        $xe = Vehicle::find($request->id);
        if ($xe->tinh_trang == 1) {
            if ($request->so_luong <= $xe->so_luong) {

                $ngayDat = Carbon::parse($request->ngay_dat);
                $ngayTra = Carbon::parse($request->ngay_tra);
                $soNgay = $ngayTra->diffInDays($ngayDat);
                $tongTien = $soNgay * $xe->gia_theo_ngay * $request->so_luong;
                $data = $request->all();
                $data['tong_tien'] = $tongTien;
                return response()->json([
                    'status' => 1,
                    'add' => $data,
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Bạn không thể thuê số lượng lớn hơn số lượng tồn của xe!',
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
                'message' => $xe ? 'Xe đã tạm dừng kinh doanh' : 'Xe không tồn tại',
            ]);
        }
    }
    public function data(Request $request)
    {
        $vehicle = Vehicle::leftJoin(
            DB::raw('(SELECT id_xe, MIN(id) AS min_id FROM images GROUP BY id_xe) AS first_images'),
            'vehicles.id',
            '=',
            'first_images.id_xe'
        )
            ->leftJoin('images AS first_image', 'first_images.min_id', 'first_image.id')
            ->select('vehicles.*', 'first_image.hinh_anh_xe')->find($request->id);
        return response()->json([
            'xe'    => $vehicle,
        ]);
    }
}
