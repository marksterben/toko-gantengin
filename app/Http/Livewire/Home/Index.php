<?php

namespace App\Http\Livewire\Home;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::where('status', 'available')
            ->where(function ($query) {
                $query->where('name', 'like', "%$this->search%")
                    ->orWhere('description', 'like', "%$this->search%");
            })
            ->paginate(8);

        return view('livewire.home.index', [
            'products' => $products,
        ])->extends('layouts.app');
    }
}
