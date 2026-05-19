<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Menggunakan query builder untuk menghitung data asli

class DashboardController extends Controller
{
    /**
     * Tampilan Dashboard khusus Admin
     */
    public function admin()
    {
        // Jika user yang login rolenya bukan admin, lempar ke halaman custom error 403
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki hak akses untuk membuka halaman Admin.');
        }

        // Ambil data riil dari database (Menghilangkan data dummy)
        $totalKelas = DB::table('classes')->count();
        $totalGuru = DB::table('users')->where('role', 'guru')->count();
        $totalSiswa = DB::table('users')->where('role', 'siswa')->count();
        $totalJadwal = DB::table('schedules')->count();

        // Oper semua variabel ke dalam view dashboards/admin.blade.php
        return view('dashboards.admin', compact('totalKelas', 'totalGuru', 'totalSiswa', 'totalJadwal'));
    }

    /**
     * Tampilan Dashboard khusus Guru
     */
    public function guru()
    {
        // Jika user yang login rolenya bukan guru, lempar ke halaman custom error 403
        if (Auth::user()->role !== 'guru') {
            abort(403, 'Anda tidak memiliki hak akses untuk membuka halaman Guru.');
        }

        return view('dashboards.guru');
    }

    /**
     * Tampilan Dashboard khusus Siswa
     */
    public function siswa()
    {
        // Jika user yang login rolenya bukan siswa, lempar ke halaman custom error 403
        if (Auth::user()->role !== 'siswa') {
            abort(403, 'Anda tidak memiliki hak akses untuk membuka halaman Siswa.');
        }

        return view('dashboards.siswa');
    }
}