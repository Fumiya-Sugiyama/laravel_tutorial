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
        $todo->updated_by = "";
        $todo->updated_at = now();
        $todo->save();

        return redirect('/');
    }

    // TODOの詳細
    public function detail($id) {

        $todo = Todo::find($id);
        return view('todoDetail', [
            "todo" => $todo
        ]);
    }

    public function todoDetail(Request $request) {
        
        $todo = Todo::find($request->id);
    }

    // TODO編集画面の表示
    public function edit($id) {

            $todo = Todo::find($id);
            return view('editTodo', [
                "todo" => $todo
            ]);
    }

    // TODO編集
    public function editTodo(Request $request) {
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|numeric',
            'deadline' => 'date'
        ]);

        Todo::find($request->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'status' => $request->status,
            'updated_by' => "",
            'updated_at' => now()
        ]);

        return redirect('/');
    }

    // TODO削除画面の表示
    public function delete($id) {
        
        $todo = Todo::find($id);
        return view('deleteTodo', [
            "todo" => $todo
        ]);
    }

    // TODO削除
    public function deleteTodo($id) {

        Todo::find($id)->delete();
        return redirect('/');
    }
}
