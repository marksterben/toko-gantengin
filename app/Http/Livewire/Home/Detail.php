<?php

namespace App\Http\Livewire\Home;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public Product $product;
    public $qty = 1;

    public function render()
    {
        return view('livewire.home.detail', [
            'product' => $this->product
        ])->extends('layouts.app');
    }

    public function addCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cart = Cart::where('user_id', Auth::id())->where('product_id', $this->product->id)->first();

        if ($cart) {
            $cart->qty += $this->qty;
            $cart->subtotal = $cart->product->price * $cart->qty;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $this->product->id,
                'qty' => $this->qty,
                'subtotal' => $this->product->price * $this->qty
            ]);
        }

        $this->emit('countingCart');
    }
}
