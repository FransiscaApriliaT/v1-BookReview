@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="relative overflow-hidden bg-gradient-to-br from-indigo-100 via-white to-blue-50 py-20">
    <div class="container mx-auto px-6 max-w-5xl">
        <!-- Card utama -->
        <div class="bg-white bg-opacity-90 backdrop-blur-lg shadow-2xl rounded-3xl p-10">
            <div class="text-center mb-10">
                <div class="text-6xl mb-4">📖</div>
                <h1 class="text-5xl font-extrabold text-indigo-700 mb-4">Tentang Kami</h1>
                <p class="text-lg text-gray-700 leading-relaxed">
                    Platform ini dibuat untuk pecinta buku yang ingin berbagi pengalaman membaca. Kamu bisa menambahkan buku, menulis ulasan, dan memberikan komentar terhadap review yang sudah ada.
                </p>
            </div>

            <!-- Card fitur -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-indigo-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition">
                    <div class="text-4xl mb-2">📖</div>
                    <h3 class="font-semibold text-lg text-indigo-800">Tambah Buku</h3>
                    <p class="text-gray-600 text-sm mt-2">Tambahkan buku favoritmu ke dalam koleksi digital.</p>
                </div>
                <div class="bg-indigo-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition">
                    <div class="text-4xl mb-2">📝</div>
                    <h3 class="font-semibold text-lg text-indigo-800">Tulis Review</h3>
                    <p class="text-gray-600 text-sm mt-2">Berikan ulasan berdasarkan pengalaman membacamu.</p>
                </div>
                <div class="bg-indigo-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition">
                    <div class="text-4xl mb-2">💬</div>
                    <h3 class="font-semibold text-lg text-indigo-800">Komentar</h3>
                    <p class="text-gray-600 text-sm mt-2">Diskusikan review bersama pengguna lainnya.</p>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
