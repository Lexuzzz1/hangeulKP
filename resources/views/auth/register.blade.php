<h1>Pendaftaran Akun Baru</h1>

<form method="POST" action="{{ route('register.post') }}">
    @csrf

    <div>
        <label for="name">Nama:</label>
        <input type="text" name="name" value="{{ old('name') }}" required autofocus>
        @error('name') <span>{{ $message }}</span> @enderror
    </div>
    
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        @error('password') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="password_confirmation">Konfirmasi Password:</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit">Daftar Sekarang</button>
    
    <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
</form>