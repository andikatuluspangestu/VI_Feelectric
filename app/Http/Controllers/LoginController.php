<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Menampilkan form login.
     *
     * @return \Illuminate\View\View
     */

     
    public function showLoginForm()
    {
        return view('v_login.index');  // Pastikan view ini benar
    }

    /**
     * Proses autentikasi login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();

        // Pemeriksaan role pengguna
        if (Auth::user()->role == 'admin') {
            // Jika pengguna adalah admin, arahkan ke halaman dashboard admin
            return redirect()->route('admin.dashboard');
        } else {
            // Jika pengguna bukan admin, arahkan ke halaman user biasa
            return redirect()->route('v_user.index');
        }
    }

    return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
}

    /**
     * Keluar dari sesi login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('v_login.index');  // Pastikan ini adalah route yang benar
    }

    /**
     * Redirect ke Google untuk autentikasi.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback dari Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Authentication failed, please try again.');
        }

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'username' => $googleUser->getEmail(),  // Menggunakan email sebagai username jika tidak tersedia
                'password' => Hash::make(uniqid())  // Generate password yang aman secara random
            ]
        );

        Auth::login($user, true);  // Remember the user

        return redirect()->route('v_user.index');  // Asumsikan ada route dashboard
    }
}
