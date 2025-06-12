@extends('layouts.guest')

@section('title', 'Verifikasi Email')

@section('content')
    <h2 class="text-center mb-4 fw-bold text-info">Verifikasi Email</h2>
    <p class="mb-4 text-secondary text-center">
        Sebelum melanjutkan, silakan cek email Anda untuk link verifikasi.<br>
        Jika belum menerima email, klik tombol di bawah untuk mengirim ulang.
    </p>
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success text-center">
            Link verifikasi baru telah dikirim ke email Anda.
        </div>
    @endif
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-info w-100 fw-bold mb-3">
            Kirim Ulang Email Verifikasi
        </button>
    </form>
    <div class="text-center">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link text-danger p-0">Logout</button>
        </form>
    </div>
@endsection