<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Sph;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('SPH List')]
class SphList extends Component
{
    use WithPagination;

    public $keyword = '';

    public function render()
    {
        $keyword = $this->keyword;

        $sph_lists = Sph::with([
            'project',
        ])->when($keyword != '', function ($q) use ($keyword) {
            $q->whereLike('no_sph', "%$keyword%")
                ->orWhereHas('project', function ($qp) use ($keyword) {
                    $qp->WhereLike('project_name', "%$keyword%")
                        ->orWhereLike('client', "%$keyword%");
                });
        })->paginate(5);

        return view('livewire.sph-list', [
            'sph_lists' => $sph_lists
        ]);
    }
}
