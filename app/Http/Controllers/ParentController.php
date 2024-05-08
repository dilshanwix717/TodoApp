<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




class ParentController extends Controller
{

    public function middleware($request)
    {
        return [$request, 'auth:sanctum', 'verified'];
    }
}
