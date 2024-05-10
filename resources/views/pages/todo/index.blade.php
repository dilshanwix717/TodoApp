@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col lg 12 text-center">
                <h3 class="page-title">Todo List</h3>
            </div>
            <div class="col-lg-12" mt-5>
                <form action="{{ route('todo.store') }}" method="POST" enctype="multipart/form">
                    {{-- go to the store class on TodoController using web.php route --}}
                    @csrf
                    {{-- for the token --}}
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <input class="form-control" name="title" type="text" placeholder="Enter task" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <button class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-lg-12 mt-5">
                <div>
                    <table class="table table-striped table-hover caption-top">
                        <caption>List of todos</caption>
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $key => $task)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $task->title }}</td>

                                    <td>
                                        @if ($task->done == 0)
                                            <span class="badge bg-warning">Not Completed</span>
                                        @else
                                            <span class="badge bg-success">Completed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger ">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        <a href="{{ route('todo.done', $task->id) }}" class="btn btn-success ">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </a>
                                        <div class="btn btn-info" onclick="taskEditModal({{ $task->id }})">
                                            <i class="fa-solid fa-pen"></i>
                                        </div>

                                        <a href="{{ route('todo.sub', $task->id) }}" class="btn btn-warning ">
                                            <i class="fa-solid fa-list-check"></i> </a>


                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="taskEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="taskEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="taskEditLabel">Edit main task
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="taskEditContent">

                </div>

            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .page-title {
            padding-top: 10vh;
            padding-bottom: 3vh;

            font-size: 40px;
            font-weight: 400;
            align-content: center;
            color: blue;
        }
    </style>
@endpush

@push('js')
    <script>
        function taskEditModal(task_id) {
            var data = {
                task_id: task_id,

            };
            $.ajax({
                url: "{{ route('todo.edit') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: '',
                data: data,
                success: function(response) {
                    console.log(response);
                    $('#taskEdit').modal('show');
                    $('#taskEditContent').html(response);
                }
            })
        }
    </script>
@endpush
