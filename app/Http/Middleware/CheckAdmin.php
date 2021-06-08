<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if (Auth::user()->role != 'adm') {
            if ($request->wantsJson()) {
                return response()->json(['Message', 'You do not access to this module'], 403);
            }
            abort(403, 'You do not access to this module');
        }
        // if (!$request->user()->role) {
        //     if ($request->wantsJson()) {
        //         return response()->json(['Message', 'You do not access to this module'], 403);
        //     }
        //     abort(403, 'You do not access to this module');
        // }
        return $next($request);
    }
}