<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Client
{
    public function handle(Request $request, Closure $next): Response
    {
        $check  = Auth::guard('client')->check();
        if ($check) {
            return $next($request);
        } else {
            return redirect('/login/client');
        }
    }
}
