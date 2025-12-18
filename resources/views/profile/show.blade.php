@extends('dashboard.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Profil Saya</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-arrow-left me-2"></i>Kembali
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-4">Informasi Profil</h5>
                
                <div class="mb-3">
                    <label class="form-label text-muted">Nama</label>
                    <p class="form-control-plaintext fs-5 fw-bold">{{ $user->nama }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted">Email</label>
                    <p class="form-control-plaintext fs-5">{{ $user->email }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted">Bergabung Sejak</label>
                    <p class="form-control-plaintext">{{ $user->created_at->setTimezone('Asia/Jakarta')->format('d F Y H:i') }}</p>
                </div>

                <hr>

                <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                    <i class="fa-solid fa-edit me-2"></i>Edit Profil
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <div class="mb-3">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto" 
                         style="width: 100px; height: 100px; font-size: 40px;">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <h5 class="card-title">{{ $user->nama }}</h5>
                <p class="card-text text-muted small">{{ $user->email }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
