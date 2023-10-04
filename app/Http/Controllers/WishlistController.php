<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function indexWishlist()
    {
        return view('page.customer.wishlist.index');
    }
    public function dataWishlist()
    {
        $client = Auth::guard('client')->user();

        $wishlist = Wishlist::where('id_khach_hang', $client->id)
            ->join('vehicles', 'wishlists.id_xe', '=', 'vehicles.id')
            ->select('wishlists.*', 'vehicles.ten_xe', 'vehicles.so_luong', 'vehicles.hinh_anh', 'vehicles.gia_theo_ngay')
            ->get();
        $yeu_thich = count($wishlist);
        return response()->json([
            'status'    =>  1,
            'data'      =>  $wishlist,
            'yeu_thich' =>  $yeu_thich,
        ]);
    }
    public function createWishlist(Request $request)
    {
        $client = Auth::guard('client')->user();

        $wishlist = Wishlist::where('id_khach_hang', $client->id)
            ->where('id_xe', $request->id)
            ->first();
        if ($wishlist) {
            $wishlist->delete();
            return response()->json([
                'trang_thai'    => 0,
            ]);
        } else {
            Wishlist::create([
                'id_khach_hang'   => $client->id,
                'id_xe'   => $request->id,
            ]);
            return response()->json([
                'trang_thai'    => 1,
            ]);
        }
    }
}
