<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\userRegisterController;

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
// Landing Page
Route::get('/', [IndexController::class, 'index'])->name('index');

// User


Route::get('/User', [UserController::class, 'index'])->name('User');
Route::get('/User/Katalog', [UserController::class, 'katalog'])->name('Katalog');
Route::post('/User/Katalog/insert', [UserController::class, 'storeTransaksi'])->name('store.transaksi');


Route::group(['middleware' => 'admin'], function () {

    // Admin
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/Admin', [AdminController::class, 'index'])->name('Admin');
    Route::get('/Admin/KelolaAset', [AdminController::class,'Kelola_aset'])->name('Admin.KelolaAset');
    Route::delete('/Admin/KelolaAset/delete/{id}', [AdminController::class, 'destroyAset'])->name('Admin.deleteAset');
    Route::post('/Admin/KelolaAset/Store', [AdminController::class, 'storeAset'])->name('Admin.storeAset');
    Route::put('/Admin/KelolaAset/update/{id}', [AdminController::class, 'updateAset'])->name('Admin.updateAset');
    Route::get('/Admin/KelolaUser', [AdminController::class, 'Kelola_user'])->name('Admin.KelolaUser');
    Route::post('/Admin/KelolaUser/Store', [AdminController::class, 'storeUser'])->name('Admin.storeUser');
    Route::put('/Admin/KelolaUser/update/{id}', [AdminController::class, 'updateUser'])->name('Admin.updateUser');
    Route::delete('/Admin/KelolaUser/delete/{id}', [AdminController::class, 'destroyUser'])->name('Admin.deleteUser');
    Route::get('/Admin/KelolaPeminjaman', [AdminController::class, 'Kelola_Peminjaman'])->name('Admin.KelolaPeminjaman');
    Route::get('/Admin/SetujuiPeminjaman/{id}', [AdminController::class, 'Setujui_Peminjaman']);
    Route::get('/Admin/TolakPeminjaman/{id}', [AdminController::class, 'Tolak_Peminjaman']);
    Route::get('/Admin/AmbilPeminjaman/{id}', [AdminController::class, 'Ambil_Peminjaman']);
    Route::get('/Admin/SelesaikanPeminjaman/{id}', [AdminController::class, 'Selesaikan_Peminjaman']);
    Route::get('/Admin/RollbackPeminjaman/{id}', [AdminController::class, 'Rollback_Peminjaman']);
    Route::post('get-code-asset' , [AdminController::class,'get_code_asset']);
});


Auth::routes();

Route::post('/register/user', [userRegisterController::class,'register'])->name('user.register');
Route::post('/login', [LoginController::class, 'authenticate'])->name('Login');
Route::post('/register', [RegisterController::class, 'create'])->name('Register.user');
Route::get('/logoutuser', [UserController::class, 'logoutuser'])->name('logoutuser');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cetak-invoice/{id}', [App\Http\Controllers\HomeController::class, 'cetakInvoice'])->name('invoice.cetak');