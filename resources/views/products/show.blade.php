{{-- ================================================
     FILE: resources/views/products/show.blade.php
     STYLE: Gentle Monster Minimalist Product Detail
     ================================================ --}}

@extends('layouts.app')

@section('title', $product->name)

@section('content')
<style>
    body {
        background-color: #ffffff;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }

    .product-container {
        padding-top: 50px;
        padding-bottom: 100px;
    }

    /* Image Gallery Area */
    .product-image-box {
        background-color: #f9f9f9; /* Abu-abu sangat muda ala GM */
        display: flex;
        align-items: center;
        justify-content: center;
        position: sticky;
        top: 120px;
        aspect-ratio: 4/5;
        overflow: hidden;
    }

    .product-image-box img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 50px;
        mix-blend-mode: multiply;
    }

    /* Info Area */
    .product-details {
        padding-left: 50px;
    }

    .product-category {
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 2px;
        color: #888;
        margin-bottom: 10px;
        display: block;
    }

    .product-title {
        font-size: 2rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 15px;
    }

    .product-price {
        font-size: 1.2rem;
        font-weight: 400;
        margin-bottom: 40px;
        color: #333;
    }

    .product-description {
        font-size: 0.9rem;
        line-height: 1.8;
        color: #555;
        margin-bottom: 40px;
        border-top: 1px solid #eee;
        padding-top: 30px;
    }

    /* Action Buttons */
    .btn-gm-dark {
        background-color: #000;
        color: #fff;
        border: 1px solid #000;
        width: 100%;
        padding: 15px;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 2px;
        margin-bottom: 10px;
        transition: 0.3s;
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .btn-gm-dark:hover {
        background-color: #333;
        color: #fff;
    }

    .btn-gm-light {
        background-color: #fff;
        color: #000;
        border: 1px solid #000;
        width: 100%;
        padding: 15px;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 2px;
        transition: 0.3s;
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .btn-gm-light:hover {
        background-color: #000;
        color: #fff;
    }

    .service-info {
        margin-top: 50px;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .service-item {
        border-bottom: 1px solid #eee;
        padding: 15px 0;
        display: flex;
        justify-content: space-between;
        cursor: pointer;
    }

    /* Mobile Adjustments */
    @media (max-width: 991px) {
        .product-details {
            padding-left: 15px;
            margin-top: 40px;
        }
        .product-image-box {
            position: relative;
            top: 0;
        }
    }
</style>

<div class="container product-container">
    <div class="row">
        {{-- Sisi Kiri: Gambar --}}
        <div class="col-lg-7">
            <div class="product-image-box">
                <img src="{{ $product->image_url ?? 'https://via.placeholder.com/1000x1250' }}" alt="{{ $product->name }}">
            </div>
        </div>

        {{-- Sisi Kanan: Detail --}}
        <div class="col-lg-5">
            <div class="product-details">
                <span class="product-category">{{ $product->category->name ?? 'Collection' }}</span>
                <h1 class="product-title">{{ $product->name }}</h1>
                <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>

                <div class="product-description">
                    <p>{{ $product->description ?? 'No description available for this exclusive piece.' }}</p>
                </div>

                {{-- Form Add to Cart --}}
                {{-- <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-gm-dark">Add to Cart</button>
                </form> --}}

                {{-- Wishlist --}}
                <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-gm-light mt-2">Add to Wishlist</button>
                </form>

                {{-- Extra Info ala GM --}}
                <div class="service-info">
                    <div class="service-item">
                        <span>Product Details</span>
                        <span>+</span>
                    </div>
                    <div class="service-item">
                        <span>Shipping & Returns</span>
                        <span>+</span>
                    </div>
                    <div class="service-item">
                        <span>Complimentary Packaging</span>
                        <span>+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
