@extends('layouts/base_scroll')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('header__right')
    <div class="header__right">
        <div class="search-area__space">
            <form action="/search" class="search-group" method="post">
            @csrf
                <select name="area" id="" class="select">
                    <option value="">All area</option>
                    @foreach ($unique_areas as $area)
                        <option>{{ $area }}</option>
                    @endforeach
                </select>
                <select name="genre" id="" class="select">
                    <option value="">All genre</option>
                    @foreach ($unique_genres as $genre)
                        <option>{{ $genre }}</option>
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
@endsection

@section('content')
    @if (session('search_results'))
    <div class="shop-all__frame">
        @foreach (session('search_results') as $shop)
            <div class="shop__frame">
                <!-- {{ $shop->is_favorite }} -->
                <div class="shop-data">
                    <div class="shop-image__frame">
                        <img src="{{ $shop->picture_url }}" alt="店舗イメージ" class="shop-image">
                    </div>
                    <h2 class="shop-name">{{ $shop->shop_name }}</h2>
                    <div class="shop__area-genre">
                        <h3 class="shop-area">#{{ $shop->area }}</h3>
                        <h3 class="shop-genre">#{{ $shop->genre }}</h3>
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
                <!-- {{ $shop->is_favorite }} -->
                <div class="shop-data">
                    <div class="shop-image__frame">
                        <img src="{{ $shop->picture_url }}" alt="店舗イメージ" class="shop-image">
                    </div>
                    <h2 class="shop-name">{{ $shop->shop_name }}</h2>
                    <div class="shop__area-genre">
                        <h3 class="shop-area">#{{ $shop->area }}</h3>
                        <h3 class="shop-genre">#{{ $shop->genre }}</h3>
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
@endsection