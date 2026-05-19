<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // Akun Super Admin IDN
        $admin = User::create([
            'name' => 'Admin Utama IDN',
            'email' => 'admin@idn.sch.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'nisn' => null,
            'pin' => null,
            'face_descriptor' => null,
        ]);

        // Akun Guru IDN
        $guru = User::create([
            'name' => 'Guru Utama IDN',
            'email' => 'guru@idn.sch.id',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
            'nisn' => null,
            'pin' => null,
            'face_descriptor' => null,
        ]);

        // Akun Siswa IDN
        $siswa = User::create([
            'name' => 'Siswa Utama IDN',
            'email' => 'siswa@idn.sch.id',
            'nisn' => '1234567890',
            'password' => Hash::make('siswa123'),
            'role' => 'siswa',
            'pin' => '1234',
            'face_descriptor' => null,
        ]);

        // 2. BUAT DATA KELAS CONTOH
        $kelasId = DB::table('classes')->insertGetId([
            'class_name' => 'X-RPL-1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. HUBUNGKAN SISWA KE KELAS
        DB::table('class_user')->insert([
            'user_id' => $siswa->id,
            'class_id' => $kelasId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}