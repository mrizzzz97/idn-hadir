<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthPageController extends Controller
{
    // 1. Tampilkan Landing Page
    public function landing()
    {
        return view('landing');
    }

    // 2. Tampilkan Halaman Login
    public function login()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user()->role);
        }
        return view('login');
    }

    // 3. Proses Autentikasi (INI FUNGSI YANG HILANG/ERROR)
    public function authenticate(Request $request)
    {
        // Validasi Input Form
        $credentials = $request->validate([
            'identity' => 'required',
            'password' => 'required',
        ]);

        // Cek Login via Email (Admin/Guru) atau NISN (Siswa)
        $loginWithEmail = Auth::attempt(['email' => $credentials['identity'], 'password' => $credentials['password']]);
        $loginWithNisn = Auth::attempt(['nisn' => $credentials['identity'], 'password' => $credentials['password']]);

        if ($loginWithEmail || $loginWithNisn) {
            $request->session()->regenerate();

            // Lempar ke dashboard sesuai role
            return $this->redirectBasedOnRole(Auth::user()->role);
        }

        // Jika Gagal
        return back()->withErrors([
            'identity' => 'Akses ditolak. Email/NISN atau kata sandi salah.',
        ])->onlyInput('identity');
    }

    // Fungsi pembantu untuk redirect berdasarkan role
    private function redirectBasedOnRole($role)
    {
        if ($role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        } elseif ($role === 'guru') {
            return redirect()->intended('/guru/dashboard');
        } elseif ($role === 'siswa') {
            return redirect()->intended('/siswa/dashboard');
        }

        return redirect('/');
    }

    // 4. Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}