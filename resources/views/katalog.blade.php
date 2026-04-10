<!DOCTYPE html>
<html>
<head>
    <title>Katalog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-100 min-h-screen">

<!-- NAVBAR -->
<nav class="bg-white shadow-md p-4 flex justify-between items-center">
    <div class="space-x-6">
        <a href="/" class="hover:text-blue-500">Home</a>
        <a href="/profil" class="hover:text-blue-500">Profil</a>
        <a href="/katalog" class="text-blue-500 font-bold">Katalog</a>
        <a href="/bantuan" class="hover:text-blue-500">Bantuan</a>
        <a href="/kontak" class="hover:text-blue-500">Kontak</a>
    </div>
</nav>

<!-- CONTENT -->
<div class="p-10">

    <h1 class="text-3xl font-bold text-gray-800 mb-10 text-center">
        Katalog Event Terbaru
    </h1>

    <!-- GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- CARD 1 -->
        <div class="bg-white rounded-3xl shadow-md p-6 hover:shadow-xl hover:-translate-y-2 transition duration-300 border border-blue-200">
            <div class="text-4xl mb-3">💻</div>
            <h2 class="font-bold text-xl text-gray-800">Frontend Bootcamp</h2>
            <p class="text-gray-600 text-sm mt-2">
                Belajar HTML, CSS, dan Tailwind dari nol hingga mahir.
            </p>
            <div class="mt-4 flex justify-between items-center">
                <span class="text-blue-500 font-semibold">Online</span>
                <button class="bg-blue-500 text-white px-4 py-1 rounded-full hover:bg-blue-600">
                    Daftar
                </button>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="bg-white rounded-3xl shadow-md p-6 hover:shadow-xl hover:-translate-y-2 transition duration-300 border border-blue-200">
            <div class="text-4xl mb-3">🤖</div>
            <h2 class="font-bold text-xl text-gray-800">AI for Beginner</h2>
            <p class="text-gray-600 text-sm mt-2">
                Memahami dasar Artificial Intelligence dengan praktik sederhana.
            </p>
            <div class="mt-4 flex justify-between items-center">
                <span class="text-blue-500 font-semibold">Offline</span>
                <button class="bg-blue-500 text-white px-4 py-1 rounded-full hover:bg-blue-600">
                    Daftar
                </button>
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="bg-white rounded-3xl shadow-md p-6 hover:shadow-xl hover:-translate-y-2 transition duration-300 border border-blue-200">
            <div class="text-4xl mb-3">📱</div>
            <h2 class="font-bold text-xl text-gray-800">Mobile App Workshop</h2>
            <p class="text-gray-600 text-sm mt-2">
                Belajar membuat aplikasi Android menggunakan Flutter.
            </p>
            <div class="mt-4 flex justify-between items-center">
                <span class="text-blue-500 font-semibold">Hybrid</span>
                <button class="bg-blue-500 text-white px-4 py-1 rounded-full hover:bg-blue-600">
                    Daftar
                </button>
            </div>
        </div>

    </div>

</div>

</body>
</html>