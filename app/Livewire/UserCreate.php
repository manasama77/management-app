<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Livewire\Forms\UserForm;
use Livewire\Attributes\Validate;

class UserCreate extends Component
{
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
                Rule::unique('users'),
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                Rule::unique('users'),
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


    public function render()
    {
        return view('livewire.user-create');
    }

    public function save()
    {
        $this->validate();
        User::create($this->all());
        return redirect()->route('user-list')->with('success', 'User berhasil ditambahkan');
    }
}
