<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>idn hadir - Sistem Presensi & Manajemen Kelas Internal IDN</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased">

    <nav class="max-w-6xl mx-auto px-6 py-6 flex justify-between items-center">
        <div class="text-xl font-black tracking-tight text-indigo-600">idn hadir.</div>
        <div>
            <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-indigo-700 transition shadow-sm text-sm">
                Masuk Portal
            </a>
        </div>
    </nav>

    <header class="max-w-5xl mx-auto px-6 py-16 text-center space-y-6">
        <span class="bg-indigo-100 text-indigo-700 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-widest">
            Eksklusif Internal Sekolah IDN
        </span>
        <h1 class="text-4xl md:text-6xl font-black text-slate-950 tracking-tight leading-none">
            Satu Platform Untuk Absensi <br>
            <span class="text-indigo-600">Cerdas & Diskusi Real-Time.</span>
        </h1>
        <p class="text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed">
            idn hadir mendefinisikan ulang cara sekolah mengelola kehadiran dan interaksi kelas. Dikendalikan penuh oleh Guru, divalidasi dengan keamanan ganda, dan terintegrasi otomatis dengan sistem jadwal dinamis buatan Admin.
        </p>
        <div class="pt-4">
            <a href="{{ route('login') }}" class="bg-slate-900 text-white px-8 py-4 rounded-xl font-bold hover:bg-slate-800 transition shadow-lg text-base">
                Masuk ke Aplikasi
            </a>
        </div>
    </header>

    <section class="bg-slate-900 text-slate-100 py-20 px-6">
        <div class="max-w-4xl mx-auto space-y-12">
            <div class="text-center space-y-4">
                <h2 class="text-3xl font-extrabold tracking-tight md:text-4xl">Mengapa idn hadir Diciptakan?</h2>
                <p class="text-slate-400 max-w-xl mx-auto text-sm">Menjawab tantangan kedisiplinan dan efisiensi manajemen kelas dalam satu ekosistem digital.</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8 pt-6">
                <div class="space-y-3">
                    <h3 class="text-lg font-bold text-indigo-400">❌ Masalah Absensi Konvensional</h3>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Absen mandiri di HP masing-masing siswa rawan manipulasi lokasi (Fake GPS) dan titip absen. Sementara absen kertas menghabiskan waktu rekap dan rentan rusak atau hilang.
                    </p>
                </div>
                <div class="space-y-3">
                    <h3 class="text-lg font-bold text-emerald-400">🛡️ Solusi Sentral idn hadir</h3>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Proses absensi dialihkan penuh ke HP Guru. Siswa melakukan verifikasi wajah langsung di perangkat guru, diikuti input PIN privat. Tidak ada celah untuk manipulasi atau kecurangan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-5xl mx-auto px-6 py-24 space-y-20">
        
        <div class="text-center space-y-4">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-950 tracking-tight">Fitur Unggulan Sistem</h2>
            <p class="text-slate-600 max-w-lg mx-auto">Bagaimana idn hadir bekerja menjaga transparansi dan keteraturan sekolah setiap hari.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-4">
                <div class="text-xs font-bold text-indigo-600 uppercase tracking-wider">01 / Autentikasi Biometrik</div>
                <h3 class="text-2xl font-bold text-slate-950">Verifikasi Wajah Ganda via HP Guru</h3>
                <p class="text-slate-600 leading-relaxed text-sm">
                    Siswa tidak perlu menginstal aplikasi apa pun untuk melakukan absen. Cukup maju ke depan kelas, menghadap kamera HP Guru, dan biarkan teknologi kecerdasan buatan mengenali wajah siswa dalam hitungan detik. Gagal deteksi karena ruangan gelap? Guru dapat mengalihkan mode ke absen manual berbasis PIN dalam satu klik.
                </p>
            </div>
            <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-6 text-xs text-indigo-800 font-mono">
                // Info Teknis untuk Tim UI:<br>
                Seksi ini nanti dihiasi mockup layar HP Guru saat kamera sedang scanning wajah siswa, lengkap dengan box deteksi area mata dan mulut.
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-center md:flex-row-reverse">
            <div class="space-y-4 md:order-2">
                <div class="text-xs font-bold text-indigo-600 uppercase tracking-wider">02 / Lapisan Keamanan Ganda</div>
                <h3 class="text-2xl font-bold text-slate-950">Validasi PIN Privat Siswa</h3>
                <p class="text-slate-600 leading-relaxed text-sm">
                    Kecocokan wajah saja tidak cukup. Untuk menghindari siswa yang terabsen secara tidak sengaja saat berjalan melewati meja guru, sistem akan memunculkan pop-up Numpad kustom. Siswa wajib memasukkan 4 hingga 6 digit PIN rahasia mereka sendiri sebagai konfirmasi mutlak kehadiran.
                </p>
            </div>
            <div class="bg-purple-50 border border-purple-100 rounded-2xl p-6 text-xs text-purple-800 font-mono md:order-1">
                // Info Teknis untuk Tim UI:<br>
                Seksi ini akan menampilkan visual Numpad angka (0-9) bergaya minimalis kustom dengan efek blur transparan (glassmorphism).
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-4">
                <div class="text-xs font-bold text-indigo-600 uppercase tracking-wider">03 / Otomatisasi Panel Admin</div>
                <h3 class="text-2xl font-bold text-slate-950">Jadwal Dinamis: Pelajaran, Ujian, & Libur</h3>
                <p class="text-slate-600 leading-relaxed text-sm">
                    Admin memegang kendali penuh atas manajemen waktu dari komputer utama. Cukup masukkan data jam pelajaran, tanggal ujian, atau hari libur nasional, maka backend Laravel secara otomatis akan membangun susunan tabel jadwal baru yang langsung tersinkronisasi di akun guru dan siswa tanpa merusak tatanan layout.
                </p>
            </div>
            <div class="bg-amber-50 border border-amber-100 rounded-2xl p-6 text-xs text-amber-800 font-mono">
                // Info Teknis untuk Tim UI:<br>
                Tampilkan visual tabel kalender dinamis. Beri warna merah menyala untuk status "Hari Libur" dan warna indigo untuk penanda "Jadwal Ujian".
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-center md:flex-row-reverse">
            <div class="space-y-4 md:order-2">
                <div class="text-xs font-bold text-indigo-600 uppercase tracking-wider">04 / Ruang Komunikasi Terfokus</div>
                <h3 class="text-2xl font-bold text-slate-950">Chat Room Kelas Tanpa Distraksi</h3>
                <p class="text-slate-600 leading-relaxed text-sm">
                    Fasilitas obrolan kelompok instan antar warga kelas yang ditenagai oleh teknologi WebSocket real-time. Untuk menjaga esensi kegiatan belajar mengajar, ruang chat ini dirancang bersih tanpa adanya gangguan fitur telepon, panggilan video, maupun stiker. Siswa dan guru dapat berbagi teks informasi serta dokumen tugas secara instan.
                </p>
            </div>
            <div class="bg-emerald-50 border border-emerald-100 rounded-2xl p-6 text-xs text-emerald-800 font-mono md:order-1">
                // Info Teknis untuk Tim UI:<br>
                Tampilkan bentuk antarmuka chat box dengan gelembung balon obrolan (chat bubbles) hijau-putih yang bersih ala aplikasi messaging premium.
            </div>
        </div>

    </section>

    <section class="bg-slate-100 py-20 px-6">
        <div class="max-w-5xl mx-auto space-y-16">
            <div class="text-center space-y-4">
                <h2 class="text-3xl font-extrabold text-slate-950 tracking-tight">Tiga Langkah Operasional</h2>
                <p class="text-slate-600 max-w-sm mx-auto text-sm">Alur ringkas penggunaan platform dalam kegiatan harian di sekolah.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl border border-slate-200 space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-indigo-600 text-white flex items-center justify-center font-bold text-sm">1</div>
                    <h4 class="font-bold text-slate-950">Admin Setup Konten</h4>
                    <p class="text-xs text-slate-600 leading-relaxed">Admin menginput data murid, menetapkan guru, merilis jadwal pelajaran, jadwal ujian, atau menandai kalender libur.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-200 space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-indigo-600 text-white flex items-center justify-center font-bold text-sm">2</div>
                    <h4 class="font-bold text-slate-950">Guru Membuka Kelas</h4>
                    <p class="text-xs text-slate-600 leading-relaxed">Guru memilih kelas dan mata pelajaran yang aktif lewat HP, kemudian mengaktifkan mode pemindai wajah di depan murid.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-200 space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-indigo-600 text-white flex items-center justify-center font-bold text-sm">3</div>
                    <h4 class="font-bold text-slate-950">Siswa Validasi Kehadiran</h4>
                    <p class="text-xs text-slate-600 leading-relaxed">Siswa melakukan pemindaian wajah secara bergantian diikuti verifikasi PIN masing-masing untuk mencatatkan status hadir.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="max-w-5xl mx-auto px-6 py-16 text-center space-y-6">
        <h2 class="text-2xl font-bold text-slate-950">Sistem Presensi Masa Depan Sekolah IDN</h2>
        <p class="text-sm text-slate-500 max-w-md mx-auto">Dikembangkan menggunakan Laravel 11, Tailwind CSS, dan sistem enkripsi data lokal tingkat tinggi.</p>
        <div class="pt-2 text-xs text-slate-400">
            &copy; {{ date('Y') }} idn hadir Project. All rights reserved. Internal Use Only.
        </div>
    </footer>

</body>
</html>