<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\CartItem;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang login
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }
        return view('v_user.index_logined', compact('user')); // Mengirim pengguna yang login ke view
    }
    
  


public function show()
{
    $user = Auth::user(); // Dapatkan pengguna yang sedang login
    return view('v_user.index', compact('user'));
}

public function edit($id)
{
    $user = User::findOrFail($id); // Dapatkan user berdasarkan ID atau lempar 404 jika tidak ditemukan
    return view('v_user.edit', compact('user')); // Ganti 'user.edit' dengan 'v_user.edit'
}


public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'date_of_birth' => 'required|date',
        'gender' => 'required',
        'phone' => 'required|numeric'
    ]);

    // Pengecekan dan penyimpanan file foto profil
    if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $request->merge(['profile_picture' => $path]); // Menyimpan path baru ke dalam array request sebelum update
    }

    // Pembaruan data pengguna
    $user->update($request->all());

    // Arahkan pengguna kembali ke halaman profil dengan pesan sukses
    return redirect()->route('user.profile', $id)->with('success', 'Profile updated successfully!');
}
public function cartItems()
{
    return $this->hasMany(CartItem::class);
}
}



