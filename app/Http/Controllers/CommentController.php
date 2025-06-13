<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Review;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the comments for a specific review.
     */
    public function index($reviewId)
    {
        $review = Review::with('comments')->findOrFail($reviewId);

        return view('comments.index', ['review' => $review]);
    }

    /**
     * Store a newly created comment in storage.
     */
    public function store(Request $request, $reviewId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $review = Review::findOrFail($reviewId);
        $review->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(), // Menyimpan ID user yang membuat komentar
        ]);

        return redirect()->route('review.comments.index', $reviewId)
            ->with('success', 'Comment added successfully.');
    }

    public function destroy(\App\Models\Comment $comment)
    {
        $reviewId = $comment->review_id;
        $comment->delete();
        return redirect()->route('review.comments.index', $reviewId)
            ->with('success', 'Komentar berhasil dihapus!');
    }
}