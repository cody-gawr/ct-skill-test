<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use App\Contracts\ProjectContract;
use Livewire\Component;
use App\Models\Project;

class ShowProjects extends Component
{
    private ProjectContract $projectContract;

    public Collection $projects;

    public Collection $tasks;

    public ?Project $project = null;

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
        $this->project = null;
        $this->projects = $this->projectContract->getAll();
        $this->tasks = new Collection();
    }

    public function select(Project $project)
    {
        $this->project = $project;
        $this->tasks = $this->projectContract->getTasks($this->project);
    }

    public function deleteTask(int $taskId)
    {
        $this->project->tasks()
            ->where('id', $taskId)
            ->delete();
        $this->tasks = $this->projectContract->getTasks($this->project);
    }
}
