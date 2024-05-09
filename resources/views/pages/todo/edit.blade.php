<form action="{{ route('todo.update', $task->id) }}" method="POST" enctype="multipart/form">
    {{-- go to the store class on TodoController using web.php route --}}
    @csrf
    {{-- for the token --}}
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control" name="title" value="{{ $task->title }}" type="text"
                    placeholder="Enter task" required>
            </div>
        </div>
        <div class="col-lg-4">
            <button type="submit" class="btn btn-success">Update</button>
        </div>

    </div>
</form>
