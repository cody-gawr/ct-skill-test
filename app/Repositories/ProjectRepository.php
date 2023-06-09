<?php

namespace App\Repositories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository
{
    public function __construct(
        public readonly Project $project
    ) {}

    public function all(): Collection
    {
        return $this->project->with('tasks')->get();
    }
}
