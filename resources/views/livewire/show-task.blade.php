<div class="container">
    <div class="my-4">
        @error('task.name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <form wire:submit.prevent="save">
            <div class="form-row align-items-center">
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" wire:model="task.name">
                </div>
                <div class="col-sm-5 my-1">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true">
                            {{ $project->name }}
                        </button>
                        <div class="dropdown-menu">
                            @foreach ($projects as $project)
                                <a class="dropdown-item" wire:click="selectProject({{ $project->id }})">
                                    {{ $project->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        <button class="btn btn-primary" id="test" x-on:click="handleClick">Save1</button>

        <a href="{{ route('show.projects') }}">Show Projects</a>
    </div>
</div>

<script>
    window.addEventListener("load", () => {
        console.log("Hello World!");
        Livewire.emit('setFooProperty', 'bar');
    });
</script>
