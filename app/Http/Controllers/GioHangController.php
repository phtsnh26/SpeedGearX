<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGioHangRequest;
use App\Http\Requests\UpdateGioHangRequest;
use App\Models\GioHang;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GioHangController extends Controller
{
    public function data()
    {
        $client   = Auth::guard('client')->user();
        $data = GioHang::leftjoin('vehicles', 'vehicles.id', 'gio_hangs.id_xe')
            ->leftJoin(
                DB::raw('(SELECT id_xe, MIN(id) AS min_id FROM images GROUP BY id_xe) AS first_images'),
                'vehicles.id',
                '=',
                'first_images.id_xe'
            )
            ->leftJoin('images AS first_image', 'first_images.min_id', 'first_image.id')
            ->join('classifications', 'vehicles.id_loai_xe', 'classifications.id')
            ->select(
                'gio_hangs.*',
                'vehicles.slug_xe',
                'vehicles.ten_xe',
                'first_image.hinh_anh_xe',
                'vehicles.gia_theo_ngay',
                'classifications.so_cho_ngoi'
            )
            ->where('id_khach_hang', $client->id)
            ->get();
        $so_luong = 0;
        foreach ($data as $key => $value) {
            $so_luong = $so_luong + $value->so_luong;
        }
        // dd($data->toArray());

        return response()->json([
            'data' => $data,
            'so_luong'  => $so_luong,
        ]);
    }
    public function del(Request $request)
    {
        $client   = Auth::guard('client')->user();
        $xe = Vehicle::find($request->id_xe);
        $data       = GioHang::where('id', $request->id)
            ->where('id_khach_hang', $client->id)
            ->first();
        if ($data) {
            $data->delete();
            return response()->json([
                'status' => true,
                'message' => 'Đã xóa khỏi xe của tôi',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Sản phẩm không tồn tại hoặc không đủ quyền!',
            ]);
        }
    }
    public function create(CreateGioHangRequest $request)
    {
        $client = Auth::guard('client')->user();
        $xe = Vehicle::find($request->id);
        $check = GioHang::where('id_xe', $request->id)
            ->where('id_khach_hang', $client->id)
            ->whereDate('ngay_dat', $request->ngay_dat)
            ->whereDate('ngay_tra', $request->ngay_tra)
            ->first();
        if ($xe->tinh_trang == 1) {
            if ($check) {
                if ($xe->so_luong < $request->so_luong) {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Số lượng nhập không được nhiều hơn số lượng xe có sẵn',
                    ]);
                }
                $ngayDat = Carbon::parse($request->ngay_dat);
                $ngayTra = Carbon::parse($request->ngay_tra);
                $soNgay = $ngayTra->diffInDays($ngayDat);
                $so_luong = $check->so_luong + $request->so_luong;
                if ($so_luong > 100) {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Số lượng > 100, giá thuê/sỉ sẽ không được áp dụng, liên hệ trực tiếp chúng tôi để biết thêm thông tin',
                    ]);
                } else if ($so_luong > $xe->so_luong) {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Bạn đã nhập quá số lượng xe có sẵn',
                    ]);
                }
                $tongTien = $soNgay * $xe->gia_theo_ngay * $so_luong;
                $tienCoc = $tongTien * 0.3;
                $check->update([
                    'so_luong' => $so_luong,
                    'tong_tien' =>  $tongTien,
                    'tien_coc'  => $tienCoc,
                ]);

                return response()->json([
                    'status'  => 1,
                    'message' => 'Đã thêm vào giỏ hàng ',
                ]);
            } else {
                if ($xe->so_luong < $request->so_luong) {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Số lượng nhập không được nhiều hơn số lượng xe có sẵn',
                    ]);
                }
                $ngayDat = Carbon::parse($request->ngay_dat);
                $ngayTra = Carbon::parse($request->ngay_tra);
                $soNgay = $ngayTra->diffInDays($ngayDat);
                $tongTien = $soNgay * $xe->gia_theo_ngay * $request->so_luong;
                $tienCoc = $tongTien * 0.3;
                GioHang::create([
                    'ten_xe'         => $xe->ten_xe,
                    'so_luong'       => $request->so_luong,
                    'ngay_dat'       => $request->ngay_dat,
                    'ngay_tra'       => $request->ngay_tra,
                    'tong_tien'      => $tongTien,
                    'tien_coc'       => $tienCoc,
                    'id_khach_hang'  => $client->id,
                    'id_xe'          => $xe->id,
                    'id_thue_xe'     => 1,
                ]);
                return response()->json([
                    'status' => 1,
                    'message' => 'Đã thêm vào giỏ hàng',
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
                'message' => $xe ? 'Xe đã tạm dừng kinh doanh' : 'Xe không tồn tại',
            ]);
        }
    }
    public function update(Request $request)
    {
        $client = Auth::guard('client')->user();
        $gioHang = GioHang::where('id', $request->id)
            ->where('id_khach_hang', $client->id)
            ->first();
        $xe = Vehicle::find($request->id_xe);
        if ($gioHang) {
            if ($request->so_luong > 100) {
                if ($xe->so_luong < 100) {
                    $gioHang->so_luong = $xe->so_luong;
                } else
                    $gioHang->so_luong = 100;
                $gioHang->save();
                return response()->json([
                    'status'    => -2,
                    'message'   => 'Số lượng > 100, giá thuê/sỉ sẽ không được áp dụng, liên hệ trực tiếp chúng tôi để biết thêm thông tin',
                ]);
            } else if ($request->so_luong < 1) {

                $gioHang->so_luong = 1;
                $gioHang->save();
                return response()->json([
                    'status'    => -1,
                    'message'   => 'Số lượng phải lớn hơn hoặc bằng 1',
                ]);
            } else if ($request->so_luong > $xe->so_luong) {
                $gioHang->so_luong = $xe->so_luong;
                $gioHang->save();
                return response()->json([
                    'status'    => -3,
                    'soLuong'   => $xe->so_luong,
                    'message'   => 'Bạn đã nhập quá số lượng xe có sẵn',
                ]);
            } else {
                $gioHang->so_luong = $request->so_luong;
                $gioHang->save();
                return response()->json([
                    'status'    => 1,
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Dữ liệu không thể cập nhật!',
            ]);
        }
    }
    public function indexCheckout()
    {
        return view('page.customer.checkout.index');
    }
}
