@if (Auth::check())
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('link')
<div class="rightheader">
    <a href="/home" class="header_link">ホーム</a>
    <a href="/attendance" class="header_link">日付一覧</a>
    <form action="/logout" method="post">
        @csrf
        <input type="submit" class="header__link" value="logout">
    </form>
</div>
@endsection



@section('content')
<div class="Atte">
    <h2>日付</h2>
</div>

<table>
    @foreach ($workresults as $workresult)
    @foreach ($restresults as $restresult)
    <tr>
        <th>id</th>
        <th>名前</th>
        <th>勤務開始</th>
        <th>勤務終了</th>
        <th>休憩時間</th>
        <th>勤務時間</th>
    </tr>
    <tr>
        <th>{{$workresult->user_id}}</th>
        <th>{{Auth::user()->name}}</th>
        <th>{{$workresult->work_start_time}}</th>
        <th>{{$workresult->work_end_time}}</th>
        <th>{{$restresult->rest_start_time}}</th>
        <th>{{$restresult->rest_end_time}}</th>

    </tr>
    @endforeach
    @endforeach
</table>
@endsection
@endif
