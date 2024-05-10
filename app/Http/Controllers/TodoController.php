<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use domain\facades\TodoFacade;
use Illuminate\Http\Request;



class TodoController extends ParentController

{

    public function index()
    {
        $response['tasks'] = TodoFacade::all(); //calls for todoFacade which works as a bridge to contact services
        //all() -> generates a sql command (selects all from todo)

        // dd($response);
        // Dumps the contents of the $request variable to the screen (using var_dump under the hood).
        // and (Die) Immediately terminates the script execution (using die under the hood).

        return view('pages.todo.index')->with($response);
    }
    public function store(Request $request)
    {
        TodoFacade::store($request->all());
        return redirect()->back();
    }

    public function delete($task_id)
    {
        TodoFacade::delete($task_id);
        return redirect()->back();
    }

    public function done($task_id)
    {
        TodoFacade::done($task_id);
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $response['task'] = TodoFacade::get($request['task_id']);
        return view('pages.todo.edit')->with($response);
    }

    public function update(Request $request, $task_id)
    {
        TodoFacade::update($request->all(), $task_id);
        return redirect()->back();
    }



    // sub tasks section



    public function sub($task_id)
    {
        $response['task'] = TodoFacade::get($task_id);
        $response['sub_tasks'] = TodoFacade::getSubTaskByTask($task_id);

        return view('pages.todo.sub')->with($response);
    }

    public function subStore(Request $request)
    {

        TodoFacade::subStore($request->all());
        return redirect()->back();
    }
}
