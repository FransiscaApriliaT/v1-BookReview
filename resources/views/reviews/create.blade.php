<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Review Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container mt-5">
        <a href="{{route('reviews.index')}}" class="btn btn-primary rounded-pill px-4 py-2 mb-3 d-inline-flex align-items-center gap-2 shadow">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
            Kembali
        </a>
        <h1 class="text-center mb-4">Buat Review Baru</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('reviews.store') }}" method="POST" class="shadow p-4 rounded bg-light">
            @csrf

            <div class="mb-3">
                <label for="book_id" class="form-label">Pilih Buku</label>
                <select name="book_id" id="book_id" class="form-select" required>
                    <option value="" disabled selected>-- Pilih Buku --</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Judul Review</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>


            <div class="mb-3">
                <label for="rating" class="form-label">Rating (1-5)</label>
                <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
            </div>


            <button type="submit" class="btn btn-primary w-100">Kirim Review</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
