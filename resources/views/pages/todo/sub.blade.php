@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col lg 12 text-center">
                <h3 class="page-title">Sub task list</h3>
                <h5 class="page-task-main">{{ $task->title }}</h5>

            </div>
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        Create new sub task list
                    </div>
                    <div class="card-body">
                        <form action="{{ route('todo.sub.store') }}" method="POST" enctype="multipart/form">
                            @csrf

                            <div class="row pt-3">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <input class="form-control" name="sub_title" type="text"
                                            placeholder="Enter sub title" maxlength="50" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control" name="priority" id="priority"
                                            placeholder="Select priority" required>
                                            <option value="1">Priority 1</option>
                                            <option value="2">Priority 2</option>
                                            <option value="3">Priority 3</option>
                                            <option value="4">Priority 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" name="date" type="date" placeholder="Enter date"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" name="phone" type="number"
                                            placeholder="Enter phone number" maxlength="10"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            required>

                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3">


                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="note" name="note" cols="30" rows="3" placeholder="Enter note"
                                            maxlength="200" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-3">

                                <div class="col-lg-12 text-center mt-2">
                                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                                    <button class="btn btn-primary">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-5">
                <div>
                    <table class="table table-striped table-hover caption-top">
                        <caption>List of todos</caption>
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Sub title</th>
                                <th scope="col">Priority</th>
                                <th scope="col">Date</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($sub_tasks as $key => $sub_task)
                                    <th scope="row">{{ ++$key }}</th>

                                    <td>{{ $sub_task->sub_title }}</td>
                                    <td>{{ $sub_task->priority }}</td>
                                    <td>{{ $sub_task->date }}</td>
                                    <td>{{ $sub_task->phone }}</td>
                                    <td>{{ $sub_task->note }}</td>
                                @endforeach

                            <tr>
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
            font-size: 40px;
            font-weight: 400;
            align-content: center;
            color: rgb(35, 35, 132);
        }

        .page-task-main {
            padding-bottom: 3vh;

            font-size: 30px;
            font-weight: 400;
            align-content: center;
            color: rgb(69, 94, 179);
        }
    </style>
@endpush

@push('js')
    <script></script>
@endpush
