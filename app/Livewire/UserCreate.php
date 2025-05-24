<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class UserCreate extends Component
{
    #[Validate('required', message: 'Username harus diisi')]
    #[Validate('min:4', message: 'Username harus diisi minimal 4 karakter')]
    #[Validate('unique:users', message: 'Username sudah digunakan')]
    public $username;

    #[Validate('required', message: 'Password harus diisi')]
    #[Validate('min:4', message: 'Password harus diisi minimal 4 karakter')]
    #[Validate('confirmed', message: 'Password tidak cocok')]
    public $password;

    #[Validate('required', message: 'Nama harus diisi')]
    #[Validate('min:4', message: 'Nama harus diisi minimal 4 karakter')]
    public $name;

    #[Validate('required', message: 'Email harus diisi')]
    #[Validate('unique:users', message: 'Email sudah digunakan')]
    #[Validate('email:rfc,dns', message: 'Email tidak valid')]
    public $email;

    public function render()
    {
        return view('livewire.user-create');
    }

    public function store()
    {
        $this->validate();

        User::create([
            'username' => $this->username,
            'password' => $this->password,
            'name' => $this->name,
            'emaiil' => $this->emaiil,
        ]);

        return redirect()->route('user-list')->with('success', 'User berhasil ditambahkan');
    }
}
