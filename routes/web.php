<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CommentController;
use App\Models\Review;

// Halaman utama
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

// Menggunakan sistem autentikasi dari Laravel Breeze
require __DIR__.'/auth.php';

// Dashboard hanya bisa diakses jika user sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $reviews = Review::latest()->take(5)->get(); // Ambil 5 review terbaru
        return view('dashboard', compact('reviews')); // Kirim data ke view
    })->name('dashboard');

    Route::get('/buku', [BookController::class, 'index'])->name('buku.index');

    Route::resource('/buku', BookController::class);
    Route::post('/buku/{id}/review', [ReviewController::class, 'store'])->name('review.store');
    Route::delete('/review/{review}', [ReviewController::class, 'destroy'])->name('review.destroy');

    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::post('/reviews/{review}/comments', [CommentController::class, 'store'])->name('review.comments.store');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::get('/reviews/{review}/comments', [CommentController::class, 'index'])->name('review.comments.index');

});
