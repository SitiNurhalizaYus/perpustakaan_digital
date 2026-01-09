@extends('layouts.app')

@section('content')
<div class="text-center mt-5">

    <h2 class="mb-3">
        <i class="bi bi-book"></i> Sistem Perpustakaan Digital Universitas
    </h2>

    <p class="lead">
        Sistem ini digunakan untuk mengelola data buku, peminjaman, dan pencarian
        pada Perpustakaan Digital Universitas.
    </p>

    <hr>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5><i class="bi bi-journal-text"></i> Data Buku</h5>
                    <p>Melihat dan mencari koleksi buku.</p>
                    <a href="/books" class="btn btn-primary btn-sm">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5><i class="bi bi-box-arrow-in-down"></i> Data Peminjaman</h5>
                    <p>Melihat dan mengelola peminjaman buku.</p>
                    <a href="/my-loans" class="btn btn-success btn-sm">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5><i class="bi bi-stars"></i> Rekomendasi</h5>
                    <p>Melihat buku yang direkomendasikan.</p>
                    <a href="#" class="btn btn-secondary btn-sm">Lihat</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
