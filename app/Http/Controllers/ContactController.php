<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Admin;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function indexContact()
    {
        return view('page.customer.contact.index');
    }
    public function data()
    {
        $data = Admin::select('admins.*', 'admins.email', 'admins.so_dien_thoai')
            ->first();
        return response()->json([
            'data'  => $data,
        ]);
    }
    public function add(ContactRequest $request)
    {
        $contact = $request->all();
        if ($contact) {
            Contact::create($contact);
            return response()->json([
                'status'    => 1,
                'message'   => 'Gửi liên hệ thành công !',
            ]);
        }
    }
}
