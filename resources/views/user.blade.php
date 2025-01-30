<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep Masakan</title>
    <link href="{{ asset('/css/user.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Navigation Header -->
       <!-- Navigation Header -->
       <nav class="navbar navbar-expand-lg bg-light shadow-sm p-3">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="mainpage.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-danger p-0 m-0 border-0" 
                                style="font-weight: bold; color: red; cursor: pointer;">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header>
        <h1>Masak Apa Hari Ini Chef?</h1>
        <h3>Coba Lihat Resep-Resep Ini.</h3>
    </header>

    <!-- Search Bar -->
    <section class="search-bar">
        <input type="text" id="search-input" placeholder="Cari resep...">
        <button id="search-button">Cari</button>
    </section>

    <!-- Recipe List -->
    <section class="recipe-list" id="recipe-list">
    @foreach($resep as $a)
        <article class="recipe">
            <img src="{{ asset($a->gambar) }}" alt="Gambar" class="w-24 h-16 object-cover rounded">
            <div class="recipe-info">
                <h2>{{ $a->nama_resep }}</h2>
                <p>{{ $a->deskripsi }}</p>
                <a href="reseprendang.html" class="recipe-link">Lihat Resep</a>
            </div>
        </article>
    @endforeach
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; Resep 2024, Masak Apa Hari Ini Chef?</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>