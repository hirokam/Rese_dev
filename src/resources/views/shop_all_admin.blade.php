@extends('layouts/base')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('header__right')
    <div class="header__right">
        <form action="/admin/sort" method="post" id="submit_form">
        @csrf
            <select name="sort_by" id="sort_by_select">
                <option value="" disabled selected style='display:none;'>並び替え：評価高/低</option>
                <option value="high_rating">評価が高い順</option>
                <option value="low_rating">評価が低い順</option>
            </select>
        </form>
        <div class="header__right-inner">
            <div class="header__right-search">
                <div class="search-area__space">
                    <form action="/admin/search" class="search-group" method="post">
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
    </div>
@endsection

@section('content')
        @if (session()->has('search_results'))
        <div class="shop-all__frame">
            @foreach (session('search_results') as $shop)
                <div class="shop__frame">
                    <div class="shop-data">
                        <div class="shop-image__frame">
                            @if ($shop->picture_url)
                            <img src="{{ $shop->picture_url }}" alt="店舗イメージ" class="shop-image">
                            @else
                            <img src="{{ asset($shop->file_path) }}" alt="店舗イメージ" class="shop-image">
                            @endif
                        </div>
                        <h2 class="shop-name">{{ $shop->shop_name }}</h2>
                        <div class="shop__area-genre-review">
                            <div class="shop__area-genre">
                                <h3 class="shop-area">#{{ $shop->area->area }}</h3>
                                <h3 class="shop-genre">#{{ $shop->genre->genre }}</h3>
                            </div>
                            <p class="shop-review"><span class="star--blue">★</span>:{{ number_format($shop->average_stars, 1) }}({{ $shop->count_reviews }})</p>
                        </div>
                        <div class="shop__detail-favorite">
                            <form action="/detail/:shop_id={{ $shop->id }}" method="post">
                            @csrf
                                <input type="hidden" value="{{ $shop->id }}">
                                <button class="detail">詳しくみる</button>
                            </form>
                        </div>
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
                            @if ($shop->picture_url)
                            <img src="{{ $shop->picture_url }}" alt="店舗イメージ" class="shop-image">
                            @else
                            <img src="{{ asset($shop->file_path) }}" alt="店舗イメージ" class="shop-image">
                            @endif
                        </div>
                        <h2 class="shop-name">{{ $shop->shop_name }}</h2>
                        <div class="shop__area-genre-review">
                            <div class="shop__area-genre">
                                <h3 class="shop-area">#{{ $shop->area->area }}</h3>
                                <h3 class="shop-genre">#{{ $shop->genre->genre }}</h3>
                            </div>
                            <p class="shop-review"><span class="star--blue">★</span>:{{ number_format($shop->average_stars, 1) }}({{ $shop->count_reviews }})</p>
                        </div>
                        <div class="shop__detail-favorite">
                            <form action="/detail/:shop_id={{ $shop->id }}" method="post">
                            @csrf
                                <input type="hidden" value="{{ $shop->id }}">
                                <button class="detail">詳しくみる</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection