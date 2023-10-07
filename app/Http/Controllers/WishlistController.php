<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function indexWishlist()
    {
        return view('page.customer.wishlist.index');
    }
    public function dataWishlist()
    {
        $client = Auth::guard('client')->user();
        $data = Vehicle::leftJoin(
            DB::raw('(SELECT id_xe, MIN(id) AS min_id FROM images GROUP BY id_xe) AS first_images'),
            'vehicles.id',
            '=',
            'first_images.id_xe'
        )
            ->leftJoin('images AS first_image', 'first_images.min_id', 'first_image.id')
            ->leftJoin('wishlists', 'wishlists.id_xe', 'vehicles.id')
            ->select('wishlists.*', 'first_image.hinh_anh_xe', 'vehicles.ten_xe', 'vehicles.slug_xe', 'vehicles.so_luong', 'vehicles.gia_theo_ngay')
            ->where('vehicles.so_luong', '>=', 1)
            ->where('id_khach_hang', $client->id)
            ->get();
        $yeu_thich = count($data);
        return response()->json([
            'status'    =>  1,
            'data'      =>  $data,
            'yeu_thich' =>  $yeu_thich,
        ]);
    }
    public function createWishlist(Request $request)
    {
        $check = Auth::guard('client')->check();
        if ($check) {
            $client = Auth::guard('client')->user();

            $wishlist = Wishlist::where('id_khach_hang', $client->id)
                ->where('id_xe', $request->id)
                ->first();
            if ($wishlist) {
                $wishlist->delete();
                return response()->json([
                    'danhsachTim'  => $wishlist->count(),
                    'trang_thai'    => 0,
                    'message'   => 'Đã bỏ khỏi danh sách yêu thích'
                ]);
            } else {
                $danhsach =  Wishlist::create([
                    'id_khach_hang'   => $client->id,
                    'id_xe'   => $request->id,
                ]);
                return response()->json([
                    'trang_thai'    => 1,
                    'danhsachTim'  => $danhsach->count(),
                    'message'   => 'Đã thêm vào danh sách yêu thích'
                ]);
            }
        }
    }
    public function del(Request $request)
    {
        $client   = Auth::guard('client')->user();
        $xe = Vehicle::find($request->id_xe);
        $data       = WishList::where('id', $request->id)
            ->where('id_khach_hang', $client->id)
            ->first();
        if ($data) {
            $data->delete();
            return response()->json([
                'danhsachTim'  => $data->count(),
                'status'    => 1,
                'message'   => 'Đã xóa khỏi danh sách yêu thích'
            ]);
        } else {
        }
    }
}
