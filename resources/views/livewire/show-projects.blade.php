<div class="container">
    <div class="my-4">
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
                {{ $project ? $project->name : 'projects' }}
            </button>
            <div class="dropdown-menu">
                @foreach ($projects as $project)
                    <a class="dropdown-item" href="#"
                        wire:click="select({{ $project->id }})"
                        wire:key="project-{{ $project->id }}">{{ $project->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="column">
        @foreach ($tasks as $task)
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <a
                                href="{{ route('show.task', ['project' => $project->id, 'task' => $task->id]) }}"
                                wire:key="task-{{ $task->id }}">{{ $task->name }}</a>
                            <span class="badge badge-primary">{{ $task->priority }}</span>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-danger" wire:click="deleteTask({{ $task->id }})">Delete {{ $task->id }}</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
