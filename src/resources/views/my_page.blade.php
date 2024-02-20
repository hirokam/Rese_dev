@extends('layouts.base_scroll')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
@endsection

@section('content')
    <div class="grid__parent">
        <div class="reservation-status__flame">
            <h2 class="reservation-status__header">予約状況</h2>
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
                        <span class="shop">仙人</span>
                    </div>
                    <div class="date-info">
                        <h4 class="info__header">Date</h4>
                        <span class="date">2021-04-01</span>
                    </div>
                    <div class="time-info">
                        <h4 class="info__header">Time</h4>
                        <span class="time">17:00</span>
                    </div>
                    <div class="number-info">
                        <h4 class="info__header">Number</h4>
                        <span class="number">1人</span>
                    </div>
                </div>
                <div class="reservation-cancel">
                    <span class="material-symbols-outlined">cancel</span>
                </div>
            </div>
        </div>
        <div class="favorite__flame">

        </div>
    </div>
@endsection