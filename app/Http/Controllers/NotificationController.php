<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function indexNotification($id)
    {
        $contact = Contact::find($id);
        return view('page.admin.notification.index', compact('contact'));
    }
    public function data()
    {
        $data = Notification::rightjoin('contacts', 'contacts.id', 'notifications.id_lien_he')
            ->select('contacts.*', 'contacts.ho_va_ten')
            ->get();
        // dd($data->toArray());
        return response()->json([
            'data' => $data,
        ]);
    }
}
