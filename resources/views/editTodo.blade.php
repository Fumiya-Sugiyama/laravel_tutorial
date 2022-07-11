<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<h1>ToDo</h1>                                                                                                 
<div>
    <h2>TODO編集</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ui>
                @foreach ($errors->all() as $error)
                    <li> {{$error}} </il>
                @endforeach
            </ui>
        <div>
    @endif

    <form method="POST" action="/edit-todo">
        @csrf
        <input type="hidden" name="id" value="{{$todo->id}}">
        <p>
            タイトル：<input type="text" name="title" value="{{$todo->title}}" class="form-control">
        </p>
        <p>
            内　　容：<input type="text" name="description" value="{{$todo->description}}" class="form-control">
        </p>
        <p>
            期　　限：<input type="date" name="deadline" value= {{$todo->deadline}} class="form-control w-25 p-3">
        </p>
        <p>
            状　　態：<input type="radio" name="status" value=0 @if ($todo->status == 0) checked @endif)>未 
            <input type="radio" name="status" value=1 @if ($todo->status == 1) checked @endif)>着手 
            <input type="radio" name="status" value=2 @if ($todo->status == 2) checked @endif)>完了
        </p>
        <input type="submit" name="edit" value="編集" class="btn btn-primary">
    </form>
    <br>
    <a href="/" class="btn btn-secondary">戻る</a>
</div>
@endsection