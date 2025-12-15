<?php

use Illuminate\Support\Facades\Route;

Route::get('tentang', function () {
    return view('tentang');
});

Route::get('/sapa/{nama}', function($nama){
    return "hallo, $nama! selamat datang yah awokawokawokawok,";
});

Route::get('/kategori/{nama?}', function ($nama = 'kaceng'){
    return "Menampilkan kategori: $nama";
});

Route::get('/produk/{id}', function ($id) {
    return "Detail produk #$id";
})->name('produk.detail');
