<?php

namespace App\Livewire\Forms;

use App\Models\Project;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProjectForm extends Form
{
    public ?Project $project;

    #[Validate('required', message: 'No project harus diisi')]
    #[Validate('min:5', message: 'No project harus diisi minimal 5 karakter')]
    public $no_project;

    #[Validate('required', message: 'Nama project harus diisi')]
    #[Validate('min:5', message: 'Nama project harus diisi minimal 5 karakter')]
    public $project_name;

    #[Validate('required', message: 'Client harus diisi')]
    #[Validate('min:5', message: 'Client harus diisi minimal 5 karakter')]
    public $client;

    #[Validate('required', message: 'Tahun harus diisi')]
    #[Validate('numeric', message: 'Tahun harus diisi angka')]
    public $year;

    #[Validate('required', message: 'PIC harus diisi')]
    #[Validate('exists:users,id', message: 'PIC tidak ditemukan')]
    public $pic;

    public function setProject(Project $project)
    {
        $this->project = $project;

        $this->no_project = $project->no_project;
        $this->project_name = $project->project_name;
        $this->client = $project->client;
        $this->year = $project->year;
        $this->pic = $project->pic;
    }

    public function store()
    {
        $this->validate();

        Project::create($this->only(['no_project', 'project_name', 'client', 'year', 'pic']));
    }

    public function update()
    {
        $this->validate();

        $this->project->update($this->all());
    }
}
