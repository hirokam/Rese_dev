@extends('layouts.base_scroll')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
@endsection

@section('content')
    <div class="grid__parent">
        <div class="reservation-status__flame">
            <h2 class="reservation-status__header">予約状況</h2>
            @foreach ($reservations as $reservation)
            <div class="reservation-status__inner-flame">
                <div class="reservation-status__inner-header">
                    <div class="reservation-icon">
                        <span class="material-symbols-outlined">nest_clock_farsight_analog</span>
                    </div>
                    <div class="reservation-number">
                        <span class="reservation-number__inner">予約1</span>
                    </div>
                </div>
                <div class="status__inner">
                    <div class="shop-info">
                        <h4 class="info__header">Shop</h4>
                        <span class="shop">{{ $reservation->shop->shop_name }}</span>
                    </div>
                    <div class="date-info">
                        <h4 class="info__header">Date</h4>
                        <span class="date">{{ $reservation->reservation_date }}</span>
                    </div>
                    <div class="time-info">
                        <h4 class="info__header">Time</h4>
                        <span class="time">{{ $reservation->reservation_time }}</span>
                    </div>
                    <div class="number-info">
                        <h4 class="info__header">Number</h4>
                        <span class="number">{{ $reservation->reservation_number }}人</span>
                    </div>
                </div>
                <div class="reservation-cancel">
                    <span class="material-symbols-outlined">cancel</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="favorite__flame">
            <span class="user-name">{{ $user_name }}さん</span>
            <div class="favorite__header">
                <span class="header-title">お気に入り店舗</span>
            </div>
            <div class="favorite-shop-all">
                @foreach ($favorites as $favorite)
                <div class="shop__flame">
                    <div class="shop-data">
                        <div class="shop-image__flame">
                            <img src="{{ $favorite->shop->picture_url }}" alt="店舗イメージ" class="shop-image">
                        </div>
                        <h2 class="shop-name">{{ $favorite->shop->shop_name }}</h2>
                        <div class="shop__area-genre">
                            <h3 class="shop-area">#{{ $favorite->shop->area }}</h3>
                            <h3 class="shop-genre">#{{ $favorite->shop->genre }}</h3>
                        </div>
                        <div class="shop__detail-favorite">
                            <form action="/detail/:shop_id=" method="post">
                            @csrf
                                <input type="hidden" value="{{ $favorite->shop->id }}">
                                <button class="detail">詳しくみる</button>
                            </form>
                            <form action="/create_favorite" method="post" class="favorite">
                            @csrf
                                <input type="hidden" name="shop_id" value="{{ $favorite->shop->id }}">
                                <div class="favorite-hart">
                                    <div class="favorite__active">
                                        <button class="material-symbols-outlined">favorite</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection