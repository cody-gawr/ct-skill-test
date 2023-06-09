<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\ProjectRepository;
use App\Contracts\ProjectContract;

class ProjectService implements ProjectContract
{
    /**
     * @param \App\Repositories\ProjectRepository $projectRepository
     */
    public function __construct(
        public readonly ProjectRepository $projectRepository
    ) {}

    public function all(): Collection
    {
        return $this->projectRepository->all();
    }

    public function allWithTasks(): Collection
    {
        return $this->projectRepository->allWithTasks();
    }
}
