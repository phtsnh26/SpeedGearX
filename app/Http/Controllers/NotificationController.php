<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Notification;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function indexNotification($id)
    {
        $contact = Contact::find($id);
        return view('page.admin.notification.index', compact('contact'));
    }
    public function data()
    {
        $admin = Auth::guard('admin')->user();
        $chucVu = Personnel::join('permisions', 'permisions.id', 'personnels.id_phan_quyen')
        ->where('personnels.id', $admin->id)->select('permisions.ten_quyen')->first();
        $data = Notification::rightjoin('contacts', 'contacts.id', 'notifications.id_lien_he')
            ->select('contacts.*', 'contacts.ho_va_ten')
            ->get();
        // dd($data->toArray());
        return response()->json([
            'data' => $data,
            'chuc_vu' => $chucVu
        ]);
    }
}
