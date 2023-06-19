<?php

namespace App\Repositories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository
{
    public function __construct(
        public readonly Project $project
    ) {}

    public function getAll(): Collection
    {
        return $this->project->all();
    }

    public function getAllWithTasks(): Collection
    {
        return $this->project->with('tasks')->get();
    }

    /**
     * @param \App\Models\Project  $project
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTasks(Project $project): Collection
    {
        return $project->tasks()->get();
    }
}
