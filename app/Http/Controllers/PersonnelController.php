<?php

namespace App\Http\Controllers;

use App\Http\Requests\createPersonnelRequest;
use App\Models\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    public function indexPersonnel()
    {
        return view('page.admin.personnel.index');
    }
    public function dataPersonnel()
    {
        $data = Personnel::get();
        return response()->json([
            'data'    => $data,
        ]);
    }
    public function store(createPersonnelRequest $request)
    {
        $check = Personnel::create([
            'ho_va_ten'         => $request->ho_va_ten,
            'ten_dang_nhap'     => $request->ten_dang_nhap,
            'email'             => $request->email,
            'password'          => bcrypt($request->password),
            'dia_chi'           => $request->dia_chi,
            'ngay_sinh'         => $request->ngay_sinh,
            'gioi_tinh'         => $request->gioi_tinh,
            'so_dien_thoai'     => $request->so_dien_thoai,
            'cccd'              => $request->cccd,
            'anh_minh_chung'    => $request->anh_minh_chung,
            'tinh_trang'        => 0,
            'id_phan_quyen'     => 1,
        ]);
        if ($check) {
            return response()->json([
                'status'    => 1,
                'message'   => 'Thêm mới nhân sự thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Thêm mới nhân sự thất bại!',
            ]);
        }
    }
    public function update(Request $request)
    {
        $check = Personnel::find($request->id);
        if ($check) {
            $check->update($request->all());
            return response()->json([
                'status'    => 1,
                'message'   => 'Cập nhật thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Cập nhật thất bại',
            ]);
        }
    }
    public function destroy(Request $request)
    {
        $check = Personnel::find($request->id);
        if ($check) {
            $check->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đuổi việc nhân sự ' . $request->ho_va_ten . " thành công!",
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Nhân sự này không tồn tại!',
            ]);
        }
    }
    public function changeStatus(Request $request){
        $check = Personnel::find($request->id);
        if($check){
            if($check->tinh_trang == 1){
                $check->tinh_trang = -1;
            }else{
                $check->tinh_trang = 1;
            }
            $check->save();
            return response()->json([
                'status'    => 1,
                'message'   => 'Dổi trạng thái thành công!',
            ]);
        }else{
            return response()->json([
                'status'    => 0,
                'message'   => 'Đổi trạng thái thất bại!',
            ]);
        }
    }
}
