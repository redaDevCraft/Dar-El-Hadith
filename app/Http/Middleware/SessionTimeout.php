<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionTimeout
{
    protected $timeout = 120; // 2 minutes

    public function handle($request, Closure $next)
    {
        if (!Session::has('lastActivityTime')) {
            Session::put('lastActivityTime', time());
        } elseif (time() - Session::get('lastActivityTime') > $this->timeout) {
            Session::forget('lastActivityTime');
            Auth::logout();
            return redirect()->route('login')->with('message', 'You have been logged out due to inactivity.');
        }

        Session::put('lastActivityTime', time());

        return $next($request);
    }
}