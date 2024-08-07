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
    public function authenticate(request $request)
    {
        $credentials=$request->validate([
        'nik'=>'required',
        'password'=> 'required'
    ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role === 1) {
                return redirect('/dashboard');
            } elseif ($user->role === 2) {
                return redirect()->intended('/');
            }
        }
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
