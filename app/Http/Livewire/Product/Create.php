<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $description;
    public $image;
    public $status = 'available';

    protected function rules()
    {
        $rules = [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'status' => 'required|in:available,unavailable',
        ];

        if ($this->image) {
            $rules['image'] = 'image|max:2048';
        }

        return $rules;
    }

    public function render()
    {
        return view('livewire.product.create');
    }

    public function store()
    {
        $input = $this->validate();

        $input['image'] = '';

        if ($this->image) {
            $input['image'] = $this->image->store('images/product', 'public');
        }

        $params = [
            'data' => Product::create($input),
            'message' => 'ditambah'
        ];

        $this->emit('flashMessage', $params);
        $this->emit('closeForm');
    }
}
