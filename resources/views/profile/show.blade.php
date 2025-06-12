@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg border-0" style="max-width: 420px; width:100%;">
        <div class="card-body text-center">
            <!-- Avatar -->
            <div class="mb-3">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D8ABC&color=fff&size=128"
                     alt="Avatar" class="rounded-circle shadow" width="120" height="120">
            </div>
            <h3 class="card-title mb-1">{{ $user->name }}</h3>
            <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-secondary' }} mb-3 text-uppercase" style="font-size: 0.9rem;">
                {{ $user->role }}
            </span>
            <p class="card-text mb-2"><i class="bi bi-envelope"></i> {{ $user->email }}</p>
            <hr>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary mt-2">Kembali ke Dashboard</a>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
@endpush