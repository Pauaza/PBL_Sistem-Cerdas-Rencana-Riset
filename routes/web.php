<?php

use Illuminate\Support\Facades\Route;



Route::get('/test-template', function () {
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