<?php

namespace App\Http\Controllers;

use App\Http\Requests\createClassificationRequest;
use App\Models\Classification;
use App\Models\PermisionDetail;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassificationController extends Controller
{
    public function indexClassification()
    {
        return view('page.admin.classification.index');
    }
    public function data()
    {
        $data = Classification::get();
        return response()->json([
            'data'   => $data,
        ]);
    }
    public function store(createClassificationRequest $request)
    {
        $who = Auth::guard('admin')->user();
        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
        ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Xe', $check)) {
            $classification = Classification::create($request->all());
            if ($classification) {
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Thêm mới chỗ ngồi thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Thêm mới chỗ ngồi thất bại!',
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

        $data = Classification::where('so_cho_ngoi', $request->gia_tri)->get();
        if ($request->gia_tri == null) {
            $data = Classification::get();
        }
        return response()->json([
            'data'   => $data,
        ]);
    }
    public function delete(Request $request)
    {
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
        ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Xe', $check)) {
            $classification = Classification::find($request->id);
            $vehicle = Vehicle::where('id_loai_xe', $request->id)->first();

            if ($vehicle) {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Loại xe này đang được sử dụng, tạm thời không thể xoá!',
                ]);
            } else {
                if ($classification) {
                    $classification->delete();
                    return response()->json([
                        'status'    => 1,
                        'message'   => 'Đã xoá thành công!',
                    ]);
                } else {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Loại xe này không tồn tại!',
                    ]);
                }
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
            ]);
        }

    }
}
