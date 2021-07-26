<div class="container">
    <div class="py-4">
        <input wire:model="search" class="form-control" type="search" placeholder="Search">
    </div>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card">
                    <img src="@empty($product->image) https://via.placeholder.com/300 @else {{ $product->image }} @endempty"
                        class="card-img-top" alt="error!" style="height: 300px" />
                    <div class="card-body">
                        <a href="{{ route('detail', ['product' => $product->id]) }}"
                            class="card-title h5 text-decoration-none stretched-link">
                            {{ $product->name }}
                        </a>
                        <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $products->links() }}
</div>
