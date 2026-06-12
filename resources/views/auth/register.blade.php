@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-20">
    <div class="w-full max-w-md bg-white rounded-3xl border border-slate-200 shadow-xl p-10">
        <h1 class="text-3xl font-black mb-2">Register Admin</h1>
        <p class="text-slate-500 mb-8">Buat akun admin untuk mengelola kategori, partner, dan event.</p>

        @if($errors->any())
            <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-100 text-rose-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.register.submit') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-slate-700">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-indigo-500 focus:ring-indigo-100 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-indigo-500 focus:ring-indigo-100 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700">Password</label>
                <input type="password" name="password" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-indigo-500 focus:ring-indigo-100 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-indigo-500 focus:ring-indigo-100 outline-none">
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white rounded-2xl py-3 font-bold hover:bg-indigo-700 transition">Daftar</button>
        </form>

        <p class="mt-6 text-center text-slate-500">Sudah punya akun? <a href="{{ route('admin.login') }}" class="text-indigo-600 font-semibold">Masuk</a></p>
    </div>
</div>
@endsection
