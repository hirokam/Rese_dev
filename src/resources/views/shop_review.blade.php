<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shop_review.css') }}">
</head>
<body>
    <div class="body__all">
        <div class="review__frame">
            <img src="{{$shop_data->picture_url}}" alt="店舗イメージ" class="shop_image">
            <div class="shop-name__frame">
                <span class="shop-name">{{ $shop_data->shop_name }}</span><span class="shop-name__after">評価・レビュー</span>
            </div>
            <form action="/review_post" method="post">
            @csrf
                <input type="hidden" name="shop_id" value="{{ $shop_data->id }}">
                <div class="review__under-frame">
                    <div id="star" class="star-rating__frame">
                        <div class="five-star"><input type="radio" name="stars" value="5"><span class="star">&#9733;&#9733;&#9733;&#9733;&#9733;</span></div>
                        <div class="four-star"><input type="radio" name="stars" value="4"><span class="star">&#9733;&#9733;&#9733;&#9733;</span></div>
                        <div class="three-star"><input type="radio" name="stars" value="3"><span class="star">&#9733;&#9733;&#9733;</span></div>
                        <div class="two-star"><input type="radio" name="stars" value="2"><span class="star">&#9733;&#9733;</span></div>
                        <div class="one-star"><input type="radio" name="stars" value="1"><span class="star">&#9733;</span></div>
                    </div>
                    <div class="comment__frame">
                        <div class="comment__header"><span>コメント</span></div>
                        <div class="comment__text-box">
                            <textarea class="comment" name="comment" cols="45" rows="3"></textarea>
                        </div>
                        <div class="button__frame">
                            <button class="submit">投稿する</button>
                        </div>
                    </div>
                </div>
            </form>
            <a href="/visited" class="cancel">キャンセル</a>
        </div>
    </div>
</body>
</html>