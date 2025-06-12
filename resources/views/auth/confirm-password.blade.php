@extends('layouts.guest')

@section('title', 'Konfirmasi Password')

@section('content')
    <h2 class="text-center mb-4 fw-bold text-primary">Konfirmasi Password</h2>
    <p class="mb-4 text-secondary text-center">
        Silakan konfirmasi password Anda sebelum melanjutkan.
    </p>
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="current-password" autofocus>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100 fw-bold mb-3">
            Konfirmasi
        </button>
    </form>
@endsection