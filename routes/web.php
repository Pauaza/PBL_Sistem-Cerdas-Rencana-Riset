<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\admin\ManajemenDosenController;
use App\Http\Controllers\admin\ManajemenMhsController;


// Perbaikan Typo: Route::get (bukan Route: :get)
Route::get('/', function () {
    return view('auth.login');
});

// --- Login Routes ---
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/', function () { return view('mahasiswa.beranda_mahasiswa');});



// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard'); // buat file ini nanti
//     })->name('dashboard');
// });
// --- Protected Routes (Hanya bisa diakses jika sudah login) ---
Route::middleware('auth:mahasiswa,admin')->group(function () {

    // ================= MAHASISWA =================
    Route::prefix('mahasiswa')->group(function () {
        Route::get('/dashboard', function () {
            return view('mahasiswa.dashboard');
        })->name('mahasiswa.dashboard');


        Route::post('/hasil-rekomendasi', [MahasiswaController::class, 'hasil'])
            ->name('mahasiswa.hasil_rekomendasi');

        Route::get('/rekomendasi', [MahasiswaController::class, 'rekomendasi'])
            ->name('mahasiswa.rekomendasi');

        // DETAIL DOSEN
        Route::get('/dosen/{id}', [MahasiswaController::class, 'detailDosen'])
            ->name('dosen.show');
    });

    // ================= ADMIN =================
    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/manajemen-dosen', [ManajemenDosenController::class, 'index'])
            ->name('admin.manajemen_dosen');

        Route::resource('manajemen-mahasiswa', ManajemenMhsController::class)
            ->names('admin.manajemen_mahasiswa');

        Route::get('/profil', function () {
            return view('admin.profil');
        })->name('admin.profil');
    });
});
