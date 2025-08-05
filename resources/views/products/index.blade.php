@extends('layouts.app')

@section('content')
    <style>
        body {
            background: linear-gradient(135deg, #f0f8ff, #e6f0ff);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .card-custom {
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .table thead {
            background-color: #da8c55;
            color: white;
        }

        .btn-action {
            margin-right: 5px;
        }

        .btn-custom {
            background-color: #da8c55;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #b97744;
            /* warna lebih gelap saat hover */
            color: white;
        }

        /* Footer */
        footer {
            background-color: #da8c55;
            color: white;
            padding: 15px 0;
            text-align: center;
            font-size: 14px;
            margin-top: auto;
        }
    </style>

    <main>
        <div class="card-custom">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">Daftar Produk</h2>
                <a href="{{ route('products.create') }}" class="btn btn-custom">
                    <i class="bi bi-plus-circle"></i> Tambah Produk
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th width="180px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    @if ($product->image)
                                        <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}"
                                            width="60">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product) }}"
                                        class="btn btn-warning btn-sm btn-action">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                        style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus produk ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $products->links() }}
            </div>
        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} Figure Shop. All rights reserved. | Built with Laravel & Bootstrap
    </footer>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection
