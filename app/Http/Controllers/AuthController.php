<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function register()
    {
        $generalSettings = GeneralSetting::first();
        return view('Back_End.Auth.register', compact('generalSettings'));
    }

    public function registeruser(Request $request)
    {
        // Validasi input dari form
        $this->validate($request, [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string|in:admin,superadmin,owner',
        ]);

        // Simpan data admin ke dalam database
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        // Redirect ke halaman login setelah registrasi berhasil
        return redirect('/login');
    }


    public function login()
    {
        $generalSettings = GeneralSetting::first();
        return view('Back_End.Auth.login', compact('generalSettings'));
    }

    public function authentication(Request $request)
    {
        // Validasi input dari form login
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Coba melakukan proses autentikasi
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika autentikasi berhasil, redirect ke halaman yang sesuai
            return redirect('/dashboard'); // Ganti '/dashboard' dengan rute yang sesuai
        }

        // Jika autentikasi gagal, kembali ke halaman login dengan pesan kesalahan
        return redirect()->back()->with('error', 'Email atau password salah.');
    }


    public function showforgot()
    {
        $generalSettings = GeneralSetting::first();
        return view('Back_End.Auth.forgot', compact('generalSettings'));
    }

    public function forgotaction(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $response = Password::sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? back()->with('status', trans($response))
            : back()->withErrors(['email' => trans($response)]);
    }


    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}