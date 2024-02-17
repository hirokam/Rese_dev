@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="content__flame">
        <div class="content__register-flame">
            <span class="content__header">Registration</span>
        </div>
        <div class="content__inner">
            <div class="inner__user">
                <div class="icon__user">
                    <span class="material-symbols-outlined">person</span>
                </div>
                <div class="writing-space__user">
                    <input type="text" class="writing-space" placeholder="Username">
                </div>
            </div>
            <div class="inner__email">
                <div class="icon__email">
                    <span class="material-symbols-outlined">mail</span>
                </div>
                <div class="writing-space__email">
                    <input type="email" class="writing-space" placeholder="Email">
                </div>
            </div>
            <div class="inner__password">
                <div class="icon__password">
                    <span class="material-symbols-outlined">enhanced_encryption</span>
                </div>
                <div class="writing-space__password">
                    <input type="password" class="writing-space" placeholder="Password">
                </div>
            </div>
            <div class="inner__button">
                <button class="button">登録</button>
            </div>
        </div>
    </div>
@endsection