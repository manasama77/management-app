<?php

namespace App\Livewire;

use App\Livewire\Forms\ProjectForm;
use App\Models\User;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Validate;

class ProjectListCreate extends Component
{
    public ProjectForm $form;

    public $title = 'Tambah Project';

    public function mount()
    {
        $this->form->year = Carbon::now()->year;
    }

    public function render()
    {
        $users = User::where('id', '>', 1)->get();

        return view('livewire.project-list-form', [
            'users' => $users,
        ]);
    }

    public function save()
    {
        $this->form->store();

        return redirect()->route('project-list')->with('success', 'Project berhasil ditambahkan');
    }
}
