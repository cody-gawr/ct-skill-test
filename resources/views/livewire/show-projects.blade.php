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
            <div class="card" draggable="true">
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

<script>
    window.addEventListener("load", () => {
        // Livewire.emit('setFooProperty', 'bar');
    });

    window.addEventListener('project-loaded', event => {
        alert('Name updated to: ' + event.detail.projectId);
        const cards =  document.querySelectorAll('.card');
        cards.forEach(card => {
            card.addEventListener('dragstart', handleDragStart)
            card.addEventListener('dragenter', handleDragEnter)
            card.addEventListener('dragover', handleDragOver);
            card.addEventListener('dragleave', handleDragLeave);
            card.addEventListener('drop', handleDrop);
            card.addEventListener('dragend', handleDragEnd);
        });

        const draggingClass = 'dragging';
        var dragSource;

        function handleDragStart(e) {
            dragSource = this;
            e.target.classList.add(draggingClass);
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/html', this.innerHTML);
        }

        function handleDragEnter(e) {
            this.classList.add('over');
        }

        function handleDragOver(e) {
            e.dataTransfer.dropEffect = 'move';
            e.preventDefault();
        }

        function handleDragLeave(e) {
            this.classList.remove('over');
        }

        function handleDrop(e) {
            e.stopPropagation();

            if (dragSource !== this) {
                dragSource.innerHTML = this.innerHTML;
                this.innerHTML = e.dataTransfer.getData('text/html');
            }
            e.preventDefault();
        }

        function handleDragEnd(e) {
            Array.prototype.forEach.call(cards, function (card) {
                ['over', 'dragging'].forEach(function (className) {
                card.classList.remove(className);
                });
            });
        }
    });
</script>

<style>
    .hide {
        display: none;
    }
    &.dragging {
        opacity 0.5
    }
    &.over {
        border 3px dashed black
    }
    [draggable] {
        user-select none
    }
</style>
