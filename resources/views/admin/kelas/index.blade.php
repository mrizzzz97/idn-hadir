@extends('layouts.app')

@section('title', 'Atur Kelas - idn hadir')

@section('content')
<div class="space-y-6 transition-colors duration-200">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-slate-900 dark:text-white tracking-tight">Manajemen Data Kelas</h1>
        <p class="text-slate-500 dark:text-slate-400 text-xs md:text-sm mt-1">Tambah, edit, dan hapus seluruh daftar kelas aktif di SMK IDN.</p>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-900 text-emerald-800 dark:text-emerald-400 rounded-xl text-sm font-medium flex items-center space-x-2">
            <span>✅</span> <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm h-fit space-y-4">
            <h2 class="text-base font-bold text-slate-900 dark:text-white flex items-center space-x-2">
                <span>➕</span> <span>Tambah Kelas</span>
            </h2>
            
            <form action="{{ route('admin.kelas.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Nama Kelas</label>
                    <input type="text" name="class_name" value="{{ old('class_name') }}" required
                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-950 border @error('class_name') border-red-500 dark:border-red-900 focus:ring-red-500 @else border-slate-200 dark:border-slate-800 focus:ring-indigo-500 @enderror rounded-xl focus:outline-none focus:ring-2 focus:border-transparent text-sm transition" 
                        placeholder="Contoh: XI-RPL-1">
                    @error('class_name')
                        <p class="text-xs text-red-600 dark:text-red-400 font-medium mt-1.5">⚠️ {{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 rounded-xl text-sm font-semibold shadow-md transition cursor-pointer">
                    Simpan Kelas
                </button>
            </form>
        </div>

        <div class="lg:col-span-2 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden flex flex-col justify-between">
            <div class="p-6 border-b border-slate-100 dark:border-slate-800/60">
                <h2 class="text-base font-bold text-slate-900 dark:text-white flex items-center space-x-2">
                    <span>🏫</span> <span>Daftar Kelas Aktif</span>
                </h2>
            </div>

            <div class="overflow-x-auto min-w-0">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-slate-950/40 border-b border-slate-100 dark:border-slate-800/60 text-slate-400 dark:text-slate-500 text-xs font-bold uppercase tracking-wider">
                            <th class="px-6 py-4 w-20">No</th>
                            <th class="px-6 py-4">Nama Kelas</th>
                            <th class="px-6 py-4 w-44">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60 text-sm">
                        @forelse($classes as $index => $kelas)
                            <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-950/20 transition">
                                <td class="px-6 py-4 font-mono text-slate-400 dark:text-slate-500">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-bold text-slate-900 dark:text-white">{{ $kelas->class_name }}</td>
                                <td class="px-6 py-4 flex items-center space-x-2">
                                    <button onclick="openEditModal('{{ $kelas->id }}', '{{ $kelas->class_name }}')" 
                                        class="px-3 py-1.5 bg-amber-500/10 hover:bg-amber-500 text-amber-600 dark:text-amber-400 hover:text-white rounded-lg text-xs font-semibold transition cursor-pointer">
                                        ✏️ Edit
                                    </button>

                                    <form action="{{ route('admin.kelas.destroy', $kelas->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini? Semua siswa di dalamnya akan ikut terlepas!')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 bg-red-600/10 hover:bg-red-600 text-red-600 dark:text-red-400 hover:text-white rounded-lg text-xs font-semibold transition cursor-pointer">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center text-slate-400 dark:text-slate-500 font-medium">
                                    📭 Belum ada data kelas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<div id="editModal" class="hidden fixed inset-0 bg-slate-950/60 z-50 flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-900 w-full max-w-md p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-xl space-y-4 animate-in fade-in duration-200">
        <div class="flex justify-between items-center">
            <h3 class="text-base font-bold text-slate-900 dark:text-white">✏️ Ubah Nama Kelas</h3>
            <button onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white text-lg cursor-pointer">✕</button>
        </div>

        <form id="editForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Nama Kelas Baru</label>
                <input type="text" id="edit_class_name" name="class_name" required
                    class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm transition text-slate-900 dark:text-white">
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
    const modal = document.getElementById('editModal');
    const editForm = document.getElementById('editForm');
    const editInput = document.getElementById('edit_class_name');

    function openEditModal(id, currentName) {
        // Suntik action URL route secara dinamis ke form
        editForm.action = `/admin/kelas/${id}`;
        // Isi input text dengan nama kelas sekarang
        editInput.value = currentName;
        // Munculkan modal
        modal.classList.remove('hidden');
    }

    function closeEditModal() {
        // Sembunyikan kembali modal
        modal.classList.add('hidden');
    }
</script>
@endsection