<!DOCTYPE html>
<h1>ToDo</h1>                                                                                                 
<div>
    <h2>TODO一覧</h2>
    <a href="/create">新規作成</a>
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
            <td><a href="">{{$todo->title}}</td>
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
            <td><a href="">編集</a></td>
            <td><a href="">削除</a></td>
        </tr>
        @endforeach
    </table>
</div>