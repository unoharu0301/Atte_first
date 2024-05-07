@if (Auth::check())
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('link')
<div class="lightheader">
    <a href="/home" class="header_link">ホーム</a>
    <a href="/attendance" class="header_link">日付一覧</a>
    <form action="/logout" method="post">
        @csrf
        <input type="submit" class="header_link" value="logout">
    </form>
</div>

@endsection



@section('content')
<div class="home">
    <h2 class="home_heading">
        {{Auth::user()->name}} さんお疲れ様です！
    </h2>
    <div class="stamp_button_work">
        <div class="stamp_button_workstart">
            <form action="/home_stamp
            " method="POST">
                @csrf
                <input type="submit" class="workstart" value="勤務開始">
            </form>
        </div>
        <div class="stamp_button_workend">
            <form action="/home_stamp_end" method="POST">
                @csrf
                <input type="submit" class="workend" value="勤務終了">
            </form>
        </div>
    </div>
    <div class="stamp_button_rest">
        <div class="stamp_button_reststart">
            <form action="/home_rest" method="POST">
                @csrf
                <input type="submit" class="reststart" value="休憩開始">
            </form>
        </div>
        <div class="stamp_button_restend">
            <form action="/home_rest_end" method="POST">
                @csrf
                <input type="submit" class="restend" value="休憩終了">
            </form>
        </div>
    </div>
</div>
@endsection
@endif