<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPacker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role == 'Packer') {
            if (Auth::user()->role == 'Super Admin') {
                return redirect(route('dashboard.superadmin'));
            }
            if (Auth::user()->role == 'Admin') {
                return redirect(route('dashboard.admin'));
            }
            if (Auth::user()->role == 'Ironer') {
                return redirect(route('dashboard.ironer'));
            }
            if (Auth::user()->role == 'Cashier') {
                return redirect(route('dashboard.cashier'));
            }
        } else {
            return  $next($request);
        }
    }
}
