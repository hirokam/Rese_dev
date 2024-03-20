@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_home.css') }}">
@endsection

@section('content')
    <div class="register__frame">
        <div class="register__inner-frame">
            <div class="register__header">
                <span class="title">店舗代表者データ登録</span>
            </div>
            <div class="register__inner">
                <form action="/admin/register" method="post">
                @csrf
                    <div class="input-area">
                        <label>氏名：<input type="text" name="name" class="input-name"></label>
                    </div>
                    <div class="input-area">
                        <label>メールアドレス：<input type="email" name="email" class="input-email"></label>
                    </div>
                    <div class="input-area">
                        <label>パスワード：<input type="text" name="password" class="input-password" value="{{ $random }}" readonly></label>
                    </div>
                    <div class="button__area">
                        <button class="register-button">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection