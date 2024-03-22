@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reservation_check.css') }}">
@endsection

@section('content')
    <div class="reservation__frame">
        @foreach($shops as $shop)
        <div class="content__header">
            <span class="title">{{ $shop->shop_name }}予約状況</span>
        </div>
        <div class="content__info">
            <table class="table">
                <tr class="tr-index">
                    <th>予約名</th>
                    <th>予約日</th>
                    <th>予約時間</th>
                    <th>予約人数</th>
                </tr>
                @foreach($shop->users as $user)
                <tr class="tr-content">
                    <td class="td-content">{{ $user->name }} 様</td>
                    <td class="td-content">{{ $user->pivot->reservation_date }}</td>
                    <td class="td-content">{{ $user->pivot->reservation_time }}</td>
                    <td class="td-content">{{ $user->pivot->reservation_number }} 名</td>
                </tr>
                @endforeach
            </table>
        </div>
        @endforeach
        <a href="/store-representative/home" class="back">戻る</a>
    </div>
@endsection