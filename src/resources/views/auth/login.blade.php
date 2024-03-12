@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="content__frame">
        <div class="content__login-frame">
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
                @error('email')
                <div class="email__validation"><span class="validation">{{ $errors->first('email') }}</span></div>
                @enderror
                @error('password')
                <div class="password__validation"><span class="validation">{{ $errors->first('password') }}</span></div>
                @enderror
            </div>
        </form>
    </div>
@endsection