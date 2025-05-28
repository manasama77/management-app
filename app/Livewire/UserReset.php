<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class UserReset extends Component
{
    public ?User $user;

    public $username;

    #[Validate('required', message: 'Password harus diisi')]
    #[Validate('min:4', message: 'Password harus diisi minimal 4 karakter')]
    #[Validate('confirmed', message: 'Password tidak cocok')]
    public $password;

    #[Validate('required', message: 'Konfirmasi Password harus diisi')]
    #[Validate('min:4', message: 'Konfirmasi Password harus diisi minimal 4 karakter')]
    public $password_confirmation;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->username = $user->username;
    }

    public function render()
    {
        return view('livewire.user-reset');
    }

    public function save()
    {
        $this->validate();

        $this->user->password = $this->password;
        $this->user->save();

        return redirect()->route('user-list')->with('success', 'Password berhasil diubah');
    }
}
