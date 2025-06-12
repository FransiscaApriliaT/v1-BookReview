<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BOOK REVIEW</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);
            min-height: 100vh;
        }
        .guest-card {
            border-radius: 2rem;
            box-shadow: 0 8px 32px 0 rgba(80, 80, 160, 0.15);
            background: rgba(255,255,255,0.95);
            border: 1.5px solid #e0e7ff;
            backdrop-filter: blur(6px);
        }
        .brand-gradient {
            background: linear-gradient(90deg, #7f53ac 0%, #647dee 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .guest-icon {
            font-size: 3rem;
            margin-bottom: 0.5rem;
            animation: bounce 1.2s infinite alternate;
        }
        @keyframes bounce {
            0% { transform: translateY(0);}
            100% { transform: translateY(-10px);}
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="guest-card p-5 w-100" style="max-width: 420px;">
            <div class="text-center mb-4">
                <div class="guest-icon">📚</div>
                <a href="{{ route('home') }}" class="h3 fw-bold brand-gradient text-decoration-none">BOOK REVIEW</a>
            </div>
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>