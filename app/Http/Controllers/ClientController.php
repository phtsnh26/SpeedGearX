<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\PermisionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function indexUser()
    {
        return  view('page.admin.user.index');
    }
    public function data()
    {
        $data = Client::get();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function status(Request $request)
    {
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
        ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý NGười Dùng', $check)) {
            $client = Client::where('id', $request->id)->first();
            if ($client) {
                $client->tinh_trang = !$client->tinh_trang;
                $client->save();
            }
            return response()->json([
                'status'    => true,
                'message'   => 'Đã đổi trạng thái thành công !',
            ]);
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
        $data = Client::where('ho_va_ten', 'like', $giaTri)
                        ->orWhere('email','like', $giaTri)
                        ->orWhere('so_dien_thoai','like', $giaTri)
                        ->orWhere('dia_chi','like', $giaTri)
                        ->orWhere('cccd','like', $giaTri)
                        ->get();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function del(Request $request)
    {
        $who = Auth::guard('admin')->user();

        $check = PermisionDetail::join('list_permisions', 'list_permisions.id', 'permision_details.id_hanh_dong')
        ->where('id_quyen', $who->id_phan_quyen)
            ->select('list_permisions.ten_hanh_dong')
            ->pluck('ten_hanh_dong') // Lấy mảng của các giá trị 'ten_hanh_dong'
            ->toArray(); // Chuyển đổi sang mảng
        if (in_array('Quản Lý người dùng', $check)) {
            $client = Client::where('id', $request->id)->first();
            if ($client) {
                $client->delete();
                return response()->json([
                    'status'    => true,
                    'message'   => 'Đã xóa User thành công !',
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Người dùng không tồn tại !',
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
