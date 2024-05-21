<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses autentikasi user
    public function login(Request $request)
    {

        // Validasi data yang dikirim dari form
        // error_log('masuk', 0);
        $credentials = $request->validate([
            'phone_num' => 'required|string',
            'password' => 'required|string',
        ]);
        // dd($credentials);

        // Melakukan autentikasi user
        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, redirect ke halaman yang sesuai
            return redirect('/');
        } else {
            // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
            return redirect()->back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
        }
    }

    public function profile()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();
        $title = 'Data anda';

        // Jika pengguna tidak ditemukan, kembalikan ke halaman login
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to login first.');
        }

        // Tampilkan halaman profil dengan data pengguna
        return view('profile', compact('user','title'));
    }
    public function logout()
    {
        Auth::logout(); // Logout pengguna

        return redirect('/'); // Redirect ke halaman login setelah logout
    }
}
