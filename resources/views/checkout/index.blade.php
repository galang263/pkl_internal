{{-- resources/views/checkout/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold">Checkout</h2>
            <p class="text-muted">Selesaikan pesanan Anda dengan mengisi detail di bawah ini.</p>
        </div>
    </div>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="row g-4">

            {{-- KOLOM KIRI: FORM PENGIRIMAN --}}
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold"><i class="bi bi-truck me-2"></i>Informasi Pengiriman</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Nama Penerima</label>
                                <input type="text" name="name" value="{{ auth()->user()->name }}"
                                       class="form-control form-control-lg shadow-none" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Nomor Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">+62</span>
                                    <input type="text" name="phone" class="form-control form-control-lg shadow-none"
                                           placeholder="81234567xxx" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Alamat Lengkap</label>
                                <textarea name="address" rows="3" class="form-control shadow-none"
                                          placeholder="Nama jalan, nomor rumah, RT/RW, Kec/Kota" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- OPSI PEMBAYARAN (Tambahan agar lebih pro) --}}
                <div class="card border-0 shadow-sm rounded-3 mt-4">
                    <div class="card-body p-4">
                        <h5 class="mb-3 fw-bold">Metode Pembayaran</h5>
                        <div class="form-check border rounded p-3 mb-2">
                            <input class="form-check-input ms-0 me-2" type="radio" name="payment" id="transfer" checked>
                            <label class="form-check-label fw-medium" for="transfer">Transfer Bank (Verifikasi Manual)</label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KOLOM KANAN: RINGKASAN PESANAN --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-3 position-sticky" style="top: 20px;">
                    <div class="card-header bg-dark text-white py-3">
                        <h5 class="mb-0 fw-bold">Ringkasan Pesanan</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="order-items mb-4" style="max-height: 300px; overflow-y: auto;">
                            @foreach($cart->items as $item)
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0 fw-bold text-truncate" style="max-width: 150px;">{{ $item->product->name }}</h6>
                                        <small class="text-muted">{{ $item->quantity }}x @ Rp {{ number_format($item->product->price, 0, ',', '.') }}</small>
                                    </div>
                                    <span class="fw-semibold text-dark">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                                </div>
                            @endforeach
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal</span>
                            <span class="text-muted font-monospace">Rp {{ number_format($cart->items->sum('subtotal'), 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="text-muted">Biaya Pengiriman</span>
                            <span class="text-success fw-medium">Gratis</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center border-top pt-3 mb-4">
                            <h5 class="mb-0 fw-bold">Total</h5>
                            <h4 class="mb-0 fw-bold text-primary font-monospace">Rp {{ number_format($cart->items->sum('subtotal'), 0, ',', '.') }}</h4>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold shadow-sm py-3 transition-all">
                            Konfirmasi & Bayar
                        </button>

                        <div class="text-center mt-3">
                            <small class="text-muted"><i class="bi bi-shield-check"></i> Pembayaran Aman & Terpercaya</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<style>
    /* Menghilangkan border biru saat input di klik */
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
    }
    .card {
        border: 1px solid rgba(0,0,0,.05);
    }
    .btn-primary {
        background-color: #0d6efd;
        border: none;
    }
    .btn-primary:hover {
        background-color: #0b5ed7;
        transform: translateY(-2px);
    }
    .transition-all {
        transition: all 0.3s ease;
    }
</style>
@endsection
