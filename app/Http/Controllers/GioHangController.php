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
        $tong_tien = 0;
        foreach ($data as $key => $value) {
            $so_luong = $so_luong + $value->so_luong;
            $tong_tien = $tong_tien + $value->tong_tien;
        }
        // dd($data->toArray());

        return response()->json([
            'data' => $data,
            'so_luong'  => $so_luong,
            'tong_tien'  => $tong_tien,
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
                        'message'   => 'Số lượng > 100, giá thuê/lẻ sẽ không được áp dụng, liên hệ trực tiếp chúng tôi để biết thêm thông tin',
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
        // dd($request->all());
        $client = Auth::guard('client')->user();
        $gioHang = GioHang::where('id', $request->id)
            ->where('id_khach_hang', $client->id)
            ->first();
        $xe = Vehicle::find($request->id_xe);
        if ($gioHang) {
            if ($request->so_luong > 100) {
                if ($xe->so_luong < 100) {
                    $gioHang->so_luong = $xe->so_luong;
                    $gioHang->tong_tien = $xe->so_luong * $xe->gia_theo_ngay;
                    $gioHang->save();
                    $test = 0;
                    $ids = collect($request->hi)->pluck('id')->toArray();
                    $abd = GioHang::whereIn('id', $ids)->get();
                    foreach ($abd as $key => $value) {
                        $test += $value['tong_tien'];
                    }
                    return response()->json([
                        'status'    => -1,
                        'test'  => $test,
                        'tongTien'    => $gioHang->tong_tien,
                        'soLuong'   => $gioHang->so_luong,
                        'message'   => $xe->ten_xe . ' chỉ còn ' . $xe->so_luong . ' chiếc',
                    ]);
                } else {
                    $gioHang->so_luong = 100;
                    $gioHang->tong_tien = 100 * $xe->gia_theo_ngay;
                    $gioHang->save();
                    $test = 0;
                    $ids = collect($request->hi)->pluck('id')->toArray();
                    $abd = GioHang::whereIn('id', $ids)->get();
                    foreach ($abd as $key => $value) {
                        $test += $value['tong_tien'];
                    }
                    return response()->json([
                        'status'    => -1,
                        'test'  => $test,
                        'tongTien'    => $gioHang->tong_tien,
                        'soLuong'   => $gioHang->so_luong,
                        'message'   => 'Số lượng > 100, giá thuê/lẻ sẽ không được áp dụng, liên hệ trực tiếp chúng tôi để biết thêm thông tin',
                    ]);
                }
            } else if ($request->so_luong < 1) {
                $gioHang->so_luong = 1;
                $gioHang->tong_tien = 1 * $xe->gia_theo_ngay;
                $gioHang->save();
                $test = 0;
                $ids = collect($request->hi)->pluck('id')->toArray();
                $abd = GioHang::whereIn('id', $ids)->get();
                foreach ($abd as $key => $value) {
                    $test += $value['tong_tien'];
                }
                return response()->json([
                    'status'    => -1,
                    'test'  => $test,
                    'tongTien'    => $gioHang->tong_tien,
                    'soLuong'   => $gioHang->so_luong,
                    'message'   => 'Số lượng phải lớn hơn hoặc bằng 1',
                ]);
            } else if ($request->so_luong > $xe->so_luong) {
                $gioHang->so_luong = $xe->so_luong;
                $gioHang->tong_tien = $xe->so_luong * $xe->gia_theo_ngay;
                $gioHang->save();
                $test = 0;
                $ids = collect($request->hi)->pluck('id')->toArray();
                $abd = GioHang::whereIn('id', $ids)->get();
                foreach ($abd as $key => $value) {
                    $test += $value['tong_tien'];
                }
                return response()->json([
                    'status'    => -1,
                    'test'  => $test,
                    'tongTien'    => $gioHang->tong_tien,
                    'soLuong'   => $gioHang->so_luong,
                    'message'   => $xe->ten_xe . ' chỉ còn ' . $xe->so_luong . ' chiếc',
                ]);
            } else if ($request->ngay_dat != $gioHang->ngay_dat || $request->ngay_tra != $gioHang->ngay_tra) {
                $ngayDat = Carbon::parse($request->ngay_dat);
                $ngayTra = Carbon::parse($request->ngay_tra);
                $soNgay = $ngayTra->diffInDays($ngayDat);

                $soLuongMoi = $request->so_luong;
                $tongSoLuongMoi = $gioHang->so_luong + $soLuongMoi;

                if ($tongSoLuongMoi <= $xe->so_luong) {
                    $gioHang->so_luong = $tongSoLuongMoi;
                    $gioHang->tong_tien = $tongSoLuongMoi * $xe->gia_theo_ngay * $soNgay;
                    $gioHang->save();
                    $test = 0;
                    $ids = collect($request->hi)->pluck('id')->toArray();
                    $abd = GioHang::whereIn('id', $ids)->get();
                    foreach ($abd as $key => $value) {
                        $test += $value['tong_tien'];
                    }
                    return response()->json([
                        'status'    => -1,
                        'test'  => $test,
                        'soLuong'   => $gioHang->so_luong,
                        'tongTien'  => $gioHang->tong_tien,
                    ]);
                } else {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Tổng số lượng vượt quá số lượng xe có sẵn',
                    ]);
                }
            } else {
                $gioHang->so_luong = $request->so_luong;
                $gioHang->tong_tien = $request->so_luong * $xe->gia_theo_ngay;
                $gioHang->save();
                $test = 0;
                $ids = collect($request->hi)->pluck('id')->toArray();
                $abd = GioHang::whereIn('id', $ids)->get();
                foreach ($abd as $key => $value) {
                    $test += $value['tong_tien'];
                }
                return response()->json([
                    'test' => $test,
                    'status'    => 1,
                    'soLuong'   => $gioHang->so_luong,
                    'tongTien'    => $gioHang->tong_tien,
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Dữ liệu không thể cập nhật!',
            ]);
        }
    }
    public function indexCheckOut()
    {
        return view('page.customer.checkout.index');
    }
}
