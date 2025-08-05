<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        // Semua route butuh login
        $this->middleware('auth');
    }

    /**
     * Menampilkan daftar produk
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Menampilkan form tambah produk
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Menyimpan produk baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['name', 'description', 'price']);

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $filename);
            $data['image'] = $filename;
        }

        Product::create($data);

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit produk
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Mengupdate data produk
     */
    public function update(Request $request, Product $product)
    {
        // Validasi input
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['name', 'description', 'price']);

        // Upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && file_exists(public_path('uploads/' . $product->image))) {
                unlink(public_path('uploads/' . $product->image));
            }

            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $filename);
            $data['image'] = $filename;
        }

        $product->update($data);

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk
     */
    public function destroy(Product $product)
    {
        // Hapus gambar jika ada
        if ($product->image && file_exists(public_path('uploads/' . $product->image))) {
            unlink(public_path('uploads/' . $product->image));
        }

        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil dihapus.');
    }
}
