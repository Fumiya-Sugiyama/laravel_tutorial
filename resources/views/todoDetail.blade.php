<!DOCTYPE html>
<h1>ToDo</h1>                                                                                                 
<div>
    <h2>TODO詳細</h2>

    <p>タイトル:{{$todo->title}}</p>
    <hr>
    <p>内　　容:{{$todo->description}}</p>
    <hr>
    <p>期　　限:{{substr($todo->deadline,0,10)}}</p>
    <hr>
    <p>状　　態:{{$todo->status}}</p>
    <hr>

    <a href="/">戻る</a>
</div>