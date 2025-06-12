@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<div class="position-relative overflow-hidden py-5" style="background: linear-gradient(120deg, #e3f0ff 0%, #f8fafc 100%); min-height: 100vh;">
    <!-- Ornamen dekoratif -->
    <div class="position-absolute top-0 start-0 w-25 h-25 rounded-circle" style="background:rgba(52,112,255,0.08); filter: blur(40px); z-index:0;"></div>
    <div class="position-absolute bottom-0 end-0 w-25 h-25 rounded-circle" style="background:rgba(100,181,246,0.10); filter: blur(40px); z-index:0;"></div>
    <div class="container text-center position-relative" style="z-index:1;">
        <div class="mb-4">
            <span class="display-1 d-block mb-2" style="animation:bounce 1.2s infinite alternate;">📞</span>
            <h1 class="display-4 fw-bold mb-3" style="color:#346fff;">Kontak Kami</h1>
            <p class="lead text-secondary mb-4">
                Jika Anda memiliki pertanyaan, masukan, atau ingin menghubungi kami, silakan gunakan informasi kontak di bawah ini.
            </p>
        </div>
        <div class="row justify-content-center g-4">
            <div class="col-md-8">
                <div class="bg-white rounded-4 shadow-sm p-4 mb-3 text-start d-flex align-items-center gap-3">
                    <span class="fs-2 text-primary">✉️</span>
                    <span><strong>Email:</strong> <a href="mailto:fransisca@example.com" class="text-primary text-decoration-none">fransisca@example.com</a></span>
                </div>
                <div class="bg-white rounded-4 shadow-sm p-4 mb-3 text-start d-flex align-items-center gap-3">
                    <span class="fs-2 text-info">📱</span>
                    <span><strong>Telepon:</strong> <a href="tel:+6285396259985" class="text-info text-decoration-none">+62 853-9625-9985</a></span>
                </div>
                <div class="bg-white rounded-4 shadow-sm p-4 text-start d-flex align-items-center gap-3">
                    <span class="fs-2 text-secondary">📍</span>
                    <span><strong>Alamat:</strong> Jl. Flamboyan, Luwuk</span>
                </div>
            </div>
        </div>
        <div class="mt-5 text-primary-emphasis fst-italic">
            "Kami siap membantu Anda kapan saja!"
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