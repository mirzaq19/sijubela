<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {   

        $guards = empty($guards) ? [null] : $guards;

        if(Auth::guard('buyer_user')->check()) {
            return redirect('/');
        }

        if(Auth::guard('seller_user')->check()) {
            return redirect()->route('penjual-dashboard');
        }

        if(Auth::guard('admin_user')->check()) {
            return redirect()->route('admin-dashboard');
        }

        return $next($request);
    }
}
