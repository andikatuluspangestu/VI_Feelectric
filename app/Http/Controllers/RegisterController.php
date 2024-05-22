<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Menampilkan form pendaftaran.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('v_register.index'); // Menampilkan view form registrasi
    }

    /**
     * Proses pendaftaran pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Melakukan validasi data yang dikirimkan melalui form
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email|max:255',
            'username' => 'required|string|unique:users,username|max:255', // Validasi username
            'password' => 'required|string|min:8|confirmed', // Konfirmasi password harus sesuai
        ]);

        // Membuat pengguna baru
        $user = User::create([
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'remember_token' => Str::random(60),  // Memastikan ini dieksekusi
        ]);
        
        if ($user) {
            Auth::login($user, true); // menggunakan true untuk "remember me"
            return redirect()->route('v_user.index');
        }
        

        // Jika ada kesalahan tidak terduga, kembali ke form dengan pesan kesalahan
        return back()->withErrors('Gagal membuat pengguna baru.');
    }
}
