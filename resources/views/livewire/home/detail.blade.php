 <div class="container py-4">
     <div class="row">
         <div class="col-md-6">
             <img class="mb-5 mb-md-0" style="width: 100%"
                 src="@empty($product->image) https://via.placeholder.com/300 @else {{ $product->image }} @endempty"
                 alt="..." />
         </div>
         <div class="col-md-6">
             <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
             <p class="fs-5 mb-5">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
             <p class="lead">{{ $product->description }} </p>
             <form class="d-flex">
                 <input class="form-control text-center me-3 w-25" id="inputQuantity" type="number" value="1" />
                 <button class="btn btn-outline-dark">Masukkan Keranjang</button>
             </form>
         </div>
     </div>
 </div>
