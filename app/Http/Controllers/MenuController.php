<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth; 

class MenuController extends Controller
{
    public function index()
    {
         // Mendapatkan data pengguna yang sedang login
         $user = Auth::user();

         // Jika tidak ada pengguna yang terautentikasi, redirect ke halaman login
         if (!$user) {
             return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
         }
 
        $menus = Menu::all();
        return view('v_menu.index', compact('menus','user'));
    }
}
