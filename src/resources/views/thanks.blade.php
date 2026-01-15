@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks">
    <p class="thanks__bg">Thank you</p>
    <div class="thanks__content">
        <h2>お問い合せありがとうございました</h2>
    </div>
    <a href="/" class="thanks__home-btn">
        HOME</a>
</div>
@endsection
