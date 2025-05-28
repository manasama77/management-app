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

    public ?Project $project;

    #[Validate('required', message: 'File Invoice harus diisi')]
    #[Validate('file', message: 'File Invoice gagal diupload')]
    #[Validate('max:5120', message: 'File Invoice harus diisi kurang dari 5 MB')]
    public $invoice_file;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.invoice-create');
    }

    public function save()
    {
        $this->validate();

        $this->project->invoice()->create([
            'invoice_file' => $this->invoice_file->store('invoice', 'public'),
        ]);

        return redirect()->route('project-list')->with('success', 'Invoice berhasil ditambahkan');
    }
}
