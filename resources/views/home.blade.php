@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">

    <h1 class="mb-3">
        <i class="bi bi-book"></i> Sistem Perpustakaan Digital Universitas
    </h1>

    <p class="lead text-muted mb-4">
        Sistem ini digunakan untuk melakukan pencarian, peminjaman, dan pengembalian buku
        secara digital di lingkungan Perpustakaan Universitas.
    </p>

    <form action="/search" method="GET" class="d-flex justify-content-center mt-4">
        <div class="input-group w-75 shadow-sm">
            <span class="input-group-text bg-white">
                <i class="bi bi-search"></i>
            </span>
            <input
                type="text"
                name="q"
                class="form-control"
                placeholder="Cari judul atau penulis buku..."
                required
            >
            <button class="btn btn-primary" type="submit">
                Telusuri
            </button>
        </div>
    </form>


    <div class="row justify-content-center mt-5">

        <!-- Buku -->
        <div class="col-md-4 mb-3">
            <a href="/books" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center p-4 hover-card">
                    <i class="bi bi-journal-text fs-1 text-primary"></i>
                    <h5 class="mt-3">Daftar Buku</h5>
                    <p class="text-muted">
                        Lihat dan cari buku yang tersedia di perpustakaan.
                    </p>
                </div>
            </a>
        </div>

        <!-- Peminjaman -->
        <div class="col-md-4 mb-3">
            <a href="/loans" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center p-4 hover-card">
                    <i class="bi bi-box-arrow-in-down fs-1 text-success"></i>
                    <h5 class="mt-3">Peminjaman</h5>
                    <p class="text-muted">
                        Lihat buku yang sedang Anda pinjam dan lakukan pengembalian.
                    </p>
                </div>
            </a>
        </div>

    </div>

</div>
@endsection
