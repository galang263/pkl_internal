{{-- resources/views/emails/orders/paid.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        /* Simulasi utility Bootstrap 5 */
        .container { width: 100%; padding: 20px; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #212529; }
        .card { border: 1px solid #dee2e6; border-radius: 0.375rem; background-color: #fff; padding: 25px; }
        .h4 { font-size: 1.5rem; margin-bottom: 1rem; font-weight: 500; color: #0d6efd; }
        .table { width: 100%; margin-bottom: 1rem; vertical-align: top; border-color: #dee2e6; border-collapse: collapse; }
        .table th { text-align: left; padding: 12px; border-bottom: 2px solid #dee2e6; }
        .table td { padding: 12px; border-bottom: 1px solid #dee2e6; }
        .btn {
            display: inline-block; font-weight: 400; line-height: 1.5; color: #fff;
            text-align: center; text-decoration: none; vertical-align: middle;
            cursor: pointer; background-color: #0d6efd; border: 1px solid #0d6efd;
            padding: 0.375rem 0.75rem; font-size: 1rem; border-radius: 0.25rem; margin-top: 15px;
        }
        .text-muted { color: #6c757d !important; }
        .fw-bold { font-weight: 700 !important; }
        .text-end { text-align: right !important; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1 class="h4">Halo, {{ $order->user->name }}</h1>
            <p>Terima kasih! Pembayaran untuk pesanan <span class="fw-bold">#{{ $order->order_number }}</span> telah kami terima.</p>
            <p>Kami sedang memproses pesanan Anda.</p>

            <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th style="text-align: center;">Qty</th>
                        <th class="text-end">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td style="text-align: center;">{{ $item->quantity }}</td>
                        <td class="text-end">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="fw-bold">Total</td>
                        <td class="text-end fw-bold" style="color: #198754;">
                            Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>

            <a href="{{ route('orders.show', $order) }}" class="btn">
                Lihat Detail Pesanan
            </a>

            <hr style="margin: 30px 0; border: 0; border-top: 1px solid #dee2e6;">

            <p class="text-muted" style="font-size: 0.875rem;">
                Jika ada pertanyaan, silakan balas email ini.<br>
                Salam, <strong>{{ config('app.name') }}</strong>
            </p>
        </div>
    </div>
</body>
</html>
