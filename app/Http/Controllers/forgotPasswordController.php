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

            $user = User::where('nik', $request->nik)->where('email', $request->email)->first();

            if (!$user) {
                return back()->withErrors(['email' => 'NIK dan Email tidak cocok dengan data kami.']);
            }

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

    public function reset(Request $request)
    {
        $request->validate([
            'nik' => 'required|exists:users,nik',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        $user = User::where('nik', $request->nik)->first();

        $status = Password::reset(
            [
                'email' => $user->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
                'token' => $request->token,
            ],
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('success', __($status))
                    : back()->withErrors(['nik' => [__($status)]]);
    }

    public function test()
    {
        $user = User::find(4);
        return View ('auth.email-reset',[
            'user'=> $user
        ]);
    }
}
