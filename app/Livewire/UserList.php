<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('User List')]
class UserList extends Component
{
    use WithPagination;

    public $keyword = '';

    public function render()
    {
        $keyword = $this->keyword;
        $user_lists = User::when($keyword != '', function($q) use ($keyword) {
            $q->whereLike('name', "%$keyword%")
                ->orWhereLike('username', "%$keyword%")
                ->orWhereLike('email', "%$keyword%");
        })->paginate(5);

        return view('livewire.user-list', [
            'user_lists' => $user_lists
        ]);
    }
}
