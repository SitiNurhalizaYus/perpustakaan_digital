<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body style="background:#f4f8fb;">

<nav class="navbar navbar-expand-lg shadow-sm" style="background:#106589;">
    <div class="container">

        <a class="navbar-brand fw-bold text-white" href="/">
            <i class="bi bi-book"></i> Perpustakaan Digital Universitas
        </a>

        <ul class="navbar-nav ms-auto">

            <li class="nav-item">
                <a class="nav-link text-white" href="/">
                    <i class="bi bi-house"></i> Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="/books">
                    <i class="bi bi-journal-text"></i> Buku
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="/loans">
                    <i class="bi bi-box-arrow-in-down"></i> Pinjaman
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="/recommendations">
                    <i class="bi bi-stars"></i> Rekomendasi
                </a>
            </li>

        </ul>
    </div>
</nav>

<div class="container mt-4">

@if(session('success'))
<div class="alert alert-success">
<i class="bi bi-check-circle"></i> {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
<i class="bi bi-x-circle"></i> {{ session('error') }}
</div>
@endif

@yield('content')

</div>

<footer class="text-center text-muted mt-5 p-3">
Perpustakaan Digital Universitas © 2026
</footer>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

...

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
