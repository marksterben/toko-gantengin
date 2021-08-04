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
        <div class="col-9">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">Pesanan Saya</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Invoice</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                <a href="{{ route('myorder.show', ['order' => $order->id]) }}">
                                                    {{ $order->invoice }}
                                                </a>
                                            </td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>
                                                @if ($order->status == 'finished')
                                                    <span class="badge rounded-pill bg-success">Pesanan Diterima</span>
                                                @elseif($order->status == 'waiting')
                                                    <span class="badge rounded-pill bg-secondary">Menunggu
                                                        Pembayaran</span>
                                                @elseif($order->status == 'paid')
                                                    <span class="badge rounded-pill bg-warning">Pesanan Diproses</span>
                                                @elseif($order->status == 'canceled')
                                                    <span class="badge rounded-pill bg-danger">Pesanan Dibatalkan</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
