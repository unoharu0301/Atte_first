@extends('layouts.app')

@section('content')
<div class="login-form">
    <h2 class="login-form_header">ログイン</h2>
    <div class="login-form_content">
        <form action="/login" method="post" class="login-form_form">
        @csrf
            <div class="login-form_table">
                <input type="email" class="login-form_input" name="email" id="email" placeholder="メールアドレス">
                <p class="login-form_error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="login-form_table">
                <input type="password" class="login-form_input" name="password" id="password" placeholder="パスワード">
                <p class="login-form_error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <input type="submit" name="login-form_button" value="ログイン">
        </form>
        
    </div>
</div>

@endsection

@section('account')
<div class="footer">
    <div class="footer_induction">アカウントをお持ちでない方はこちら</div>
    <a href="/register" class="footer__account">
    会員登録
</a>
</div>

@endsection