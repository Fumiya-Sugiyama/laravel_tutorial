<!DOCTYPE html>
<h1>ToDo</h1>                                                                                                 
<div>
    <h2>TODO削除</h2>
    <h3>以下のTODOを削除します。</h3>
    <form method="POST" action="/delete-todo/{{$todo->id}}">
        @csrf
        <p>タイトル:{{$todo->title}}</p>
        <hr>
        <p>内　　容:{{$todo->description}}</p>
        <hr>
        <p>期　　限:{{substr($todo->deadline,0,10)}}</p>
        <hr>
        <p>状　　態:{{$todo->status}}</p>
        <hr>
        <input type="submit" name="delete" value="削除">
    </form>
    <br>
    <a href="/">戻る</a>
</div>