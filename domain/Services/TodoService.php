<?php

namespace domain\Services;

use App\Models\SubTask;
use App\Models\Todolist;

class TodoService
{
    protected $task;
    protected $sub;

    public function __construct()
    {
        $this->task = new Todolist();
        $this->sub = new SubTask();
    }

    public function get($task_id)
    {
        return $this->task->find($task_id);
    }

    public function all()
    {
        return $this->task->all();
    }
    public function store($data)
    {
        $this->task->create($data);
    }

    public function delete($task_id)
    {
        $task = $this->task->find($task_id);
        $task->delete();
    }

    public function done($task_id)
    {
        $task = $this->task->find($task_id);
        $task->done = 1;
        $task->update();
    }

    public function update(array $data, $task_id)
    {
        $task = $this->task->find($task_id);
        $task->update($this->edit($task, $data));

        // $task->title=$data['title'];
        //$task->update();
    }


    public function edit(Todolist $task, $data)
    {
        return array_merge($task->toArray(), $data);
    }


    // sub tasks section


    public function subStore($data)
    {
        $this->sub->create($data);
    }

    public function getSubTaskByTask($task_id)
    {
        return $this->sub->getSubTaskByTask($task_id);
    }
}
