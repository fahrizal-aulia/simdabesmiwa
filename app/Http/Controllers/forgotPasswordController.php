<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class forgotPasswordController extends Controller
{
    public function index()
    {

        return View ('auth.forgot-password',[

        ]);
    }
    public function sendResetLinkEmail(Request $request)
        {
            $request->validate([
                'nik' => 'required|exists:users,nik',
                'email' => 'required|email|exists:users,email'
            ]);

            // Pastikan NIK dan email cocok dengan user
            $user = User::where('nik', $request->nik)->where('email', $request->email)->first();

            if (!$user) {
                return back()->withErrors(['email' => 'NIK dan Email tidak cocok dengan data kami.']);
            }

            // Mengirim reset link menggunakan email yang terdaftar
            $status = Password::sendResetLink(
                ['email' => $user->email]
            );

            return $status === Password::RESET_LINK_SENT
                        ? back()->with(['status' => __($status)])
                        : back()->withErrors(['email' => __($status)]);
        }






    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password')->with([
            'token' => $token,
            'nik' => $request->nik
        ]);
    }

    // Memproses reset password
    public function reset(Request $request)
    {
        $request->validate([
            'nik' => 'required|exists:users,nik',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        $user = \App\Models\User::where('nik', $request->nik)->first();

        // Reset password menggunakan token
        $status = Password::reset(
            [
                'email' => $user->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
                'token' => $request->token,
            ],
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('success', __($status))
                    : back()->withErrors(['nik' => [__($status)]]);
    }
}
