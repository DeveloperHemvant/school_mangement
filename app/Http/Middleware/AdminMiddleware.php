<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $guards = array_keys(config('auth.guards'));
        // $guard = null;
    
        // foreach ($guards as $g) {
        //     if (Auth::guard($g)->check()) {
        //         $guard = $g;
        //         return $next($request);
        //     }
        // }
    
        // // If no guard is authenticated, redirect to the admin login
        // return redirect()->route('adminlogin');
        if (Auth::guard('staff')->check()) {
            return $next($request);
        }
 
        return redirect()->route('adminlogin');
    }
    
}
