<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('components.layouts.app')]
#[Title('Tambah BAST')]
class BastCreate extends Component
{
    use WithFileUploads;

    public ?Project $project;

    #[Validate('required', message: 'File BAST harus diisi')]
    #[Validate('file', message: 'File BAST gagal diupload')]
    #[Validate('max:5120', message: 'File BAST harus diisi kurang dari 5 MB')]
    public $bast_file;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.bast-create');
    }

    public function save()
    {
        $this->validate();

        $this->project->bast()->create([
            'bast_file' => $this->bast_file->store('bast', 'public'),
        ]);

        return redirect()->route('project-list')->with('success', 'BAST berhasil ditambahkan');
    }
}
