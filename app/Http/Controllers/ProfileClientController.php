<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordClientRequest;
use App\Http\Requests\UpdateProfileClientRequest;
use App\Models\Booking;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileClientController extends Controller
{
    public function indexProfile()
    {
        return view('page.customer.profile.index');
    }
    public function dataProfile()
    {
        $client = Auth::guard('client')->user();
        return response()->json([
            'status'    => 1,
            'data'   => $client,
        ]);
    }

    public function updateProfile(UpdateProfileClientRequest $request)
    {
        $user_login = Auth::guard('client')->user();
        Client::where('id', $user_login->id)
            ->update([
                'cccd' => $request->cccd,
                'bang_lai_xe' => $request->bang_lai_xe,
                'gioi_tinh' => $request->gioi_tinh,
                'anh_dai_dien' => $request->anh_dai_dien
            ]);
        return response()->json([
            'status'    => 1,
            'message'   => 'Đã cập nhật thông tin cá nhân thành công',
        ]);
    }
    public function indexChangePass()
    {
        return view('page.customer.changePassword.index');
    }
    public function updatePassword(ChangePasswordClientRequest $request)
    {
        $user_changePass = Auth::guard('client')->user();
        $customer = Client::find($user_changePass->id);
        $customer->password = bcrypt($request->mat_khau_moi);
        $customer->save();
        return response()->json([
            'status' => 1,
            'message' => 'Đã cập nhật mật khẩu thành công!',
        ]);
    }

    public function order()
    {
        return view('page.customer.order.index');
    }
    public function dataOrder()
    {
        $client = Auth::guard('client')->user();
        $data = Booking::leftJoin('clients', 'bookings.id_khach_hang', 'clients.id')
            ->leftJoin('vehicles', 'vehicles.id', 'bookings.id_xe')
            ->leftJoin('brands', 'brands.id', 'vehicles.id_thuong_hieu')
            ->leftJoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
            ->select('bookings.*', 'vehicles.ten_xe',  'brands.ten_thuong_hieu', 'classifications.so_cho_ngoi')
            ->addSelect('clients.ho_va_ten', 'clients.ngay_sinh', 'clients.gioi_tinh', 'clients.dia_chi', 'clients.so_dien_thoai', 'clients.cccd', 'clients.bang_lai_xe')
            ->addSelect('images.hinh_anh_xe')
            ->where('id_khach_hang', $client->id)
            ->leftJoin('images', function ($join) {
                $join->on('images.id_xe', '=', 'vehicles.id')
                    ->whereRaw('images.id = (SELECT MIN(id) FROM images WHERE images.id_xe = vehicles.id)');
            })
            ->orderByDESC('created_at')
            ->get();
        return response()->json([
            'data' => $data,
        ]);
    }
}
