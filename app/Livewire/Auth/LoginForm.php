<?php

namespace App\Livewire\Auth;

use Devrabiul\ToastMagic\Facades\ToastMagic;
use Livewire\Component;

class LoginForm extends Component
{

    public $email;
    public $password;
    public $remember = false;


    public function try(){
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ],[
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->dispatch('toast', ['type' => 'success', 'message' => 'Login Berhasil!']);
            sleep(1);
             if(auth()->user()->role === 'guru'){
                return redirect()->route('guru.dashboard');
            }
            return redirect()->route('dashboard');
        } else {
            $this->dispatch('toast', ['type' => 'error', 'message' => 'Tidak ada data yang cocok!']);
        }
    }

    public function render()
    {

        return view('livewire.auth.login-form')->layout('pages.auth.login');
    }
}
