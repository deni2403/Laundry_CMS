<?php

namespace App\Http\Controllers\AuthMember;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $member = Member::find(Auth::guard('member')->id()); // Ambil model Member sesuai dengan id pengguna yang sedang login
        $member->password = Hash::make($validated['password']);
        $member->save();
        return back()->with('success', 'Password Berhasil Diubah!');
    }
}
