<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $projects = Project::all();

        $total_projects = $projects->count();
        $total_projects_on_progress = 0;
        $total_projects_done = 0;

        foreach ($projects as $project) {
            if ($project->getProgressAttribute() < 100) {
                $total_projects_on_progress++;
            }
        }

        $total_projects_done = $total_projects - $total_projects_on_progress;

        return view('livewire.dashboard', [
            'total_projects' => $total_projects,
            'total_projects_on_progress' => $total_projects_on_progress,
            'total_projects_done' => $total_projects_done
        ]);
    }
}
