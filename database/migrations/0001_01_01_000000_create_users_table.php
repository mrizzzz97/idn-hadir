<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. TABEL USERS (Admin, Guru, Siswa gabung disini)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique(); // Untuk Login Admin & Guru
            $table->string('nisn', 10)->nullable()->unique(); // Khusus Siswa (Bisa kosong buat Admin/Guru)
            $table->string('password');
            $table->enum('role', ['admin', 'guru', 'siswa'])->default('siswa');
            $table->string('pin', 6)->nullable(); // PIN keamanan ganda siswa saat di HP Guru
            $table->longText('face_descriptor')->nullable(); // Tempat nyimpen data pola wajah (AI face-api.js)
            $table->rememberToken();
            $table->timestamps();
        });

        // 2. TABEL KELAS
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_name')->unique(); // Contoh: X-RPL-1, XI-DKV-2
            $table->timestamps();
        });

        // 3. TABEL RELASI SISWA DAN KELAS (Pivot Table)
        Schema::create('class_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ID Siswa
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade'); // ID Kelas
            $table->timestamps();
        });

        // 4. TABEL AGENDA & JADWAL DINAMIS (Pelajaran, Ujian, Libur dari Admin)
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->nullable()->constrained('classes')->onDelete('cascade'); // Kosongkan jika Libur Nasional
            $table->foreignId('teacher_id')->nullable()->constrained('users')->onDelete('cascade'); // ID Guru pengajar
            $table->string('title'); // Contoh: "Matematika", "UTBK Kimia", "Libur Idul Fitri"
            $table->enum('type', ['pelajaran', 'ujian', 'libur'])->default('pelajaran');
            $table->date('date')->nullable(); // Dipakai jika tipenya Ujian spesifik atau Hari Libur
            $table->enum('day', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'])->nullable(); // Rutinitas Mapel mingguan
            $table->time('start_time')->nullable(); // Jam mulai
            $table->time('end_time')->nullable(); // Jam selesai
            $table->timestamps();
        });

        // 5. TABEL REKAP ABSENSI (Terpusat di HP Guru)
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained('schedules')->onDelete('cascade'); // Mengacu ke jadwal apa hari itu
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade'); // ID Siswa yang absen
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade'); // ID Guru yang nge-scan lewat HP-nya
            $table->enum('status', ['hadir', 'sakit', 'izin', 'alpa'])->default('alpa');
            $table->enum('method', ['wajah_pin', 'pin_only', 'manual_guru']); // Logika fleksibel backup absen lu
            $table->timestamp('verified_at')->nullable(); // Waktu sah masuk data absen
            $table->timestamps();
        });

        // 6. TABEL CHAT KELAS REAL-TIME (Clean, Tanpa Stiker & Call)
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade'); // Chat room per kelas
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Pengirim (Bisa guru / siswa)
            $table->text('message')->nullable(); // Isi chat teks
            $table->string('attachment_path')->nullable(); // Tempat simpan berkas tugas/file jika ada
            $table->timestamps();
        });

        // Tabel bawaan auth Laravel (Tetap dipertahankan)
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
        Schema::dropIfExists('attendances');
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('class_user');
        Schema::dropIfExists('classes');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};