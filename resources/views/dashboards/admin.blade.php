<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - idn hadir</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 font-sans">
    <div class="flex h-screen">
        <div class="w-64 bg-slate-900 text-white p-6 space-y-6 flex flex-col justify-between">
            <div class="space-y-6">
                <div class="text-2xl font-black tracking-tight text-indigo-400">idn hadir.</div>
                <nav class="space-y-2">
                    <a href="#" class="block px-4 py-2 bg-slate-800 rounded-lg text-sm font-semibold">Dashboard</a>
                    <a href="#" class="block px-4 py-2 text-slate-400 hover:bg-slate-800 hover:text-white rounded-lg text-sm transition">Atur Kelas & Murid</a>
                    <a href="#" class="block px-4 py-2 text-slate-400 hover:bg-slate-800 hover:text-white rounded-lg text-sm transition">Atur Jadwal (Pelajaran/Ujian/Libur)</a>
                </nav>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 bg-red-600/20 text-red-400 hover:bg-red-600 hover:text-white rounded-lg text-sm font-bold transition">
                    Keluar Sistem
                </button>
            </form>
        </div>

        <main class="flex-1 p-10 overflow-y-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900">Panel Utama Admin</h1>
                    <p class="text-slate-500 text-sm mt-1">Selamat datang kembali, {{ Auth::user()->name }}</p>
                </div>
                <span class="bg-indigo-100 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full uppercase">Role: Admin</span>
            </div>

            <div class="grid grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                    <div class="text-sm text-slate-500 font-medium">Total Kelas</div>
                    <div class="text-3xl font-bold text-slate-900 mt-2">1 Kelas</div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                    <div class="text-sm text-slate-500 font-medium">Total Murid terdaftar</div>
                    <div class="text-3xl font-bold text-slate-900 mt-2">1 Siswa</div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                    <div class="text-sm text-slate-500 font-medium">Agenda Bulan Ini</div>
                    <div class="text-3xl font-bold text-slate-900 mt-2">0 Jadwal</div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-slate-200 text-center text-slate-400 text-sm">
                [ Tempat naruh form input murid, kelas, ujian, dan hari libur dinamis ]
            </div>
        </main>
    </div>
</body>
</html>