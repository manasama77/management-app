<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Validate;
use App\Livewire\Forms\ProjectForm;

class ProjectListEdit extends Component
{
    public ?ProjectForm $form;

    public $title = 'Edit Project';

    public function mount(Project $project)
    {
        $this->form->setProject($project);
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
        $this->form->update();

        return redirect()->route('project-list')->with('success', 'Project berhasil diubah');
    }
}
