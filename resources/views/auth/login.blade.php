<form method="POST" action="{{ route('login.post') }}">
    @csrf

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" required autofocus>
        @error('email') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
    </div>

    <button type="submit">Login</button>
    <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    
</form>