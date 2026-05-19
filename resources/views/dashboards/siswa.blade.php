<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa Dashboard - idn hadir</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 font-sans text-slate-900">

    <header class="bg-white border-b border-slate-200 px-6 py-4 flex justify-between items-center">
        <div>
            <div class="text-xs font-bold text-indigo-600 uppercase">Portal Siswa IDN</div>
            <h1 class="text-base font-bold text-slate-900">{{ Auth::user()->name }}</h1>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-xs font-bold text-red-600 bg-red-50 px-3 py-1.5 rounded-lg hover:bg-red-600 hover:text-white transition">Keluar</button>
        </form>
    </header>

    <main class="max-w-md mx-auto p-6 space-y-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
            <div class="flex justify-between items-center">
                <h2 class="text-sm font-bold text-slate-500">Status Kehadiran Hari Ini</h2>
                <span class="bg-amber-100 text-amber-800 text-xs font-bold px-2.5 py-0.5 rounded-full">Belum Absen</span>
            </div>
            <p class="text-xs text-slate-600">
                Silakan datangi meja guru di depan kelas untuk melakukan verifikasi scan wajah dan input PIN privat kamu.
            </p>
        </div>

        <div class="space-y-3">
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Aktivitas Belajar</h3>
            <a href="#" class="block bg-white p-4 rounded-xl border border-slate-200 shadow-sm hover:border-indigo-500 transition">
                <div class="font-bold text-sm text-slate-900">💬 Diskusi Grup Kelas (Real-time)</div>
                <div class="text-xs text-slate-500 mt-1">Ikut obrolan materi pelajaran bersama teman sekelas dan guru.</div>
            </a>
        </div>

        <div class="bg-slate-100 p-6 rounded-xl border border-dashed border-slate-300 text-center text-xs text-slate-400">
            [ Tampilan kalender libur & jadwal ujian dari admin muncul di sini ]
        </div>
    </main>

</body>
</html>