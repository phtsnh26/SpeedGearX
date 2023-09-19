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
            ->select('vehicles.*', 'classifications.so_cho_ngoi')
            ->where('tinh_trang', 1)->get();
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
}
