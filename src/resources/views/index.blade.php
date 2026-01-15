@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="{{ route('contact.confirm') }}" method="POST">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <div class="form__input-item">
                        <input type="text" name="last_name" placeholder="例:山田" />
                        @error('last_name')
                        <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form__input-item">
                        <input type="text" name="first_name" placeholder="例:太郎" />
                        @error('first_name')
                        <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <label class="form__label">性別</label>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <label>
                    <input type="radio" name="gender" value="1"> 男性
                </label>
                <label>
                    <input type="radio" name="gender" value="2"> 女性
                </label>
                <label>
                    <input type="radio" name="gender" value="3"> その他
                </label>
                <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="例:test@example.com" />
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="tel1" placeholder="080">
                    <span class="tel-hyphen">-</span>
                    <input type="text" name="tel2" placeholder="1234">
                    <span class="tel-hyphen">-</span>
                    <input type="text" name="tel3" placeholder="5678">
                </div>
                <div class="form__error">
                    @error('tel1')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address1" placeholder="例:東京都渋谷区千駄々谷1-2-3">
                </div>
                <div class="form__error">
                    @error('address1')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address2" placeholder="例:千駄々谷マンション101">
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <select name="category">
                    <option value="">選択してください</option>
                    <option value="1">商品のお届けについて</option>
                    <option value="2">商品の交換について</option>
                    <option value="3">商品トラブル</option>
                    <option value="4">ショップへのお問い合せ</option>
                    <option value="5">その他</option>
                </select>
                <div class=form__error>
                    @error('category')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class=form__group>
            <div class="form__group-title">
                <span class="form__label--item">お問い合せ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="content" placeholder="お問い合せ内容をご記載ください"></textarea>
                </div>
                <div class="form__error">
                    @error('content')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection

