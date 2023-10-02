<?php

namespace App\Http\Controllers;

use App\Http\Requests\createVehicleRequest;
use App\Models\Brand;
use App\Models\Classification;
use App\Models\Images;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    public function indexVehicle()
    {
        return view('page.admin.vehicle.index');
    }
    public function data()
    {
        // $data = DB::select('SELECT vehicles.*, first_image.hinh_anh_xe
        // FROM vehicles
        // LEFT JOIN (
        //     SELECT id_xe, MIN(id) as min_id
        //     FROM images
        //     GROUP BY id_xe
        // ) AS first_images
        // ON vehicles.id = first_images.id_xe
        // LEFT JOIN images AS first_image
        // ON first_images.min_id = first_image.id');
        $data = Vehicle::leftJoin(
            DB::raw('(SELECT id_xe, MIN(id) AS min_id FROM images GROUP BY id_xe) AS first_images'),
            'vehicles.id',
            '=',
            'first_images.id_xe'
        )
            ->leftJoin('images AS first_image', 'first_images.min_id', 'first_image.id')
            ->leftJoin('brands', 'brands.id', 'vehicles.id_thuong_hieu')
            ->leftJoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
            ->select('vehicles.*', 'first_image.hinh_anh_xe', 'brands.ten_thuong_hieu', 'classifications.so_cho_ngoi')
            ->where('brands.tinh_trang', 1)
            ->get();
        $brand = Brand::where('tinh_trang', 1)->get();
        $classification = Classification::get();
        return response()->json([
            'data'   => $data,
            'brand'  => $brand,
            'classification' => $classification
        ]);
    }
    public function add(createVehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->vehicle);
        if ($vehicle) {
            if (count($request->image) > 0) {
                foreach ($request->image as $k => $v) {
                    Images::create([
                        'hinh_anh_xe'       => "/image/" . $v,
                        'id_xe'         => $vehicle->id,
                    ]);
                }
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã thêm thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Bạn cần thêm ảnh để thực hiện thức năng này!',
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Thêm xe thất bại!',
            ]);
        }
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $fileNames = [];

            foreach ($images as $image) {
                // Kiểm tra và xử lý mỗi hình ảnh
                if ($image->isValid()) {
                    $file_name = $image->getClientOriginalName();
                    $image->move(public_path('image'), $file_name);
                    $fileNames[] = $file_name;
                }
            }
            // Sau khi xử lý tất cả hình ảnh, thêm danh sách các tên file vào yêu cầu
            $request->merge(['img' => $fileNames]);
        }
        return response()->json([
            'data'   => $request->img,
        ]);
    }
    public function upLoadImg(Request $request)
    {
        $img = Images::where('id_xe', $request->id)->get();
        return response()->json([
            'data'   => $img,
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
            ->leftJoin('brands', 'brands.id', 'vehicles.id_thuong_hieu')
            ->leftJoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
            ->where('brands.ten_thuong_hieu', 'like', '%' . $request->key . '%')
            ->orWhere('vehicles.ten_xe', 'like', '%' . $request->key . '%')
            ->orWhere('classifications.so_cho_ngoi', 'like', '%' . $request->key . '%')
            ->select('vehicles.*', 'first_image.hinh_anh_xe', 'brands.ten_thuong_hieu', 'classifications.so_cho_ngoi')
            ->get();
        return response()->json([
            'data'   => $data,
        ]);
    }
    public function changeStatus(Request $request)
    {
        $vehicle = Vehicle::find($request->id);
        if ($vehicle) {
            $vehicle->tinh_trang = !$vehicle->tinh_trang;
            $vehicle->save();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đổi trạng thái thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Xảy ra lỗi!',
            ]);
        }
    }

    public function del(Request $request)
    {
        $vehicle = Vehicle::find($request->id);
        if ($vehicle) {
            $img = Images::where('id_xe', $request->id)->delete();
            $vehicle->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xoá thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Phương tiện này không tồn tại!',
            ]);
        }
    }
    public function update(Request $request)
    {
        $vehicle = Vehicle::find($request->vehicle['id'])->update($request->vehicle);

        if ($vehicle) {
            if ($request->image) {
                $img = Images::where('id_xe', $request->vehicle['id'])->delete();
                foreach ($request->image as $key => $value) {
                    # code...
                    $img = Images::create([
                        'hinh_anh_xe'           => '/image/' . $value,
                        'id_xe'         => $request->vehicle['id'],
                    ]);
                }
            }

            return response()->json([
                'status'    => 1,
                'message'   => 'Cập nhật thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Cập nhật thất bại!',
            ]);
        }
    }
}
