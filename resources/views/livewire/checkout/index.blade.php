<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulir Alamat Pengirimian</div>
                <div class="card-body">
                    <form wire:submit.prevent="checkout">
                        <div class="mb-3">
                            <label for="recipient" class="form-label">Nama</label>
                            <input wire:model="recipient" type="text" class="form-control" id="recipient"
                                placeholder="Masukkan nama penerima" />
                            @error('recipient') <span class="small text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea wire:model="address" id="address" cols="30" rows="5"
                                class="form-control"></textarea>
                            @error('address') <span class="small text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telepon</label>
                            <input wire:model="phone" type="text" class="form-control" id="phone"
                                placeholder="Masukkan nomor telepon penerima" value="" />
                            @error('phone') <span class="small text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">Cart</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td>{{ $cart->product->name }}</td>
                                            <td>{{ $cart->qty }}</td>
                                            <td>Rp {{ number_format($cart->subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">Total</th>
                                        <th>Rp {{ number_format($carts->sum('subtotal'), 0, ',', '.') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
