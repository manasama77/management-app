<?php

namespace App\Livewire;

use App\Models\KakRab;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('KAK dan RAB List')]
class KakRabList extends Component
{
     use WithPagination;

    public $keyword = '';

    public function render()
    {
        $keyword = $this->keyword;

        $kak_rab_lists = KakRab::with([
            'project',
            'project.spk',
        ])->when($keyword != '', function ($q) use ($keyword) {
            $q->whereLike('no_sph', "%$keyword%")
            ->orWhereHas('project', function ($qp) use ($keyword) {
                 $qp->WhereLike('project_name', "%$keyword%")
                ->orWhereLike('client', "%$keyword%");
            });
        })->paginate(5);

        return view('livewire.kak-rab-list', [
            'kak_rab_lists' => $kak_rab_lists
        ]);
    }
}
