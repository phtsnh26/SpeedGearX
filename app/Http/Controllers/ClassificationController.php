<?php

namespace App\Http\Controllers;

use App\Http\Requests\createClassificationRequest;
use App\Models\Classification;
use App\Models\Vehicle;
use Illuminate\Http\Request;

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
    }
}
