<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function indexBooking()
    {
        return view('page.admin.booking.index');
    }
    public function data()
    {
        $data = Booking::leftJoin('clients', 'bookings.id_khach_hang', 'clients.id')
            ->leftJoin('booking_details', 'booking_details.id_thue_xe', 'bookings.id')
            ->leftJoin('vehicles', 'vehicles.id', 'booking_details.id_xe')
            ->leftJoin('brands', 'brands.id', 'vehicles.id_thuong_hieu')
            ->leftJoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
            ->select('bookings.*',  'booking_details.gia_thue', 'vehicles.ten_xe', 'brands.ten_thuong_hieu', 'classifications.so_cho_ngoi')
            ->addSelect('clients.ho_va_ten', 'clients.ngay_sinh', 'clients.gioi_tinh', 'clients.dia_chi', 'clients.so_dien_thoai', 'clients.cccd', 'clients.bang_lai_xe')
            ->addSelect('images.hinh_anh_xe')
            ->leftJoin('images', function ($join) {
                $join->on('images.id_xe', '=', 'vehicles.id')
                    ->whereRaw('images.id = (SELECT MIN(id) FROM images WHERE images.id_xe = vehicles.id)');
            })
            ->get();

        return response()->json([
            'data' => $data,
        ]);
    }

    public function delete(Request $request)
    {
        $booking = Booking::find($request->id);
        if ($booking) {
            BookingDetail::where('id_thue_xe', $request->id)->delete();
            $booking->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'Xoá người thuê thành công!',
            ]);
        }
    }
    public function search(Request $request)
    {
        $gia_tri = '%' . $request->gia_tri . '%';
        // $ngayGiaTri = Carbon::createFromFormat('d/m/Y', $request->gia_tri);
        $data = Booking::leftJoin('clients', 'bookings.id_khach_hang', 'clients.id')
            ->leftJoin('booking_details', 'booking_details.id_thue_xe', 'bookings.id')
            ->leftJoin('vehicles', 'vehicles.id', 'booking_details.id_xe')
            ->leftJoin('brands', 'brands.id', 'vehicles.id_thuong_hieu')
            ->leftJoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
            ->select(
                'bookings.*',
                'clients.ho_va_ten',
                'clients.ngay_sinh',
                'clients.gioi_tinh',
                'clients.dia_chi',
                'clients.so_dien_thoai',
                'clients.cccd',
                'clients.bang_lai_xe',
                'booking_details.gia_thue',
                'vehicles.ten_xe',
                'brands.ten_thuong_hieu',
                'classifications.so_cho_ngoi'
            )
            ->addSelect('images.hinh_anh_xe')
            ->leftJoin('images', function ($join) {
                $join->on('images.id_xe', '=', 'vehicles.id')
                    ->whereRaw('images.id = (SELECT MIN(id) FROM images WHERE images.id_xe = vehicles.id)');
            })
            ->where('clients.ho_va_ten', 'like', $gia_tri)
            ->orWhere('bookings.ma_hoa_don', 'like', $gia_tri)
            ->orWhere('brands.ten_thuong_hieu', 'like', $gia_tri)
            ->orWhere('classifications.so_cho_ngoi', $gia_tri)
            ->get();
        return response()->json([
            'data'   => $data,
        ]);
    }
    public function changeStatus(Request $request)
    {
        $booking = Booking::find($request->id);
        if ($booking) {
            $booking->tinh_trang = !$booking->tinh_trang;
            $booking->save();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đổi trạng thái thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này!',
            ]);
        }
    }
}
