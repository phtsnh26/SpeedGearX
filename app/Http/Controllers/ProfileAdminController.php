<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoiMatKhauAdminRequest;
use App\Http\Requests\DoiMatKhauRequest;
use App\Models\ProfileAdmin;
use App\Models\Admin;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileAdminController extends Controller
{
    public function indexProfile()
    {
        return view('page.admin.profile.index');
    }
    public function data()
    {
        $data = Auth::guard('admin')->user();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function changePass(DoiMatKhauAdminRequest $request)
    {
        // dd($request->all());
        $changePass = Auth::guard('admin')->user();
        if ($request->password != null) {
            if (Hash::check($request->password, $changePass->password)) {
                Personnel::find($changePass->id)
                    ->update([
                        'password' => bcrypt($request->mat_khau_moi),
                    ]);
                return response()->json([
                    'status'    => true,
                    'message'   => 'Đổi mật khẩu thành công !',
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Mật khẩu cũ không đúng !',
                ]);
            }
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Bạn chưa nhập mật khẩu cũ !',
            ]);
        }
    }
}
