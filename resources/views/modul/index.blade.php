<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Belajar - Hangeul</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-light bg-white border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark fs-6" href="{{ url('/dashboard/dashboard') }}">
                <i class="fa-solid fa-arrow-left me-2"></i> Kembali
            </a>
            <span class="fw-bold text-dark">Materi Hangeul</span>
        </div>
    </nav>

    <div class="container py-5">
        <div class="mb-4">
            <h3 class="fw-bold text-dark">Modul Pembelajaran</h3>
            <p class="text-secondary small">Silakan pilih topik di bawah ini untuk mulai belajar.</p>
        </div>

        <div class="accordion" id="accordionMateri">
            @foreach($moduls as $index => $modul)
                <div class="accordion-item mb-3 border rounded shadow-sm overflow-hidden">
                    <h2 class="accordion-header" id="heading{{ $modul->id_modul }}">
                        <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }} fw-semibold" type="button" 
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $modul->id_modul }}" 
                                aria-expanded="{{ $index == 0 ? 'true' : 'false' }}">
                            {{ $modul->nama_modul }}
                        </button>
                    </h2>
                    <div id="collapse{{ $modul->id_modul }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" 
                         data-bs-parent="#accordionMateri">
                        <div class="accordion-body bg-white">
                            
                            <div class="mb-3">
                                <span class="badge bg-secondary fw-normal">{{ $modul->jenis->nama_jenis }}</span>
                            </div>

                            @if(str_contains($modul->nama_modul, 'Gabungan') || $modul->jenis->nama_jenis == 'Gabungan')
                                
                                <div class="row g-3">
                                    @forelse($katas as $kata)
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="p-3 border rounded h-100 bg-light d-flex align-items-center">
                                                <div class="me-3 bg-white p-2 rounded border text-center" style="min-width: 60px;">
                                                    <h3 class="fw-bold text-primary mb-0">{{ $kata->hangeul }}</h3>
                                                </div>
                                                <div>
                                                    <small class="text-muted d-block">Arti:</small>
                                                    <span class="fw-bold text-dark">{{ $kata->arti }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 text-center py-3 text-muted">
                                            <small>Data kata belum tersedia.</small>
                                        </div>
                                    @endforelse
                                </div>

                            @else

                                <div class="row g-3">
                                    @forelse($modul->jenis->hangeul as $hangeul)
                                        <div class="col-6 col-sm-4 col-md-3">
                                            <div class="p-3 border rounded text-center h-100 bg-light">
                                                <h2 class="fw-bold text-dark mb-1">{{ $hangeul->hangeul }}</h2>
                                                <small class="text-muted d-block">Dibaca:</small>
                                                <span class="fw-bold text-primary">{{ $hangeul->pelafalan }}</span>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 text-center py-3 text-muted">
                                            <small>Data huruf belum tersedia.</small>
                                        </div>
                                    @endforelse
                                </div>

                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>