<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $count = 0;

    protected $listeners = ['countingCart' => 'countingCartHandler'];

    public function mount()
    {
        if (Auth::check()) {
            $this->count = Auth::user()->carts()->count();
        }
    }

    public function render()
    {
        return view('livewire.navbar');
    }

    public function countingCartHandler()
    {
        $this->count = Auth::user()->carts()->count();
    }
}
