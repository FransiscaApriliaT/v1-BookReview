<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">📚 Book Reviews</h1>

        @foreach ($reviews as $review)
            <div class="mb-10 p-5 border border-gray-200 rounded-lg bg-gray-50 shadow-sm">
                <p class="text-lg text-gray-900 font-semibold">{{ $review->title ?? 'No Title' }}</p>
                <p class="text-gray-700 mb-3">{{ $review->content }}</p>

                <div class="mt-4">
                    <h3 class="text-md font-bold text-gray-800 mb-2">💬 Comments:</h3>
                    <ul class="space-y-2">
                        @forelse ($review->comments as $comment)
                            <li class="bg-white p-3 border rounded shadow-sm">{{ $comment->content }}</li>
                        @empty
                            <li class="text-gray-500">No comments yet.</li>
                        @endforelse
                    </ul>
                </div>

                <!-- Comment Form -->
                <form action="{{ route('review.comments.store', $review->id) }}" method="POST" class="mt-4">
                    @csrf
                    <textarea name="content" rows="2" placeholder="Add a comment..."
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required></textarea>
                    <button type="submit"
                        class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Submit Comment
                    </button>
                </form>
                </form>
            </div>
        @endforeach
    </div>

</body>
</html>
