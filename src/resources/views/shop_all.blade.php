@extends('layouts/base_scroll')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('header__right')
    <div class="header__right">
        <div class="search-area__space">
            <form action="" class="search-group">
                <select name="area" id="" class="select">
                    <option>All area</option>
                </select>
                <select name="genre" id="" class="select">
                    <option>All genre</option>
                </select>
                <div class="search-button__flame">
                    <input type="text" class="search" placeholder="Search ...">
                    <button class="search__button">
                        <span class="material-symbols-outlined">search </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('content')
<div class="shop-all__flame">
    @foreach ($shops as $shop)
    <div class="shop__flame">
        <div class="shop-date">
            <div class="shop-image__flame">
                <img src="{{ $shop->picture_url }}" alt="店舗イメージ" class="shop-image">
            </div>
            <h2 class="shop-name">{{ $shop->shop_name }}</h2>
            <div class="shop__area-genre">
                <h3 class="shop-area">#{{ $shop->area }}</h3>
                <h3 class="shop-genre">#{{ $shop->genre }}</h3>
            </div>
            <div class="shop__detail-favorite">
                <form action="/detail/:shop_id={{ $shop->id }}" method="post">
                @csrf
                    <input type="hidden" value="{{ $shop->id }}">
                    <button class="detail">詳しくみる</button>
                </form>
                <form action="">
                @csrf
                    <input type="hidden" value="{{ $shop->id }}">
                    <span class="material-symbols-outlined">favorite</span>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection