@extends('layouts.app')

@section('title', 'Detail Review')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ $review->title }}</h1>
    <p><strong>Book:</strong> {{ $review->book->title }}</p>
    <p><strong>Rating:</strong> {{ $review->rating }}</p>
    <p><strong>Content:</strong> {{ $review->content }}</p>

    <hr>

    <h3>Komentar</h3>
    @foreach($review->comments as $comment)
        <p>{{ $comment->content }} <span class="text-muted">({{ $comment->created_at->diffForHumans() }})</span></p>
    @endforeach

    <form action="{{ route('review.comments.store', $review->id) }}" method="POST" class="mt-4">
    @csrf
    <div class="mb-3">
        <textarea name="content" class="form-control" rows="3" placeholder="Tambahkan komentar..." required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Tambah Komentar</button>
</form>
</div>
@endsection