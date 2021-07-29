<?php

namespace App\Http\Livewire\Cart;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $carts;

    protected $listeners = ['updateCart' => 'updateCartHandler'];

    public function mount()
    {
        $this->carts = Auth::user()->carts;
    }

    public function render()
    {
        return view('livewire.cart.index')->extends('layouts.app');
    }

    public function updateCartHandler()
    {
        $this->carts = Auth::user()->carts;
    }
}
