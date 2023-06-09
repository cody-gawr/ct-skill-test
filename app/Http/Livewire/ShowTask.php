<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use App\Contracts\ProjectContract;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Project;
use Livewire\Component;
use App\Models\Task;

class ShowTask extends Component
{
    private ProjectContract $projectContract;

    public Task $task;

    public Project $project;

    public Collection $projects;

    protected $listeners = ['setFooProperty'];

    public $foo;

    public function setFooProperty($value)
    {
        $this->foo = $value;
        dd($this->foo);
    }

    /**
     * @param \App\Contracts\ProjectContract $projectContract
     */
    public function boot(ProjectContract $projectContract)
    {
        $this->projectContract = $projectContract;
    }

    public function mount(Project $project, Task $task)
    {
        $this->project = $project;
        $this->task = $task;
        $this->projects = $this->projectContract->all();
    }
    public function render()
    {
        return view('livewire.show-task');
    }

    public function rules(): array
    {
        return (new UpdateTaskRequest())->rules();
    }

    public function selectProject(Project $project)
    {
        $this->project = $project;
    }

    public function save()
    {
        $this->validate();
        $this->task->project()->associate($this->project);
        $this->task->save();
    }
}
