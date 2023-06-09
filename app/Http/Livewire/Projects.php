<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use App\Contracts\ProjectContract;
use App\Models\Project;
use Livewire\Component;

class Projects extends Component
{
    private ProjectContract $projectContract;
    public Collection $projects;
    public Collection $tasks;
    public Project $project;

    public function boot(
        ProjectContract $projectContract
    ) {
        $this->projectContract = $projectContract;
    }

    public function render()
    {
        return view('livewire.projects');
    }

    public function mount()
    {
        $this->projects = $this->projectContract->all();
        $this->tasks = new Collection();
    }

    public function selectProject(Project $project)
    {
        $this->project = $project;
        $this->tasks = $this->project->tasks;
    }
}
