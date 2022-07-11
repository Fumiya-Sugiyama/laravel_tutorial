<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<h1>ToDo</h1>                                                                                                 
<div>
    <h2>TODO作成</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ui>
                @foreach ($errors->all() as $error)
                    <li> {{$error}} </il>
                @endforeach
            </ui>
        <div>
    @endif

    <form method="POST" action="/create-todo">
        @csrf
        <p>
            タイトル：<input type="text" name="title" class="form-control">
        </p>
        <p>
            内　　容：<input type="text" name="description" class="form-control">
        </p>
        <p>
            期　　限：<input type="date" name="deadline" class="form-control w-25 p-3">
        </p>
        <p>
            状　　態：<input type="radio" name="status" value=0>未 <input type="radio" name="status" value=1>着手 <input type="radio" name="status" value=2>完了
        </p>
        <input type="submit" name="create" value="追加" class="btn btn-primary">
    </form>
    <br>
    <a href="/" class="btn btn-secondary">戻る</a>
</div>
@endsection