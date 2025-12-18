@extends('dashboard.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Hasil Kuis - {{ $modul->nama_modul }}</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card bg-primary text-white text-center mb-4 shadow-sm">
    <div class="card-body p-5">
        <p class="card-text mb-2">Nilai Anda</p>
        <h1 class="display-4 fw-bold mb-3">{{ number_format($percentage, 1) }}%</h1>
        <p class="card-text mb-3">Skor: {{ $score }} / {{ $total_score }}</p>
        
        @if($percentage >= 80)
            <p class="fs-5 fw-bold">✓ Luar Biasa!</p>
        @elseif($percentage >= 60)
            <p class="fs-5 fw-bold">✓ Bagus!</p>
        @else
            <p class="fs-5 fw-bold">Silahkan coba lagi</p>
        @endif
    </div>
</div>

<div class="card mb-4 shadow-sm">
    <div class="card-header bg-light">
        <h5 class="mb-0">Pembahasan</h5>
    </div>
    <div class="card-body">
        @foreach($answers as $index => $answer)
            <div class="mb-4 pb-4 border-bottom">
                <div class="mb-2">
                    <span class="badge @if($answer['benar']) bg-success @else bg-danger @endif">
                        {{ $index + 1 }}
                        @if($answer['benar']) ✓ @else ✗ @endif
                    </span>
                    <strong>{{ $answer['pertanyaan'] }}</strong>
                </div>

                <div class="ms-3">
                    <div class="alert alert-info py-2 mb-2">
                        <small><strong>Jawaban Anda:</strong> {{ strtoupper($answer['jawaban_user']) }}</small>
                    </div>
                    
                    @if(!$answer['benar'])
                        <div class="alert alert-success py-2 mb-0">
                            <small><strong>Jawaban Benar:</strong> {{ strtoupper($answer['jawaban_benar']) }}</small>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="d-flex gap-2 justify-content-center mb-5">
    <a href="{{ route('kuis.index') }}" class="btn btn-primary">
        Kembali ke Daftar Kuis
    </a>
    <a href="{{ route('kuis.show', $modul->id_modul) }}" class="btn btn-success">
        Coba Lagi
    </a>
</div>
@endsection
