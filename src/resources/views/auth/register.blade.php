@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-form">
    <h2 class="register-form_header">会員登録</h2>
    <div class="register-form_content">
        <form action="/register" method="post" class="register-form_form">
            @csrf
            <div class="register-form_table">
                <input type="text" class="register-form_input" name="name" id="name" placeholder="名前">
                <p class="register-form_error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form_table">
                <input type="email" class="register-form_input" name="email" id="email" placeholder="メールアドレス">
                <p class="register-form_error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form_table">
                <input type="password" class="register-form_input" name="password" id="password" placeholder="パスワード">
                <p class="register-form_error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form_table">
                <input type="password" class="register-form_input_confirm" name="password_confirmation" id="password_confirmation" placeholder="確認用パスワード">
                <p class="register-form_error">
                    @error('password_confirm')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form_table">
                <input type="submit" class="register-form_button" value="会員登録">
            </div>
            
        </form>
    </div>
</div>
@endsection

@section('account')
<div class="footer">
    <div class="footer_induction">アカウントをお持ちの方はこちら</div>
    <a href="/login" class="footer_account">ログイン</a>
</div>
@endsection
