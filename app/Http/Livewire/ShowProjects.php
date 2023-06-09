<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use App\Contracts\ProjectContract;
use App\Models\Project;
use Livewire\Component;

class ShowProjects extends Component
{
    private ProjectContract $projectContract;
    public Collection $projects;
    public Collection $tasks;
    public Project $project;

    /**
     * @param \App\Contracts\ProjectContract $projectContract
     */
    public function boot(
        ProjectContract $projectContract
    ) {
        $this->projectContract = $projectContract;
    }

    public function render()
    {
        return view('livewire.show-projects');
    }

    public function mount()
    {
        $this->projects = $this->projectContract->allWithTasks();
        $this->tasks = new Collection();
    }

    public function selectProject(Project $project)
    {
        $this->project = $project;
        $this->tasks = $this->project->tasks;
    }
}
