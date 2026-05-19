<div id="main-sidebar" class="hidden md:flex w-64 bg-white dark:bg-slate-950 text-slate-800 dark:text-white p-6 space-y-6 flex-col justify-between h-screen sticky top-0 border-r border-slate-200 dark:border-slate-900 transition-all duration-300 z-50 fixed md:sticky inset-y-0 left-0">
    <div class="space-y-6">
        
        <div class="flex items-center justify-between px-2 py-1">
            <div class="flex items-center space-x-3">
                <div class="bg-indigo-600 p-2 rounded-xl text-white shadow-md shadow-indigo-600/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <div>
                    <div class="text-lg font-black tracking-tight leading-none text-slate-900 dark:text-white">idn hadir</div>
                    <span class="text-[10px] text-slate-400 dark:text-slate-500 font-mono tracking-widest uppercase">v1.0</span>
                </div>
            </div>
            <button id="close-sidebar" class="md:hidden text-slate-400 hover:text-slate-900 dark:hover:text-white text-xl">✕</button>
        </div>
        
        <nav class="space-y-2">
            <h3 class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider px-4 mb-2">Menu Utama</h3>
            
            <a href="{{ route('admin.dashboard') }}" 
               class="block px-4 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/20' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-900 hover:text-slate-900 dark:hover:text-white' }}">
                📊 Dashboard Panel
            </a>

            <a href="{{ route('admin.kelas') }}" 
               class="block px-4 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.kelas*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/20' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-900 hover:text-slate-900 dark:hover:text-white' }}">
                🏫 Atur Kelas
            </a>

            <a href="{{ route('admin.guru') }}" 
               class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-900 hover:text-slate-900 dark:hover:text-white transition">
                👨‍🏫 Atur Akun Guru
            </a>

            <a href="#" 
               class="block px-4 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.siswa*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/20' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-900 hover:text-slate-900 dark:hover:text-white' }}">
                👨‍🎓 Atur Akun Siswa
            </a>

            <a href="#" 
               class="block px-4 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.jadwal*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/20' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-900 hover:text-slate-900 dark:hover:text-white' }}">
                📅 Jadwal & Agenda
            </a>
        </nav>
    </div>

    <div class="space-y-4">
        <button id="theme-toggle" class="w-full flex items-center justify-between px-4 py-2.5 bg-slate-100 dark:bg-slate-900 hover:bg-slate-200 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-300 rounded-xl text-xs font-medium transition cursor-pointer">
            <span class="flex items-center space-x-2">
                <span class="text-sm dark:hidden">🌙</span>
                <span class="text-sm hidden dark:inline">☀️</span>
                <span class="dark:hidden">Mode Gelap</span>
                <span class="hidden dark:inline">Mode Terang</span>
            </span>
        </button>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-3 bg-red-600/10 text-red-600 dark:text-red-400 hover:bg-red-600 hover:text-white rounded-xl text-sm font-bold transition flex items-center space-x-2 cursor-pointer">
                <span>🚪</span> <span>Keluar Sistem</span>
            </button>
        </form>
    </div>
</div>

<div id="sidebar-overlay" class="hidden fixed inset-0 bg-slate-950/50 z-40 md:hidden"></div>