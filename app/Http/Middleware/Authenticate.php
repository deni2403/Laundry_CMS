<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // if (auth()->guard('member')->check()) {
        //     return $request->expectsJson() ? null : route('login.member');
        // }

        // if (auth()->guard('member')->check()) {
        //     return $request->expectsJson() ? null : route('login.worker');
        // }

        if (auth()->guard('member')->check()) {
            return $request->expectsJson() ? null : route('login.member');
        } elseif (auth()->guard('web')->check()) {
            return $request->expectsJson() ? null : route('login.worker');
        }

        // Jika tidak ada guard yang berhasil, kembalikan ke halaman login default
        return $request->expectsJson() ? null : route('landingPage');
    }
}
