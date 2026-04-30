<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected Routes (contoh)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // buat file ini nanti
    })->name('dashboard');
});


Route::get('/test-mahasiswa', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('welcome'); // sementara pakai ini dulu
})->name('dashboard');
Route::get('/rekomendasi', function () {
    return view('welcome'); // sementara
})->name('rekomendasi.index');
Route::get('/history', function () {
    return view('welcome'); // sementara
})->name('history.index');

// coba admin
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