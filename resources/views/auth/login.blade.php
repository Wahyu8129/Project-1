<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Masak Apa Hari Ini Chef?</title>
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Video Background -->
    <video class="bg-video" autoplay muted>
        <source src="background-index.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>

    <!-- Login Form -->
    <div class="container">
    <h2>Login</h2>
    <form method="post" id="login-form" action="{{ route('login') }}">
        @csrf
        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email" class="form-control">
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <div class="mb-3"></div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control">
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <div class="mt-3 text-center">
            <p>Belum punya akun? <a href="{{ route('register') }}" class="btn btn-link">Daftar di sini</a></p>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </div>
    </form>
</div>

    <!-- Footer -->
    <footer>
        <p>&copy; Resep 2024, Masak Apa Hari Ini Chef?</p>
    </footer>
</body>
</html>
