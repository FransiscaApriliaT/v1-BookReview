@extends('layouts.guest')

@section('title', 'Lupa Password')

@section('content')
    <h2 class="text-center mb-4 fw-bold text-warning">Lupa Password</h2>
    <p class="mb-4 text-secondary text-center">
        Masukkan email Anda untuk menerima link reset password.
    </p>
    @if (session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning w-100 fw-bold mb-3">
            Kirim Link Reset
        </button>
        <div class="text-center">
            <a href="{{ route('login') }}" class="text-decoration-none text-warning">Kembali ke Login</a>
        </div>
    </form>
@endsection