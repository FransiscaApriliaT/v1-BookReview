@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Buku</h1>

    {{-- Form Pencarian --}}
    <form action="{{ route('buku.index') }}" method="GET" class="row g-3 mb-4">
        <div class="col-auto">
            <select name="filter" class="form-select">
                <option value="title" {{ request('filter') == 'title' ? 'selected' : '' }}>Judul</option>
                <option value="genre" {{ request('filter') == 'genre' ? 'selected' : '' }}>Genre</option>
                <option value="author" {{ request('filter') == 'author' ? 'selected' : '' }}>Penulis</option>
            </select>
        </div>
        <div class="col-auto">
            <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
        <div class="col-auto">
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    {{-- Tombol Tambah Buku --}}
    @if(auth()->user() && auth()->user()->role === 'admin')
        <a href="{{ route('buku.create') }}" class="btn btn-success mb-4">➕ Tambah Buku</a>
    @endif

    {{-- Tampilan Buku dalam Kartu --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach ($books as $book)
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    @if ($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="cover buku" style="height: 250px; object-fit: cover;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                            <span class="text-muted">Tidak ada gambar</span>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $book->title }}</h5>
                        <p class="card-text mb-1"><strong>Penulis:</strong> {{ $book->author }}</p>
                        <p class="card-text"><strong>Genre:</strong> <span class="badge bg-info text-dark">{{ $book->genre }}</span></p>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <div class="d-grid gap-2">
                            <a href="{{ route('buku.show', $book->id) }}" class="btn btn-outline-primary btn-sm w-100">📖 Detail</a>

                            @if(auth()->user() && auth()->user()->role === 'admin')
                                <a href="{{ route('buku.edit', $book->id) }}" class="btn btn-outline-warning btn-sm w-100">✏️ Edit</a>

                                <form action="{{ route('buku.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')" class="w-100">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm w-100">🗑️ Hapus</button>
                                </form>
                            @endif

                            <a href="{{ route('reviews.create', $book->id) }}" class="btn btn-outline-success btn-sm w-100">⭐ Tambah Review</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
