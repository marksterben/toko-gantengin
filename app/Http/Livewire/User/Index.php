<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $paginate = '5';
    public $formVisible = false;

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
        $users = User::where('name', 'like', "%$this->search%")
            ->orWhere('email', 'like', "%$this->search%")
            ->paginate($this->paginate);

        return view('livewire.user.index', ['users' => $users])
            ->extends('layouts.app');
    }

    public function openCreateForm()
    {
        $this->formVisible = true;
    }

    public function closeFormHandler()
    {
        $this->reset('formVisible');
    }

    public function flashMessageHandler($params)
    {
        if ($params['data']) {
            session()->flash('success', 'Pengguna berhasil ' . $params['message']);
        } else {
            session()->flash('failed', 'Pengguna gagal ' . $params['message']);
        }
    }

    public function deleteUser(User $user)
    {
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $data = [
            'data' => $user->delete(),
            'message' => 'dihapus',
        ];

        $this->flashMessageHandler($data);
    }
}
