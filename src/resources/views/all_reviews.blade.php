@extends('layouts.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/all_reviews.css') }}">
@endsection

@section('content')
    <div class="content__shop-picture-frame">
        <img src="{{$shop->picture_url}}" alt="店舗画像" class="picture">
    </div>
    <div class="content__reviews-all-frame">
        <div class="content__reviews-all-frame-inner">
            @foreach ($reviews as $review)
            <div class="content__review-frame">
                <div class="star-rating-frame">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->stars)
                            <span class="star--blue">★</span>
                        @else
                            <span class="star--gray">★</span>
                        @endif
                    @endfor
                </div>
                <div class="comment-frame">
                    <span class="comment">{{$review->comment}}</span>
                </div>
                @if (!$review->path)
                @else
                <div class="picture-frame">
                    <img src="{{ asset( $review->path ) }}" alt="撮影画像" class="picture">
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
@endsection