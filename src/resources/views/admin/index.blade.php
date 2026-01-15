@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin">
    <header class="admin__header">
        <h2 class="admin__title">Admin</h2>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="admin__logout">Logout</button>
        </form>
    </header>

    <form method="GET" action="{{ route('admin.index') }}" class="admin__search">
        <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">

        <div class="admin__radio">
            <label><input type="radio" name="gender" value="" checked> 全て</label>
            <label><input type="radio" name="gender" value="1" {{ request('gender')=='1' ? 'checked' : '' }}> 男性</label>
            <label><input type="radio" name="gender" value="2" {{ request('gender')=='2' ? 'checked' : '' }}> 女性</label>
            <label><input type="radio" name="gender" value="3" {{ request('gender')=='3' ? 'checked' : '' }}> その他</label>
        </div>

        <select name="category">
            <option value="">お問い合わせの種類</option>
            <option value="1" @selected(request('category')=='1')>商品のお届けについて</option>
            <option value="2" @selected(request('category')=='2')>商品の交換について</option>
            <option value="3" @selected(request('category')=='3')>商品トラブル</option>
            <option value="4" @selected(request('category')=='4')>ショップへのお問い合わせ</option>
            <option value="5" @selected(request('category')=='5')>その他</option>
        </select>

        <input type="date" name="date" value="{{ request('date') }}">

        <button type="submit">検索</button>
        <a href="{{ route('admin.index') }}" class="admin__reset">リセット</a>
    </form>

    <div class="admin__actions">
        <button class="admin__export">エクスポート</button>
        <div class="admin__pagination">
            {{ $contacts->links() }}
        </div>
    </div>

    <table class="admin__table">
        <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
        </tr>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->gender_label }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category_label }}</td>
            <td>
                <a href="#modal-{{ $contact->id }}" class="admin__detail">詳細</a>
            </td>
        </tr>
        @endforeach
    </table>
    @foreach($contacts as $contact)
    <div id="modal-{{ $contact->id }}" class="modal">
        <div class="modal__overlay">
            <div class="modal__content">
                <a href="#" class="modal__close">×</a>
                <div class="modal__body">
                    <div class="modal__labels">
                        <p>お名前</p>
                        <p>性別</p>
                        <p>メールアドレス</p>
                        <p>電話番号</p>
                        <p>住所</p>
                        <p>建物名</p>
                        <p>お問い合わせの種類</p>
                        <p>お問い合わせ内容</p>
                    </div>
                    <div class="modal__values">
                        <p>{{ $contact->name }}</p>
                        <p>{{ $contact->gender_label }}</p>
                        <p>{{ $contact->email }}</p>
                        <p>{{ $contact->tel }}</p>
                        <p>{{ $contact->address }}</p>
                        <p>{{ $contact->building }}</p>
                        <p>{{ $contact->category_label }}</p>
                        <p>{{ $contact->detail }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.destroy', $contact->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="modal__delete">削除</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
