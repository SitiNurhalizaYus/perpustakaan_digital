@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="/" class="btn btn-sm btn-outline-secondary me-3">
        <i class="bi bi-arrow-left"></i>
    </a>

    <h3 class="mb-0">
        <i class="bi bi-box-arrow-in-down"></i> Data Peminjaman
    </h3>
</div>

<table class="table table-bordered table-striped align-middle">
    <thead class="table-primary">
        <tr>
            <th>Judul Buku</th>
            <th>Mahasiswa</th>
            <th>NIM</th>
            <th>Tanggal Pinjam</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    @forelse($loans as $l)
        <tr class="bg-light">
            <td>{{ $l->book->title }}</td>
            <td>{{ $l->user->name }}</td>
            <td>{{ $l->user->nim }}</td>
            <td>{{ $l->loan_date }}</td>

            <td>
                <span class="badge bg-warning text-dark">
                    Dipinjam
                </span>
            </td>

            <td>
                <a href="/return/{{ $l->id }}" class="btn btn-danger btn-sm">
                    <i class="bi bi-arrow-return-left"></i> Kembalikan
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center text-muted">
                Tidak ada buku yang sedang dipinjam
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection
