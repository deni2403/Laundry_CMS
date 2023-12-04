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

        if (Auth::guard('member')->attempt($request->only('email', 'password'))) {
            $request->authenticate();
            $request->session()->regenerate();
            return redirect('/member');
        } else {
            return redirect()->back()->with('error', 'Email atau Password salah');
        }
        
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
