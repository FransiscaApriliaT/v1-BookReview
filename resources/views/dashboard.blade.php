@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4">Dashboard</h1>
        <p class="lead">Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</p>
    </div>

    <div class="mb-4 text-center">
        <a href="http://127.0.0.1:8000/reviews/create" class="btn btn-success">Create Review</a>
        <a href="http://127.0.0.1:8000/reviews" class="btn btn-primary">View All Reviews</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="h4 mb-0">Latest Reviews</h2>
        </div>
        <div class="card-body">
            @if ($reviews->isEmpty())
                <p class="text-muted text-center">No reviews available.</p>
            @else
                <ul class="list-group list-group-flush">
                    @foreach ($reviews as $review)
                        <li class="list-group-item">
                            <h5 class="mb-1">{{ $review->title }}</h5>
                            <p class="mb-0 text-muted">{{ $review->content }}</p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection