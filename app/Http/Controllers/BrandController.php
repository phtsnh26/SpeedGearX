<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function indexBrand()
    {
        return view('page.admin.brand.index');
    }
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
    public function edit(Request $request)
    {
        $brand = Brand::where('id', $request->id)->first();
        if ($brand) {
            return response()->json([
                'status'    => true,
                'data'   => $brand,
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Dữ liệu không chính xác !',
            ]);
        }
    }
    public function update(UpdateBrandRequest $request)
    {
        $brand = Brand::where('id', $request->id)->first();
        $brand->update([
            'ten_thuong_hieu'    =>  $request->ten_thuong_hieu,
            'slug_thuong_hieu'   =>  $request->slug_thuong_hieu,
            'hinh_anh'          =>  $request->hinh_anh,
            'tinh_trang'        =>  $request->tinh_trang,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật mới thành công',
        ]);
    }
    public function status(Request $request)
    {
        $brand = Brand::where('id', $request->id)->first();
        if ($brand) {
            $brand->tinh_trang = !$brand->tinh_trang;
            $brand->save();
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Đổi trạng thái thành công !',
        ]);
    }
}
