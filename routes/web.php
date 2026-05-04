<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MahasiswaController;

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () { return view('mahasiswa.beranda_mahasiswa');});
Route::get('/rekomendasi', [MahasiswaController::class, 'rekomendasi'])
    ->name('rekomendasi.index');

Route::post('/hasil-rekomendasi', [MahasiswaController::class, 'hasil'])
    ->name('rekomendasi.hasil');
    
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // buat file ini nanti
    })->name('dashboard');
});


//coba admin
Route::get('/test-admin', function () {
    return view('welcome_admin');
});
Route::get('/dashboard', function () {
    return view('welcome_admin'); // sementara pakai ini dulu
})->name('dashboard');
Route::get('/rekomendasi', function () {
    return view('welcome_admin'); // sementara
})->name('rekomendasi.index');
Route::get('/history', function () {
    return view('welcome_admin'); // sementara
})->name('history.index');