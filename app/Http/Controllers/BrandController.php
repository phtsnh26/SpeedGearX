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
    public function del(Request $request)
    {
        $brand = Brand::where('id', $request->id)->first();

        if ($brand) {
            $brand->delete();

            return response()->json([
                'status'    => true,
                'message'   => 'Đã xóa Brand thành công !',
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Brand không tồn tại !',
            ]);
        }
    }
    public function search(Request $request)
    {
        $giaTri = '%' . $request->giaTri . '%';
        $data = Brand::where('ten_thuong_hieu', 'like', $giaTri)->get();
        return response()->json([
            'data' => $data,
        ]);
    }
}
