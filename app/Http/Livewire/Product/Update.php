<?php

namespace App\Http\Livewire\Product;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $product;
    public $image;

    protected function rules()
    {
        $rules = [
            'product.name' => 'required',
            'product.price' => 'required|numeric',
            'product.description' => 'required',
            'product.status' => 'required|in:available,unavailable',
        ];

        if ($this->image) {
            $rules['image'] = 'image|max:2048';
        }

        return $rules;
    }

    public function render()
    {
        return view('livewire.product.update');
    }

    public function update()
    {
        $this->validate();

        if ($this->image) {
            Storage::disk('public')->delete($this->product->image);

            $this->product->image = $this->image->store('images/product', 'public');
        }

        $data = [
            'data' => $this->product->save(),
            'message' => 'diubah'
        ];

        $this->emit('flashMessage', $data);
        $this->emit('closeForm');
    }
}
