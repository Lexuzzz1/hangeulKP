<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Belajar Hangeul</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center py-5">
        <div class="card shadow p-4" style="width: 450px; border-radius: 15px;">
            <div class="text-center mb-4">
                <h3 class="fw-bold text-success">Buat Akun Baru</h3>
                <p class="text-muted">Isi data diri kamu dengan benar</p>
            </div>

            <form method="POST" action="{{ route('register.post') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           name="name" id="name" value="{{ old('name') }}" required autofocus placeholder="Contoh: Budi Santoso">
                    
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" id="email" value="{{ old('email') }}" required placeholder="nama@email.com">
                    
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" id="password" required placeholder="Minimal 8 karakter">
                    
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" 
                           name="password_confirmation" id="password_confirmation" required placeholder="Ulangi password">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Daftar Sekarang</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <p class="small">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Login di sini</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>