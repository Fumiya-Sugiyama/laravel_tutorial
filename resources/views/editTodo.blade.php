<!DOCTYPE html>
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
            タイトル：<input type="text" name="title" value="{{$todo->title}}">
        </p>
        <p>
            内　　容：<input type="text" name="description" value="{{$todo->description}}">
        </p>
        <p>
            期　　限：<input type="date" name="deadline" value="{{$todo->description}}">
        </p>
        <p>
            状　　態：<input type="radio" name="status" value=0>未 <input type="radio" name="status" value=1>着手 <input type="radio" name="status" value=2>完了
        </p>
        <input type="submit" name="edit" value="編集">
    </form>
    <a href="/">戻る</a>
</div>