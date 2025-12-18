@extends('dashboard.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Materi Belajar Hangeul</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-arrow-left me-2"></i>Kembali
    </a>
</div>
<div class="accordion" id="accordionMateri">
    @foreach($moduls as $index => $modul)
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button" 
                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $modul->id_modul }}" 
                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}">
                    <strong>{{ $modul->nama_modul }}</strong>
                    <span class="badge bg-info ms-2">{{ $modul->jenis->nama_jenis }}</span>
                </button>
            </h2>
            <div id="collapse{{ $modul->id_modul }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" 
                 data-bs-parent="#accordionMateri">
                <div class="accordion-body">
                    
                    @if(str_contains($modul->nama_modul, 'Gabungan') || $modul->jenis->nama_jenis == 'Gabungan')
                        
                        <div class="row g-3">
                            @forelse($modul->jenis->hangeul as $hangeul)
                                <div class="col-6 col-sm-4 col-md-3">
                                    <div class="card h-100 text-center">
                                        <div class="card-body">
                                            <h3 class="card-title text-primary">{{ $hangeul->hangeul }}</h3>
                                            <p class="card-text text-muted mb-0"><strong>{{ $hangeul->pelafalan }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-3">
                                    <p class="text-muted">Data huruf belum tersedia</p>
                                </div>
                            @endforelse
                        </div>
                    @else
                        <div class="row g-3">
                            @forelse($modul->jenis->hangeul as $hangeul)
                                <div class="col-6 col-sm-4 col-md-3">
                                    <div class="card h-100 text-center">
                                        <div class="card-body">
                                            <h3 class="card-title text-primary">{{ $hangeul->hangeul }}</h3>
                                            <p class="card-text text-muted mb-0"><strong>{{ $hangeul->pelafalan }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-3">
                                    <p class="text-muted">Data huruf belum tersedia</p>
                                </div>
                            @endforelse
                        </div>

                    @endif

                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection