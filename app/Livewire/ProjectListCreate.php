<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Validate;

class ProjectListCreate extends Component
{
    #[Validate('required', message: 'No project harus diisi')]
    #[Validate('min:5', message: 'No project harus diisi minimal 5 karakter')]
    public $no_project;

    #[Validate('required', message: 'Nama project harus diisi')]
    #[Validate('min:5', message: 'Nama project harus diisi minimal 5 karakter')]
    public $nama_project;

    #[Validate('required', message: 'Client harus diisi')]
    #[Validate('min:5', message: 'Client harus diisi minimal 5 karakter')]
    public $client;

    #[Validate('required', message: 'Tahun harus diisi')]
    #[Validate('numeric', message: 'Tahun harus diisi angka')]
    #[Validate('min:4', message: 'Tahun harus diisi 4 karakter')]
    #[Validate('max:4', message: 'Tahun harus diisi 4 karakter')]
    public $year;

    #[Validate('required', message: 'PIC harus diisi')]
    #[Validate('exists:users', message: 'PIC tidak ditemukan')]
    public $pic;

    public function mount()
    {
        $this->year = Carbon::now()->year;
    }

    public function render()
    {
        $users = User::where('id', '>', 1)->get();

        return view('livewire.project-list-create', [
            'users' => $users,
        ]);
    }

    public function store()
    {
        $this->validate();

        Project::create([
            'no_project' => $this->no_project,
            'project_name' => $this->nama_project,
            'client' => $this->client,
            'year' => $this->year,
            'pic' => $this->pic,
        ]);

        return redirect()->route('project-list')->with('success', 'Project berhasil ditambahkan');
    }
}
