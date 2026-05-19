<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru Dashboard - idn hadir</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 font-sans text-slate-900">

    <header class="bg-white border-b border-slate-200 px-6 py-4 flex justify-between items-center sticky top-0 z-50">
        <div>
            <div class="text-xs font-bold text-indigo-600 uppercase">Portal Guru IDN</div>
            <h1 class="text-base font-bold text-slate-900">{{ Auth::user()->name }}</h1>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-xs font-bold text-red-600 bg-red-50 px-3 py-1.5 rounded-lg hover:bg-red-600 hover:text-white transition">Keluar</button>
        </form>
    </header>

    <main class="max-w-md mx-auto p-6 space-y-6 pb-24">
        <div class="bg-gradient-to-br from-indigo-600 to-indigo-700 text-white p-6 rounded-2xl shadow-md space-y-2">
            <h2 class="text-xl font-bold">Siap Mengabsen Kelas?</h2>
            <p class="text-xs text-indigo-100 leading-relaxed">Pilih kelas yang sedang aktif sesuai jadwal admin hari ini untuk mulai memindai wajah siswa.</p>
        </div>

        <div class="space-y-3">
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Aksi Utama</h3>
            
            <a href="#" class="block bg-white p-4 rounded-xl border border-slate-200 shadow-sm hover:border-indigo-500 transition">
                <div class="font-bold text-sm text-slate-900">📷 Mulai Pemindaian Wajah</div>
                <div class="text-xs text-slate-500 mt-1">Aktifkan kamera HP untuk scan wajah & input PIN siswa bergantian.</div>
            </a>

            <a href="#" class="block bg-white p-4 rounded-xl border border-slate-200 shadow-sm hover:border-indigo-500 transition">
                <div class="font-bold text-sm text-slate-900">💬 Buka Chat Ruang Kelas</div>
                <div class="text-xs text-slate-500 mt-1">Masuk ke ruang obrolan real-time tanpa stiker bersama siswa.</div>
            </a>
        </div>

        <div class="bg-slate-100 p-6 rounded-xl border border-dashed border-slate-300 text-center text-xs text-slate-400">
            [ Tampilan tabel jadwal mengajar hari ini otomatis muncul di sini ]
        </div>
    </main>

</body>
</html>