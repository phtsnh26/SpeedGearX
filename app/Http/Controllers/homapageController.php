<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Classification;
use App\Models\Images;
use App\Models\Review;
use App\Models\Vehicle;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class homapageController extends Controller
{
    //
    public function data()
    {
        $check = Auth::guard('client')->user();
        if ($check) {
            $brand = Brand::where('tinh_trang', 1)->get();
            $classification = Classification::get();
            $wishlist = Wishlist::where('id_khach_hang', $check->id)->get();
            $wishlistIds = $wishlist->pluck('id_xe')->toArray();
            $data = Vehicle::leftjoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
                ->leftjoin('brands', 'brands.id', 'vehicles.id_thuong_hieu')
                ->select('vehicles.*', 'classifications.so_cho_ngoi')
                ->where('brands.tinh_trang', 1)
                ->where('vehicles.so_luong', '>=', 1)
                ->orderByDESC('vehicles.created_at')
                ->get()
                ->map(function ($item) use ($wishlistIds) {
                    $item->isWishlists = in_array($item->id, $wishlistIds) ? 1 : 0;
                    return $item;
                });
        } else {
            $brand = Brand::where('tinh_trang', 1)->get();
            $classification = Classification::get();
            $data = Vehicle::leftjoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
                ->leftjoin('brands', 'brands.id', 'vehicles.id_thuong_hieu')
                ->select('vehicles.*', 'classifications.so_cho_ngoi')
                ->where('brands.tinh_trang', 1)
                ->where('vehicles.tinh_trang', 1)
                ->orderByDESC('vehicles.created_at')
                ->get();
            // dd($data->toArray());
        }
        if ($data->isNotEmpty()) {
            foreach ($data as $vehicle) {
                $totalRating = 0;
                $reviews = Review::where('id_xe', $vehicle->id)->get();
                foreach ($reviews as $review) {
                    $totalRating += $review->so_sao;
                }
                $averageRating = ($reviews->count() > 0) ? round($totalRating / $reviews->count()) : 0;
                $vehicle->so_luot_danh_gia = $reviews->count();
                $vehicle->tbc_sao = $averageRating;
                $vehicle->reviews = $reviews;
            }
        }
        $image = Images::get();
        return response()->json([
            'brand' => $brand,
            'classification' => $classification,
            'data' => $data,
            'images' => $image,

        ]);
    }

    public function data_all()
    {
        $check = Auth::guard('client')->user();
        if ($check) {
            $brand = Brand::where('tinh_trang', 1)->get();
            $classification = Classification::get();
            $wishlist = Wishlist::where('id_khach_hang', $check->id)->get();
            $wishlistIds = $wishlist->pluck('id_xe')->toArray();
            if (count($wishlistIds) == 0) {
                $data = Vehicle::leftjoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
                    ->leftjoin('brands', 'brands.id', 'vehicles.id_thuong_hieu')
                    ->select('vehicles.*', 'classifications.so_cho_ngoi')
                    ->where('brands.tinh_trang', 1)
                    ->where('vehicles.tinh_trang', 1)
                    ->where('vehicles.so_luong', '>=', 1)
                    ->orderByDESC('vehicles.created_at')
                    ->addSelect(DB::raw('IF(true, 0, 1) as isWishlists'));
                $soPage = ceil($data->count() / 9);
                $data = $data->paginate(9, ["*"], $soPage);
            } else {
                $data = Vehicle::leftjoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
                    ->leftjoin('brands', 'brands.id', 'vehicles.id_thuong_hieu')
                    ->select('vehicles.*', 'classifications.so_cho_ngoi')
                    ->where('brands.tinh_trang', 1)
                    ->where('vehicles.tinh_trang', 1)
                    ->where('vehicles.so_luong', '>=', 1)
                    ->orderByDESC('vehicles.created_at');
                $soPage = ceil($data->count() / 9);
                $data->addSelect(DB::raw('IF(vehicles.id IN (' . implode(',', $wishlistIds) . '), 1, 0) as isWishlists'));
                $data = $data->paginate(9, ["*"], $soPage);
            }
        } else {
            $brand = Brand::where('tinh_trang', 1)->get();
            $classification = Classification::get();
            $data = Vehicle::leftjoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
                ->leftjoin('brands', 'brands.id', 'vehicles.id_thuong_hieu')
                ->select('vehicles.*', 'classifications.so_cho_ngoi')
                ->where('brands.tinh_trang', 1)
                ->where('vehicles.tinh_trang', 1)
                ->orderByDESC('vehicles.created_at');
            $soPage = ceil($data->count() / 9);
            $data = $data->paginate(9, ["*"], $soPage);
        }
        $image = Images::get();

        if ($data->isNotEmpty()) {
            foreach ($data as $vehicle) {
                $totalRating = 0;
                $reviews = Review::where('id_xe', $vehicle->id)->get();
                foreach ($reviews as $review) {
                    $totalRating += $review->so_sao;
                }
                $averageRating = ($reviews->count() > 0) ? round($totalRating / $reviews->count()) : 0;
                $vehicle->so_luot_danh_gia = $reviews->count();
                $vehicle->tbc_sao = $averageRating;
                $vehicle->reviews = $reviews;
            }
        }
        return response()->json([
            'brand' => $brand,
            'classification' => $classification,
            'data' => $data,
            'images' => $image,
        ]);
    }

    public function allProduct()
    {
        $user_login = Auth::guard('client')->check();

        //   $user_login = 1;
        return view('page.customer.all-product.index', compact('user_login'));
    }
    public function dataMenuAllProduct()
    {
        $list = Brand::get();
        $classification = Classification::get();
        return response()->json([
            'list' => $list,
            'classification' => $classification
        ]);
    }
    public function filter(Request $request)
    {
        if (isset($request->min) && isset($request->max)) {
            $min = $request->min;
            $max = $request->max;
        } else if (isset($request->min) || isset($request->max)) {
            if (isset($request->min)) {
                $min = $request->min;
                $max = 999999999;
            } else {
                $min = 0;
                $max = $request->max;
            }
        } else {
            $min = 0;
            $max = 999999999;
        }
        $check = Auth::guard('client')->user();
        $brands = $request->input('id_brands', []);
        $classifications = $request->input('id_classifications', []);
        if ($check) {

            $wishlist = Wishlist::where('id_khach_hang', $check->id)->get();
            $wishlistIds = $wishlist->pluck('id_xe')->toArray();
            if (count($wishlistIds) == 0) {
                $query = Vehicle::leftjoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
                    ->select('vehicles.*', 'classifications.so_cho_ngoi')
                    ->addSelect(DB::raw('IF(true, 0, 1) as isWishlists'))

                    ->where('gia_theo_ngay', '>=', $min)
                    ->where('gia_theo_ngay', '<=', $max)
                    ->where('tinh_trang', 1);

                if (!empty($brands)) {
                    $query->whereIn('id_thuong_hieu', $brands);
                }

                if (!empty($classifications)) {
                    $query->whereIn('id_loai_xe', $classifications);
                }

                $soPage = ceil($query->count() / 9);
                $data = $query->paginate(9, ["*"], $soPage);
                $image = Images::get();
            } else {

                $query = Vehicle::leftjoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
                    ->select('vehicles.*', 'classifications.so_cho_ngoi')
                    ->addSelect(DB::raw('IF(true, 0, 1) as isWishlists'))
                    ->addSelect(DB::raw('IF(vehicles.id IN (' . implode(',', $wishlistIds) . '), 1, 0) as isWishlists'))
                    ->where('gia_theo_ngay', '>=', $min)
                    ->where('gia_theo_ngay', '<=', $max)
                    ->where('tinh_trang', 1);
                if (!empty($brands)) {
                    $query->whereIn('id_thuong_hieu', $brands);
                }
                if (!empty($classifications)) {
                    $query->whereIn('id_loai_xe', $classifications);
                }
                $soPage = ceil($query->count() / 9);
                // $data = $query->paginate(9, ["*"], $soPage);
                $data = $query->paginate(9, ["*"], $soPage);
                $image = Images::get();
                // dd($data->toArr());

            }
            if ($data->isNotEmpty()) {
                foreach ($data as $vehicle) {
                    $totalRating = 0;
                    $reviews = Review::where('id_xe', $vehicle->id)->get();
                    foreach ($reviews as $review) {
                        $totalRating += $review->so_sao;
                    }
                    $averageRating = ($reviews->count() > 0) ? round($totalRating / $reviews->count()) : 0;
                    $vehicle->so_luot_danh_gia = $reviews->count();
                    $vehicle->tbc_sao = $averageRating;
                    $vehicle->reviews = $reviews;
                }
            }
            return response()->json([
                'status' => 1,
                'data' => $data,
                'image' => $image,
            ]);
        }else{

            $query = Vehicle::leftjoin('classifications', 'classifications.id', 'vehicles.id_loai_xe')
            ->select('vehicles.*', 'classifications.so_cho_ngoi')
            ->addSelect(DB::raw('IF(true, 0, 1) as isWishlists'))
            ->where('gia_theo_ngay', '>=', $min)
                ->where('gia_theo_ngay', '<=', $max)
                ->where('tinh_trang', 1);
            if (!empty($brands)) {
                $query->whereIn('id_thuong_hieu', $brands);
            }
            if (!empty($classifications)) {
                $query->whereIn('id_loai_xe', $classifications);
            }
            $soPage = ceil($query->count() / 9);
            $data = $query->paginate(9, ["*"], $soPage);
            $image = Images::get();
            if ($data->isNotEmpty()) {
                foreach ($data as $vehicle) {
                    $totalRating = 0;
                    $reviews = Review::where('id_xe', $vehicle->id)->get();
                    foreach ($reviews as $review) {
                        $totalRating += $review->so_sao;
                    }
                    $averageRating = ($reviews->count() > 0) ? round($totalRating / $reviews->count()) : 0;
                    $vehicle->so_luot_danh_gia = $reviews->count();
                    $vehicle->tbc_sao = $averageRating;
                    $vehicle->reviews = $reviews;
                }
            }
            return response()->json([
                'status' => 1,
                'data' => $data,
                'image' => $image,
            ]);
        }
    }
}
