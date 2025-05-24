<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('components.layouts.app')]
#[Title('Tambah Invoice')]
class InvoiceCreate extends Component
{
    use WithFileUploads;

    public $project_id;
    public $project_name;
    public $client;
    public $no_spk;

    #[Validate('required', message: 'File Invoice harus diisi')]
    #[Validate('file', message: 'File Invoice gagal diupload')]
    #[Validate('max:5120', message: 'File Invoice harus diisi kurang dari 5 MB')]
    public $invoice_file;

    public function mount(Project $project) {
        $this->project_id = $project->id;
        $this->project_name = $project->project_name;
        $this->client = $project->client;
        $this->no_spk = $project->spk->no_spk;
    }

    public function render()
    {
        return view('livewire.invoice-create');
    }
}
