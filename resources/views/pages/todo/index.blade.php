@extends('layout.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col lg 12">
                <h1 class="page-title">Todo List</h1>
            </div>
            <div class="col-lg-12" mt-5>
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
            </div>
            <div class="col-lg-12" mt-5>
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
                                            <i class="fa-solid fa-circle-check"></i> </a>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .page-title {
            padding-top: 10vh;
            font-size: 78px;
            font-weight: 600;
            align-content: center;
            color: blue;
        }
    </style>
@endpush
