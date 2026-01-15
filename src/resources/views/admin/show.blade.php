@extends('layouts.app')

@section('content')
<h2>お問い合わせ詳細</h2>

<p>名前：{{ $contact->last_name }} {{ $contact->first_name }}</p>
<p>メール：{{ $contact->email }}</p>
<p>電話番号：{{ $contact->tel }}</p>
<p>内容：{{ $contact->detail }}</p>

<a href="{{ route('admin.index') }}">戻る</a>
@endsection