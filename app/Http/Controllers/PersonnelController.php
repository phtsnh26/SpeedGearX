<?php

namespace App\Http\Controllers;

use App\Http\Requests\createPersonnelRequest;
use App\Mail\ActiveMail;
use App\Models\Permision;
use App\Models\PermisionDetail;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PersonnelController extends Controller
{
    public function capCV(Request $request)
    {
        // dd($request->all());
        $who = Auth::guard('admin')->user();
        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
            ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Nhân Sự', $check)) {
            $cap = Personnel::where('id', $request->id)->first();
            if ($cap) {
                $cap->update([
                    'id_phan_quyen' => $request->id_quyen,
                ]);
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Cấp quyền thành công',
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
        $edit = Permision::where('id', $request->id_phan_quyen)->first();
        if ($edit) {
            return response()->json([
                'status'    => 1,
                'id_quyen'     => $edit->id,
            ]);
        }
    }

    public function indexPersonnel()
    {
        return view('page.admin.personnel.index');
    }
    public function dataPersonnel()
    {
        $data = Personnel::leftjoin('permisions', 'permisions.id', 'personnels.id_phan_quyen')
            ->select('permisions.*', 'personnels.*')
            ->get();
        $dataQuyen = Permision::get();
        return response()->json([
            'data'    => $data,
            'dataQuyen' => $dataQuyen,
        ]);
    }
    public function store(createPersonnelRequest $request)
    {
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
            ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Phân Quyền', $check)) {
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
                'id_phan_quyen'     => 0,
            ]);
            $dataA['link']          =   env('APP_URL') . '/active-admin/';
            $dataA['full_name']      =   $request->ho_va_ten;
            Mail::to($request->email)->send(new ActiveMail($dataA));
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
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
            ]);
        }
    }
    public function update(Request $request)
    {
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
            ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Phân Quyền', $check)) {

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
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
            ]);
        }
    }
    public function destroy(Request $request)
    {
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
            ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Phân Quyền', $check)) {
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
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không đủ thẩm quyền để thực hiện chức năng này',
            ]);
        }
    }
    public function changeStatus(Request $request)
    {
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
            ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý Phân Quyền', $check)) {

            $check = Personnel::find($request->id);
            if ($check) {
                if ($check->tinh_trang == 1) {
                    $check->tinh_trang = -1;
                } else {
                    $check->tinh_trang = 1;
                }
                if ($request->id == $who->id) {
                    $check->save();
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Bạn không thể tự ban chính mình :))',
                    ]);
                }
                $check->save();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Dổi trạng thái thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Đổi trạng thái thất bại!',
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
