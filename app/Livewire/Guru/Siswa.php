<?php

namespace App\Livewire\Guru;

use App\Models\User;
use Livewire\Component;

class Siswa extends Component
{

    public $siswa;
    public $search = '';

    public function mount()
    {
        $this->retrieveData();
    }

    public function retrieveData()
    {
        $this->siswa = User::query()->with(['evaluasi','learningProgress'])->where('role','siswa')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('identity', 'like', '%' . $this->search . '%');
            })
            ->get()->sortByDesc(function ($user) {
                return $user->learningProgress->sum('point');
            });
    }
    public function render()
    {
        return view('livewire.guru.siswa')->layout('layouts.guru-layout');
    }
}
