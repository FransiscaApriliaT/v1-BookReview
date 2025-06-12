@extends('layouts.app')

@section('title', 'Comments')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Comments for: {{ $review->title }}</h1>

    <!-- Form untuk menambahkan komentar -->
    <div class="mb-4">
        <form action="{{ route('review.comments.store', $review->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" rows="3" placeholder="Write a comment..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
    </div>

    <!-- Daftar komentar -->
    <h3>All Comments</h3>
    @if ($review->comments->isEmpty())
        <p class="text-muted">No comments yet.</p>
    @else
        <ul class="list-group">
            @foreach ($review->comments as $comment)
                <li class="list-group-item">
                    {{ $comment->content }}
                    <span class="text-muted d-block small">Posted on {{ $comment->created_at->format('d M Y, H:i') }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection