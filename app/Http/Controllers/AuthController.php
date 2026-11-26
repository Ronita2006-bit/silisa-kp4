<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'peran'    => ['required', 'in:operator,manajer,admin'],
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $berhasil = Auth::attempt([
            'email'    => $data['email'],
            'password' => $data['password'],
            'peran'    => $data['peran'],
            'status'   => 'aktif',
        ], $request->boolean('remember'));

        if (! $berhasil) {
            return back()
                ->withErrors(['email' => 'Email, password, atau peran tidak cocok, atau akun nonaktif.'])
                ->onlyInput('email', 'peran');
        }

        $request->session()->regenerate();

        $tujuan = Auth::user()->peran === 'operator'
            ? route('catat-limbah')
            : '/';

        return redirect()->intended($tujuan);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
