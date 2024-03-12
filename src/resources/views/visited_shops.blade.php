@extends('layouts.base_scroll')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/visited_shops.css') }}">
@endsection

@section('content')
    <div class="reservation-status__frame">
        <form action="/mypage" method="get">
        @csrf
            <nav class="nav__mypage-top">
                <ul>
                    <li class="list__mypage-top">
                        <button class="button__mypage-top">マイページトップ</button>
                    </li>
                </ul>
            </nav>
        </form>
        <h2 class="visited-shops__header">行ったお店</h2>
        <div class="visited-shops">
            @foreach ($visited_shops as $shop)
            <div class="visited-shop__frame">
                <div class="shop-image__frame">
                    <img src="{{ $shop->shop->picture_url }}" alt="店舗イメージ" class="shop-image">
                </div>
                <h2 class="shop-name">{{ $shop->shop->shop_name }}</h2>
                <div class="shop__area-genre">
                    <h3 class="shop-area">#{{ $shop->shop->area }}</h3>
                    <h3 class="shop-genre">#{{ $shop->shop->genre }}</h3>
                </div>
                <div class="shop__detail-favorite">
                    <button class="detail">詳しくみる</button>
                    <div class="favorite-hart">
                        <button class="material-symbols-outlined">favorite</button>
                    </div>
                </div>
                <div class="review__frame">
                    <form action="review_form" method="post">
                    @csrf
                        <input type="hidden" name="shop_id" value="{{ $shop->shop->id }}">
                        <button class="button__review">レビューを投稿</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection