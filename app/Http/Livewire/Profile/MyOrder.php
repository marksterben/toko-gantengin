<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyOrder extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = Auth::user()->orders;
    }

    public function render()
    {
        return view('livewire.profile.my-order')->extends('layouts.app');
    }
}
