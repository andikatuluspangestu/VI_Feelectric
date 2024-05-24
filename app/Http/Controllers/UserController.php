<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in untuk melihat halaman ini.');
        }
        return view('v_user.index_logined', compact('user'));
    }

    public function show()
    {
        $user = Auth::user(); 
        return view('v_user.index', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); 
        return view('v_user.edit', compact('user')); 
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'phone' => 'required|numeric',
            'role' => 'required|in:user,admin',
            'profile_picture' => 'nullable|image|max:10240',
        ]);

        $date_of_birth = Carbon::createFromDate($request->input('year'), $request->input('month'), $request->input('day'))->format('Y-m-d');

        // Pengecekan dan penyimpanan file foto profil
        if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        // Pembaruan data pengguna
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'date_of_birth' => $date_of_birth,
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'role' => $request->input('role'),
        ]);

        // Arahkan pengguna kembali ke halaman profil dengan pesan sukses
        return redirect()->route('user.profile', $id)->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi password
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Pembaruan password
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        // Arahkan pengguna kembali ke halaman profil dengan pesan sukses
        return redirect()->route('user.profile', $id)->with('success', 'Password updated successfully!');
    }
}
