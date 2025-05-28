<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('components.layouts.app')]
#[Title('Tambah KAK dan RAB')]
class KakRabCreate extends Component
{
    use WithFileUploads;

    public ?Project $project;

    #[Validate('required', message: 'No KAK harus diisi')]
    #[Validate('min:4', message: 'No KAK harus diisi minimal 4 karakter')]
    #[Validate('unique:kak_rab', message: 'No KAK harus diisi minimal 4 karakter')]
    public $no_kak;

    #[Validate('required', message: 'File KAK harus diisi')]
    #[Validate('file', message: 'File KAK gagal diupload')]
    #[Validate('max:5120', message: 'File KAK harus diisi kurang dari 5 MB')]
    public $kak_file;

    #[Validate('required', message: 'No RAB harus diisi')]
    #[Validate('min:4', message: 'No RAB harus diisi minimal 4 karakter')]
    #[Validate('unique:kak_rab', message: 'No RAB harus diisi minimal 4 karakter')]
    public $no_rab;

    #[Validate('required', message: 'File RAB harus diisi')]
    #[Validate('file', message: 'File RAB gagal diupload')]
    #[Validate('max:5120', message: 'File RAB harus diisi kurang dari 5 MB')]
    public $rab_file;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.kak-rab-create');
    }

    public function save()
    {
        $this->validate();

        $this->project->kak_rab()->create([
            'no_kak' => $this->no_kak,
            'kak_file' => $this->kak_file->store('kak', 'public'),
            'no_rab' => $this->no_rab,
            'rab_file' => $this->rab_file->store('rab', 'public'),
        ]);

        return redirect()->route('project-list')->with('success', 'KAK dan RAB berhasil ditambahkan');
    }
}
