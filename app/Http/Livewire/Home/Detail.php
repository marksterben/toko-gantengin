<?php

namespace App\Http\Livewire\Home;

use App\Models\Product;
use Livewire\Component;

class Detail extends Component
{
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.home.detail', [
            'product' => $this->product,
        ])->extends('layouts.app');
    }
}
