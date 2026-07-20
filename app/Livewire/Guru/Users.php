<?php

namespace App\Livewire\Guru;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $search = '';
    public $users;
    public $role;

    public function mount()
    {
        $this->users = User::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('identity', 'like', '%' . $this->search . '%');
            })
            ->get();
    }

    public function retrieveData()
    {
        $this->users = User::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('identity', 'like', '%' . $this->search . '%');
            })
            ->when($this->role, function ($query) {
                $query->where('role', $this->role);
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.guru.users')->layout('layouts.guru-layout');
    }
}
