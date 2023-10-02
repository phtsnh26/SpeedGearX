<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Mail\ActiveMail;
use App\Models\Client;
use App\Models\LoginCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginCustomerController extends Controller
{
    public function indexLoginCustomer()
    {
        return view('page.customer.loginCustomer.index');
    }
    public function signIn(Request $request)
    {
        $check_1 = Auth::guard('client')->attempt(['email' => $request->ten_dang_nhap, 'password' => $request->password]);
        $check_3 = Auth::guard('client')->attempt(['ten_dang_nhap' => $request->ten_dang_nhap, 'password' => $request->password]);
        if ($check_1 || $check_3) {
            $client   =   Auth::guard('client')->user();
            if ($client->is_active == 0) {
                Auth::guard('client')->logout();  // Ép nó logout
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Vui lòng kích hoạt tài khoản!',
                ]);
            } else if ($client->tinh_trang == 0) {
                Auth::guard('client')->logout();
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản bạn đã bị khóa',
                ]);
            }
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã đăng nhập thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Tài khoản hoặc mật khẩu không đúng',
            ]);
        }
    }
    public function activeAccount($code)
    {
        $customer   =   Client::where('hash_active', $code)->first();

        if ($customer) {
            $customer->is_active    = 1;
            $customer->hash_active  = NULL;
            $customer->tinh_trang = $customer->is_active ? 1 : 0;
            $customer->save();
            toastr()->success('Đã kích hoạt tài khoản thành công!');
            return redirect('/login/client');
        } else {
            toastr()->error('Liên kết không tồn tại!');
            return redirect('/login/client');
        }
    }

    public function indexSignUp()
    {
        return view('page.customer.loginCustomer.indexSignUp');
    }

    public function signUp(SignUpRequest $request)
    {
        $data = $request->all();
        $data['hash_active']    = Str::uuid();
        $data['password']       = bcrypt($request->password);
        Client::create($data);
        $dataA['link']          =   env('APP_URL') . '/active/' . $data['hash_active'];
        $dataA['full_name']      =   $request->ho_va_ten;
        Mail::to($request->email)->send(new ActiveMail($dataA));
        return response()->json([
            'status'    => 1,
            'message'   => 'Bạn vui lòng kiểm tra email để kích hoạt tài khoản !',
        ]);
    }
}
