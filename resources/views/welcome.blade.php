<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Figure Shop</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('{{ asset("image/bgbg.jpg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Segoe UI', sans-serif;
        }

        .overlay {
            background: rgba(0,0,0,0.55);
            min-height: 100vh;
            padding: 20px;
        }

        header nav a {
            font-weight: 500;
        }

        .hero-section {
            text-align: center;
            color: white;
            padding: 100px 20px;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 1.2rem;
            margin-top: 10px;
            opacity: 0.9;
        }

        .btn-shop {
            background-color: #da8c55;
            color: white;
            padding: 10px 25px;
            border-radius: 5px;
            font-weight: 500;
            text-decoration: none;
        }

        .btn-shop:hover {
            background-color: #b97744;
            color: white;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <!-- Header -->
        <header class="container mb-4">
            @if (Route::has('login'))
                <nav class="d-flex justify-content-end gap-3 pt-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-light btn-sm">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-warning btn-sm">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Hero Section -->
        <section class="hero-section">
            <h1>Selamat Datang di Figure Shop</h1>
            <p>Toko online koleksi figure terbaik dengan harga terjangkau dan kualitas premium.</p>
            <a href="{{ route('products.index') }}" class="btn-shop mt-3">Lihat Produk</a>
        </section>
    </div>
</body>
</html>
