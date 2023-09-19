<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginCustomer extends Model
{
    public function indexLoginCustomer()
    {
        return view('page.customer.loginCustomer.index');
    }
}
