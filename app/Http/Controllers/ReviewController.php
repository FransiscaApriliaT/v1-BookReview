<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Menampilkan form untuk membuat review
    public function create()
    {
        $books = Book::all();  // Mengambil semua data buku dari database
        return view('reviews.create', compact('books'));  // Mengirimkan data buku ke view
    }

    // Menyimpan review baru
    public function store(Request $request)
    {
    
        // Validasi input
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'title' => 'required|string|max:255', // Validasi title
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string',
        ]);

        // Menyimpan data review
        Review::create([
            'book_id' => $validated['book_id'],
            'user_id' => auth()->id(),  // Mendapatkan ID pengguna yang sedang login
            'title' => $validated['title'], // Menyertakan title
            'rating' => $validated['rating'],
            'content' => $validated['content'],
        ]);

        // Redirect setelah berhasil
        return redirect()->route('reviews.create')->with('success', 'Review berhasil dibuat!');
    }
    public function index()
    {
        $reviews = Review::with('book', 'user')->latest()->get();
        return view('reviews.index', compact('reviews'));
    }

    public function destroy(Review $review)
    {
        // Hapus semua komentar terkait (jika belum cascade di migration)
        // $review->comments()->delete();

        // Hapus review (jika migration sudah cascade, komentar akan ikut terhapus)
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review dan semua komentar berhasil dihapus!');
    }

}
