<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function data()
    {
        $data = Client::get();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function status(Request $request)
    {
        $client = Client::where('id', $request->id)->first();
        if ($client) {
            $client->tinh_trang = !$client->tinh_trang;
            $client->save();
        }
    }
    public function search(Request $request)
    {
        $giaTri = '%' . $request->giaTri . '%';
        $data = Client::where('ho_va_ten', 'like', $giaTri)->get();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function del(Request $request)
    {
        $client = Client::where('id', $request->id)->first();
        if ($client) {
            $client->delete();
            return response()->json([
                'status'    => true,
                'message'   => 'Đã xóa User thành công !',
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Người dùng không tồn tại !',
            ]);
        }
    }
}
