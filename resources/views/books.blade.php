<a href="/" class="text-blue-600 mb-4 inline-block">⬅ Back ke Menu</a>

@if(session('success'))
<div style="color:green">{{session('success')}}</div>
@endif

@if(session('error'))
<div style="color:red">{{session('error')}}</div>
@endif

<form action="/search">
<input name="q" placeholder="Cari judul atau penulis">
<button>Cari</button>
</form>

<table border="1">
<tr><th>Judul</th><th>Penulis</th><th>Stok</th><th>Aksi</th></tr>
@foreach($books as $b)
<tr>
<td>{{$b->title}}</td>
<td>{{$b->author}}</td>
<td>{{$b->stock}}</td>
<td>
<a href="/borrow/{{$b->id}}">Pinjam</a>
</td>
</tr>
@endforeach
</table>
