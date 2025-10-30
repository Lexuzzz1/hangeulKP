<h1>Welcome ini Halaman Utama</h1>
<p>Anda telah berhasil login sebagai: {{ Auth::user()->name }}</p>


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>