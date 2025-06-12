<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Pastikan hanya user yang login bisa CRUD
    }

    public function index(Request $request)
    {
        $query = Book::query();

        // Filter pencarian
        if ($request->filled('search')) {
            $filter = $request->input('filter', 'title');
            $search = $request->input('search');

            if ($filter === 'title') {
                $query->where('title', 'like', "%$search%");
            } elseif ($filter === 'rating') {
                $query->where('rating', 'like', "%$search%");
            } elseif ($filter === 'genre') {
                $query->where('genre', 'like', "%$search%");
            } elseif ($filter === 'author') {
                $query->where('author', 'like', "%$search%");
            }
        }

        $books = $query->get();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        $validated = $request->only(['title', 'author', 'description', 'genre']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('book_images', 'public');
            $validated['image'] = $imagePath; // hasilnya: book_images/namafile.jpg
        }


        Book::create($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit(Book $buku)
    {
        return view('books.edit', ['book' => $buku]);
    }

    public function update(Request $request, Book $buku)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validated = $request->only(['title', 'author', 'description', 'genre']);

        // Jika user upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($buku->image) {
                Storage::disk('public')->delete($buku->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('book_images', 'public');
            $validated['image'] = $imagePath;
        }

        $buku->update($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    public function show($id)
    {
        $book = Book::with('reviews.comments')->findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function destroy(Book $buku)
    {
        // Hapus gambar jika ada
        if ($buku->image) {
            Storage::disk('public')->delete($buku->image);
        }

        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
