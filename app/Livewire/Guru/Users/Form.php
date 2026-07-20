<?php

namespace App\Livewire\Guru\Users;

use App\Models\User;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $name;
    public $email;
    public $identity;
    public $password;
    public $confirm_password;
    public $role = "siswa";
    public $form = "Tambahkan Pengguna";

    public function mount($id = null)
    {
        if ($id) {
            $this->edit($id);
        }
    }

    public function submit()
    {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $this->id,
                'identity' => 'required|unique:users,identity,' . $this->id,
                'password' => 'required',
                'role' => 'required',
            ]);

            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->identity = $this->identity;
            $user->password = bcrypt($this->password);
            $user->role = $this->role;
            $user->save();

            $this->dispatch('toast', ['type' => 'success', 'message' => 'Data berhasil ditambahkan!']);
            sleep(0.5);
            return redirect()->route('guru.user')->with('success', 'Data berhasil ditambahkan!');


    }
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->id,
            'identity' => 'required|unique:users,identity,' . $this->id,
            'password' => 'nullable',
            'role' => 'required',
        ]);

        $user = User::find($this->id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->identity = $this->identity;
        if ($this->password) {
            $user->password = bcrypt($this->password);
        }
        $user->role = $this->role;
        $user->save();

        $this->dispatch('toast', ['type' => 'success', 'message' => 'Data berhasil Diperbarui!']);
    }

    public function edit($id)
    {
        $user = User::find($this->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->identity = $user->identity;
        $this->role = $user->role;
        $this->form = "Edit Pengguna";
    }

    public function delete($id)
    {
        if($id == auth()->user()->id){
            $this->dispatch('toast', ['type' => 'error', 'message' => 'Tidak dapat menghapus akun yang sedang digunakan!']);
            return;
        }
        try {
            $user = User::find($id);
            $user->delete();
            return redirect()->route('guru.user')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            $this->dispatch('toast', ['type' => 'error', 'message' => 'Gagal menghapus data!' . $e->getMessage()]);
        }
    }


    public function render()
    {

        return view('livewire.guru.users.form')->layout('layouts.guru-layout');
    }
}
