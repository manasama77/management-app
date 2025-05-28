<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('components.layouts.app')]
#[Title('Tambah SP2D dan Nilai Project')]
class Sp2dCreate extends Component
{
    use WithFileUploads;

    public ?Project $project;

    #[Validate('required', message: 'No SP2D harus diisi')]
    #[Validate('min:4', message: 'No SP2D harus diisi minimal 4 karakter')]
    #[Validate('unique:sp2d,no_sp2d', message: 'No SP2D harus diisi minimal 4 karakter')]
    public $no_sp2d;

    #[Validate('required', message: 'File SP2D harus diisi')]
    #[Validate('file', message: 'File SP2D gagal diupload')]
    #[Validate('max:5120', message: 'File SP2D harus diisi kurang dari 5 MB')]
    public $sp2d_file;

    #[Validate('required', message: 'File Nilai Project harus diisi')]
    #[Validate('file', message: 'File Nilai Project gagal diupload')]
    #[Validate('max:5120', message: 'File Nilai Project harus diisi kurang dari 5 MB')]
    public $nilai_project_file;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.sp2d-create');
    }

    public function save()
    {
        $this->validate();

        $this->project->sp2d()->create([
            'no_sp2d' => $this->no_sp2d,
            'sp2d_file' => $this->sp2d_file->store('sp2d', 'public'),
            'nilai_project_file' => $this->nilai_project_file->store('nilai_project', 'public'),
        ]);

        return redirect()->route('project-list')->with('success', 'SP2D berhasil ditambahkan');
    }
}
