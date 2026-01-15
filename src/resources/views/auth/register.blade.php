@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="auth">
    <h2>Register</h2>
    <div class="auth__box">
        <form method="POST" action="/register">
            @csrf
            <div class="form__group">
                <label>名前</label>
                <input type="text" name="name" placeholder="例:山田 太郎" />
            </div>
            @error('name')
            {{ $message }}
            @enderror
            <div class="form__group">
                <label>メールアドレス</label>
                <input type="email" name="email" placeholder="例:test@example.com" />
            </div>
            @error('email')
            {{ $message }}
            @enderror
            <div class="form__group">
                <label>パスワード</label>
                <input type="password" name="password" placeholder="例:coachtech1106" />
            </div>
            @error('password')
            {{ $message }}
            @enderror
            <button type="submit">登録</button>
        </form>
    </div>
</div>
@endsection