<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Project;

interface ProjectContract
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection;

    /**
     * @param \App\Models\Project  $project
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTasks(Project $project): Collection;
}
