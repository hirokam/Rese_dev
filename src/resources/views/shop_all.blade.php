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
    <div class="shop-flame">

    </div>
    <div class="shop-flame">

    </div>
    <div class="shop-flame">

    </div>
    <div class="shop-flame">

    </div>
</div>
@endsection