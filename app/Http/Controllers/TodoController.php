<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{

    // TODO一覧表示
    public function index() {
        $todos = Todo::orderBy('id', 'asc')->get();
        return view('todolist', [
            "todos" => $todos
        ]);
    }

    // TODO作成画面の表示
    public function create() {
        return view('createTodo');
    }

    // TODOの新規作成
    public function createTodo(Request $request) {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|numeric',
            'deadline' => 'date'
        ]);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->status = $request->status;
        $todo->deadline = $request->deadline;
        $todo->created_by = "";
        $todo->created_at = now();
        $todo->updated_by = "";
        $todo->updated_at = now();
        $todo->save();

        return redirect('/');
    }

    // TODOの完了
    public function doneTodo($id) {

        $todo = Todo::find($id);
        $todo->status = 2;
        $todo->save();

        return redirect('/');
    }
}
