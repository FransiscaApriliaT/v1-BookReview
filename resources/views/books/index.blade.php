@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Buku</h1>

    <form action="{{ route('buku.index') }}" method="GET" class="row g-3 mb-3">
        <div class="col-auto">
            <select name="filter" class="form-select">
                <option value="title" {{ request('filter') == 'title' ? 'selected' : '' }}>Judul</option>
                <option value="rating" {{ request('filter') == 'rating' ? 'selected' : '' }}>Rating</option>
                <option value="rating" {{ request('filter') == 'genre' ? 'selected' : '' }}>Genre</option>
                <option value="rating" {{ request('filter') == 'author' ? 'selected' : '' }}>Penulis</option>
            </select>
        </div>
        <div class="col-auto">
            <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
        <div class="col-auto">
            <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>

    <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-blue">
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" alt="Cover Buku" width="60" height="90" class="img-thumbnail">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->rating }}</td>
                    <td>
                        <a href="{{ route('buku.show', $book->id) }}" class="btn btn-info btn-sm mb-1">Detail</a>
                        <a href="{{ route('buku.edit', $book->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                        <form action="{{ route('buku.destroy', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
