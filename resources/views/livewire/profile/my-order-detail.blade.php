@once
    @push('midtrans')
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
        </script>
    @endpush
@endonce
<div class="container">
    <div class="row mt-3">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    Menu
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{ route('profile') }}" class="text-decoration-none">
                            Profil Saya
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('myorder') }}" class="text-decoration-none">
                            Pesanan Saya
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Detail Pesanan #{{ $order->invoice }}
                    <div class="float-right">
                        {{ $order->status }}
                    </div>
                </div>
                <div class="card-body">
                    <p>Tanggal: {{ date('d/m/Y', strtotime($order->created_at)) }}</p>
                    <p>Nama: {{ $order->recipient }}</p>
                    <p>Telepon: {{ $order->phone }}</p>
                    <p>Alamat: {{ $order->address }}</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->details as $row)
                                <tr>
                                    <td>
                                        <p><img src="{{ $row->product->image ? asset('storage/' . $row->product->image) : 'https://via.placeholder.com/300' }}"
                                                alt="" height="50"> <strong>{{ $row->product->name }}</strong></p>
                                    </td>
                                    <td class="text-center">Rp {{ number_format($row->product->price, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center">{{ $row->qty }}</td>
                                    <td class="text-center">Rp {{ number_format($row->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3"><strong>Total:</strong></td>
                                <td class="text-center">
                                    <strong>Rp {{ number_format($order->total, 0, ',', '.') }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if ($order->status == 'waiting')
                    <div class="card-footer">
                        <button wire:click="pay" type="button" class="btn btn-success">Pembayaran</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@push('script-payment')
    <script>
        Livewire.on('payment', snapToken => {
            window.snap.pay(snapToken, {
                onSuccess: function(result) {
                    location.reload();
                },
                onPending: function(result) {
                    location.reload();
                },
                onError: function(result) {
                    location.reload();
                },
            })
        });
    </script>
@endpush
