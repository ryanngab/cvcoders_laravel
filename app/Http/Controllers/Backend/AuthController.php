<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $user = Auth::user();
                if ($user->role == true) {
                    return redirect()->route('home');
                } else {
                    return redirect()->route('home');
                }
            }

            return back()->withErrors(['email' => 'These credentials do not match our records.']);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat login. Silakan coba lagi.'])->withInput();
        }
    }

    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                // 'password' => 'required|min:6|confirmed',
                // 'password_confirmation' => 'same:password|min:6|required_with:password|confirmed|min:6',
            ]);

            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);

            return redirect()->route('login')->with('status', 'Akun berhasil dibuat. Silakan login.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.'])->withInput();
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email',
            ]);

            $status = Password::sendResetLink(
                $validatedData
            );

            if ($status == Password::RESET_LINK_SENT) {
                return back()->withStatus(__('A reset link has been sent to your email!'));
            } else {
                return back()->withErrors(['email' => 'Email tidak ditemukan atau tidak valid.']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat mengirimkan link reset password. Silakan coba lagi.']);
        }
    }

    public function reset(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'same:password|min:8',
            ]);

            $status = Password::reset(
                $validatedData,
                function ($user, $password) {
                    $user->forceFill([
                        'password' => bcrypt($password)
                    ])->save();

                    Auth::login($user);
                }
            );

            if ($status == Password::PASSWORD_RESET) {
                return redirect()->route('login')->with('status', __('Password has been reset!'));
            } else {
                return back()->withErrors(['email' => 'Tidak dapat mengatur ulang kata sandi.']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat mengatur ulang kata sandi. Silakan coba lagi.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Anda telah logout.');
    }
}
