<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $user;
    public $edit = false;

    protected $listeners = [
        'closeForm' => 'closeFormHandler',
        'flashMessage' => 'flashMessageHandler',
    ];

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.profile.index')
            ->extends('layouts.app');
    }

    public function openForm()
    {
        $this->edit = true;
    }

    public function closeFormHandler()
    {
        $this->reset('edit');
    }

    public function flashMessageHandler($param)
    {
        if ($param) {
            session()->flash('success', 'Profil berhasil diubah');
        } else {
            session()->flash('failed', 'Profil gagal diubah');
        }
    }
}
