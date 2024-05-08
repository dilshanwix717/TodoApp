<form action="{{ route('todo.store') }}" method="POST" enctype="multipart/form">
    {{-- go to the store class on TodoController using web.php route --}}
    @csrf
    {{-- for the token --}}
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control" name="title" type="text" placeholder="Enter task">
            </div>
        </div>
        <div class="col-lg-4">
            <button class="btn btn-primary">Submit</button>
        </div>

    </div>
</form>
