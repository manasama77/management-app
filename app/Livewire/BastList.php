<?php

namespace App\Livewire;

use App\Models\Bast;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('BAST List')]
class BastList extends Component
{
    use WithPagination;

    public $keyword = '';

    public function render()
    {
        $keyword = $this->keyword;

        $bast_lists = Bast::with([
            'project',
            'project.spk',
        ])->when($keyword != '', function ($q) use ($keyword) {
            $q->whereLike('no_sph', "%$keyword%")
            ->orWhereHas('project', function ($qp) use ($keyword) {
                 $qp->WhereLike('project_name', "%$keyword%")
                ->orWhereLike('client', "%$keyword%");
            });
        })->paginate(5);

        return view('livewire.bast-list', [
            'bast_lists' => $bast_lists
        ]);
    }
}
