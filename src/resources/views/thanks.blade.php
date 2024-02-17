@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="content__flame">
        <div class="message-space">
            <span class="message">会員登録ありがとうございます</span>
        </div>
        <div class="button-space">
            <button class="button">ログインする</button>
        </div>
    </div>
@endsection