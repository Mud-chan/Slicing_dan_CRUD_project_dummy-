@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url(../image/bgbg.jpg);
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    main {
        flex: 1;
    }

    .product-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        transition: 0.3s;
        background: white;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    }

    .product-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        background-color: #f8f8f8;
    }

    .product-body {
        padding: 15px;
    }

    .product-name {
        font-weight: bold;
        font-size: 1.1rem;
        margin-bottom: 8px;
    }

    .product-price {
        color: #da8c55;
        font-weight: bold;
        font-size: 1.1rem;
    }

    .btn-custom {
        background-color: #da8c55;
        color: white;
        border: none;
    }

    .btn-custom:hover {
        background-color: #b97744;
        color: white;
    }

    footer {
        background-color: #da8c55;
        color: white;
        padding: 15px 0;
        text-align: center;
        font-size: 14px;
        margin-top: auto;
    }

    .pagination {
        justify-content: center;
    }
</style>

<main>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white">Daftar Produk</h2>
        <a href="{{ route('products.create') }}" class="btn btn-custom">
            <i class="bi bi-plus-circle"></i> Tambah Produk
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="product-card">
                    @if ($product->image)
                        <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" alt="No Image" class="product-image">
                    @endif

                    <div class="product-body">
                        <div class="product-name">{{ $product->name }}</div>
                        <div class="text-muted small mb-2">{{ $product->description }}</div>
                        <div class="product-price mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus produk ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-white">Belum ada produk.</p>
        @endforelse
    </div>

    <div class="mt-4 d-flex justify-content-center align-items-center pb-5">
        {{ $products->links() }}
    </div>
</main>

<footer>
    &copy; {{ date('Y') }} Figure Shop. All rights reserved. | Built with Laravel & Bootstrap
</footer>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection
