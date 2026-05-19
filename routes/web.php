<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthPageController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// ==========================================
// 1. HALAMAN PUBLIK / TAMU (BELUM LOGIN)
// ==========================================
Route::get('/', [AuthPageController::class, 'landing'])->name('landing');
Route::get('/login', [AuthPageController::class, 'login'])->name('login');
Route::post('/login', [AuthPageController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthPageController::class, 'logout'])->name('logout');


// ==========================================
// 2. HALAMAN PROTEKSI (WAJIB LOGIN DULU)
// ==========================================
Route::middleware(['auth'])->group(function () {
    
    // --- ROUTE UTAMA DASHBOARD MASING-MASING ROLE ---
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/guru/dashboard', [DashboardController::class, 'guru'])->name('guru.dashboard');
    Route::get('/siswa/dashboard', [DashboardController::class, 'siswa'])->name('siswa.dashboard');

    // --- FITUR ADMIN: MANAJEMEN KELAS ---
        Route::get('/admin/kelas', [AdminController::class, 'indexKelas'])->name('admin.kelas');
        Route::post('/admin/kelas', [AdminController::class, 'storeKelas'])->name('admin.kelas.store');
        Route::put('/admin/kelas/{id}', [AdminController::class, 'updateKelas'])->name('admin.kelas.update'); // <-- TAMBAH INI
        Route::delete('/admin/kelas/{id}', [AdminController::class, 'destroyKelas'])->name('admin.kelas.destroy'); // <-- TAMBAH INI

    // --- FITUR ADMIN: MANAJEMEN AKUN GURU ---
        Route::get('/admin/guru', [AdminController::class, 'indexGuru'])->name('admin.guru');
        Route::post('/admin/guru', [AdminController::class, 'storeGuru'])->name('admin.guru.store');
        Route::put('/admin/guru/{id}', [AdminController::class, 'updateGuru'])->name('admin.guru.update');
        Route::delete('/admin/guru/{id}', [AdminController::class, 'destroyGuru'])->name('admin.guru.destroy');

    // --- FITUR ADMIN: MANAJEMEN AKUN SISWA ---
    Route::get('/admin/siswa', [AdminController::class, 'indexSiswa'])->name('admin.siswa');
    Route::post('/admin/siswa', [AdminController::class, 'storeSiswa'])->name('admin.siswa.store');

    // --- FITUR ADMIN: MANAJEMEN JADWAL & AGENDA ---
    Route::get('/admin/jadwal', [AdminController::class, 'indexJadwal'])->name('admin.jadwal');
    Route::post('/admin/jadwal', [AdminController::class, 'storeJadwal'])->name('admin.jadwal.store');
    
});