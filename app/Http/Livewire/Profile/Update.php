<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public User $user;
    public $password;
    public $photo;

    protected function rules()
    {
        $rules = [
            'user.name' => 'required',
        ];

        if ($this->password) {
            $rules['password'] = 'min:8';
        }

        if ($this->photo) {
            $rules['photo'] = 'image|max:2048';
        }

        return $rules;
    }

    public function render()
    {
        return view('livewire.profile.update');
    }

    public function update()
    {
        $this->validate();

        if ($this->photo) {
            Storage::disk('public')->delete($this->user->photo);

            $this->user->photo = $this->photo->store('images/profile', 'public');
        }

        if ($this->password) {
            $this->user->password = $this->password;
        }

        $this->emit('flashMessage', $this->user->save());
        $this->emit('closeForm');
    }
}
