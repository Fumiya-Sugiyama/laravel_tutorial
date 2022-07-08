<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<h1>ToDo</h1>

<div>
    <h2>TODO一覧</h2>
    <a href="/create">新規作成</a>
    <form method="POST" action="/search-todo/}">
        @csrf
        <input type="text" name="description" placeholder="内容を入力">
        <input type="submit" name="search" value="検索">
        <button href ="/">検索リセット</button>
    </form>
    <table border="1">
        <tr>
            <th>タイトル</th>
            <th>内容</th>
            <th>期限</th>
            <th>状態</th>
            <th colspan="3">操作</th>
        </tr>
        @foreach($todos as $todo)
        <tr>
            <td><a href="/detail/{{$todo->id}}">{{$todo->title}}</td>
            <td>{{$todo->description}}</td>
            <td>{{substr($todo->deadline,0,10)}}</td>
            <td>
                @if($todo->status == 1)
                    {{'着手'}}
                @elseif($todo->status == 2)
                    {{'完了'}}
                @else
                    {{'未'}}
                @endif
            </td>
            <td><a href="/done-todo/{{$todo->id}}">完了</a></td>
            <td><a href="/edit/{{$todo->id}}">編集</a></td>
            <td><a href="/delete/{{$todo->id}}">削除</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection