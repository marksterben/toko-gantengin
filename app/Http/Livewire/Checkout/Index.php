<?php

namespace App\Http\Livewire\Checkout;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $carts;
    public $recipient;
    public $address;
    public $phone;

    protected $rules = [
        'recipient' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required|numeric',
    ];

    public function mount()
    {
        $this->carts = Auth::user()->carts;
    }

    public function render()
    {
        return view('livewire.checkout.index')->extends('layouts.app');
    }
}