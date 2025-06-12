@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="position-relative overflow-hidden py-5" style="background: linear-gradient(120deg, #e3f0ff 0%, #f8fafc 100%); min-height: 100vh;">
    <!-- Ornamen dekoratif -->
    <div class="position-absolute top-0 start-0 w-25 h-25 rounded-circle" style="background:rgba(52,112,255,0.08); filter: blur(40px); z-index:0;"></div>
    <div class="position-absolute bottom-0 end-0 w-25 h-25 rounded-circle" style="background:rgba(100,181,246,0.10); filter: blur(40px); z-index:0;"></div>
    <div class="container text-center position-relative" style="z-index:1;">
        <div class="mb-4">
            <span class="display-1 d-block mb-2" style="animation:bounce 1.2s infinite alternate;">📚</span>
            <h1 class="display-4 fw-bold mb-3" style="color:#346fff;">Selamat Datang di BookReview</h1>
            <p class="lead text-secondary mb-4">Temukan, ulas, dan diskusikan buku favoritmu bersama komunitas pembaca!</p>
            <a href="{{ route('about') }}" class="btn btn-primary btn-lg px-5 py-3 fw-semibold rounded-pill shadow-sm">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
</div>
<style>
@keyframes bounce {
    0% { transform: translateY(0);}
    100% { transform: translateY(-16px);}
}
</style>
@endsection