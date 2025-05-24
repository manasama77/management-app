<?php

namespace App\Livewire;

use App\Models\Sp2d;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('SP2D dan Nilai Project List')]
class Sp2dList extends Component
{
    use WithPagination;

    public $keyword = '';

    public function render()
    {
        $keyword = $this->keyword;

        $sp2d_lists = Sp2d::with([
            'project',
            'project.spk',
        ])->when($keyword != '', function ($q) use ($keyword) {
            $q->whereLike('no_sph', "%$keyword%")
            ->orWhereHas('project', function ($qp) use ($keyword) {
                 $qp->WhereLike('project_name', "%$keyword%")
                ->orWhereLike('client', "%$keyword%");
            });
        })->paginate(5);

        return view('livewire.sp2d-list', [
            'sp2d_lists' => $sp2d_lists
        ]);
    }
}
