<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function indexHome()
    {
        return view('page.customer.home.index');
    }

    public function indexDetail()
    {
        return view('page.customer.detail.index');
    }
}
