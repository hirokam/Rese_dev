@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reservation_check.css') }}">
@endsection

@section('content')
    <div class="content__reservation-check-frame-outside">
        <div class="content__reservation-check-frame">
            <div class="content__reservation-check-header">
                <span class="content__reservation-check-header-title">{{ $shop_name }}予約状況</span>
            </div>
            <div class="content__pagination">
                {{ $reservations->links('custom.pagination') }}
            </div>
            <div class="content__reservation-check-info">
                <table class="content__reservation-check-table">
                    <tr class="content__reservation-check-tr-index">
                        <th class="content__reservation-check-tr">予約名</th>
                        <th class="content__reservation-check-tr">予約日</th>
                        <th class="content__reservation-check-tr">予約時間</th>
                        <th class="content__reservation-check-tr">予約人数</th>
                    </tr>
                    @foreach($reservations as $reservation)
                    <tr class="content__reservation-check-tr-content">
                        <td class="content__reservation-check-td">{{ $reservation->user->name }} 様</td>
                        <td class="content__reservation-check-td">{{ $reservation->reservation_date }}</td>
                        <td class="content__reservation-check-td">{{ \Carbon\Carbon::parse($reservation->reservation_time)->format('H:i') }}</td>
                        <td class="content__reservation-check-td">{{ $reservation->reservation_number }} 名</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <a href="/" class="back">戻る</a>
        </div>
    </div>
@endsection