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
        return view('login');
    }

    /**
     * Proses autentikasi login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed...
        return redirect()->intended('dashboard');
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

        return redirect('/login');
    }

   
public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}


public function handleGoogleCallback()
{
    try {
        $googleUser = Socialite::driver('google')->user();
    } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
        return redirect()->route('login')->with('error', 'Authentication failed, please try again.');
    }

    $user = User::updateOrCreate([
        'email' => $googleUser->getEmail(),
    ], [
        'name' => $googleUser->getName(),
        'google_id' => $googleUser->getId(),
        'password' => bcrypt('defaultpassword') // Menyediakan nilai default untuk password
    ]);

    Auth::login($user);

    return redirect('/dashboard');
}


}