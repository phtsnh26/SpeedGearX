<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Client
{
    public function handle(Request $request, Closure $next)
    {
        $check  = Auth::guard('client')->check();
        if ($check) {
            return $next($request);
        } else {
            return redirect('/login/client');
        }
    }
}
