<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'idn hadir - Platform')</title>
    @vite('resources/css/app.css')

    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-slate-100 dark:bg-slate-950 font-sans antialiased text-slate-800 dark:text-slate-200 transition-colors duration-200">

    <div class="flex min-h-screen relative">
        @include('layouts.sidebar')

        <div class="flex-1 w-full min-h-screen flex flex-col min-w-0">
            
            <header class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 px-6 md:px-10 py-4 flex justify-between items-center sticky top-0 z-40 transition-colors duration-200">
                <div class="flex items-center space-x-3">
                    <button id="menu-toggle" class="md:hidden p-2 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-indigo-600 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <div>
                        <h2 class="text-xs md:text-sm font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Dashboard Internal</h2>
                        <p class="text-[10px] md:text-xs text-slate-500 dark:text-slate-400">User: <span class="font-semibold text-slate-800 dark:text-slate-200">{{ Auth::user()->name }}</span></p>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="bg-indigo-100 dark:bg-indigo-950 text-indigo-700 dark:text-indigo-400 text-[10px] md:text-xs font-bold px-2.5 py-1 rounded-full uppercase tracking-wide">
                        {{ Auth::user()->role }}
                    </span>
                </div>
            </header>

            <main class="flex-1 p-6 md:p-10">
                @yield('content')
            </main>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 1. Logika Dark Mode Toggle
            const themeToggleBtn = document.getElementById('theme-toggle');
            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', function() {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    }
                });
            }

            // 2. Logika Responsive Hamburger Menu (HP)
            const menuToggleBtn = document.getElementById('menu-toggle');
            const closeSidebarBtn = document.getElementById('close-sidebar');
            const sidebar = document.getElementById('main-sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            function toggleSidebar() {
                sidebar.classList.toggle('hidden');
                sidebar.classList.toggle('flex');
                overlay.classList.toggle('hidden');
            }

            if (menuToggleBtn && sidebar && overlay) {
                menuToggleBtn.addEventListener('click', toggleSidebar);
                closeSidebarBtn.addEventListener('click', toggleSidebar);
                overlay.addEventListener('click', toggleSidebar);
            }
        });
    </script>
</body>
</html>