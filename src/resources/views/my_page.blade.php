@extends('layouts.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
@endsection

@section('content')
    <div class="grid__parent">
        <div class="reservation-status__frame">
            <form action="/visited" method="post">
            @csrf
                <nav class="nav__visited">
                    <ul>
                        <li class="list__visited">
                            <button class="visited-button">行ったお店</button>
                        </li>
                    </ul>
                </nav>
            </form>
            <h2 class="reservation-status__header">予約状況</h2>
            @foreach ($reservations as $index => $reservation)
            <div class="reservation-status__inner-frame">
                <div class="reservation-status__inner-header">
                    <div class="reservation-icon">
                        <span class="material-symbols-outlined">nest_clock_farsight_analog</span>
                    </div>
                    <div class="reservation-number">
                        <span class="reservation-number__inner">予約{{ $index + 1 }}</span>
                    </div>
                </div>
                    <div class="status__inner">
                        <div class="shop-info">
                            <h4 class="info__header">Shop</h4>
                            <input class="shop" value="{{ $reservation->shop->shop_name }}" readonly>
                        </div>
                        <div class="date-info">
                            <h4 class="info__header">Date</h4>
                            <input class="date" name="reservation_date" value="{{ $reservation->reservation_date }}" readonly>
                        </div>
                        <div class="time-info">
                            <h4 class="info__header">Time</h4>
                            <input class="time" name="reservation_time" value="{{ \Carbon\Carbon::parse($reservation->reservation_time)->format('H:i') }}" readonly>
                        </div>
                        <div class="number-info">
                            <h4 class="info__header">Number</h4>
                            <input class="number" value="{{ $reservation->reservation_number }}人" readonly>
                        </div>
                    </div>
                    <form action="/update" method="POST">
                    @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="shop_id" value="{{ $reservation->shop->id }}">
                        <input type="hidden" name="reservation_date" value="{{ $reservation->reservation_date }}">
                        <input type="hidden" name="reservation_time" value="{{$reservation->reservation_time}}">
                        <div class="reservation-update">
                            <button class="update">予約変更</button>
                        </div>
                    </form>
                    <form action="/delete" method="POST">
                    @method('DELETE')
                    @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="shop_id" value="{{ $reservation->shop->id }}">
                        <input type="hidden" name="reservation_date" value="{{ $reservation->reservation_date }}">
                        <input type="hidden" name="reservation_time" value="{{$reservation->reservation_time}}">
                        <div class="reservation-cancel">
                            <button class="material-symbols-outlined">cancel</button>
                        </div>
                    </form>
                    <div class="qr-group">
                        <span class="qr-description">来店時に下記QRコードを店舗に提示してください</span>
                        <form action="/QRcode" method="post">
                        @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="shop_id" value="{{ $reservation->shop->id }}">
                            <input type="hidden" name="reservation_date" value="{{ $reservation->reservation_date }}">
                            <input type="hidden" name="reservation_time" value="{{$reservation->reservation_time}}">
                            <button class="qr-button">QRコードを表示</button>
                        </form>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
        <div class="favorite__frame">
            <span class="user-name">{{ $user_name }}さん</span>
            <div class="favorite__header">
                <span class="header-title">お気に入り店舗</span>
            </div>
            <div class="favorite-shop-all">
                @foreach ($favorites as $favorite)
                <div class="shop__frame">
                    <div class="shop-data">
                        <div class="shop-image__frame">
                            <img src="{{ $favorite->shop->picture_url }}" alt="店舗イメージ" class="shop-image">
                        </div>
                        <h2 class="shop-name">{{ $favorite->shop->shop_name }}</h2>
                        <div class="shop__area-genre">
                            <h3 class="shop-area">#{{ $favorite->shop->area->area }}</h3>
                            <h3 class="shop-genre">#{{ $favorite->shop->genre->genre }}</h3>
                        </div>
                        <div class="shop__detail-favorite">
                            <form action="/detail/:shop_id={{ $favorite->shop->id }}" method="post">
                            @csrf
                                <input type="hidden" value="{{ $favorite->shop->id }}">
                                <button class="detail">詳しくみる</button>
                            </form>
                            <form action="/delete_favorite" method="post" class="favorite">
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