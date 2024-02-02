<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {
            // User is authenticated, proceed with the request
            return $next($request);
        } else {
            // User is not authenticated, set flash message and redirect
            $request->session()->flash('error', 'Access Denied');
            return redirect('/admin');
        }
    }
}
