@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/store_representative_home.css') }}">
@endsection

@section('content')
    <div class="confirm__frame">
        <div class="confirm__inner-frame">
            <div class="confirm__header">
                <span class="title">入力内容確認</span>
            </div>
            <div class="confirm__inner">
                <form action="/store-representative/register" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="input-area">
                        <label>店舗名：<input type="text" name="shop_name" class="name" value="{{ $shop_info['shop_name'] }}" readonly></label>
                    </div>
                    <div class="input-area">
                        <label>エリア：<input type="text" name="area_name" class="input" value="{{ $area->area }}" readonly></label>
                    </div>
                    <div class="input-area">
                        <input type="hidden" name="area" class="input" value="{{ $shop_info['area'] }}">
                    </div>
                    <div class="input-area">
                        <div class="input-area">
                        <label>ジャンル：<input type="text" name="genre_name" class="input" value="{{ $genre->genre }}" readonly></label>
                    </div>
                    <div class="input-area">
                        <input type="hidden" name="area" class="input" value="{{ $shop_info['genre'] }}">
                    </div>
                    <div class="input-area">
                        <label>概要：<textarea name="overview" class="overview" readonly>{{ $shop_info['overview'] }}</textarea></label>
                    </div>
                    <div class="show-images">
                        @foreach($images as $image)
                        <div class="show-image">
                            <img src="{{ asset($image->path) }}" class="picture">
                        </div>
                        @endforeach
                    </div>
                    <div class="input-area">
                        <label class="rename">店舗画像：
                            <input type="file" name="image" class="image">
                        </label>
                    </div>
                    <div class="button__area">
                        <button class="register-button">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection