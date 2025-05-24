<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('Project List')]
class ProjectList extends Component
{
    use WithPagination;

    public $keyword = '';

    protected $project_id = null;

    public function render()
    {
        $keyword = $this->keyword;
        $project_lists = Project::with([
            'user_pic',
        ])->when($keyword != '', function($q) use ($keyword) {
            $q->whereLike('no_project', "%$keyword%")
                ->orWhereLike('project_name', "%$keyword%")
                ->orWhereLike('client', "%$keyword%")
                ->orWhereLike('year', "%$keyword%")
                ->orWhereHas('user_pic', function ($q) use ($keyword) {
                    $q->whereLike('name', "%$keyword%");
                });
        })->paginate(5);

        return view('livewire.project-list', [
            'project_lists' => $project_lists
        ]);
    }

    #[On('show-detail')]
    public function show_detail($id)
    {
        $project_list = Project::with([
            'user_pic',
            'sph',
            'spk',
            'kak_rab',
            'invoice',
            'bast',
            'sp2d',
        ])->find($id);

        $v_detail = view('components.project-detail', compact('project_list'))->render();

        $this->dispatch('show-modal', title: 'Project Detail', v_detail: $v_detail);
    }
}
