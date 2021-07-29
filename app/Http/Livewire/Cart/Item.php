<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;

class Item extends Component
{
    public Cart $cart;

    protected $rules = [
        'cart.qty' => 'numeric|min:1',
    ];

    public function render()
    {
        return view('livewire.cart.item');
    }

    public function updateQty()
    {
        $this->validate();
        $this->cart->subtotal = $this->cart->product->price * $this->cart->qty;
        $this->cart->save();
        $this->emit('updateCart');
    }

    public function deleteCart()
    {
        $this->cart->delete();
        $this->emit('countingCart');
        $this->emit('updateCart');
    }
}
