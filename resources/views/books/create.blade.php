@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Buku</h1>
    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Genre</label>
            <input type="text" name="genre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Gambar Buku</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label>Rating (1–10)</label>
            <input type="number" name="rating" class="form-control" value="{{ old('rating', $review->rating ?? '') }}">
            @error('rating') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

@endsection
