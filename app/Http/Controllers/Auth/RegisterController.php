<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        // Validasi data yang dikirim dari form
    // error_log('masuk', 0);
    
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'required|string',
        'address' => 'required|string',
        'phone_num' => 'required|string|min:8|unique:users',
    ]);
    // dd($validatedData);

    // Simpan user baru ke dalam database
    $user = new User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']);
    $user->address = $validatedData['address'];
    $user->phone_num = $validatedData['phone_num'];
    $user->save();

    // Redirect ke halaman lain dengan pesan sukses
    return redirect('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
