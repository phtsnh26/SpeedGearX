<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordClientRequest;
use App\Http\Requests\UpdateProfileClientRequest;
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

    public function order(){
        return view('page.customer.order.index');
    }
}
