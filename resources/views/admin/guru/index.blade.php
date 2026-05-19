@extends('layouts.app')

@section('title', 'Atur Guru - idn hadir')

@section('content')
<div class="space-y-6 transition-colors duration-200">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-slate-900 dark:text-white tracking-tight">Manajemen Akun Guru</h1>
        <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm mt-1">Kelola hak akses dan akun guru pengajar SMK IDN untuk sistem absensi.</p>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-900 text-emerald-800 dark:text-emerald-400 rounded-xl text-sm font-medium flex items-center space-x-2">
            <span>✅</span> <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm h-fit space-y-4">
            <h2 class="text-base font-bold text-slate-900 dark:text-white flex items-center space-x-2">
                <span>➕</span> <span>Tambah Akun Guru</span>
            </h2>
            
            <form action="{{ route('admin.guru.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm transition text-slate-900 dark:text-white" 
                        placeholder="Contoh: Ahmad Subarjo, S.Kom">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Email Guru</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-950 border @error('email') border-red-500 @else border-slate-200 dark:border-slate-800 @enderror rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm transition text-slate-900 dark:text-white" 
                        placeholder="ahmad@idn.sch.id">
                    @error('email')
                        <p class="text-xs text-red-600 dark:text-red-400 font-medium mt-1">⚠️ {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Password Awal</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm transition text-slate-900 dark:text-white" 
                        placeholder="Minimal 6 karakter">
                </div>

                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 rounded-xl text-sm font-semibold shadow-md transition cursor-pointer">
                    Buat Akun Guru
                </button>
            </form>
        </div>

        <div class="lg:col-span-2 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden flex flex-col justify-between">
            <div class="p-6 border-b border-slate-100 dark:border-slate-800/60">
                <h2 class="text-base font-bold text-slate-900 dark:text-white flex items-center space-x-2">
                    <span>👨‍🏫</span> <span>Daftar Guru Aktif</span>
                </h2>
            </div>

            <div class="overflow-x-auto min-w-0">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-slate-950/40 border-b border-slate-100 dark:border-slate-800/60 text-slate-400 dark:text-slate-500 text-xs font-bold uppercase tracking-wider">
                            <th class="px-6 py-4 w-16">No</th>
                            <th class="px-6 py-4">Nama Guru</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4 w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60 text-sm">
                        @forelse($teachers as $index => $guru)
                            <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-950/20 transition">
                                <td class="px-6 py-4 font-mono text-slate-400 dark:text-slate-500">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-bold text-slate-900 dark:text-white">{{ $guru->name }}</td>
                                <td class="px-6 py-4 text-slate-500 dark:text-slate-400">{{ $guru->email }}</td>
                                <td class="px-6 py-4 flex items-center space-x-2">
                                    <button onclick="openEditModal('{{ $guru->id }}', '{{ $guru->name }}', '{{ $guru->email }}')" class="...">✏️ Edit</button>
                                    <form action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST" ...>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="...">🗑️ Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-slate-400 dark:text-slate-500 font-medium">
                                    📭 Belum ada data akun guru.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<div id="editModalGuru" class="hidden fixed inset-0 bg-slate-950/60 z-50 flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-900 w-full max-w-md p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-xl space-y-4">
        <div class="flex justify-between items-center">
            <h3 class="text-base font-bold text-slate-900 dark:text-white">✏️ Ubah Data Guru</h3>
            <button onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white text-lg cursor-pointer">✕</button>
        </div>

        <form id="editFormGuru" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
                <input type="text" id="edit_name" name="name" required
                    class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm transition text-slate-900 dark:text-white">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Email</label>
                <input type="email" id="edit_email" name="email" required
                    class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm transition text-slate-900 dark:text-white">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Password Baru (Kosongkan jika tidak diubah)</label>
                <input type="password" name="password"
                    class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm transition text-slate-900 dark:text-white" placeholder="Isi jika ingin ganti password">
            </div>

            <div class="flex space-x-2 pt-2">
                <button type="button" onclick="closeEditModal()" class="w-1/2 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 text-slate-600 dark:text-slate-300 py-2.5 rounded-xl text-sm font-semibold transition cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="w-1/2 bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 rounded-xl text-sm font-semibold transition shadow-md cursor-pointer">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const modalGuru = document.getElementById('editModalGuru');
    const editFormGuru = document.getElementById('editFormGuru');
    const editName = document.getElementById('edit_name');
    const editEmail = document.getElementById('edit_email');

    function openEditModal(id, currentName, currentEmail) {
        editFormGuru.action = `/admin/guru/${id}`;
        editName.value = currentName;
        editEmail.value = currentEmail;
        modalGuru.classList.remove('hidden');
    }

    function closeEditModal() {
        modalGuru.classList.add('hidden');
    }
</script>
@endsection 