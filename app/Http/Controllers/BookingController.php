<?php

namespace App\Http\Controllers;

use App\Mail\ActiveMail;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Client;
use App\Models\PermisionDetail;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
            ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Đơn Hàng', $check)) {

            $booking = Booking::find($request->id);
            if ($booking) {
                BookingDetail::where('id_thue_xe', $request->id)->delete();
                $booking->delete();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Xoá người thuê thành công!',
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
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
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
            ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Đơn Hàng', $check)) {

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
                    'message'   => 'Không tìm thấy đơn hàng này!',
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
            ]);
        }
    }
    public function create(Request $request)
    {
        $client = Auth::guard('client')->user();
        $maxId = Booking::max('id');
        if (!$maxId) {
            $maxId = 0;
        }
        $randomNumber = random_int(10000, 99999);
        $randomNumber2 = random_int(10000, 99999);
        $ma_hoa_don = 'MHD' . $randomNumber . $maxId + 1 . $randomNumber2;

        $thanh_toan = Booking::create([
            'ma_hoa_don' => $ma_hoa_don,
            'thanh_tien'    => $request->tong_tien,
            'ngay_dat'  => $request->ngay_dat,
            'ngay_tra' => $request->ngay_tra,
            'ghi_chu' => $request->ghi_chu,
            'tinh_trang' => 0,
            'id_khach_hang' => $client->id,
        ]);
        // if ($thanh_toan) {
        //     $xe = Vehicle::find($request->id);
        //     Vehicle::update([
        //         'so_luong' =>   $xe->so_luong - $request->so_luong,
        //     ]);
        //     $data['ten_nguoi_nhan'] = $client->ho_va_ten;
        //     $data['hinh_anh'] = 'https://autopro8.mediacdn.vn/2021/10/2/photo-3-16331375538842003973831.jpg';
        //     $data['ten_xe'] = $xe->ten_xe;
        //     $data['so_luong_mua'] = $request->so_luong;
        //     $data['thanh_tien_mua'] = $request->tong_tien;
        //     Mail::to($request->email)->send(new ActiveMail($request->all()));
        //     if ($request->phuong_thuc_thanh_toan == 1) {
        //         return response()->json([
        //             'status'    => 1,
        //             'message'   => 'Kiểm tra tình trạng đơn tại Profile',
        //         ]);
        //     } else {
        //         return response()->json([
        //             'status'    => 2,
        //             'message'   => 'Kiểm tra tình trạng đơn tại Profile',
        //         ]);
        //     }
        // } else {
        //     return response()->json([
        //         'status'    => 0,
        //         'message'   => 'Thanh toán thất bại',
        //     ]);
        // }
    }
}
