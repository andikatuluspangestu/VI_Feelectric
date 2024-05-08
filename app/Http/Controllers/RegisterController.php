<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /**
     * Menampilkan form pendaftaran.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('register');
    }

    /**
     * Proses pendaftaran pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
   
     public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed|min:8',
    ]);

    // Mencoba membuat pengguna baru
    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
    ]);

    // Memeriksa jika pengguna berhasil dibuat
    if ($user) {
        Auth::login($user); // Loginkan pengguna
        Log::info('Registrasi user baru', ['user_id' => $user->id]);  // Menambahkan log info

        return redirect('/dashboard'); // Mengarahkan ke dashboard
    } else {
        // Jika pembuatan pengguna gagal, kembali ke form registrasi dengan error
        return back()->withErrors('Gagal membuat pengguna baru.');
    }
}

}
