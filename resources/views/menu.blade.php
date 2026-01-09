<!DOCTYPE html>
<html>
<head>
    <title>Menu Utama</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded shadow w-96">
    <h2 class="text-xl font-bold text-center mb-6">
        Perpustakaan Digital
    </h2>

    <div class="space-y-3">
        <a href="/books" class="block bg-blue-600 text-white p-3 rounded text-center">Daftar Buku</a>
        <a href="/books" class="block bg-indigo-600 text-white p-3 rounded text-center">Cari Buku</a>
        <a href="/my-loans" class="block bg-green-600 text-white p-3 rounded text-center">Pinjaman Saya</a>
        <a href="#" class="block bg-gray-400 text-white p-3 rounded text-center">Rekomendasi</a>
        <a href="#" class="block bg-yellow-500 text-white p-3 rounded text-center">Dashboard Versi</a>
    </div>
</div>

</body>
</html>
