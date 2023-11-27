<?php

namespace App\Http\Controllers\AuthMember;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthMember\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */

    public function create(): View
    {
        return view('memberLogin');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // if (Auth::user()->role == 'superadmin') {
        //     return redirect()->route('dashboard.superadmin');
        // } elseif (Auth::user()->role == 'admin') {
        //     return redirect()->route('dashboard.admin');
        // } elseif (Auth::user()->role == 'cashier') {
        //     return redirect()->route('dashboard.cashier');
        // } elseif (Auth::user()->role == 'ironer') {
        //     return redirect()->route('dashboard.ironer');
        // } elseif (Auth::user()->role == 'packer') {
        //     return redirect()->route('dashboard.packer');
        // }
        return redirect('/member');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('member')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
