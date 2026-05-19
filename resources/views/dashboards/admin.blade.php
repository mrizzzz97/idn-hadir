@extends('layouts.app')

@section('title', 'Admin Dashboard - idn hadir')

@section('content')
    <div class="space-y-6 transition-colors duration-200">
        <div>
            <h1 class="text-2xl md:text-3xl font-black text-slate-900 dark:text-white tracking-tight">Selamat Datang, Admin</h1>
            <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm mt-1">Gunakan panel navigasi di sebelah kiri untuk mengelola data operasional sekolah IDN.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            
            <div class="bg-white dark:bg-slate-900 p-5 md:p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm space-y-2">
                <div class="text-xs text-slate-400 dark:text-slate-500 font-semibold uppercase tracking-wider">Total Kelas</div>
                <div class="text-2xl md:text-3xl font-black text-slate-900 dark:text-white">{{ $totalKelas }} Kelas</div>
            </div>
            
            <div class="bg-white dark:bg-slate-900 p-5 md:p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm space-y-2">
                <div class="text-xs text-slate-400 dark:text-slate-500 font-semibold uppercase tracking-wider">Guru Aktif</div>
                <div class="text-2xl md:text-3xl font-black text-slate-900 dark:text-white">{{ $totalGuru }} Guru</div>
            </div>
            
            <div class="bg-white dark:bg-slate-900 p-5 md:p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm space-y-2">
                <div class="text-xs text-slate-400 dark:text-slate-500 font-semibold uppercase tracking-wider">Murid Terdaftar</div>
                <div class="text-2xl md:text-3xl font-black text-slate-900 dark:text-white">{{ $totalSiswa }} Murid</div>
            </div>
            
            <div class="bg-white dark:bg-slate-900 p-5 md:p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm space-y-2">
                <div class="text-xs text-slate-400 dark:text-slate-500 font-semibold uppercase tracking-wider">Jadwal Aktif</div>
                <div class="text-2xl md:text-3xl font-black text-slate-900 dark:text-white">{{ $totalJadwal }} Agenda</div>
            </div>
            
        </div>
    </div>
@endsection