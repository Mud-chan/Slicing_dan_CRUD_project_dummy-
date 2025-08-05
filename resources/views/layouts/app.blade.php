<!DOCTYPE html>
<html>
<head>
    <title>Figure Online Shop</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Warna tema orange Breeze */
        .navbar-custom {
            background-color: #da8c55; /* orange Breeze */
        }
        .navbar-custom .nav-link {
            color: white;
        }
        .navbar-custom .nav-link.active {
            background-color: #efa46e; /* orange lebih gelap untuk aktif */
            border-radius: 5px;
        }
        .navbar-custom .nav-link:hover {
            background-color: #c2410c; /* hover lebih gelap */
            border-radius: 5px;
        }
        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('products.index') }}">Figure Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}"
                           href="{{ route('products.index') }}">
                            Produk
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item me-3">
                            <span class="nav-link text-white">Hi, {{ auth()->user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-light btn-sm">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
