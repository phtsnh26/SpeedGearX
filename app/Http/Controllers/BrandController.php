<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use App\Models\PermisionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
            ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Thương Hiệu', $check)) {
            $data =  $request->all();
            Brand::create($data);
            return response()->json([
                'status'    => true,
                'message'   => 'Thêm thương hiệu thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
            ]);
        }

    }
    public function del(Request $request)
    {
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
        ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Thương Hiệu', $check)) {
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
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
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
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
        ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Thương Hiệu', $check)) {
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
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
            ]);
        }
    }
    public function update(UpdateBrandRequest $request)
    {

        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
        ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Thương Hiệu', $check)) {
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
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
            ]);
        }
    }
    public function status(Request $request)
    {

        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
        ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Thương Hiệu', $check)) {
            $brand = Brand::where('id', $request->id)->first();
            if ($brand) {
                $brand->tinh_trang = !$brand->tinh_trang;
                $brand->save();
            }
            return response()->json([
                'status'    => true,
                'message'   => 'Đổi trạng thái thành công !',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
            ]);
        }
    }
}
