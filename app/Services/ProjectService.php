<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\ProjectRepository;
use App\Contracts\ProjectContract;
use App\Models\Project;

class ProjectService implements ProjectContract
{
    /**
     * @param \App\Repositories\ProjectRepository $projectRepository
     */
    public function __construct(
        public readonly ProjectRepository $projectRepository
    ) {}

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return $this->projectRepository->getAll();
    }

    public function getTasks(Project $project): Collection
    {
        return $this->projectRepository->getTasks($project);
    }
}
