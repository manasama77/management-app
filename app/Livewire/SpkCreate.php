<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

#[Layout('components.layouts.app')]
#[Title('Tambah SPK')]
class SpkCreate extends Component
{
    use WithFileUploads;

    public ?Project $project;

    #[Validate('required', message: 'No SPK harus diisi')]
    #[Validate('min:4', message: 'No SPK harus diisi minimal 4 karakter')]
    #[Validate('unique:spk', message: 'No SPK harus diisi minimal 4 karakter')]
    public $no_spk;

    #[Validate('required', message: 'File SPK harus diisi')]
    #[Validate('file', message: 'File SPK gagal diupload')]
    #[Validate('max:5120', message: 'File SPK harus diisi kurang dari 5 MB')]
    public $spk_file;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.spk-create');
    }

    public function save()
    {
        $this->validate();

        $this->project->spk()->create([
            'no_spk' => $this->no_spk,
            'spk_file' => $this->spk_file->store('spk', 'public'),
        ]);

        return redirect()->route('project-list')->with('success', 'SPK berhasil ditambahkan');
    }
}
