<?php

namespace App\Http\Controllers;

use App\Models\Product; // Pastikan model Product di-import
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan detail produk
     */
    public function show($slug)
    {
        // 1. Cari produk berdasarkan slug yang diklik
        // Jika tidak ada, maka akan otomatis menampilkan halaman 404
        $product = Product::where('slug', $slug)->firstOrFail();

        // 2. Tampilkan halaman detail produk
        // Pastikan Anda sudah memiliki file: resources/views/products/show.blade.php
        return view('products.show', compact('product'));
    }

    /**
     * Fungsi index jika Anda butuh menampilkan semua produk
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('products.index', compact('products'));
    }
}
