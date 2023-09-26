<?php

namespace App\Http\Controllers;

use App\Models\TemporaryWareHouse;
use App\Models\Vehicle;
use App\Models\WareHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class WareHouseController extends Controller
{
    public function indexWareHouse()
    {
        return view('page.admin.warehouse.index');
    }
    public function data()
    {
        $data = Vehicle::leftJoin(
            DB::raw('(SELECT id_xe, MIN(id) AS min_id FROM images GROUP BY id_xe) AS first_images'),
            'vehicles.id',
            '=',
            'first_images.id_xe'
        )
            ->leftJoin('images AS first_image', 'first_images.min_id', 'first_image.id')
            ->select('vehicles.*', 'first_image.hinh_anh_xe')
            ->get();
        return response()->json([
            'data'   => $data,
        ]);
    }

    public function add(Request $request)
    {
        $xe = Vehicle::find($request->id);
        if ($xe) {
            $thanh_tien = $request->don_gia * $request->so_luong;
            TemporaryWareHouse::create([
                'id_xe' => $request->id,
                'don_gia' => $request->don_gia,
                'so_luong' => 1,
                'thanh_tien' => $request->don_gia,
            ]);
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã thêm danh sách nhập kho',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Thêm thất bại, xe không tồn tại',
            ]);
        }
    }


    public function dataTemporaryWareHouse()
    {
        $dataTemporaryWareHouse = TemporaryWareHouse::leftjoin('vehicles', 'vehicles.id', 'temporary_ware_houses.id_xe')
            ->select('temporary_ware_houses.*', 'vehicles.ten_xe')
            ->get();
        // dd($dataTemporaryWareHouse->toArray());
        return response()->json([
            'data' => $dataTemporaryWareHouse,
        ]);
    }

    public function updateThanhTien(Request $request)
    {
        $thanh_tien = $request->so_luong * $request->don_gia;
        $check = TemporaryWareHouse::find($request->id);
        if ($check) {
            $check->update([
                'so_luong' => $request->so_luong,
                'thanh_tien' => $thanh_tien
            ]);
            return response()->json([
                'status'    => 1,
                'thanh_tien' => $thanh_tien,
            ]);
        } else {
            return response()->json([
                'status'    => 0,
            ]);
        }
    }
    public function del(Request $request)
    {
        $xoaTWH = TemporaryWareHouse::find($request->id);
        if ($xoaTWH) {
            $xoaTWH->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa thành công',
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Xóa thất bại',
            ]);
        }
    }
    public function createWareHouse(Request $request)
    {
        if (!isset($request->ma_nhap)) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn chưa nhập mã nhập kho',
            ]);
        }
        $ngay_nhap      = Carbon::now();
        $check = WareHouse::where('ma_nhap', $request->ma_nhap)->first();
        if ($check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Mã nhập kho đã tồn tại',
            ]);
        }
        $data      = TemporaryWareHouse::leftjoin('vehicles', 'temporary_ware_houses.id_xe', 'vehicles.id')
            ->select('temporary_ware_houses.*', 'vehicles.ten_xe')
            ->get();
        foreach ($data as $key => $value) {
            WareHouse::create([
                'ma_nhap' => $request->ma_nhap,
                'ngay_nhap' => $ngay_nhap,
                'ten_xe' => $value->ten_xe,
                'so_luong' => $value->so_luong,
                'don_gia' => $value->don_gia,
                'thanh_tien' => $value->thanh_tien,
                'ghi_chu' => $value->ghi_chu,
                'id_xe' => $value->id_xe,
            ]);
            $this->updateVehicleQuantity($value->id_xe, $value->so_luong);
            $value->delete();
        }

        return response()->json([
            'status'    => 1,
            'message'   => 'Nhập kho thành công',
        ]);
    }
    public function updateVehicleQuantity($id_xe, $so_luong)
    {
        DB::table('vehicles')
            ->where('id', $id_xe)
            ->update([
                'so_luong' => DB::raw("so_luong + $so_luong")
            ]);
    }

    public function search(Request $request)
    {
        $data = Vehicle::leftJoin(
            DB::raw('(SELECT id_xe, MIN(id) AS min_id FROM images GROUP BY id_xe) AS first_images'),
            'vehicles.id',
            '=',
            'first_images.id_xe'
        )
            ->leftJoin('images AS first_image', 'first_images.min_id', 'first_image.id')
            ->where('vehicles.ten_xe', 'like', '%' . $request->giaTri . '%')
            ->select('vehicles.*', 'first_image.hinh_anh_xe')
            ->get();
        return response()->json([
            'data'   => $data,
        ]);
    }
    public function update(Request $request)
    {
        $data               = $request->all();
        $tmpNhapKho         = TemporaryWareHouse::where('id', $request->id)
            ->first();
        if ($tmpNhapKho) {
            $tmpNhapKho->update($data);
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật dữ liệu!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Dữ liệu không tồn tại!',
            ]);
        }
    }
}
