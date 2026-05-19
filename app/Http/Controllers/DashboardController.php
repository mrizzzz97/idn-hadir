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
        // Jika user yang login rolenya bukan admin, lempar ke halaman custom error 403
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki hak akses untuk membuka halaman Admin.');
        }

        return view('dashboards.admin');
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