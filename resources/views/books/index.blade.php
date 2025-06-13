@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="position-relative overflow-hidden py-5" style="background: linear-gradient(120deg, #e3f0ff 0%, #f8fafc 100%); min-height: 100vh;">
    <!-- Ornamen dekoratif -->
    <div class="position-absolute top-0 start-0 w-25 h-25 rounded-circle" style="background:rgba(52,112,255,0.08); filter: blur(40px); z-index:0;"></div>
    <div class="position-absolute bottom-0 end-0 w-25 h-25 rounded-circle" style="background:rgba(100,181,246,0.10); filter: blur(40px); z-index:0;"></div>
    <div class="container position-relative" style="z-index:1;">
        <h1 class="mb-4 fw-bold text-primary text-center" style="letter-spacing:1px;">📚 Daftar Buku</h1>

        {{-- Form Pencarian --}}
        <form action="{{ route('buku.index') }}" method="GET" class="row g-3 mb-4 justify-content-center">
            <div class="col-auto">
                <select name="filter" class="form-select rounded-pill shadow-sm">
                    <option value="title" {{ request('filter') == 'title' ? 'selected' : '' }}>Judul</option>
                    <option value="genre" {{ request('filter') == 'genre' ? 'selected' : '' }}>Genre</option>
                    <option value="author" {{ request('filter') == 'author' ? 'selected' : '' }}>Penulis</option>
                </select>
            </div>
            <div class="col-auto">
                <input type="text" name="search" class="form-control rounded-pill shadow-sm" placeholder="Cari..." value="{{ request('search') }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary rounded-pill px-4 shadow">Cari</button>
            </div>
            <div class="col-auto">
                <a href="{{ route('buku.index') }}" class="btn btn-secondary rounded-pill px-4 shadow">Reset</a>
            </div>
        </form>

        {{-- Tombol Tambah Buku --}}
        @if(auth()->user() && auth()->user()->role === 'admin')
            <div class="text-center mb-4">
                <a href="{{ route('buku.create') }}" class="btn btn-success rounded-pill px-4 shadow fw-semibold">
                    ➕ Tambah Buku
                </a>
            </div>
        @endif

        {{-- Tampilan Buku dalam Kartu --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($books as $book)
                <div class="col">
                    <div class="card h-100 shadow-lg border-0 rounded-4 bg-white/90">
                        @if ($book->image)
                            <div class="d-flex align-items-center justify-content-center bg-white rounded-top-4" style="height:220px;overflow:hidden;">
                                <img src="{{ asset($book->image) }}" class="mw-100 mh-100" alt="cover buku" style="max-height: 200px; object-fit: contain;">
                            </div>
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center rounded-top-4" style="height: 220px;">
                                <span class="text-muted">Tidak ada gambar</span>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold">{{ $book->title }}</h5>
                            <p class="card-text mb-1"><strong>Penulis:</strong> {{ $book->author }}</p>
                            <p class="card-text"><strong>Genre:</strong> <span class="badge bg-info text-dark">{{ $book->genre }}</span></p>
                        </div>
                        <div class="card-footer bg-white border-top-0 rounded-bottom-4">
                            <div class="d-grid gap-2">
                                <a href="{{ route('buku.show', $book->id) }}" class="btn btn-outline-primary btn-sm w-100 rounded-pill">📖 Detail</a>

                                @if(auth()->user() && auth()->user()->role === 'admin')
                                    <a href="{{ route('buku.edit', $book->id) }}" class="btn btn-outline-warning btn-sm w-100 rounded-pill">✏️ Edit</a>

                                    <form action="{{ route('buku.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')" class="w-100">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm w-100 rounded-pill">🗑️ Hapus</button>
                                    </form>
                                @endif

                                <a href="{{ route('reviews.create', $book->id) }}" class="btn btn-outline-success btn-sm w-100 rounded-pill">⭐ Tambah Review</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection