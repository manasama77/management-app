<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class UserForm extends Form
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

    #[Validate('required', message: 'Nama harus diisi')]
    #[Validate('min:4', message: 'Nama harus diisi minimal 4 karakter')]
    public $name;

    public $email;

    protected  function rules()
    {
        return [
            'username' => [
                'required',
                'min:4',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                Rule::unique('users')->ignore($this->user->id),
            ]
        ];
    }

    protected function messages()
    {
        return [
            'username.required' => 'Username harus diisi.',
            'username.min' => 'Username terlalu pendek.',
            'username.unique' => 'Username sudah digunakan.',

            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
        ];
    }

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
        User::create($this->all());
    }

    public function update()
    {
        $this->validate();
        $this->user->username = $this->username;
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        dd($this->user->save());
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
