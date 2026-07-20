<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class RegisterForm extends Component
{
    public $name;
    public $nisn;
    public $kelas;
    public $email;
    public $password;


    public function store()
    {
        $this->validate([
            'name' => 'required',
            'nisn' => 'required|unique:users,identity',
            'kelas' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'nisn.required' => 'NISN tidak boleh kosong',
            'nisn.unique' => 'NISN sudah terdaftar',
            'kelas.required' => 'Kelas tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        try {
            \App\Models\User::create([
                'name' => $this->name,
                'identity' => $this->nisn,
                'kelas' => $this->kelas,
                'email' => $this->email,
                'password' => bcrypt($this->password)
            ]);

            auth()->attempt(['email' => $this->email, 'password' => $this->password]);
            $this->dispatch('toast', ['type' => 'success', 'message' => 'Akun Berhasil dibuat!']);
            return redirect()->route('login');
        } catch (\Exception $e) {
            $this->dispatch('toast', ['type' => 'error', 'message' => 'Gagal mendaftar!']);
        }

        return redirect()->route('login');
    }

    public function render()
    {

        return view('livewire.auth.register-form')->layout('pages.auth.login');
    }
}
