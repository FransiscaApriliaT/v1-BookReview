<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BOOK REVIEW</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);
            min-height: 100vh;
        }
        .guest-card {
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px 0 rgba(80, 80, 160, 0.10);
            background: #fff;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="guest-card p-5 w-100" style="max-width: 400px;">
            <div class="text-center mb-4">
                <a href="{{ route('home') }}" class="h3 fw-bold text-primary text-decoration-none">BOOK REVIEW</a>
            </div>
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>