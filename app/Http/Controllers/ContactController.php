<?php

namespace App\Http\Controllers;

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
        $data = Admin::first();
        return response()->json([
            'data'  => $data,
        ]);
    }
}
