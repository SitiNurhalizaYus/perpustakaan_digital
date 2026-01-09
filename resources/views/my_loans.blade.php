<!DOCTYPE html>
<html>
<head>
    <title>Pinjaman Saya</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-10">

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">

    <a href="/" class="text-blue-600 mb-4 inline-block">⬅ Back ke Menu</a>

    <h2 class="text-xl font-bold mb-4">📦 Pinjaman Saya</h2>

    <table class="w-full border">
        <tr class="bg-gray-200">
            <th class="p-2">Judul</th>
            <th class="p-2">Tanggal Pinjam</th>
            <th class="p-2">Aksi</th>
        </tr>

        @foreach($loans as $l)
        <tr>
            <td class="p-2">{{ $l->book->title }}</td>
            <td class="p-2">{{ $l->loan_date }}</td>
            <td class="p-2">
                <a href="/return/{{ $l->id }}" class="bg-red-600 text-white px-3 py-1 rounded">
                    Kembalikan
                </a>
            </td>
        </tr>
        @endforeach
    </table>

</div>

</body>
</html>
