<!DOCTYPE html>
<html>
<head>
    <title>Bantuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-100 min-h-screen">

<!-- NAVBAR -->
<nav class="bg-white shadow-md p-4 flex justify-between items-center">
    <div class="space-x-6">
        <a href="/" class="text-gray-700 hover:text-blue-500 font-semibold">Home</a>
        <a href="/profil" class="text-gray-700 hover:text-blue-500 font-semibold">Profil</a>
        <a href="/katalog" class="text-gray-700 hover:text-blue-500 font-semibold">Katalog</a>
        <a href="/bantuan" class="text-blue-500 font-bold">Bantuan</a>
        <a href="/kontak" class="text-gray-700 hover:text-blue-500 font-semibold">Kontak</a>
    </div>
</nav>

<!-- CONTENT -->
<div class="flex items-center justify-center mt-16 px-4">

<div class="bg-white p-8 rounded-3xl shadow-lg w-full max-w-xl border border-blue-200">

    <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">
        Bantuan & FAQ
    </h1>

    <div class="space-y-4">

        <!-- ITEM 1 -->
        <details class="group bg-blue-50 p-4 rounded-xl cursor-pointer hover:bg-blue-100 transition">
            <summary class="font-semibold text-gray-800 flex justify-between items-center">
                Bagaimana cara mengikuti event?
                <span class="text-blue-500 group-open:rotate-180 transition">⌄</span>
            </summary>
            <p class="text-sm text-gray-600 mt-2">
                Pilih menu katalog, klik event yang diinginkan, lalu tekan tombol daftar.
            </p>
        </details>

        <!-- ITEM 2 -->
        <details class="group bg-blue-50 p-4 rounded-xl cursor-pointer hover:bg-blue-100 transition">
            <summary class="font-semibold text-gray-800 flex justify-between items-center">
                Apakah event berbayar?
                <span class="text-blue-500 group-open:rotate-180 transition">⌄</span>
            </summary>
            <p class="text-sm text-gray-600 mt-2">
                Sebagian event gratis, namun ada juga yang berbayar tergantung penyelenggara.
            </p>
        </details>

        <!-- ITEM 3 -->
        <details class="group bg-blue-50 p-4 rounded-xl cursor-pointer hover:bg-blue-100 transition">
            <summary class="font-semibold text-gray-800 flex justify-between items-center">
                Apakah bisa ikut lebih dari satu event?
                <span class="text-blue-500 group-open:rotate-180 transition">⌄</span>
            </summary>
            <p class="text-sm text-gray-600 mt-2">
                Ya, kamu bisa mengikuti beberapa event selama jadwalnya tidak bentrok.
            </p>
        </details>

        <!-- ITEM 4 -->
        <details class="group bg-blue-50 p-4 rounded-xl cursor-pointer hover:bg-blue-100 transition">
            <summary class="font-semibold text-gray-800 flex justify-between items-center">
                Bagaimana jika lupa jadwal event?
                <span class="text-blue-500 group-open:rotate-180 transition">⌄</span>
            </summary>
            <p class="text-sm text-gray-600 mt-2">
                Informasi jadwal dapat dilihat kembali di halaman katalog atau notifikasi email.
            </p>
        </details>

    </div>

</div>

</div>

</body>
</html>