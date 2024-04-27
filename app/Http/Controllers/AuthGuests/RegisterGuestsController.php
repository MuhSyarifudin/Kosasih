<?php

namespace App\Http\Controllers\AuthGuests;

use App\Models\Tamu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterGuestsController extends Controller
{
    public function registerTamu(Request $request)
    {
        // Validasi input dari form register tamu
        $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'email_tamu' => 'required|string|email|max:255|unique:tamu',
            'password_tamu' => 'required|string|min:6',
            'file_tamu' => 'required|image|mimes:jpeg,png,jpg,gif',
            'foto_tamu' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Simpan data tamu ke dalam database
        Tamu::create([
            'nama_tamu' => $request->nama_tamu,
            'email_tamu' => $request->email_tamu,
            'password_tamu' => bcrypt($request->password_tamu),
            'file_tamu' => $request->file_tamu->store('tamu_files', 'public'),
            'foto_tamu' => $request->foto_tamu->store('tamu_files', 'public'),
        ]);

        // Redirect ke halaman setelah register berhasil
        return redirect('/')->with('success', 'Registration successful. Please log in.');
    }

    public function loginTamu(Request $request)
    {
        // Validasi input dari form login tamu
        $request->validate([
            'email_tamu' => 'required|string|email',
            'password_tamu' => 'required|string',
        ]);

        // Find the user by email
        $user = Tamu::where('email_tamu', $request->email_tamu)->first();

        // Check if the user exists and the password is correct
        if ($user && password_verify($request->password_tamu, $user->password_tamu)) {
            // Log in the user
            Auth::guard('tamu')->login($user);

            // Redirect to the intended page or a default page
            return redirect('/')->with('success', 'Login successful.');
        }

        // Authentication failed, redirect back with an error message
        return redirect()->back()->with('error', 'Email or password is incorrect.');
    }

    public function logoutTamu()
    {
        // Log out the authenticated user in the 'tamu' guard
        Auth::guard('tamu')->logout();

        // Redirect to the home page or any other desired location
        return redirect('/')->with('success', 'Logout successful.');
    }
}
