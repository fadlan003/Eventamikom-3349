@extends('layouts.admin', ['title' => 'Kelola Partner'])

@section('content')
<header class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
    <div>
        <h1 class="text-3xl font-black">Kelola Partner</h1>
        <p class="text-slate-500 font-medium">Tambahkan atau kelola daftar partner yang mendukung platform.</p>
    </div>
    <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
        <form action="{{ route('admin.partners.index') }}" method="GET" class="flex items-center gap-3 w-full sm:w-auto">
            <input type="search" name="search" value="{{ $search }}" placeholder="Cari partner..." class="w-full sm:w-72 rounded-2xl border border-slate-200 px-4 py-3 focus:border-indigo-500 outline-none">
            <button type="submit" class="px-5 py-3 bg-slate-100 text-slate-700 rounded-2xl hover:bg-slate-200 transition">Cari</button>
        </form>
        <button onclick="toggleModal('createPartnerModal')" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg hover:bg-indigo-700 transition">+ Tambah Partner</button>
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
                    <th class="px-8 py-4">Logo</th>
                    <th class="px-8 py-4">Nama Partner</th>
                    <th class="px-8 py-4">Website</th>
                    <th class="px-8 py-4">Dibuat</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @forelse($partners as $partner)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-8 py-6 font-bold text-slate-400">{{ $partner->id }}</td>
                    <td class="px-8 py-6">
                        <img src="{{ asset('storage/'.$partner->logo_path) }}" alt="{{ $partner->name }}" class="w-16 h-16 rounded-xl object-cover border border-slate-200">
                    </td>
                    <td class="px-8 py-6 text-slate-700">{{ $partner->name }}</td>
                    <td class="px-8 py-6 text-indigo-600 font-semibold">
                        <a href="{{ $partner->website_url }}" target="_blank" rel="noopener noreferrer" class="hover:underline">Lihat Website</a>
                    </td>
                    <td class="px-8 py-6 text-slate-500 text-sm">{{ $partner->created_at->format('d M Y') }}</td>
                    <td class="px-8 py-6 flex gap-2">
                        <button type="button" data-id="{{ $partner->id }}" data-name="{{ $partner->name }}" data-website="{{ $partner->website_url }}" onclick="openEditPartnerModal(this)" class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                        <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Hapus partner ini?')">
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
                    <td colspan="6" class="px-8 py-8 text-center text-slate-500">Tidak ada partner yang ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6">{{ $partners->links() }}</div>

<div id="createPartnerModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 px-4 py-8">
    <div class="w-full max-w-xl bg-white rounded-3xl p-8 shadow-2xl">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-black">Tambah Partner Baru</h2>
                <p class="text-slate-500">Isi nama dan logo partner untuk ditampilkan di halaman publik.</p>
            </div>
            <button type="button" onclick="toggleModal('createPartnerModal')" class="text-slate-500 hover:text-slate-900">Tutup</button>
        </div>

        <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-slate-700">Nama Partner</label>
                <input type="text" name="name" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700">Logo Partner</label>
                <input type="file" name="logo" accept="image/*" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700">Website Partner</label>
                <input type="url" name="website_url" placeholder="https://..." required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-indigo-500 outline-none">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="toggleModal('createPartnerModal')" class="px-6 py-3 rounded-2xl border border-slate-200 hover:bg-slate-100 transition">Batal</button>
                <button type="submit" class="px-6 py-3 rounded-2xl bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

<div id="editPartnerModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 px-4 py-8">
    <div class="w-full max-w-xl bg-white rounded-3xl p-8 shadow-2xl">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-black">Edit Partner</h2>
                <p class="text-slate-500">Perbarui informasi partner yang tampil di homepage.</p>
            </div>
            <button type="button" onclick="toggleModal('editPartnerModal')" class="text-slate-500 hover:text-slate-900">Tutup</button>
        </div>

        <form id="editPartnerForm" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-slate-700">Nama Partner</label>
                <input id="editPartnerName" type="text" name="name" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700">Logo Partner</label>
                <input id="editPartnerLogo" type="file" name="logo" accept="image/*" class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-indigo-500 outline-none">
                <p class="text-xs text-slate-400 mt-2">Kosongkan jika tidak ingin mengganti logo.</p>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700">Website Partner</label>
                <input id="editPartnerWebsite" type="url" name="website_url" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-indigo-500 outline-none">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="toggleModal('editPartnerModal')" class="px-6 py-3 rounded-2xl border border-slate-200 hover:bg-slate-100 transition">Batal</button>
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

    function openEditPartnerModal(button) {
        const id = button.dataset.id;
        const name = button.dataset.name;
        const websiteUrl = button.dataset.website;
        const form = document.getElementById('editPartnerForm');
        form.action = `/admin/partners/${id}`;
        document.getElementById('editPartnerName').value = name;
        document.getElementById('editPartnerWebsite').value = websiteUrl;
        document.getElementById('editPartnerLogo').value = '';
        toggleModal('editPartnerModal');
    }
</script>
@endsection
