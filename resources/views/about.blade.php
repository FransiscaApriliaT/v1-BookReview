@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="position-relative overflow-hidden py-5" style="background: linear-gradient(120deg, #e3f0ff 0%, #f8fafc 100%); min-height: 100vh;">
    <!-- Ornamen dekoratif -->
    <div class="position-absolute top-0 start-0 w-25 h-25 rounded-circle" style="background:rgba(52,112,255,0.08); filter: blur(40px); z-index:0;"></div>
    <div class="position-absolute bottom-0 end-0 w-25 h-25 rounded-circle" style="background:rgba(100,181,246,0.10); filter: blur(40px); z-index:0;"></div>
    <div class="container position-relative" style="z-index:1;">
        <!-- Header -->
        <div class="text-center mb-5">
            <span class="display-1 d-block mb-2" style="animation:bounce 1.2s infinite alternate;">📚</span>
            <h1 class="display-4 fw-bold mb-3" style="color:#346fff;">Tentang Kami</h1>
            <p class="lead text-secondary mb-4">
                <span class="fw-semibold text-primary">BookReview</span> adalah komunitas digital bagi para pecinta buku untuk berbagi ulasan, menemukan inspirasi, dan terhubung dengan pembaca lainnya.
            </p>
        </div>

        <!-- Fitur -->
        <div class="row justify-content-center g-4 mb-5">
            <div class="col-md-4">
                <div class="bg-white rounded-4 shadow-sm p-4 text-center h-100">
                    <div class="fs-1 mb-2 text-primary">📖</div>
                    <h3 class="h5 fw-bold text-primary mb-2">Tambah Buku</h3>
                    <p class="text-secondary mb-0">Simpan dan kelola daftar buku favoritmu.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white rounded-4 shadow-sm p-4 text-center h-100">
                    <div class="fs-1 mb-2 text-info">📝</div>
                    <h3 class="h5 fw-bold text-info mb-2">Tulis Review</h3>
                    <p class="text-secondary mb-0">Berikan ulasan dan bantu pembaca lain menemukan bacaan terbaik.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white rounded-4 shadow-sm p-4 text-center h-100">
                    <div class="fs-1 mb-2 text-secondary">💬</div>
                    <h3 class="h5 fw-bold text-secondary mb-2">Diskusi & Komentar</h3>
                    <p class="text-secondary mb-0">Ikut serta dalam diskusi dan tukar pandangan seputar buku.</p>
                </div>
            </div>
        </div>

        <!-- Kenapa BookReview -->
        <div class="bg-white rounded-4 shadow p-5 text-center mx-auto" style="max-width: 600px;">
            <h2 class="h4 fw-bold text-primary mb-3">Kenapa Memilih BookReview?</h2>
            <ul class="text-secondary mb-4 text-start" style="max-width:400px;margin:auto;">
                <li class="mb-2">🌟 Gratis dan mudah digunakan.</li>
                <li class="mb-2">🔒 Menjaga privasi dan keamanan data pengguna.</li>
                <li class="mb-2">🤝 Komunitas ramah dan aktif.</li>
                <li>🎯 Fitur pencarian & filter untuk menemukan konten dengan cepat.</li>
            </ul>
            <p class="fst-italic text-primary-emphasis mt-3">"Buku adalah jendela dunia. Mari berbagi cerita dan rekomendasi terbaik bersama."</p>
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