<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Classification;
use App\Models\Images;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class homapageController extends Controller
{
    //
    public function data()
    {
        $brand = Brand::where('tinh_trang', 1)->get();
        $classification = Classification::get();
        $data = Vehicle::leftjoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
            ->leftjoin('brands', 'brands.id', 'vehicles.id_thuong_hieu')
            ->select('vehicles.*', 'classifications.so_cho_ngoi')
            ->where('brands.tinh_trang', 1)
            ->where('vehicles.tinh_trang', 1)
            ->orderByDESC('vehicles.created_at')
            ->get();
        $image = Images::get();
        // dd($data->toArray());
        return response()->json([
            'brand'   =>  $brand,
            'classification'   =>  $classification,
            'data'   =>  $data,
            'images' => $image
        ]);
    }

    public function data_all()
    {
        $brand = Brand::where('tinh_trang', 1)->get();
        $classification = Classification::get();
        $data =  Vehicle::leftjoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
            ->leftjoin('brands', 'brands.id', 'vehicles.id_thuong_hieu')
            ->select('vehicles.*', 'classifications.so_cho_ngoi')
            ->where('brands.tinh_trang', 1)
            ->where('vehicles.tinh_trang', 1)
            ->orderByDESC('vehicles.created_at')
            ->paginate(9, ["*"], 2);
        $image = Images::get();
        // dd($data->toArray());
        return response()->json([
            'brand'   =>  $brand,
            'classification'   =>  $classification,
            'data'   =>  $data,
            'images' => $image
        ]);
    }

    public function allProduct()
    {
        return view('page.customer.all-product.index');
    }
    public function dataMenuAllProduct()
    {
        $list = Brand::get();
        $classification = Classification::get();
        return response()->json([
            'list'   => $list,
            'classification' => $classification
        ]);
    }
    public function filter(Request $request)
    {
        if (isset($request->min) && isset($request->max)) {
            $min = $request->min;
            $max = $request->max;
        } else if (isset($request->min) || isset($request->max)) {
            if (isset($request->min)) {
                $min = $request->min;
                $max = 999999999;
            } else {
                $min = 0;
                $max = $request->max;
            }
        } else {
            $min = 0;
            $max = 999999999;
        }
        // $min = $request->input('min', 0);
        // $max = $request->input('max', 999999999);

        $brands = $request->input('id_brands', []);
        $classifications = $request->input('id_classifications', []);

        $query = Vehicle::leftjoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
            ->select('vehicles.*', 'classifications.so_cho_ngoi')
            ->where('gia_theo_ngay', '>=', $min)
            ->where('gia_theo_ngay', '<=', $max)
            ->where('tinh_trang', 1);

        if (!empty($brands)) {
            $query->whereIn('id_thuong_hieu', $brands);
        }

        if (!empty($classifications)) {
            $query->whereIn('id_loai_xe', $classifications);
        }

        $data = $query->get();
        $image = Images::get();

        return response()->json([
            'status' => 1,
            'data' => $data,
            'image' => $image,
        ]);
    }
}
