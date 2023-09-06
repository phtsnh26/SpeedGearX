<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('page.customer.home.index');
    }
    public function indexContact()
    {
        return view('page.customer.contact.index');
    }
    public function indexDetail()
    {
        return view('page.customer.detail.index');
    }
}
