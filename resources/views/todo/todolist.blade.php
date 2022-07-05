<!DOCTYPE html>
<h1>ToDo List</h1>                                                                                                 
<div>
    <h2>TODO一覧</h2>
    <a href="">TODO追加</a>
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
            <td>{{$todo->name}}</td>
            <td>{{$todo->description}}</td>
            <td>{{$todo->deadline}}</td>
            <td>{{$todo->status}}</td>
            <td><a href="">完了</a></td>
            <td><a href="">編集</a></td>
            <td><a href="">削除</a></td>
        </tr>
        @endforeach
    </table>
</div>