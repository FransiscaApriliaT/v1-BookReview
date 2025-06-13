@extends('layouts.app')

@section('content')
<div class="position-relative overflow-hidden py-5" style="background: linear-gradient(135deg, #f0f4ff, #fdfbff); min-height: 100vh;">
    <!-- Dekoratif blur -->
    <div class="position-absolute top-0 start-0 w-25 h-25 rounded-circle" style="background:rgba(111,154,255,0.1); filter: blur(50px); z-index:0;"></div>
    <div class="position-absolute bottom-0 end-0 w-25 h-25 rounded-circle" style="background:rgba(255,193,245,0.1); filter: blur(50px); z-index:0;"></div>

    <div class="container-fluid px-4 position-relative" style="z-index:1;">
        <div class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-10 col-xl-9">
                <!-- Detail Buku -->
                <div class="card shadow-sm border-0 rounded-4 mb-5">
                    <div class="card-body text-center px-4 py-5">
                        <h1 class="fw-bold text-primary mb-3">{{ $book->title }}</h1>
                        @if($book->image)
                        <div class="d-flex justify-content-center mb-4">
                            <img src="{{ asset($book->image) }}" alt="Cover Buku" class="rounded-4 shadow" style="max-width: 240px; height: auto;">
                        </div>
                        @endif
                        <p class="mb-2"><span class="fw-semibold text-muted">Penulis:</span> {{ $book->author }}</p>
                        <p class="mb-2"><span class="fw-semibold text-muted">Genre:</span> <span class="badge bg-info text-dark">{{ $book->genre }}</span></p>
                        <p class="mt-3 text-secondary" style="white-space: pre-line;">{{ $book->description }}</p>
                    </div>
                </div>

                <!-- Review Section -->
                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-white border-0 rounded-top-4 px-4 py-3">
                        <h2 class="h5 mb-0 text-primary"><i class="bi bi-chat-left-text me-2"></i>Ulasan Pembaca</h2>
                    </div>
                    <div class="card-body bg-light rounded-bottom-4 px-4 py-4">
                        @if($book->reviews->isNotEmpty())
                            @foreach($book->reviews as $review)
                            <div class="border rounded-4 p-4 mb-4 bg-white shadow-sm">
                                <h5 class="fw-bold text-primary mb-2">{{ $review->title }}</h5>
                                <p class="text-dark mb-3">{{ $review->content }}</p>

                                <h6 class="text-muted mb-2">Komentar:</h6>
                                @if($review->comments->isNotEmpty())
                                    <ul class="list-unstyled mb-3 ps-2">
                                        @foreach($review->comments as $comment)
                                        <li class="mb-2">
                                            <span class="fw-semibold text-indigo">{{ $comment->user->name ?? 'Anonim' }}:</span>
                                            <span class="text-dark">{{ $comment->content }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-muted fst-italic">Belum ada komentar.</p>
                                @endif

                                <!-- Form Komentar -->
                                <form action="{{ route('comments.store', $review->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    <div class="mb-2">
                                        <textarea name="content" class="form-control rounded-3 shadow-sm" placeholder="Tulis komentar..." rows="2" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary btn-sm rounded-pill px-4">Kirim</button>
                                </form>
                            </div>
                            @endforeach
                        @else
                            <p class="text-muted fst-italic">Belum ada review untuk buku ini.</p>
                        @endif
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('buku.index') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                        <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Buku
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
@endpush
@endsection
