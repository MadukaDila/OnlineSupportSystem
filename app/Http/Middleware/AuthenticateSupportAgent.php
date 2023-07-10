<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateSupportAgent
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('support_agent')->check()) {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
