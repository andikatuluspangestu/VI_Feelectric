<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('v_home/index');
});

// Route untuk dashboard admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/add-menu', function () {
        return view('/admin/add_menu');
    })->name('add.menu');
    Route::post('/menu/store', [AdminController::class, 'store'])->name('menu.store');
    Route::delete('/menu/{menu}', [AdminController::class, 'destroy'])->name('menu.destroy');
    // Dalam routes/web.php
    Route::get('/menu/{menu}/edit', [AdminController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{menu}', [AdminController::class, 'update'])->name('menu.update');

});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);


Route::get('/v_user', [UserController::class, 'index'])->name('v_user.index');

Route::get('/v_user/profile/{id}', [UserController::class, 'show'])->name('user.profile');

Route::get('/v_user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');

Route::post('/v_user/{id}', [UserController::class, 'update'])->name('user.update');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::post('/addresses/store', [AddressController::class, 'store'])->name('addresses.store');
Route::get('/provinces/{province}/cities', [AddressController::class, 'getCitiesByProvince'])->name('provinces.cities');
Route::get('/cities/{city}/districts', [AddressController::class, 'getDistrictsByCity'])->name('cities.districts');
Route::get('/coordinates-to-address', [AddressController::class, 'getAddressFromCoordinates'])->name('coordinates.address');


Route::get('/v_address', [AddressController::class, 'index'])->name('v_address.index');
// Route::get('/address', [AddressController::class, 'index'])->name('address.index')->middleware('auth');

Route::post('/address', [AddressController::class, 'store'])->name('address.store');
Route::get('/addresse/create', [AddressController::class, 'create'])->name('address.create');

Route::get('/address/{id}/edit', [AddressController::class, 'edit'])->name('address.edit');
Route::put('/address/{id}', [AddressController::class, 'update'])->name('address.update');
Route::delete('/address/{id}', [AddressController::class, 'destroy'])->name('address.destroy');

Route::get('/api/cities/{province_id}', [LocationController::class, 'getCitiesByProvince']);
Route::get('/api/address-from-coords',[LocationController::class, 'getAddressFromCoords']);
// Dalam file web.php, tambahkan route untuk menampilkan form
Route::get('/address/create', [LocationController::class, 'showForm'])->name('address.create');

Route::get('/notifications', [NotificationController::class, 'index'])->name('v_notif.index');
Route::get('/notifications/{id}', [NotificationController::class,'show'])->name('v_notif.show');




Route::get('/pesanans', [PesananController::class, 'index'])->name('v_pesanan.index');
Route::get('/pesanans/{id}', [PesananController::class, 'show'])->name('v_pesanan.show');



Route::get('/vouchers', [VoucherController::class, 'index'])->name('v_voucher.index');
Route::get('/vouchers/{id}', [VoucherController::class, 'show'])->name('v_voucher.show');


Route::get('/v_home', function () {
    return view('v_home.index');
})->name('v_home.index');

//mengatur menu
Route::get('/menu', [PesananController::class, 'showmenu'])->name('menu.showmenu');
Route::get('/user-menu', function() {
    return view('v_user.menu');
})->name('user.menu');



// Route::get('/v_user', function () {
//     return view('v_user.index');
// })->name('v_user.index');



