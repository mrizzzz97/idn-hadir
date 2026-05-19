<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Tampilan Dashboard khusus Admin
     */
    public function admin()
    {
        // Pengamanan tambahan: Pastikan yang buka beneran admin
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman Admin.');
        }

        return view('dashboards.admin');
    }

    /**
     * Tampilan Dashboard khusus Guru
     */
    public function guru()
    {
        // Pengamanan tambahan: Pastikan yang buka beneran guru
        if (Auth::user()->role !== 'guru') {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman Guru.');
        }

        return view('dashboards.guru');
    }

    /**
     * Tampilan Dashboard khusus Siswa
     */
    public function siswa()
    {
        // Pengamanan tambahan: Pastikan yang buka beneran siswa
        if (Auth::user()->role !== 'siswa') {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman Siswa.');
        }

        return view('dashboards.siswa');
    }
}