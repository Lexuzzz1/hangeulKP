<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Belajar Hangeul</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fa-solid fa-language me-2"></i>Belajar Hangeul
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                            Hi, {{ Auth::user()->nama }} </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profil Saya</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        
        <div class="row mb-4">
            <div class="col-12">
                <div class="card bg-white shadow-sm border-0">
                    <div class="card-body p-4">
                        <h2 class="fw-bold text-dark">Selamat Datang, {{ Auth::user()->nama }}! 👋</h2>
                        <p class="text-muted mb-0">Siap untuk memulai perjalanan belajar Bahasa Korea hari ini?</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center p-4">
                        <div class="mb-3 text-primary">
                            <i class="fa-solid fa-book-open fa-3x"></i>
                        </div>
                        <h4 class="card-title fw-bold">Materi Belajar</h4>
                        <p class="card-text text-muted">Pelajari vokal dan konsonan Hangeul dari dasar hingga mahir.</p>
                        <a href="#" class="btn btn-outline-primary w-100 mt-2">Mulai Belajar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center p-4">
                        <div class="mb-3 text-warning">
                            <i class="fa-solid fa-pen-to-square fa-3x"></i>
                        </div>
                        <h4 class="card-title fw-bold">Latihan Kuis</h4>
                        <p class="card-text text-muted">Uji pemahamanmu dengan kuis interaktif di setiap modul.</p>
                        <a href="#" class="btn btn-outline-warning w-100 mt-2">Mulai Kuis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>