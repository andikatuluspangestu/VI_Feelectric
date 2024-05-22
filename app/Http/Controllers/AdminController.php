<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class AdminController extends Controller
{
    public function __construct()
    {
        // Memastikan hanya pengguna yang terautentikasi dan merupakan admin yang bisa mengakses
        $this->middleware(['auth', 'admin']);
    }

    public function dashboard()
    {
        $menus = Menu::all(); // Mengambil semua data menu
       
        return view('admin.dashboard', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'productName' => 'required',
            'productDescription' => 'required',
            'productCategory' => 'required',
            'variant' => 'required',
            'priceHot' => 'required|numeric',
            'priceIce' => 'required|numeric',
            'productStock' => 'required|integer',
            'photoHot' => 'image|nullable',
            'photoIce' => 'image|nullable'
        ]);

        $menu = new Menu();
        $menu->name = $request->productName;
        $menu->description = $request->productDescription;
        $menu->category = $request->productCategory;
        $menu->variant = $request->variant;
        $menu->price_hot = $request->priceHot;
        $menu->price_ice = $request->priceIce;
        $menu->stock = $request->productStock;

        if ($request->hasFile('photoHot')) {
            $path = $request->file('photoHot')->store('public/menus');
            $menu->photo_hot = $path;
        }

        if ($request->hasFile('photoIce')) {
            $path = $request->file('photoIce')->store('public/menus');
            $menu->photo_ice = $path;
        }

        $menu->save();

        return redirect()->route('admin.dashboard')->with('success', 'Menu added successfully!');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return back()->with('success', 'Menu deleted successfully');
    }

    public function edit(Menu $menu)
    {
        return view('/admin/update_menu', compact('menu'));
    }

    public function update(Request $request, $id)
{
    // Validasi input
    $validatedData = $request->validate([
        'productName' => 'sometimes|required|max:255',
        'productDescription' => 'sometimes|required',
        'productCategory' => 'sometimes|required',
        'variant' => 'sometimes|required',
        'priceHot' => 'sometimes|required|numeric',
        'priceIce' => 'sometimes|required|numeric',
        'productStock' => 'sometimes|required|numeric',
        // Tambahkan validasi untuk foto jika perlu
    ]);

    $menu = Menu::find($id);
    $menu->name = $request->productName;
    $menu->description = $request->productDescription;
    $menu->category = $request->productCategory;
    $menu->variant = $request->variant;
    $menu->price_hot = $request->priceHot;
    $menu->price_ice = $request->priceIce;
    $menu->stock = $request->productStock;

    if ($request->hasFile('photoHot')) {
        $path = $request->file('photoHot')->store('public/menus');
        $menu->photo_hot = $path;
    }

    if ($request->hasFile('photoIce')) {
        $path = $request->file('photoIce')->store('public/menus');
        $menu->photo_ice = $path;
    }

    $menu->save();

    return redirect()->route('admin.dashboard')->with('success', 'Menu updated successfully!');
}

}