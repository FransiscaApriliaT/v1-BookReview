@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="hero text-center py-5 bg-light">
    <h1>Selamat Datang di MyWebsite</h1>
    <a href="{{ route('about') }}" class="btn btn-primary">Pelajari Lebih Lanjut</a>
</div>

@endsection
