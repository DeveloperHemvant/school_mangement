<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class StaffMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Determine the guard
        // $guards = array_keys(config('auth.guards'));
        // $guard = null;
        
        // foreach ($guards as $g) {
        //     if (Auth::guard($g)->check()) {
        //         $guard = $g;
                
        //     }
        // }
        
        // return redirect()->route('stafflogin');

// dd('hello');



        if (Auth::guard('staff')->check()) {
            return $next($request);
        }
 
        return redirect()->route('stafflogin');
        
    }
}
