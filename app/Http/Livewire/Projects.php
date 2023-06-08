<?php

namespace App\Http\Livewire;

use App\Contracts\ProjectContract;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Projects extends Component
{
    private ProjectContract $projectContract;
    public Collection $projects;

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
    }
}
