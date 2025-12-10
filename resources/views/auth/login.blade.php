<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Belajar Hangeul</title>
    <link rel="icon" href="https://laravel.com/img/favicon/favicon-32x32.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width: 400px; border-radius: 15px;">
            <div class="text-center mb-4">
                <h3 class="fw-bold text-primary">Login Hangeul</h3>
                <p class="text-muted">Masuk untuk mulai belajar</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @error('email')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" id="email" required autofocus placeholder="nama@email.com">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required placeholder="********">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <p class="small">Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none">Daftar di sini</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>