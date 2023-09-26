<?php

namespace App\Http\Controllers;

use App\Models\WareHouse;
use App\Models\WareHouseReceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WareHouseReceiptController extends Controller
{
    public function indexWR()
    {
        return view('page.admin.warehouseReceipt.index');
    }
    public function data(Request $request)
    {
        $data = WareHouseReceipt::rightjoin('ware_houses', 'ware_houses.id', 'ware_house_receipts.id_nhap_kho')
            ->whereDate('ngay_nhap', '>=', $request->begin)
            ->whereDate('ngay_nhap', '<=', $request->end)
            ->select('ma_nhap', 'ngay_nhap', DB::raw('SUM(thanh_tien) as tong_tien'))
            ->groupBy('ma_nhap', 'ngay_nhap')
            ->orderByDESC('ngay_nhap')
            ->get();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function detail(Request $request)
    {
        $data    = WareHouse::where('ma_nhap', $request->ma_nhap)
            ->get();
        return response()->json([
            'detail' => $data,
        ]);
    }
}
