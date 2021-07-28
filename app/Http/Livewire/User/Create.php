<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $email;
    public $password;
    public $role = 'admin';
    public $status = 'active';

    protected function rules()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,customer',
            'status' => ['required', Rule::in(['active', 'not active'])],
        ];

        return $rules;
    }

    public function render()
    {
        return view('livewire.user.create');
    }

    public function store()
    {
        $input = $this->validate();

        $params = [
            'data' => User::create($input),
            'message' => 'ditambah'
        ];

        $this->emit('flashMessage', $params);
        $this->emit('closeForm');
    }
}
