<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">Keranjang Belanja</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                @livewire('cart.item', ['cart' => $cart], key($cart->id))
                            @endforeach
                            <tr>
                                <td colspan="3"><strong>Total:</strong></td>
                                <td class="text-center">
                                    <strong>Rp {{ number_format($carts->sum('subtotal'), 0, ',', '.') }}</strong>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex">
                        <a href="/" class="btn btn-warning text-white">
                            <i class="fas fa-angle-left"></i> Kembali Belanja
                        </a>
                        <a href="{{ route('checkout') }}" class="btn btn-success ms-auto">
                            Checkout <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
