<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komentar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 via-pink-50 to-purple-100 min-h-screen">

    <div class="max-w-2xl mx-auto mt-12 p-8 bg-white/90 rounded-3xl shadow-2xl border border-blue-200">
        <div class="mb-6">
            <a href="{{ route('reviews.index') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-xl font-semibold shadow hover:from-blue-500 hover:to-purple-500 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
                Kembali
            </a>
        </div>
        <h1 class="text-2xl font-extrabold mb-6 text-center text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-pink-500 to-purple-600 drop-shadow-lg">
            💬 Komentar untuk: <span class="text-blue-700">{{ $review->title }}</span>
            <div class="text-base font-semibold text-indigo-700 mt-2">
                Buku: <span class="text-gray-800">{{ $review->book->title ?? '-' }}</span>
            </div>
        </h1>

        <!-- Form untuk menambahkan komentar -->
        <form action="{{ route('review.comments.store', $review->id) }}" method="POST" class="mb-8 bg-gradient-to-br from-white via-blue-50 to-pink-50 p-6 rounded-2xl shadow border border-blue-100">
            @csrf
            <textarea name="content" rows="2" placeholder="Tulis komentar..." class="w-full p-3 border border-blue-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 bg-white mb-3" required></textarea>
            <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-pink-500 text-white rounded-xl font-semibold shadow hover:from-pink-500 hover:to-blue-500 transition">
                Tambah Komentar
            </button>
        </form>

        <!-- Daftar komentar -->
        <h3 class="mb-4 text-blue-700 font-bold">Semua Komentar</h3>
        @if ($review->comments->isEmpty())
            <p class="text-gray-500 italic">Belum ada komentar.</p>
        @else
            <ul class="space-y-4">
                @foreach ($review->comments as $comment)
                    <li class="bg-white p-4 border border-blue-100 rounded-xl shadow flex items-start justify-between">
                        <div class="flex">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-pink-400 to-blue-400 flex items-center justify-center text-white font-bold text-lg mr-3">
                                {{ strtoupper(substr($comment->user->name ?? 'U', 0, 1)) }}
                            </div>
                            <div>
                                <div class="flex items-center mb-1">
                                    <span class="font-semibold text-blue-600">{{ $comment->user->name ?? 'Anonim' }}</span>
                                    <span class="text-xs text-gray-400 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="text-gray-700">{{ $comment->content }}</div>
                            </div>
                        </div>
                        @if(auth()->user() && (auth()->user()->id == $comment->user_id || auth()->user()->role == 'admin'))
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')" class="ml-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded-lg font-semibold shadow hover:from-pink-500 hover:to-red-500 transition text-xs">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Hapus
                            </button>
                        </form>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>