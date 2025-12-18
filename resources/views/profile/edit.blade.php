@extends('dashboard.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Edit Profil</h1>
    <a href="{{ route('profile.show') }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                               id="nama" name="nama" value="{{ old('nama', $user->nama) }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save me-2"></i>Simpan Perubahan
                        </button>
                        <a href="{{ route('profile.show') }}" class="btn btn-secondary">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5 class="card-title mb-3">Keamanan Akun</h5>
                <p class="text-muted small mb-3">Ubah password akun Anda secara berkala untuk keamanan yang lebih baik.</p>
                <a href="{{ route('profile.change-password') }}" class="btn btn-warning">
                    <i class="fa-solid fa-key me-2"></i>Ubah Password
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
