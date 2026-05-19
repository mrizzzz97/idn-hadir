<?php

use App\Http\Controllers\AuthPageController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Halaman Publik
Route::get('/', [AuthPageController::class, 'landing'])->name('landing');

// Buka Halaman Login (GET)
Route::get('/login', [AuthPageController::class, 'login'])->name('login');

// Proses Kirim Data Login (POST) -> Ini yang memicu error jika belum ada
Route::post('/login', [AuthPageController::class, 'authenticate'])->name('login.post');

// Proses Keluar (POST)
Route::post('/logout', [AuthPageController::class, 'logout'])->name('logout');

// Proteksi Halaman Dashboard Berdasarkan Login & Role
Route::middleware(['auth'])->group(function () {
    
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/guru/dashboard', [DashboardController::class, 'guru'])->name('guru.dashboard');
    Route::get('/siswa/dashboard', [DashboardController::class, 'siswa'])->name('siswa.dashboard');
    
});