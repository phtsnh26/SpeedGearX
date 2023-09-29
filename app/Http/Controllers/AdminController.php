<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\Brand;
use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function indexSignin()
    {
        return view('page.admin.account.signIn');
    }

    public function indexDashboard()
    {
        return view('page.admin.dashboard.index');
    }

    public function indexTestimonial()
    {
        return view("page.admin.testimonial.index");
    }
    public function indexReports()
    {
        return view('page.admin.report.index');
    }

    public function signIn(Request $request)
    {
        $data = $request->all();
        $check = Auth::guard('admin')->attempt($data);
        if ($check) {
            $admin = Admin::where('ten_dang_nhap', $request->ten_dang_nhap)
                ->first();
            if ($admin->is_active == 1) {
                return response()->json([
                    'status'    => true,
                    'message'   => 'Đăng nhập thành công',
                ]);
            }
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Tài khoản hoặc mật khẩu không đúng',
            ]);
        }
    }
    public function signOut()
    {
        Auth::guard('admin')->logout();
        return redirect('/login/admin');
    }
    public function dataDashboard(){
        $data['brand'] = Brand::all()->count();
        $data['vehicle'] = Vehicle::all()->count();
        $data['booking'] = Booking::all()->count();
        $data['client'] = Client::all()->count();
        return response()->json([
            'data'   => $data,
        ]);
    }


}
