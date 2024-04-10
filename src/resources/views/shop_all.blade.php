@extends('layouts/base')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('header__right')
    <div class="header__right">
    @if (Auth::user()->role === 'user')
        <div class="header__right-inner">
            <div class="header__right-search">
                <div class="search-area__space">
                    <form action="/search" class="search-group" method="post">
                    @csrf
                        <select name="area" id="" class="select">
                            <option value="">All area</option>
                            @foreach ($areas as $area)
                                <option>{{ $area->area }}</option>
                            @endforeach
                        </select>
                        <select name="genre" id="" class="select">
                            <option value="">All genre</option>
                            @foreach ($genres as $genre)
                                <option>{{ $genre->genre }}</option>
                            @endforeach
                        </select>
                        <div class="search-button__frame">
                            <input type="text" name="text" class="search" placeholder="Search ...">
                            <button class="search__button">
                                <span class="material-symbols-outlined">search </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @elseif (Auth::user()->role === 'store')
        <nav class="header__right-nav">
            <ul class="header__right-ul">
                <form action="/store-representative/reservation" method="get">
                    <button><li>予約状況表示</li></button>
                </form>
            </ul>
        </nav>
    @endif
    </div>
@endsection

@section('content')
    @if (Auth::user()->role === 'admin')
    <div class="admin-register__frame">
        <div class="admin-register__inner-frame">
            <div class="admin-register__header">
                <span class="admin-title">店舗代表者データ登録</span>
            </div>
            <div class="admin-register__inner">
                <form action="/admin/register" method="post">
                @csrf
                    <div class="admin-input-area">
                        <label class="admin-label">氏名：<input type="text" name="name" class="admin-input-name"></label>
                    </div>
                    <div class="admin-input-area">
                        <label class="admin-label">メールアドレス：<input type="email" name="email" class="admin-input-email"></label>
                    </div>
                    <div class="admin-input-area">
                        <label class="admin-label">パスワード：<input type="text" name="password" class="admin-input-password" value="12345678" readonly></label>
                    </div>
                    <div class="admin-button__area">
                        <button class="admin-register-button">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @elseif (Auth::user()->role === 'store')
    <div class="store-register__frame">
        <div class="store-register__inner-frame">
            <div class="store-register__header">
                <span class="store-title">店舗データ登録</span>
            </div>
            <div class="store-register__inner">
                <form action="/store-representative/confirm" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="store-input-area">
                        <label class="store-label-shop">店舗名：<input type="text" name="shop_name" class="store-name"></label>
                    </div>
                    <div class="store-input-area">
                        <label class="store-label-area">エリア：<select name="area" class="store-area">
                            <option value="">選択してください</option>
                            @foreach ($areas as $area)
                            <option value="{{$area->id}}">{{$area->area}}</option>
                            @endforeach
                        </select></label>
                    </div>
                    <div class="store-input-area">
                        <label class="store-label-genre">ジャンル：<select name="genre" class="store-genre">
                            <option value="">選択してください</option>
                            @foreach ($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->genre}}</option>
                            @endforeach
                        </select></label>
                    </div>
                    <div class="store-input-area">
                        <label class="store-label-overview">概要：<textarea name="overview" class="store-overview"></textarea></label>
                    </div>
                    <div class="store-input-area">
                        <label class="store-label-image">店舗画像：
                            <input type="file" name="image" class="store-image">
                        </label>
                    </div>
                    <div class="store-button__area">
                        <button class="store-register-button">確認</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @else
        @if (session()->has('search_results'))
        <div class="shop-all__frame">
            @foreach (session('search_results') as $shop)
                <div class="shop__frame">
                    <div class="shop-data">
                        <div class="shop-image__frame">
                            <img src="{{ $shop->picture_url }}" alt="店舗イメージ" class="shop-image">
                        </div>
                        <h2 class="shop-name">{{ $shop->shop_name }}</h2>
                        <div class="shop__area-genre">
                            <h3 class="shop-area">#{{ $shop->area->area }}</h3>
                            <h3 class="shop-genre">#{{ $shop->genre->genre }}</h3>
                        </div>
                        @if($shop->is_favorite)
                        <div class="shop__detail-favorite">
                            <form action="/detail/:shop_id={{ $shop->id }}" method="post">
                            @csrf
                                <input type="hidden" value="{{ $shop->id }}">
                                <button class="detail">詳しくみる</button>
                            </form>
                            <form action="/create_favorite" method="post" class="favorite">
                            @csrf
                                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                <div class="favorite-hart">
                                    <div class="favorite__active">
                                        <button class="material-symbols-outlined">favorite</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @else
                        <div class="shop__detail-favorite">
                            <form action="/detail/:shop_id={{ $shop->id }}" method="post">
                            @csrf
                                <input type="hidden" value="{{ $shop->id }}">
                                <button class="detail">詳しくみる</button>
                            </form>
                            <form action="/create_favorite" method="post" class="favorite">
                            @csrf
                                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                <div class="favorite-hart">
                                    <div class="favorite__nonactive">
                                        <button class="material-symbols-outlined">favorite</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        @else
        <div class="shop-all__frame">
            @foreach ($shops as $shop)
                <div class="shop__frame">
                    <div class="shop-data">
                        <div class="shop-image__frame">
                            <img src="{{ $shop->picture_url }}" alt="店舗イメージ" class="shop-image">
                        </div>
                        <h2 class="shop-name">{{ $shop->shop_name }}</h2>
                        <div class="shop__area-genre">
                            <h3 class="shop-area">#{{ $shop->area->area }}</h3>
                            <h3 class="shop-genre">#{{ $shop->genre->genre }}</h3>
                        </div>
                        @if($shop->is_favorite)
                        <div class="shop__detail-favorite">
                            <form action="/detail/:shop_id={{ $shop->id }}" method="post">
                            @csrf
                                <input type="hidden" value="{{ $shop->id }}">
                                <button class="detail">詳しくみる</button>
                            </form>
                            <form action="/create_favorite" method="post" class="favorite">
                            @csrf
                                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                <div class="favorite-hart">
                                    <div class="favorite__active">
                                        <button class="material-symbols-outlined">favorite</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @else
                        <div class="shop__detail-favorite">
                            <form action="/detail/:shop_id={{ $shop->id }}" method="post">
                            @csrf
                                <input type="hidden" value="{{ $shop->id }}">
                                <button class="detail">詳しくみる</button>
                            </form>
                            <form action="/create_favorite" method="post" class="favorite">
                            @csrf
                                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                <div class="favorite-hart">
                                    <div class="favorite__nonactive">
                                        <button class="material-symbols-outlined">favorite</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    @endif
@endsection