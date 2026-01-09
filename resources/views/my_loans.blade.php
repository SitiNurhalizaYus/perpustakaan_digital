@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="/" class="btn btn-sm btn-outline-secondary me-3">
        <i class="bi bi-arrow-left"></i>
    </a>

    <h3 class="mb-0">
        <i class="bi bi-journal-text"></i> Data Peminjaman
    </h3>
</div>

<table class="table table-bordered">
    <tr class="table-primary">
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Aksi</th>
    </tr>

    @foreach($loans as $l)
    <tr class="table-warning">
        <td>{{ $l->book->title }}</td>
        <td>{{ $l->loan_date }}</td>
        <td>
            <a href="/return/{{ $l->id }}" class="btn btn-danger btn-sm">
                <i class="bi bi-arrow-return-left"></i> Kembalikan
            </a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
