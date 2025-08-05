@extends('layouts.app')

@section('content')
    <style>
        .card-custom {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
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
    </style>

    <div class="card-custom">
        <h2 class="mb-4">Edit Produk</h2>

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $product->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="price" step="0.01"
                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar Produk</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-custom">
                <i class="bi bi-save"></i> Update
            </button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </form>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection
