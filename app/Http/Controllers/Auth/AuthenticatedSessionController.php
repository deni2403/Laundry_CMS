<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::user()->role == 'Super Admin') {
            return redirect()->route('dashboard.superadmin');
        } elseif (Auth::user()->role == 'Admin') {
            return redirect()->route('dashboard.admin');
        } elseif (Auth::user()->role == 'Cashier') {
            return redirect()->route('dashboard.cashier');
        } elseif (Auth::user()->role == 'Ironer') {
            return redirect()->route('dashboard.ironer');
        } elseif (Auth::user()->role == 'Packer') {
            return redirect()->route('dashboard.Packer');
        }
        return redirect('/dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
