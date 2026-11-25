<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Nama kolom peran di tabel users. Ganti kalau di databasemu namanya lain.
    private const KOLOM_PERAN = 'peran';

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'peran' => ['required', 'in:operator,manajer,admin'],
        ]);

        $user = User::where(self::KOLOM_PERAN, $data['peran'])
            ->where('status', 'aktif')
            ->first();

        if (! $user) {
            return back()
                ->withErrors(['peran' => 'Belum ada akun aktif untuk peran ini.'])
                ->onlyInput('peran');
        }

        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->intended($user->peran === 'operator' ? route('catat-limbah') : '/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
