@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="content__flame">
        <div class="content__login-flame">
            <span class="content__header">Login</span>
        </div>
        <form action="/login" method="post">
        @csrf
            <div class="content__inner">
                <div class="inner__email">
                    <div class="icon__email">
                        <span class="material-symbols-outlined">mail</span>
                    </div>
                    <div class="writing-space__email">
                        <input type="email" class="writing-space" name="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="inner__password">
                    <div class="icon__password">
                        <span class="material-symbols-outlined">enhanced_encryption</span>
                    </div>
                    <div class="writing-space__password">
                        <input type="password" class="writing-space" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="inner__button">
                    <button class="button">ログイン</button>
                </div>
                <div class="email__validation"><span class="validation">※メールアドレスを入力してください</span></div>
                <div class="password__validation"><span class="validation">※パスワードを入力してください</span></div>
            </div>
        </form>
    </div>
@endsection