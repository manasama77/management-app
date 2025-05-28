<?php

namespace App\Livewire;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('Invoice List')]
class InvoiceList extends Component
{
    use WithPagination;

    public $keyword = '';

    public function render()
    {
        $keyword = $this->keyword;

        $invoice_lists = Invoice::with([
            'project',
            'project.spk',
        ])->when($keyword != '', function ($q) use ($keyword) {
            $q->whereLike('no_sph', "%$keyword%")
                ->orWhereHas('project', function ($qp) use ($keyword) {
                    $qp->WhereLike('project_name', "%$keyword%")
                        ->orWhereLike('client', "%$keyword%");
                });
        })->paginate(5);

        return view('livewire.invoice-list', [
            'invoice_lists' => $invoice_lists
        ]);
    }
}
