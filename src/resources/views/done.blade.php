@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
    <div class="content__flame">
        <div class="message-space">
            <span class="message">ご予約ありがとうございます</span>
        </div>
        <div class="button-space">
            <button class="button">戻る</button>
        </div>
    </div>
@endsection