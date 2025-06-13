<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Reviews</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-100 via-pink-50 to-purple-100 min-h-screen">
    
    <div class="max-w-4xl mx-auto mt-12 p-8 bg-white/90 rounded-3xl shadow-2xl border border-blue-200">
        <div class="mb-6">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-xl font-semibold shadow hover:from-blue-500 hover:to-purple-500 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
                Kembali
            </a>
        </div>
        <h1 class="text-4xl font-extrabold mb-8 text-center text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-pink-500 to-purple-600 drop-shadow-lg">
            📚 Book Reviews
        </h1>

        @foreach ($reviews as $review)
            <div class="mb-12 p-7 border border-blue-100 rounded-2xl bg-gradient-to-br from-white via-blue-50 to-pink-50 shadow-lg">
                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus review ini beserta semua komentarnya?')" class="inline-flex items-center mb-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded-xl font-semibold shadow hover:from-pink-500 hover:to-red-500 transition text-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Hapus Review
                    </button>
                </form>
                <div class="flex items-center mb-2">

                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-pink-400 flex items-center justify-center text-white font-bold text-xl shadow">
                        {{ strtoupper(substr($review->user->name ?? 'U', 0, 1)) }}
                    </div>
                    <div class="ml-3">
                        <span class="font-semibold text-blue-700">{{ $review->user->name ?? 'Anonim' }}</span>
                        <span class="text-xs text-gray-400 ml-2">{{ $review->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <p class="text-base text-gray-500 mb-1">
                    <span class="font-semibold text-indigo-600">Buku:</span>
                    {{ $review->book->title ?? '-' }}
                </p>
                <p class="text-xl text-gray-900 font-bold mt-2 mb-1">{{ $review->title ?? 'No Title' }}</p>
                <div class="flex items-center mb-2">
                    @if(isset($review->rating))
                        @for($i = 1; $i <= 5; $i++)
                            <span class="{{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }} text-lg">&#9733;</span>
                        @endfor
                        <span class="ml-2 text-sm text-gray-500">({{ $review->rating }}/5)</span>
                    @endif
                </div>
                <p class="text-gray-700 mb-4">{{ $review->content }}</p>

                <div class="mt-4 bg-blue-50 rounded-xl p-4">
                    <h3 class="text-md font-bold text-blue-700 mb-2 flex items-center">
                        <svg class="w-5 h-5 mr-1 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 8h2a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V10a2 2 0 0 1 2-2h2"></path><path d="M15 3h-6a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z"></path></svg>
                        Komentar
                    </h3>
                    <ul class="space-y-2">
                        @forelse ($review->comments as $comment)
                            <li class="bg-white p-3 border rounded-lg shadow-sm flex items-start">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-pink-400 to-blue-400 flex items-center justify-center text-white font-bold text-sm mr-3">
                                    {{ strtoupper(substr($comment->user->name ?? 'U', 0, 1)) }}
                                </div>
                                <div>
                                    <span class="font-semibold text-blue-600">{{ $comment->user->name ?? 'Anonim' }}</span>
                                    <span class="text-xs text-gray-400 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                                    <div class="text-gray-700">{{ $comment->content }}</div>
                                </div>
                            </li>
                        @empty
                            <li class="text-gray-500">Belum ada komentar.</li>
                        @endforelse
                    </ul>
                </div>

                <!-- Comment Form -->
                <form action="{{ route('review.comments.store', $review->id) }}" method="POST" class="mt-6">
                    @csrf
                    <textarea name="content" rows="2" placeholder="Tulis komentar..."
                        class="w-full p-3 border border-blue-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 bg-white"
                        required></textarea>
                    <button type="submit"
                        class="mt-3 px-6 py-2 bg-gradient-to-r from-blue-500 to-pink-500 text-white rounded-xl font-semibold shadow hover:from-pink-500 hover:to-blue-500 transition">
                        Kirim Komentar
                    </button>
                </form>
            </div>
        @endforeach
    </div>

</body>
</html>