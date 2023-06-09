<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ProjectContract
{
    public function all(): Collection;
    public function allWithTasks(): Collection;
}
