<?php

namespace App\Http\Controllers;

use App\Models\ListPermision;
use App\Models\Permision;
use App\Models\PermisionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.admin.permision.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function data()
    {
        $data = Permision::get();
        $list_quyen = ListPermision::where('tinh_trang', 1)->get();

        return response()->json([
            'data'    => $data,
            'list_quyen'    => $list_quyen,
        ]);
    }
    public function create(Request $request)
    {
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
        ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Phân Quyền', $check)) {
            $check = Permision::create($request->all());
            if ($check) {
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Thêm mới thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Thêm mới thất bại',
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
            ]);
        }

    }
    public function delete(Request $request)
    {
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
        ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Phân Quyền', $check)) {
            $check = Permision::find($request->id);
            if ($check) {
                $check->delete();
                $test = PermisionDetail::where('id_quyen', $request->id)->delete();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Xoá thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Xoá thất bại!',
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
            ]);
        }

    }
    public function capQuyen(Request $request)
    {
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
        ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Phân Quyền', $check)) {
            if (!empty($request->list_select)) {
                $check = PermisionDetail::where('id_quyen', $request->id)
                    ->whereIn('id_hanh_dong', $request->list_select)
                    ->first();

                if (!$check) {
                    foreach ($request->list_select as $key => $value) {
                        PermisionDetail::create([
                            "id_quyen" => $request->id,
                            "id_hanh_dong" => $value,
                        ]);
                    }

                    return response()->json([
                        'status' => 1,
                        'message' => 'Cấp quyền thành công!',
                    ]);
                } else {
                    $test = PermisionDetail::where('id_quyen', $request->id)->delete();
                    if ($test) {
                        foreach ($request->list_select as $key => $value) {
                            PermisionDetail::create([
                                "id_quyen" => $request->id,
                                "id_hanh_dong" => $value,
                            ]);
                        }
                        return response()->json([
                            'status' => 1,
                            'message' => 'Cấp quyền thành công!',
                        ]);
                    } else {
                        return response()->json([
                            'status' => 0,
                            'message' => 'Cấp quyền thất bại!',
                        ]);
                    }
                }
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Bạn chưa chọn quyền nào!',
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
            ]);
        }

    }
    public function addListPhanQuyen(Request $request){
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
        ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Phân Quyền', $check)) {
            if (isset($request->ten_quyen) && $request->ten_quyen != null) {
                $check = ListPermision::where('ten_hanh_dong', $request->ten_quyen)->first();
                if (!$check) {
                    ListPermision::create([
                        'ten_hanh_dong' => $request->ten_quyen
                    ]);
                    return response()->json([
                        'status'    => 1,
                        'message'   => 'Thêm mới quyền thành công!',
                    ]);
                } else {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Tên quyền này đã tồn tại!',
                    ]);
                }
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Vui lòng nhập tên quyền trước khi thêm!',
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
            ]);
        }
    }
    public function xoaListPhanQuyen(Request $request){
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
        ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Phân Quyền', $check)) {
            if (!empty($request->all())) {
                $check = PermisionDetail::whereIn('id_hanh_dong', $request->all())->first();
                if (!$check) {
                    $check->delete();
                    return response()->json([
                        'status'    => 1,
                        'message'   => 'Xoá thành công!',
                    ]);
                } else {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Quyền này đang được sử dụng',
                    ]);
                }
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Bạn cần chọn quyền để xoá',
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
            ]);
        }

    }
}
