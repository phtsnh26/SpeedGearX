<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Classification;
use App\Models\Client;
use App\Models\Customer;
use App\Models\GioHang;
use App\Models\Images;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function indexHome()
    {
        return view('page.customer.home.index');
    }


    public function indexDetail($slug_xe)

    {
        $data = Vehicle::leftjoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
            ->select('vehicles.*', 'classifications.so_cho_ngoi')
            ->where('slug_xe', '=', $slug_xe)->first();
        // dd($data);
        return view('page.customer.detail.index', compact('data'));
    }
    public function loadImageDetail(Request $request)
    {
        $img = Images::where('id_xe', $request->id)->get();
        return response()->json([
            'image'   => $img,
        ]);
    }
    public function getThuongHieu()
    {
        $data = Brand::where('tinh_trang', 1)->get();
        $classification = Classification::get();
        return response()->json([
            'data'   => $data,
            'classification' => $classification
        ]);
    }
    public function logout()
    {
        Auth::guard('client')->logout();
        return redirect('/');
    }

}
