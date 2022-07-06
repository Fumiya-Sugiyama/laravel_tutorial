<!DOCTYPE html>
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
            タイトル：<input type="text" name="title">
        </p>
        <p>
            内　　容：<input type="text" name="description">
        </p>
        <p>
            期　　限：<input type="date" name="deadline">
        </p>
        <p>
            状　　態：<input type="radio" name="status" value=0>未 <input type="radio" name="status" value=1>着手 <input type="radio" name="status" value=2>完了
        </p>
        <input type="submit" name="create" value="追加">
    </form>
    <a href="/">戻る</a>
</div>