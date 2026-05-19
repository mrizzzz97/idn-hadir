<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - idn hadir</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 h-screen flex items-center justify-center px-4">

    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md space-y-6">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-slate-900">Selamat Datang</h2>
            <p class="text-sm text-slate-500 mt-1">Silakan masuk ke akun idn hadir Anda</p>
        </div>

        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email / NISN</label>
                <input type="text" name="identity" value="{{ old('identity') }}" required 
                    class="w-full px-4 py-2.5 bg-slate-50 border @error('identity') border-red-500 bg-red-50 focus:ring-red-500 @else border-slate-200 focus:ring-indigo-500 @enderror rounded-xl focus:outline-none focus:ring-2 focus:border-transparent transition" 
                    placeholder="Masukkan email atau nomor induk">
                
                @error('identity')
                    <p class="text-xs text-red-600 font-medium mt-1.5 flex items-center">
                        <span class="mr-1">⚠️</span> {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Kata Sandi</label>
                <input type="password" name="password" required 
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" 
                    placeholder="••••••••">
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center space-x-2 text-slate-600">
                    <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500">
                    <span>Ingat saya</span>
                </label>
                <a href="#" class="text-indigo-600 hover:underline">Lupa sandi?</a>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-xl font-medium hover:bg-indigo-700 transition">Masuk Aplikasi</button>
        </form>

    </div>

</body>
</html>