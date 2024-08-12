<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title'=> 'login',
            'active'=> 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Cek status approve pengguna
            if ($user->status_approve == 0) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('loginError', 'Akun Anda belum disetujui. Silakan tunggu persetujuan.');
            }

            // Cek role pengguna setelah memastikan status_approve adalah 1
            if ($user->role === 1 && $user->status_approve == 1) {
                return redirect('/dashboard');
            } elseif ($user->role === 2 && $user->status_approve == 1) {
                return redirect()->intended('/');
            }
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
