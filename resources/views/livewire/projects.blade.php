<div class="container">
    <div class="row my-4">
        <div class="mx-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
                    Projects
                </button>
                <div class="dropdown-menu">
                    @foreach ($projects as $project)
                        <a class="dropdown-item" href="#">{{ $project->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
