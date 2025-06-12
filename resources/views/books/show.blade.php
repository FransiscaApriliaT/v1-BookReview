@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $book->title }}</h1>

    {{-- Gambar buku --}}
    @if($book->image)
        <img src="{{ asset('storage/' . $book->image) }}" alt="Cover Buku" width="200" class="img-thumbnail mb-3">
    @endif

    <p><strong>Penulis:</strong> {{ $book->author }}</p>
    <p><strong>Genre:</strong> {{ $book->genre }}</p>
    <p><strong>Deskripsi:</strong> {{ $book->description }}</p>

    <hr>
    <h2>Review</h2>

    @if($book->reviews->isNotEmpty())
        @foreach($book->reviews as $review)
            <div class="border p-3 rounded mb-4">
                <h4>{{ $review->title }}</h4>
                <p><strong>{{ $review->user->name }}</strong> memberikan rating {{ $review->rating }}/5</p>
                <p>{{ $review->content }}</p>

                {{-- Komentar untuk review ini --}}
                <h5>Komentar:</h5>
                @if($review->comments->isNotEmpty())
                    <ul>
                        @foreach($review->comments as $comment)
                            <li><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Belum ada komentar.</p>
                @endif

                {{-- Form komentar --}}
                <form action="{{ route('comments.store', $review->id) }}" method="POST" class="mt-3">
                    @csrf
                    <div class="mb-2">
                        <textarea name="content" class="form-control" placeholder="Tulis komentar..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Kirim Komentar</button>
                </form>
            </div>
        @endforeach
    @else
        <p>Belum ada review untuk buku ini.</p>
    @endif

    <a href="{{ route('buku.index') }}" class="btn btn-primary mt-4">Kembali</a>
</div>
@endsection
