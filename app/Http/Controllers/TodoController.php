<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Auth;

class TodoController extends Controller
{

    // TODO一覧表示
    public function index() {

        // ログインユーザのIDを取得
        $uid = (Auth::check())? Auth::id() : 0;

        $todos = Todo::where('created_by', '=', $uid)->orderBy('id', 'asc')->get();
        $latestTodo = Todo::where('status','!=', 2)->where('created_by', '=', $uid)->orderby('created_at', 'desc')->first();
        return view('todolist', [
            "todos" => $todos,
            "latestTodo" => $latestTodo
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

        // ログインユーザのIDを取得
        $uid = (Auth::check())? Auth::id() : 0;

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->status = $request->status;
        $todo->deadline = $request->deadline;
        $todo->created_by = $uid;
        $todo->created_at = now();
        $todo->updated_by = $uid;
        $todo->updated_at = now();
        $todo->save();

        return redirect('/');
    }

    // TODOの完了
    public function doneTodo($id) {

        // ログインユーザのIDを取得
        $uid = (Auth::check())? Auth::id() : 0;

        $todo = Todo::find($id);
        $todo->status = 2;
        $todo->updated_by = $uid;
        $todo->updated_at = now();
        $todo->save();

        return redirect('/');
    }

    // TODOの詳細
    public function detail($id) {

        $todo = Todo::find($id);

        if (isset($todo) && (Auth::id() == $todo->created_by || Auth::id() == $todo->updated_by)) {
                
            // 存在するTODO作成者か更新者なら遷移
            return view('todoDetail', [
                "todo" => $todo
            ]);
        } else {

            // そうでなければ戻る
            return redirect('/');
        }

    }

    public function todoDetail(Request $request) {
        
        $todo = Todo::find($request->id);
    }

    // TODO編集画面の表示
    public function edit($id) {

            $todo = Todo::find($id);
            if (isset($todo) && (Auth::id() == $todo->created_by || Auth::id() == $todo->updated_by)) {
                
                // 存在するTODO作成者か更新者なら遷移
                return view('editTodo', [
                    "todo" => $todo
                ]);
            } else {

                // そうでなければ戻る
                return redirect('/');
            }
            //return view('editTodo', [
            //    "todo" => $todo
            //]);
    }

    // TODO編集
    public function editTodo(Request $request) {
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|numeric',
            'deadline' => 'date'
        ]);

        // ログインユーザのIDを取得
        $uid = (Auth::check())? Auth::id() : 0;

        Todo::find($request->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'status' => $request->status,
            'updated_by' =>$uid,
            'updated_at' => now()
        ]);

        return redirect('/');
    }

    // TODO削除画面の表示
    public function delete($id) {
        
        $todo = Todo::find($id);
        if (isset($todo) && (Auth::id() == $todo->created_by || Auth::id() == $todo->updated_by)) {
                
            // 存在するTODO作成者か更新者なら遷移
            return view('deleteTodo', [
                "todo" => $todo
            ]);
        } else {

            // そうでなければ戻る
            return redirect('/');
        }

    }

    // TODO削除
    public function deleteTodo($id) {

        Todo::find($id)->delete();
        return redirect('/');
    }

    // TODO検索
    public function searchTodo(Request $request) {

        // ログインユーザのIDを取得
        $uid = (Auth::check())? Auth::id() : 0;

        $todos = Todo::where('created_by', '=', $uid)->where('description','like','%'.$request->input('description').'%')->orderBy('id', 'asc')->get();
        return view('todolist', [
            "todos" => $todos
        ]);

    }
}
