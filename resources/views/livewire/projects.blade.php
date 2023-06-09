<div class="container">
    <div class="my-4">
        <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
                {{ $project ? $project->name : 'projects' }}
            </button>
            <div class="dropdown-menu">
                @foreach ($projects as $project)
                    <a class="dropdown-item" href="#"
                        wire:click="selectProject({{ $project->id }})">{{ $project->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="column">
        @foreach ($tasks as $task)
            <div class="card">
                <div class="card-body">
                    {{ $task->name }}<span class="badge badge-pill badge-danger">{{ $task->priority }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
