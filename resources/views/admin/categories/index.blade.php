@extends('layouts.admin', ['title' => 'Kelola Kategori'])

@section('content')
<header class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
    <div>
        <h1 class="text-3xl font-black">Kelola Kategori</h1>
        <p class="text-slate-500 font-medium">Tambahkan, edit, atau hapus kategori event yang tersedia.</p>
    </div>
    <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
        <form action="{{ route('admin.categories.index') }}" method="GET" class="flex items-center gap-3 w-full sm:w-auto">
            <input type="search" name="search" value="{{ $search }}" placeholder="Cari kategori..." class="w-full sm:w-72 rounded-2xl border border-slate-200 px-4 py-3 focus:border-indigo-500 outline-none">
            <button type="submit" class="px-5 py-3 bg-slate-100 text-slate-700 rounded-2xl hover:bg-slate-200 transition">Cari</button>
        </form>
        <button onclick="toggleModal('createCategoryModal')" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg hover:bg-indigo-700 transition">+ Tambah Kategori</button>
    </div>
</header>

@if(session('success'))
<div class="mb-6 rounded-3xl bg-emerald-50 border border-emerald-200 p-4 text-emerald-700">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-8 py-4">ID</th>
                    <th class="px-8 py-4">Nama</th>
                    <th class="px-8 py-4">Dibuat</th>
                    <th class="px-8 py-4">Terakhir Diubah</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @forelse($categories as $category)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-8 py-6 font-bold text-slate-400">{{ $category->id }}</td>
                    <td class="px-8 py-6 text-slate-700">{{ $category->name }}</td>
                    <td class="px-8 py-6 text-slate-500 text-sm">{{ $category->created_at->format('d M Y') }}</td>
                    <td class="px-8 py-6 text-slate-500 text-sm">{{ $category->updated_at->format('d M Y') }}</td>
                    <td class="px-8 py-6 flex gap-2">
                        <button type="button" data-id="{{ $category->id }}" data-name="{{ $category->name }}" onclick="openEditModal(this)" class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="p-2.5 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-8 text-center text-slate-500">Tidak ada kategori yang ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6">{{ $categories->links() }}</div>

<div id="createCategoryModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 px-4 py-8">
    <div class="w-full max-w-xl bg-white rounded-3xl p-8 shadow-2xl">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-black">Tambah Kategori Baru</h2>
                <p class="text-slate-500">Isi nama kategori yang akan ditambahkan.</p>
            </div>
            <button type="button" onclick="toggleModal('createCategoryModal')" class="text-slate-500 hover:text-slate-900">Tutup</button>
        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-slate-700">Nama Kategori</label>
                <input type="text" name="name" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-indigo-500 outline-none">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="toggleModal('createCategoryModal')" class="px-6 py-3 rounded-2xl border border-slate-200 hover:bg-slate-100 transition">Batal</button>
                <button type="submit" class="px-6 py-3 rounded-2xl bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

<div id="editCategoryModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 px-4 py-8">
    <div class="w-full max-w-xl bg-white rounded-3xl p-8 shadow-2xl">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-black">Edit Nama Kategori</h2>
                <p class="text-slate-500">Perbarui nama kategori dan simpan perubahan.</p>
            </div>
            <button type="button" onclick="toggleModal('editCategoryModal')" class="text-slate-500 hover:text-slate-900">Tutup</button>
        </div>

        <form id="editCategoryForm" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-slate-700">Nama Kategori</label>
                <input id="editCategoryName" type="text" name="name" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-indigo-500 outline-none">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="toggleModal('editCategoryModal')" class="px-6 py-3 rounded-2xl border border-slate-200 hover:bg-slate-100 transition">Batal</button>
                <button type="submit" class="px-6 py-3 rounded-2xl bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition">Perbarui</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal(id) {
        const modal = document.getElementById(id);
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }

    function openEditModal(button) {
        const id = button.dataset.id;
        const name = button.dataset.name;
        const form = document.getElementById('editCategoryForm');
        form.action = `/admin/categories/${id}`;
        document.getElementById('editCategoryName').value = name;
        toggleModal('editCategoryModal');
    }
</script>
@endsection
