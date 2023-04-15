<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yudhatp\ActivityLogs\ActivityLogs;

class GetUrlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {

            $med1 = url()->current();
            $med2 = request()->route()->getActionMethod();
                        
            ActivityLogs::log(auth()->user()->id, $request->ip(), $med2, $med1);
        }
        return $next($request);
    }
}
