@extends('dashboard.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Kuis Hangeul</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-arrow-left me-2"></i>Kembali
    </a>
</div>

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row mb-4">
    @foreach($moduls as $modul)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title">{{ $modul->nama_modul }}</h5>
                        <span class="badge bg-primary">{{ $modul->jenis->nama_jenis ?? 'N/A' }}</span>
                    </div>
                    
                    <p class="card-text text-muted">
                        <strong>Jumlah Soal:</strong> {{ $modul->pertanyaan()->count() }}
                    </p>

                    @if($modul->pertanyaan()->count() > 0)
                        <a href="{{ route('kuis.show', $modul->id_modul) }}" class="btn btn-primary w-100">
                            Mulai Kuis
                        </a>
                    @else
                        <button class="btn btn-secondary w-100" disabled>
                            Belum Ada Soal
                        </button>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

@if($moduls->isEmpty())
    <div class="alert alert-info" role="alert">
        Belum ada modul tersedia
    </div>
@endif

<div class="mt-4">
    <a href="{{ route('kuis.history') }}" class="btn btn-info">
        Lihat Riwayat Kuis
    </a>
</div>
@endsection
