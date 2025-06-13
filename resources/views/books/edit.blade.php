@extends('layouts.app')

@section('content')
<div class="container">
    
    <a href="{{ url()->previous() }}" class="btn btn-primary rounded-pill px-4 py-2 mb-4 d-inline-flex align-items-center gap-2 shadow" style="margin-top: 1rem;">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
        Kembali
    </a>
    <h1>Edit Buku</h1>
    <form action="{{ route('buku.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ $book->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Genre</label>
            <input type="text" name="genre" class="form-control" value="{{ $book->genre }}" required>
        </div>

        <div class="mb-3">
            <label>Gambar Saat Ini</label><br>
            @if ($book->image)
                <img src="{{ asset($book->image) }}" alt="Cover Buku" width="120" class="img-thumbnail mb-2">
            @else
                <p class="text-muted">Belum ada gambar</p>
            @endif
        </div>

        <div class="mb-3">
            <label>Ganti Gambar</label>
            <input type="file" name="image" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
