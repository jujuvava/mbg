<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DistributionController;
use App\Http\Controllers\PurchaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama (Landing Page)
Route::get('/', function () {
    return view('welcome');
});

/**
 * Grup Rute Terproteksi
 * Semua fitur di bawah ini hanya bisa diakses setelah login (auth).
 */
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard: Menampilkan ringkasan laporan pengeluaran
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Manajemen Menu: CRUD untuk mengelola daftar menu makanan
    Route::resource('menus', MenuController::class);

    // Gudang Gizi: CRUD untuk mengelola komposisi bahan (beras, telur, dll)
    Route::resource('ingredients', IngredientController::class);

    // Route untuk form input distribusi
    Route::get('/distribusi', [DistributionController::class, 'index'])->name('distribusi.index');
    Route::post('/distribusi/proses', [DistributionController::class, 'store'])->name('distribusi.store');

    // Route baru untuk melihat laporan/riwayat
    Route::get('/distribusi/riwayat', [DistributionController::class, 'history'])->name('distribusi.history');

    // Manajemen Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Route untuk menampilkan form edit (termasuk stok)
    Route::get('/ingredients/{ingredient}/edit', [IngredientController::class, 'edit'])->name('ingredients.edit');

    Route::prefix('purchases')->name('purchases.')->group(function () {
        Route::get('/', [PurchaseController::class, 'index'])->name('index');
        Route::get('/create', [PurchaseController::class, 'create'])->name('create');
        Route::post('/', [PurchaseController::class, 'store'])->name('store');
    });

    // Route untuk memproses update data/stok
    Route::put('/ingredients/{ingredient}', [IngredientController::class, 'update'])->name('ingredients.update');
});

// Memuat rute autentikasi bawaan Laravel Breeze (Login, Register, Logout)
require __DIR__ . '/auth.php';
