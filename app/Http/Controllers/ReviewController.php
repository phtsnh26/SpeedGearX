<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function indexTestimonial()
    {
        return view("page.admin.review.index");
    }
    public function create(Request $request)
    {
        if (isset($request->so_sao) && $request->so_sao != 0) {

            $time = Carbon::now();
            $user = Auth::guard('client')->user();
            $check = Review::create([
                'danh_gia'          => $request->text,
                'thoi_gian'         => $time,
                'so_sao'            => $request->so_sao,
                'id_khach_hang'     => $user->id,
                'id_xe'             => $request->id_xe,
            ]);
            if ($check) {
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đánh giá thành công',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Đánh giá thất bại!',
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn chưa đánh giá số sao!',
            ]);
        }
    }
    public function data()
    {
        $data =  Review::leftJoin('clients', 'clients.id', '=', 'reviews.id_khach_hang')
            ->select('reviews.*', 'clients.*')
            ->orderBy('reviews.created_at', 'DESC')
            ->get();
        return response()->json([
            'data' => $data,
        ]);
    }

    public function dataReview(Request $request)
    {
        $totall = 0;
        $reviews = Review::leftjoin('clients', 'clients.id', 'reviews.id_khach_hang')->where('id_xe', $request->id)
            ->select('reviews.*', 'clients.ho_va_ten', 'clients.anh_dai_dien')->get();
        foreach ($reviews as $key => $value) {
            $totall += $value->so_sao;
        }
        $total = round($totall / $reviews->count());
        return response()->json([
            'reviews'    => $reviews,
            'total'      => $total,
            "tong_danh_gia" => $reviews->count()
        ]);
    }
}
