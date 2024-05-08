<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     
         $user = User::create([
             'name' => $validatedData['name'],
             'email' => $validatedData['email'],
             'password' => Hash::make($validatedData['password']),
         ]);
     
         Auth::login($user); // Memastikan baris ini dieksekusi
     
         return redirect('/dashboard');
     }
     
}
