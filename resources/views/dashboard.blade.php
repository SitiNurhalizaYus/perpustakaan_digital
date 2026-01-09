@extends('layouts.app')
@section('content')
<h3>Dashboard</h3>

<div class="row mt-4">
<div class="col">Total Buku: {{ $totalBooks }}</div>
<div class="col">Buku Dipinjam: {{ $borrowed }}</div>
<div class="col">Total Transaksi: {{ $transactions }}</div>
</div>
@endsection
