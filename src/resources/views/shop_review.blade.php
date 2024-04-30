@extends('layouts.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shop_review.css') }}">
@endsection

@section('content')
<!-- <php ?>
@dump($shop_data)
</php> -->
    <div class="content__left-right">
        <div class="content__left">
            <p class=content__left-message>今回のご利用はいかがでしたか？</p>
            <div class="content__left-shop-info">
                <div class="content__left-shop-info-frame">
                    <img src="{{$shop_data->picture_url}}" alt="店舗イメージ" class="shop__image">
                    <div class="shop__name-frame">
                        <span class="shop__name">{{ $shop_data->shop_name }}</span>
                    </div>
                    <div class="shop__area-genre">
                        <span>{{ $shop_data->area->area }}</span>
                        <span>{{ $shop_data->genre->genre }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="review__frame">
            <form action="/review_post" method="post" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="shop_id" value="{{ $shop_data->id }}">
                    <div class="content__star-rating-frame">
                        <p class="star-rating-header">
                            体験を評価してください
                        </p>
                        <div id="star" class="star-rating-frame">
                            <span class="star" data-value="1">★</span>
                            <span class="star" data-value="2">★</span>
                            <span class="star" data-value="3">★</span>
                            <span class="star" data-value="4">★</span>
                            <span class="star" data-value="5">★</span>
                        </div>
                        <input type="hidden" name="rating" id="rating" value="">

                        <!-- <div id="star" class="star-rating__frame">
                            <span class="star" id="1"><input type="radio" name="stars" value="1" class="star-radio">★</span>
                            <span class="star" id="2"><input type="radio" name="stars" value="2" class="star-radio">★</span>
                            <span class="star" id="3"><input type="radio" name="stars" value="3" class="star-radio">★</span>
                            <span class="star" id="4"><input type="radio" name="stars" value="4" class="star-radio">★</span>
                            <span class="star" id="5"><input type="radio" name="stars" value="5" class="star-radio">★</span>
                        </div> -->

                        <!-- <div id="star" class="star-rating__frame">
                            <div class="five-star"><input type="radio" name="stars" value="5"><span class="star">&#9733;&#9733;&#9733;&#9733;&#9733;</span></div>
                            <div class="four-star"><input type="radio" name="stars" value="4"><span class="star">&#9733;&#9733;&#9733;&#9733;</span></div>
                            <div class="three-star"><input type="radio" name="stars" value="3"><span class="star">&#9733;&#9733;&#9733;</span></div>
                            <div class="two-star"><input type="radio" name="stars" value="2"><span class="star">&#9733;&#9733;</span></div>
                            <div class="one-star"><input type="radio" name="stars" value="1"><span class="star">&#9733;</span></div>
                        </div> -->
                    </div>
                    <div class="content__comment-frame">
                        <p class="comment-header">口コミを投稿</p>
                        <div class="comment-textbox">
                            <textarea class="comment" name="comment" cols="45" rows="3"></textarea>
                        </div>
                        <div class="comment-constraints">
                            <p class="constraints">0/400（最高文字数）</p>
                        </div>
                        <p class="validation">※400字以内で記入してください</p>
                    </div>
                    <div class="content__add-image-frame">
                        <p class="add-image-header">画像の追加</p>
                        <div class="upload-area">
                            <p class="upload-area-inner-message">クリックして写真を追加<br /><span class="upload-area-inner-message-sub">またはドロッグアンドドロップ</span></p>
                            <input type="file" name="upload_file" id="input-files">
                        </div>
                    </div>
                    <div class="content__button-frame">
                        <div class="submit-frame">
                            <button class="submit">口コミを投稿</button>
                        </div>
                        <div class="cancel-frame">
                            <a href="/visited" class="cancel">キャンセル</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('/js/star-rating.js') }}"></script>

@endsection