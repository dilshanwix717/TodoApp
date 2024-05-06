<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;


class TodoController extends Controller

{
    protected $task;

    public function __construct()
    {
        $this->task = new Todolist(); //calling the database model
    }
    public function index()
    {
        $response['tasks'] = $this->task->all(); //all() -> generates a sql command (selects all from todo)

        // dd($response);
        // Dumps the contents of the $request variable to the screen (using var_dump under the hood).
        // and (Die) Immediately terminates the script execution (using die under the hood).

        return view('pages.todo.index')->with($response);
    }
    public function store(Request $request)
    {
        $this->task->create($request->all());
        return redirect()->back();
    }

    public function delete($task_id)
    {
        $task = $this->task->find($task_id);
        $task->delete();
        // $this->task->where('id', $task_id)->delete();
        return redirect()->back();
    }

    public function done($task_id)
    {
        $task = $this->task->find($task_id);
        $task->done = 1;
        $task->update();
        return redirect()->back();
    }
}
