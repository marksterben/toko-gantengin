<?php

namespace App\Http\Livewire\Profile;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyOrderDetail extends Component
{
    public Order $order;

    public function mount()
    {
        if ($this->order->user_id !== Auth::id()) {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.profile.my-order-detail')->extends('layouts.app');
    }

    public function pay()
    {
        $this->emit('payment', $this->order->token);
    }
}
