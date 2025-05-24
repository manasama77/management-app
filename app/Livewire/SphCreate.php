<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('components.layouts.app')]
#[Title('Tambah SPH')]
class SphCreate extends Component
{
    use WithFileUploads;

    public $project_id;
    public $project_name;
    public $client;

    #[Validate('required', message: 'No SPH harus diisi')]
    #[Validate('min:4', message: 'No SPH harus diisi minimal 4 karakter')]
    #[Validate('unique:sph', message: 'No SPH harus diisi minimal 4 karakter')]
    public $no_sph;

    #[Validate('required', message: 'File Berita Acara harus diisi')]
    #[Validate('file', message: 'File Berita Acara gagal diupload')]
    #[Validate('max:5120', message: 'File Berita Acara harus diisi kurang dari 5 MB')]
    public $berita_acara_file;

    #[Validate('required', message: 'File Berita Acara harus diisi')]
    #[Validate('file', message: 'File Berita Acara gagal diupload')]
    #[Validate('max:5120', message: 'File Berita Acara harus diisi kurang dari 5 MB')]
    public $acara_negosiasi_file;

    public function mount(Project $project) {
        $this->project_id = $project->id;
        $this->project_name = $project->project_name;
        $this->client = $project->client;
    }

    public function render()
    {
        return view('livewire.sph-create');
    }
}
