@extends('dashboard.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Riwayat Kuis</h4>
    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-arrow-left me-2"></i>Kembali
    </a>
</div>

@if($histories->isEmpty())
    <div class="alert alert-info text-center" role="alert">
        <p class="mb-2">Belum ada riwayat kuis</p>
        <a href="{{ route('kuis.index') }}" class="btn btn-primary btn-sm">
            Mulai Kuis
        </a>
    </div>
@else
    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-sm table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 35%;">Modul</th>
                        <th style="width: 15%;">Nilai</th>
                        <th style="width: 35%;">Tanggal</th>
                        <th style="width: 15%;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($histories as $history)
                        <tr>
                            <td>
                                <p class="mb-0 small"><strong>{{ $history->modul->nama_modul }}</strong></p>
                                <p class="text-muted mb-0" style="font-size: 0.75rem;">{{ $history->modul->jenis->nama_jenis ?? 'N/A' }}</p>
                            </td>
                            <td>
                                <span class="fw-bold text-primary small">{{ number_format($history->presentase_progres, 1) }}%</span>
                            </td>
                            <td>
                                <p class="mb-0 small">{{ \Carbon\Carbon::parse($history->tanggal)->setTimezone('Asia/Jakarta')->format('d M Y') }}</p>
                                <p class="text-muted mb-0" style="font-size: 0.75rem;">{{ \Carbon\Carbon::parse($history->tanggal)->setTimezone('Asia/Jakarta')->format('H:i') }}</p>
                            </td>
                            <td>
                                @if($history->presentase_progres >= 80)
                                    <span class="badge bg-success" style="font-size: 0.7rem;">Lulus</span>
                                @elseif($history->presentase_progres >= 60)
                                    <span class="badge bg-warning text-dark" style="font-size: 0.7rem;">Cukup</span>
                                @else
                                    <span class="badge bg-danger" style="font-size: 0.7rem;">Tidak Lulus</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('kuis.index') }}" class="btn btn-primary btn-sm">
            Mulai Kuis Baru
        </a>
    </div>
@endif
@endsection
