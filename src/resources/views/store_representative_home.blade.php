@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/store_representative_home.css') }}">
@endsection

@section('header__right')
    <nav>
        <ul class="header__right-ul">
            <form action="/store-representative/reservation" method="get">
                <button><li>予約状況表示</li></button>
            </form>
        </ul>
    </nav>
@endsection

@section('content')
    <div class="register__frame">
        <div class="register__inner-frame">
            <div class="register__header">
                <span class="title">店舗データ登録</span>
            </div>
            <div class="register__inner">
                <form action="/store-representative/confirm" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="input-area">
                        <label>店舗名：<input type="text" name="shop_name" class="name"></label>
                    </div>
                    <div class="input-area">
                        <label>エリア：<select name="area" class="area">
                            <option value="">選択してください</option>
                            @foreach ($areas as $area)
                            <option value="{{$area->id}}">{{$area->area}}</option>
                            @endforeach
                        </select></label>
                    </div>
                    <div class="input-area">
                        <label>ジャンル：<select name="genre" class="genre">
                            <option value="">選択してください</option>
                            @foreach ($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->genre}}</option>
                            @endforeach
                        </select></label>
                    </div>
                    <div class="input-area">
                        <label>概要：<textarea name="overview" class="overview"></textarea></label>
                    </div>
                    <div class="input-area">
                        <label class="rename">店舗画像：
                            <input type="file" name="image" class="image">
                        </label>
                    </div>
                    <div class="button__area">
                        <button class="register-button">確認</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection