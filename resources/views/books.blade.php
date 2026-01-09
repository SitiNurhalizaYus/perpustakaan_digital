@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="/" class="btn btn-sm btn-outline-secondary me-3">
        <i class="bi bi-arrow-left"></i>
    </a>

    <h3 class="mb-0">
        <i class="bi bi-journal-text"></i> Data Buku
    </h3>
</div>



<form class="row g-2 mb-4" action="/search" method="GET">
    <div class="col-md-10">
        <input type="text" name="q" class="form-control"
               placeholder="Cari judul atau penulis buku...">
    </div>
    <div class="col-md-2">
        <button class="btn btn-primary w-100">
            <i class="bi bi-search"></i> Cari
        </button>
    </div>
</form>


<table class="table table-bordered table-striped">
    <tr class="table-primary">
        <th>Judul</th>
        <th>Penulis</th>
        <th>Stok</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($books as $b)
    <tr>
        <td>{{ $b->title }}</td>
        <td>{{ $b->author }}</td>
        <td>{{ $b->stock }}</td>

        <td>
            @if($b->stock > 0)
                <span class="badge bg-success">Tersedia</span>
            @else
                <span class="badge bg-danger">Habis</span>
            @endif
        </td>

        <td>
            @if($b->stock > 0)
                <a href="/borrow/{{ $b->id }}" class="btn btn-success btn-sm">
                    <i class="bi bi-box-arrow-in-down"></i> Pinjam
                </a>
            @else
                <button class="btn btn-secondary btn-sm" disabled>
                    Stok Habis
                </button>
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection
