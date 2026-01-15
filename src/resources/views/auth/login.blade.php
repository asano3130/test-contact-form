@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection


@section('content')
<div class="auth">
    <h2>Login</h2>
    <div class="auth__box">
        <form class="auth__form" method="POST" action="/login">
            @csrf
            <div class="form__group">
                <label>メールアドレス</label>
                <input type="email" name="email" placeholder="例:test@example.com" />
            </div>
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="form__group">
                <label>パスワード</label>
                <input type="password" name="password" placeholder="例:coachtech1106">
            </div>
            @error('password')
            <p class="error">{{ $message }}</p>
            @enderror
            <button type="submit" class="auth__button">ログイン</button>
        </form>
    </div>
</div>
@endsection
