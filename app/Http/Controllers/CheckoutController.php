<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCheckOutRequest;
use App\Http\Requests\CreateGioHangRequest;
use App\Models\Checkout;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // public function execPostRequest($url, $data)
    // {
    //     $ch = curl_init($url);
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt(
    //         $ch,
    //         CURLOPT_HTTPHEADER,
    //         array(
    //             'Content-Type: application/json',
    //             'Content-Length: ' . strlen($data)
    //         )
    //     );
    //     curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    //     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //     //execute post
    //     $result = curl_exec($ch);
    //     //close connection
    //     curl_close($ch);
    //     return $result;
    // }
    // public function momo_payment(Request $request)
    // {
    //     header('Content-type: text/html; charset=utf-8');
    //     $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
    //     $partnerCode = 'MOMOBKUN20180529';
    //     $accessKey = 'klm05TvNBzhg7h7j';
    //     $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
    //     $orderInfo = "Thanh toán qua MoMo";
    //     $amount = str($_POST['total_momo']*10000);
    //     $orderId = time() . "";
    //     $returnUrl = "http://127.0.0.1:8000/";
    //     $notifyurl = "http://127.0.0.1:8000/";
    //     // Lưu ý: link notifyUrl không phải là dạng localhost
    //     $bankCode = "SML";
    //     $requestId = time() . "";
    //     $requestType = "payWithMoMoATM";
    //     $extraData = "";
    //     //before sign HMAC SHA256 signature
    //     $rawHashArr =  array(
    //         'partnerCode' => $partnerCode,
    //         'accessKey' => $accessKey,
    //         'requestId' => $requestId,
    //         'amount' => $amount,
    //         'orderId' => $orderId,
    //         'orderInfo' => $orderInfo,
    //         'bankCode' => $bankCode,
    //         'returnUrl' => $returnUrl,
    //         'notifyUrl' => $notifyurl,
    //         'extraData' => $extraData,
    //         'requestType' => $requestType
    //     );
    //     // echo $serectkey;die;
    //     $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&bankCode=" . $bankCode . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData . "&requestType=" . $requestType;
    //     $signature = hash_hmac("sha256", $rawHash, $secretKey);
    //     $data =  array(
    //         'partnerCode' => $partnerCode,
    //         'accessKey' => $accessKey,
    //         'requestId' => $requestId,
    //         'amount' => $amount,
    //         'orderId' => $orderId,
    //         'orderInfo' => $orderInfo,
    //         'returnUrl' => $returnUrl,
    //         'bankCode' => $bankCode,
    //         'notifyUrl' => $notifyurl,
    //         'extraData' => $extraData,
    //         'requestType' => $requestType,
    //         'signature' => $signature
    //     );
    //     $result = $this->execPostRequest($endpoint, json_encode($data));
    //     $jsonResult = json_decode($result, true);
    //     return redirect()->to($jsonResult['payUrl']);
    // }

    public function indexCheckOut()
    {
        return view('page.customer.checkout.index');
    }
    public function create(CreateCheckOutRequest $request)
    {
        $client = Auth::guard('client')->user();
        $xe = Vehicle::find($request->id);
        if ($xe->tinh_trang == 1) {
            if ($request->so_luong <= $xe->so_luong) {

                $ngayDat = Carbon::parse($request->ngay_dat);
                $ngayTra = Carbon::parse($request->ngay_tra);
                $soNgay = $ngayTra->diffInDays($ngayDat);
                $tongTien = $soNgay * $xe->gia_theo_ngay * $request->so_luong;
                $data = $request->all();
                $data['tong_tien'] = $tongTien;
                return response()->json([
                    'status' => 1,
                    'add' => $data,
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Bạn không thể thuê số lượng lớn hơn số lượng tồn của xe!',
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
                'message' => $xe ? 'Xe đã tạm dừng kinh doanh' : 'Xe không tồn tại',
            ]);
        }
    }
    public function data(Request $request)
    {
        $vehicle = Vehicle::leftJoin(
            DB::raw('(SELECT id_xe, MIN(id) AS min_id FROM images GROUP BY id_xe) AS first_images'),
            'vehicles.id',
            '=',
            'first_images.id_xe'
        )
            ->leftJoin('images AS first_image', 'first_images.min_id', 'first_image.id')
            ->select('vehicles.*', 'first_image.hinh_anh_xe')->find($request->id);
        return response()->json([
            'xe'    => $vehicle,
        ]);
    }
}
