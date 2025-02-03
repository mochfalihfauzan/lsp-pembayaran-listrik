<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HandleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenggunaanListrikController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/register-user', [PelangganController::class, 'index']);
Route::post('/register-user', [PelangganController::class, 'store']);

Route::get('/logout', [HomeController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [HandleController::class, 'index'])->middleware('auth')->name('main-dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('dashboard-admin');

    // User Management
    Route::get('/users-management', [UserManagementController::class, 'usersManagement'])->name('users-management');
    Route::get('/users-management/edit/{id}', [UserManagementController::class, 'edit'])->name('users-management-edit');
    Route::put('/users-management/edit/{id}', [UserManagementController::class, 'update'])->name('users-management-update');
    Route::delete('/users-management/delete/{id}', [UserManagementController::class, 'destroy'])->name('users-management-destroy');

    // Pelanggan Management
    Route::get('/pelanggan', [UserManagementController::class, 'pelanggan'])->name('pelanggan');
    Route::get('/pelanggan/{id}', [PelangganController::class, 'edit'])->name('pelanggan-edit');
    Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan-update');
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan-destroy');

    // Penggunaan Listrik
    Route::get('/admin/penggunaan-listrik', [PenggunaanListrikController::class, 'penggunaanListrikAdmin'])->name('penggunaan-listrik-admin');
    Route::get('/admin/penggunaan-listrik/create/{id}', [PenggunaanListrikController::class, 'createPenggunaanListrikAdmin'])->name('penggunaan-listrik-create');
    Route::post('/admin/penggunaan-listrik/create/{id}', [PenggunaanListrikController::class, 'createPenggunaanListrik'])->name('penggunaan-listrik-store');
    Route::get('/admin/penggunaan-listrik/edit/{id}', [PenggunaanListrikController::class, 'editPenggunaanListrikAdmin'])->name('penggunaan-listrik-edit');
    Route::put('/admin/penggunaan-listrik/edit/{id}', [PenggunaanListrikController::class, 'updatePenggunaanListrik'])->name('penggunaan-listrik-update');
    Route::put('/admin/penggunaan-listrik/paid', [PenggunaanListrikController::class, 'updatePembayaran'])->name('penggunaan-listrik-paid');
    Route::delete('/admin/penggunaan-listrik/delete/{id}', [PenggunaanListrikController::class, 'destroyPenggunaanListrik'])->name('penggunaan-listrik-destroy');
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/dashboard-user', [HomeController::class, 'index'])->name('dashboard-user');
    Route::get('/tagihan-listrik', [HomeController::class, 'tagihanListrik'])->name('tagihan-listrik');
    // pembayaran
    Route::post('/pembayaran', [PembayaranController::class, 'checkout'])->name('checkout');

    // Route::get('/penggunaan-listrik', [ProfileController::class, 'edit'])->name('profile.edit');
});


require __DIR__ . '/auth.php';
