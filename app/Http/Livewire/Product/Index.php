<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $paginate = '5';
    public $formVisible = false;
    public $updateProduct = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'paginate' => ['except' => '5'],
    ];

    protected $listeners = [
        'closeForm' => 'closeFormHandler',
        'flashMessage' => 'flashMessageHandler',
    ];

    public function render()
    {
        $products = Product::where('name', 'like', "%$this->search%")
            ->orWhere('description', 'like', "%$this->search%")
            ->paginate($this->paginate);

        return view('livewire.product.index', ['products' => $products])
            ->extends('layouts.app');
    }

    public function openCreateForm()
    {
        $this->formVisible = true;
    }

    public function closeFormHandler()
    {
        $this->formVisible = false;
        $this->updateProduct = false;
    }

    public function flashMessageHandler($param)
    {
        if ($param) {
            session()->flash('success', 'Product berhasil di tambah');
        } else {
            session()->flash('failed', 'Product gagal di tambah');
        }
    }
}
