{{-- ================================================
FILE: resources/views/home.blade.php
STYLE: Gentle Monster Clone (Minimalist, Avant-Garde, Full-width)
================================================ --}}

@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<style>
    /* CUSTOM CSS UNTUK GENTLE MONSTER STYLE */
    body {
        background-color: #ffffff;
        color: #000000;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        overflow-x: hidden;
    }

    /* Hilangkan semua rounded corner agar kaku dan mewah */
    * {
        border-radius: 0 !important;
    }

    /* Hero Section Full Screen dengan Video */
    .gm-hero {
        position: relative;
        height: 100vh;
        width: 100%;
        overflow: hidden;
        background-color: #000;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .gm-hero video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .gm-hero-content {
        position: absolute;
        z-index: 2;
        text-align: center;
        color: white;
        bottom: 12%;
        left: 0;
        right: 0;
    }

    .gm-title {
        font-size: 3rem;
        font-weight: 700;
        letter-spacing: 4px;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
    }

    .btn-gm-hero {
        background: transparent;
        color: white;
        border: 1px solid white;
        padding: 12px 40px;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 2px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-gm-hero:hover {
        background: white;
        color: black;
    }

    /* Kategori Grid */
    .gm-grid-item {
        position: relative;
        overflow: hidden;
        height: 70vh;
        background-color: #f8f8f8;
    }

    .gm-grid-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 1.2s cubic-bezier(0.25, 1, 0.5, 1);
    }

    .gm-grid-item:hover img {
        transform: scale(1.05);
    }

    .gm-grid-overlay {
        position: absolute;
        bottom: 40px;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .gm-grid-text {
        color: white;
        font-size: 1.2rem;
        font-weight: 600;
        text-transform: uppercase;
        text-decoration: none;
        letter-spacing: 3px;
        border-bottom: 1px solid transparent;
    }

    .gm-grid-item:hover .gm-grid-text {
        border-bottom: 1px solid white;
    }

    /* Product Cards - Minimalist (Gaya Tanpa Background) */
    .gm-product-card {
        border: none;
        background: transparent;
        margin-bottom: 3rem;
        transition: opacity 0.3s ease;
    }

    .gm-product-image-wrapper {
        background-color: #ffffff; /* Background putih bersih */
        aspect-ratio: 1/1;
        overflow: hidden;
        margin-bottom: 1.2rem;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .gm-product-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: contain; /* Agar produk utuh */
        padding: 40px; /* Ruang kosong mewah di sekitar produk */
        mix-blend-mode: multiply; /* Menghilangkan background putih pada foto */
        transition: transform 0.6s ease;
    }

    .gm-product-card:hover img {
        transform: scale(1.08);
    }

    .gm-product-info {
        display: flex;
        flex-direction: column;
        align-items: center; /* Center text ala GM */
        text-align: center;
        font-size: 0.85rem;
    }

    .gm-product-name {
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.3rem;
    }

    .gm-product-price {
        font-weight: 400;
        color: #777;
    }

    .btn-gm-outline {
        border: 1px solid #000;
        color: #000;
        background: transparent;
        padding: 10px 35px;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        display: inline-block;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-gm-outline:hover {
        background: #000;
        color: #fff;
    }
</style>

{{-- 1. HERO SECTION (VIDEO FULL SCREEN) --}}
<section class="gm-hero">
    <video autoplay muted loop playsinline>
        <source src="{{ asset('assets/videos/Rolex Day-Date – Decorative stone dials.mp4') }}" type="video/mp4">
        {{-- Fallback image jika video gagal --}}
        <img src="{{ asset('assets/images/fallback-hero.jpg') }}" alt="Hero Image">
    </video>

    <div class="gm-hero-content">
        <h1 class="gm-title">Bold Collection 2024</h1>
        <p class="mb-4" style="letter-spacing: 2px; font-weight: 300; text-transform: uppercase; font-size: 0.9rem;">
            Redefining Style Boundaries
        </p>
        <a href="{{ route('catalog.index') }}" class="btn-gm-hero">
            Shop The Collection
        </a>
    </div>
</section>

{{-- 2. CATEGORIES GRID --}}
<section>
    <div class="container-fluid p-0">
        <div class="row g-0">
            @foreach($categories->take(2) as $category)
            <div class="col-md-6">
                <div class="gm-grid-item">
                    <img src="{{ $category->image_url ?? 'https://via.placeholder.com/800x800' }}" alt="{{ $category->name }}">
                    <div class="gm-grid-overlay">
                        <a href="{{ route('catalog.index', ['category' => $category->slug]) }}" class="gm-grid-text">
                            {{ $category->name }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($categories->count() > 2)
        <div class="row g-0">
            @foreach($categories->skip(2) as $category)
            <div class="col-md-4">
                <div class="gm-grid-item" style="height: 50vh;">
                    <img src="{{ $category->image_url ?? 'https://via.placeholder.com/600x600' }}" alt="{{ $category->name }}">
                    <div class="gm-grid-overlay">
                        <a href="{{ route('catalog.index', ['category' => $category->slug]) }}" class="gm-grid-text" style="font-size: 0.9rem;">
                            {{ $category->name }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- 3. NEW ARRIVALS (TANPA BACKGROUND) --}}
<section class="py-5 my-5">
    <div class="container-fluid px-4 px-md-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase" style="letter-spacing: 3px; font-size: 1.8rem;">New Arrivals</h2>
            <div class="mt-2">
                <a href="{{ route('catalog.index') }}" class="text-dark text-decoration-underline text-uppercase" style="font-size: 0.7rem; letter-spacing: 1px;">Explore All</a>
            </div>
        </div>

        <div class="row g-4">
            @foreach($latestProducts as $product)
            <div class="col-6 col-md-3">
                <div class="gm-product-card">
                    @php
                        $detailUrl = Route::has('products.show') ? route('products.show', $product->slug) : '#';
                    @endphp

                    <a href="{{ $detailUrl }}" class="text-decoration-none text-dark">
                        <div class="gm-product-image-wrapper">
                            <img src="{{ $product->image_url ?? 'https://via.placeholder.com/400x400' }}" alt="{{ $product->name }}">
                        </div>
                        <div class="gm-product-info">
                            <div class="gm-product-name">{{ $product->name }}</div>
                            <div class="gm-product-price">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 4. FOOTER CAMPAIGN --}}
<section class="py-5 bg-white text-center border-top">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h3 class="text-uppercase fw-bold mb-3" style="letter-spacing: 2px;">Exclusive Service</h3>
                <p class="mb-4" style="font-size: 0.85rem; color: #555; line-height: 1.8;">
                    Nikmati pengalaman belanja personal dengan layanan konsultasi gaya kami secara online maupun offline. Kami menyediakan gratis pengiriman dan pengembalian untuk seluruh wilayah.
                </p>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <a href="{{ route('register') }}" class="btn-gm-outline">Create Account</a>
                    <a href="#" class="btn-gm-outline">Store Locator</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
