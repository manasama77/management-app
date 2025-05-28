<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Livewire\Forms\UserForm;
use Livewire\Attributes\Validate;

class UserEdit extends Component
{
    public ?User $user;

    public $username;

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


    public function mount(User $user)
    {
        $this->user = $user;
        $this->username = $user->username;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.user-edit');
    }

    public function save()
    {
        $this->validate();

        $this->user->username = $this->username;
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->save();

        return redirect()->route('user-list')->with('success', 'User berhasil diubah');
    }
}
