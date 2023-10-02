<?php

namespace App\Models;

use App\Http\Requests\SignUpRequest;
use App\Mail\ActiveMail;
use Flasher\Laravel\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class LoginCustomer extends Model
{
}
