<?php

namespace App\Livewire;

use App\Models\Spk;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('SPK List')]
class SpkList extends Component
{
    use WithPagination;

    public $keyword = '';

    public function render()
    {
        $keyword = $this->keyword;

        $spk_lists = Spk::with([
            'project',
            'project.sph',
        ])->when($keyword != '', function ($q) use ($keyword) {
            $q->whereLike('no_sph', "%$keyword%")
                ->orWhereHas('project', function ($qp) use ($keyword) {
                    $qp->WhereLike('project_name', "%$keyword%")
                        ->orWhereLike('client', "%$keyword%");
                });
        })->paginate(5);

        return view('livewire.spk-list', [
            'spk_lists' => $spk_lists
        ]);
    }
}
