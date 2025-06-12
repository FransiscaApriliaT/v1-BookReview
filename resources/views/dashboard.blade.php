@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-gradient" style="background: linear-gradient(90deg,#4f8cff,#e66465,#a4508b);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">
            Dashboard
        </h1>
        <p class="lead">Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</p>
    </div>

    <div class="mb-4 text-center d-flex justify-content-center gap-3">
        <a href="{{ route('reviews.create') }}" class="btn btn-success btn-lg shadow rounded-pill px-4">
            <i class="bi bi-plus-circle me-2"></i> Create Review
        </a>
        <a href="{{ route('reviews.index') }}" class="btn btn-primary btn-lg shadow rounded-pill px-4">
            <i class="bi bi-journal-text me-2"></i> View All Reviews
        </a>
    </div>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-gradient bg-primary text-white rounded-top-4">
            <h2 class="h4 mb-0"><i class="bi bi-star-fill me-2"></i>Latest Reviews</h2>
        </div>
        <div class="card-body bg-light rounded-bottom-4">
            @if ($reviews->isEmpty())
                <p class="text-muted text-center">No reviews available.</p>
            @else
                <ul class="list-group list-group-flush">
                    @foreach ($reviews as $review)
                        <li class="list-group-item bg-white rounded-3 mb-3 shadow-sm">
                            <div class="d-flex align-items-center mb-2">
                                <div class="rounded-circle bg-gradient bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width:40px; height:40px; font-size:1.2rem;">
                                    {{ strtoupper(substr($review->user->name ?? 'U', 0, 1)) }}
                                </div>
                                <div>
                                    <h5 class="mb-0">{{ $review->title }}</h5>
                                    <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                            <p class="mb-0 text-muted">{{ $review->content }}</p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
.text-gradient {
    background: linear-gradient(90deg,#4f8cff,#e66465,#a4508b);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>
@endpush