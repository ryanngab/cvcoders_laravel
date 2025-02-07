<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memastikan pengguna terautentikasi dan memiliki role admin
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return response()->view('errors.403', [], 403);
        }
        return $next($request);
    }
}
