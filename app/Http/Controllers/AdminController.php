<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // ==========================================
    // MANAJEMEN KELAS (Sudah Beres)
    // ==========================================
    public function indexKelas()
    {
        abort_if(Auth::user()->role !== 'admin', 403, 'Akses Terbatas.');
        $classes = DB::table('classes')->orderBy('id', 'desc')->get();
        return view('admin.kelas.index', compact('classes'));
    }

    public function storeKelas(Request $request)
    {
        abort_if(Auth::user()->role !== 'admin', 403, 'Akses Terbatas.');
        $request->validate(['class_name' => 'required|string|max:50|unique:classes,class_name']);
        DB::table('classes')->insert([
            'class_name' => strtoupper($request->class_name),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.kelas')->with('success', 'Kelas baru berhasil ditambahkan!');
    }

    public function updateKelas(Request $request, $id)
    {
        abort_if(Auth::user()->role !== 'admin', 403, 'Akses Terbatas.');
        $request->validate(['class_name' => 'required|string|max:50|unique:classes,class_name,'.$id]);
        DB::table('classes')->where('id', $id)->update([
            'class_name' => strtoupper($request->class_name),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.kelas')->with('success', 'Data kelas berhasil diperbarui!');
    }

    public function destroyKelas($id)
    {
        abort_if(Auth::user()->role !== 'admin', 403, 'Akses Terbatas.');
        DB::table('classes')->where('id', $id)->delete();
        return redirect()->route('admin.kelas')->with('success', 'Kelas berhasil dihapus dari sistem!');
    }


    // ==========================================
    // MANAJEMEN AKUN GURU (BARU)
    // ==========================================
    
    // 1. Tampilkan Daftar Guru
    public function indexGuru()
    {
        abort_if(Auth::user()->role !== 'admin', 403, 'Akses Terbatas.');
        
        // Ambil data users yang rolenya 'guru'
        $teachers = DB::table('users')->where('role', 'guru')->orderBy('id', 'desc')->get();
        
        return view('admin.guru.index', compact('teachers'));
    }

    // 2. Simpan Guru Baru
    public function storeGuru(Request $request)
    {
        abort_if(Auth::user()->role !== 'admin', 403, 'Akses Terbatas.');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
        ], [
            'email.unique' => 'Email ini sudah terdaftar di sistem, bro!',
            'password.min' => 'Password minimal 6 karakter ya.',
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password di-hash biar aman
            'role' => 'guru',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.guru')->with('success', 'Akun Guru baru berhasil dibuat!');
    }

    // 3. Update Data Guru
    public function updateGuru(Request $request, $id)
    {
        abort_if(Auth::user()->role !== 'admin', 403, 'Akses Terbatas.');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => now(),
        ];

        // Jika password diisi, ikut di-update. Jika kosong, pakai password lama.
        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:6']);
            $updateData['password'] = Hash::make($request->password);
        }

        DB::table('users')->where('id', $id)->update($updateData);

        return redirect()->route('admin.guru')->with('success', 'Data Guru berhasil diperbarui!');
    }

    // 4. Hapus Akun Guru
    public function destroyGuru($id)
    {
        abort_if(Auth::user()->role !== 'admin', 403, 'Akses Terbatas.');

        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('admin.guru')->with('success', 'Akun Guru berhasil dihapus!');
    }


    // ==========================================
    // PLACEHOLDER SISANYA
    // ==========================================
    public function indexSiswa() { abort_if(Auth::user()->role !== 'admin', 403); return "Halaman Atur Siswa"; }
    public function indexJadwal() { abort_if(Auth::user()->role !== 'admin', 403); return "Halaman Atur Jadwal"; }
}