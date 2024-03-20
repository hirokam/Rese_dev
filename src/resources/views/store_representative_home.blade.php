@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/store_representative_home.css') }}">
@endsection

@section('content')
    <div class="register__frame">
        <div class="register__inner-frame">
            <div class="register__header">
                <span class="title">店舗データ登録</span>
            </div>
            <div class="register__inner">
                <form action="/store-representative/register" method="post">
                @csrf
                    <div class="input-area">
                        <label>店舗名：<input type="text" name="shop_name" class="name"></label>
                    </div>
                    <div class="input-area">
                        <label>エリア：<input type="text" name="area" class="area"></label>
                    </div>
                    <div class="input-area">
                        <label>ジャンル：<input type="text" name="genre" class="genre"></label>
                    </div>
                    <div class="input-area">
                        <label>概要：<textarea name="overview" class="overview"></textarea></label>
                    </div>
                    <div class="input-area">
                        <label>画像URL：<input type="url" name="picture_url" class="url"></label>
                    </div>
                    <div class="button__area">
                        <button class="register-button">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection