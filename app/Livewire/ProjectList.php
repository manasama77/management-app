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

    public function render()
    {
        $keyword = $this->keyword;

        $project_lists = Project::with([
            'user_pic',
            'sph',
            'spk',
            'kak_rab',
            'invoice',
            'bast',
            'sp2d',
        ])->when($keyword != '', function ($q) use ($keyword) {
            $q->whereLike('no_project', "%$keyword%")
                ->orWhereLike('project_name', "%$keyword%")
                ->orWhereLike('client', "%$keyword%")
                ->orWhereLike('year', "%$keyword%")
                ->orWhereHas('user_pic', function ($q) use ($keyword) {
                    $q->whereLike('name', "%$keyword%");
                });
        })->paginate(5);

        $is_sph = $project_lists->sum(function ($project) {
            return $project->sph ? 1 : 0;
        });

        return view('livewire.project-list', [
            'project_lists' => $project_lists,
            'is_sph' => $is_sph
        ]);
    }

    #[On('show-detail-project')]
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

        $this->dispatch('show-modal', title: 'Project Detail', detail: $v_detail);
    }

    #[On('delete-project')]
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect()->back()->with('success', 'Project berhasil dihapus');
    }
}
