<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function data()
    {
        $data   = Brand::get();
        return response()->json([
            'data'     => $data,
        ]);
    }
    public function add(AddBrandRequest $request)
    {
        $data =  $request->all();
        Brand::create($data);
        return response()->json([
            'status'    => true,
        ]);
    }
}
