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
    public function data(){
        $brand = Brand::where('tinh_trang', 1)->get();
        $classification = Classification::get();
        $data = Vehicle::where('tinh_trang', 1)->get();
        $image = Images::get();
        return response()->json([
            'brand'   =>  $brand ,
            'classification'   =>  $classification ,
            'data'   =>  $data ,
            'images' => $image
        ]);
    }
}
