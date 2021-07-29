 <tr>
     <td>
         <p>
             <img src="@empty($cart->product->image) https://via.placeholder.com/300 @else {{ asset('storage/' . $cart->product->image) }} @endempty"
                 alt="" style="height: 50px" />
             <strong>{{ $cart->product->name }}</strong>
         </p>
     </td>
     <td class="text-center">
         Rp {{ number_format($cart->product->price, 0, ',', '.') }}
     </td>
     <td>
         <form wire:submit.prevent="updateQty">
             <div class="input-group">
                 <input wire:model="cart.qty" type="number" class="form-control text-center" min="1" />
                 <button class="btn btn-info" type="submit">
                     <i class="fas fa-check"></i>
                 </button>
             </div>
             @error('cart.qty') <span class="small text-danger">{{ $message }}</span> @enderror
         </form>
     </td>
     <td class="text-center">Rp {{ number_format($cart->subtotal, 0, ',', '.') }}</td>
     <td>
         <button wire:click="deleteCart" class="btn btn-danger" type="button">
             <i class="fas fa-trash-alt"></i>
         </button>
     </td>
 </tr>
