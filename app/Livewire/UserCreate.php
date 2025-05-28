<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Livewire\Forms\UserForm;
use Livewire\Attributes\Validate;

class UserCreate extends Component
{
    public UserForm $form;

    public function render()
    {
        return view('livewire.user-create');
    }

    public function save()
    {
        $this->validate();

        $this->form->save();

        return redirect()->route('user-list')->with('success', 'User berhasil ditambahkan');
    }
}
