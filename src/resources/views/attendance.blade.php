@extends('layouts.app')

@section('link')
<a href="/home" class="header__link">ホーム</a>
<a href="/attendance" class="header__link">日付一覧</a>
<form action="/logout" method="post">
    @csrf
    <input type="submit" class="header__link" value="logout">
</form>
@endsection



@section('content')
<div class="Atte">
    <h2>日付</h2>
</div>

<table>
    <tr>
        <th>id</th>
        <th>名前</th>
        <th>休憩開始</th>
        <th>休憩終了</th>
        <th>勤務開始</th>
        <th>勤務終了</th>
    </tr>
    @foreach ($rests as $rest)
    @foreach ($works as $work)
    <tr>
        <th>{{$rest->id}}</th>
        <th>{{$rest->user_id}}</th>
        <th>{{$rest->rest_start_time}}</th>
        <th>{{$rest->rest_end_time}}</th>
        <th>{{$work->work_start_time}}</th>
        <th>{{$work->work_end_time}}</th>
    </tr>
    @endforeach
    @endforeach
</table>
@endsection
