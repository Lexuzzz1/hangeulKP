@extends('dashboard.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">{{ $modul->nama_modul }}</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<form action="{{ route('kuis.submit', $modul->id_modul) }}" method="POST" class="card shadow-sm">
    @csrf
    <div class="card-body">
        @foreach($pertanyaans as $index => $pertanyaan)
            <div class="mb-4 pb-4 border-bottom">
                <h5 class="mb-3">
                    <span class="badge bg-info">{{ $index + 1 }}</span>
                    {{ $pertanyaan->soal }}
                </h5>

                <div class="ms-3">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" 
                               name="jawaban_{{ $pertanyaan->id_pertanyaan }}" 
                               value="a" 
                               id="option_{{ $pertanyaan->id_pertanyaan }}_a"
                               required>
                        <label class="form-check-label" for="option_{{ $pertanyaan->id_pertanyaan }}_a">
                            <strong>A.</strong> {{ $pertanyaan->a }}
                        </label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" 
                               name="jawaban_{{ $pertanyaan->id_pertanyaan }}" 
                               value="b"
                               id="option_{{ $pertanyaan->id_pertanyaan }}_b"
                               required>
                        <label class="form-check-label" for="option_{{ $pertanyaan->id_pertanyaan }}_b">
                            <strong>B.</strong> {{ $pertanyaan->b }}
                        </label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" 
                               name="jawaban_{{ $pertanyaan->id_pertanyaan }}" 
                               value="c"
                               id="option_{{ $pertanyaan->id_pertanyaan }}_c"
                               required>
                        <label class="form-check-label" for="option_{{ $pertanyaan->id_pertanyaan }}_c">
                            <strong>C.</strong> {{ $pertanyaan->c }}
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" 
                               name="jawaban_{{ $pertanyaan->id_pertanyaan }}" 
                               value="d"
                               id="option_{{ $pertanyaan->id_pertanyaan }}_d"
                               required>
                        <label class="form-check-label" for="option_{{ $pertanyaan->id_pertanyaan }}_d">
                            <strong>D.</strong> {{ $pertanyaan->d }}
                        </label>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="card-footer bg-light d-flex gap-2">
        <button type="submit" class="btn btn-success">
            Selesai & Submit
        </button>
        <a href="{{ route('kuis.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
@endsection
