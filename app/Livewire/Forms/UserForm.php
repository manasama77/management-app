<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class UserForm extends Form
{
    public ?User $user;

    #[Validate('required', message: 'Username harus diisi')]
    #[Validate('min:4', message: 'Username harus diisi minimal 4 karakter')]
    #[Validate('unique:users', message: 'Username sudah digunakan')]
    public $username;

    #[Validate('required', message: 'Password harus diisi')]
    #[Validate('min:4', message: 'Password harus diisi minimal 4 karakter')]
    #[Validate('confirmed', message: 'Password tidak cocok')]
    public $password;

    #[Validate('required', message: 'Konfirmasi Password harus diisi')]
    #[Validate('min:4', message: 'Konfirmasi Password harus diisi minimal 4 karakter')]
    public $password_confirmation;

    #[Validate('required', message: 'Nama harus diisi')]
    #[Validate('min:4', message: 'Nama harus diisi minimal 4 karakter')]
    public $name;

    #[Validate('required', message: 'Email harus diisi')]
    #[Validate('unique:users', message: 'Email sudah digunakan')]
    #[Validate('email:rfc,dns', message: 'Email tidak valid')]
    public $email;

    public function setUser(User $user)
    {
        $this->user = $user;
        $this->username = $user->username;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function store()
    {
        $this->validate();

        $this->user->username = $this->username;
        $this->user->password = Hash::make($this->password);
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->save();
    }

    public function update()
    {
        $this->validate();
        $this->user->update($this->only('username', 'email', 'name'));
    }

    public function delete()
    {
        $this->user->sph()->delete();
        $this->user->spk()->delete();
        $this->user->kak_rab()->delete();
        $this->user->invoice()->delete();
        $this->user->bast()->delete();
        $this->user->sp2d()->delete();
        $this->user->delete();
    }
}
