<?php

namespace domain\Facades;

use App\Http\Controllers\TodoController;
use domain\services\TodoService;
use Illuminate\Support\Facades\Facade;

class TodoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TodoService::class;
    }
}
