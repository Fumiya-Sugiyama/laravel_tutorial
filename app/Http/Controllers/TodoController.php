<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{

    // タスクの一覧表示
    public function index() {
        $todos = Todo::orderBy('id', 'asc')->get();
        return view('todolist', [
            "todos" => $todos
        ]);
    }
}
