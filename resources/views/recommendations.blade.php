@extends('layouts.app')
@section('content')
<h3>Rekomendasi Buku</h3>

@foreach($books as $b)
<p>{{ $b->title }} - {{ $b->author }}</p>
@endforeach
@endsection
