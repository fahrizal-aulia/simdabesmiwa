<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->check() && auth()->user()->role != $role && auth()->user()->status_approve !=0) {
            return $next($request);
        }

        if (auth()->user()->status_approve !=0) {
            if (auth()->user()->role == 1) {
                return redirect('/dashboard')->with('error', 'You do not have permission to access this page.');

            }elseif (auth()->user()->role == 2) {
                return redirect('/')->with('error', 'You do not have permission to access this page.');
            }

        }


    }
}
