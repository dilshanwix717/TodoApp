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
}
