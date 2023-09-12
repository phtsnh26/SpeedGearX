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
    /**
     * Display a listing of the resource.
     */
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
            ->get();
        $brand = Brand::get();
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
                        'hinh_anh_xe'       => $v,
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

        if($request->has('images')){
            $file = $request->images;
            $file_name = $file->getClientoriginalName();
            $file->move(public_path('image'), $file_name);
            $request->merge(['img' => $file_name]);
            dd($request->all());
        }



    }
}
