<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    <div class="all">
        <header class="header-group">
            <div class="header__menu">
                <form action="/menu" method="get">
                    <button class="menu__button">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                </form>
            </div>
            <div class="app-title__space">
                <span class="app-title">Rese</span>
            </div>
        </header>
        <div class="content">
            <div class="shop-detail__frame">
                <div class="shop-detail">
                    <div class="shop-name__group">
                        <div class="return">
                            <a href="/">
                                <button class="return__button">
                                    <span class="material-symbols-outlined">chevron_left</span>
                                </button>
                            </a>
                        </div>
                        <div class="shop-name__frame">
                            <h2 class="shop-name">{{ $shop_detail->shop_name }}</h2>
                        </div>
                    </div>
                    @if ($shop_detail->picture_url)
                    <img src="{{ $shop_detail->picture_url }}" alt="店舗イメージ" class="shop-image">
                    @else
                    <img src="{{ asset($shop_detail->file_path) }}" alt="店舗イメージ" class="shop-image">
                    @endif
                    <div class="shop__area-genre">
                        <h3 class="shop-area">#{{ $shop_detail->area->area }}</h3>
                        <h3 class="shop-genre">#{{ $shop_detail->genre->genre }}</h3>
                    </div>
                    <p class="over-view">{{ $shop_detail->overview }}</p>
                    <div class="content__review">
                        @if (!$shop_review)
                        <a href="/visited" class="post-review">口コミを投稿する</a>
                        <div class="all-reviews-button-frame">
                            <button class="all-reviews-button">全ての口コミ情報</button>
                        </div>
                        @elseif ($shop_review)
                        <div class="all-reviews-button-frame">
                            <button class="all-reviews-button">全ての口コミ情報</button>
                        </div>
                        <div class="my-review-frame">
                            <div class="edit-delete-frame">
                                <a href="/review_update_form/{{$shop_id}}" class="edit-button">口コミを編集</a>
                                <a href="/review_delete_form/{{$shop_id}}" class="delete-button">口コミを削除</a>
                            </div>
                            <div class="my-review">
                                <div class="star-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $shop_review->stars)
                                            <span class="star--blue">★</span>
                                        @else
                                            <span class="star--gray">★</span>
                                        @endif
                                    @endfor
                                </div>
                                <div class="comment">
                                    {{$shop_review->comment}}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="reservation-group">
                <div class="reservation__frame">
                    <h2 class="reservation-header">予約</h2>
                    <form action="/reservation" method="post" class="reservation__form">
                    @csrf
                        <input type="hidden" name="shop_id" value="{{ $shop_id }}">
                        <div class="date__frame">
                            <input type="date" name="reservation_date" class="input_date" value="input">
                        </div>
                        <div class="time__frame">
                            <input type="time" name="reservation_time" class="input_time">
                        </div>
                        <div class="people__frame">
                            <input type="number" name="reservation_number" class="input_people">
                        </div>
                        <div class="reservation-info__frame"></div>
                        <div class="info__inner">
                            <div class="shop-info">
                                <h4 class="info__header">Shop</h4>
                                <span class="shop">{{ $shop_detail->shop_name }}</span>
                            </div>
                            <div class="date-info">
                                <h4 class="info__header">Date</h4>
                                <span class="date">@error('reservation_date')<span class="validation">{{ $errors->first('reservation_date') }}</span>@enderror</span>
                            </div>
                            <div class="time-info">
                                <h4 class="info__header">Time</h4>
                                <span class="time">@error('reservation_time')<span class="validation">{{ $errors->first('reservation_time') }}</span>@enderror</span>
                            </div>
                            <div class="number-info">
                                <h4 class="info__header">Number</h4>
                                <span class="number">@error('reservation_number')<span class="validation">{{ $errors->first('reservation_number') }}</span>@enderror</span>
                            </div>
                        </div>
                        <div class="reservation-button__frame">
                            <button class="reservation__button">予約する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const inputDate = document.querySelector('.input_date');
        const inputTime = document.querySelector('.input_time');
        const inputPeople = document.querySelector('.input_people');
        const dateOutput = document.querySelector('.date');
        const timeOutput = document.querySelector('.time');
        const numberOutput = document.querySelector('.number');

        inputDate.addEventListener('input', () => {
            dateOutput.textContent = inputDate.value;
        });

        inputTime.addEventListener('input', () => {
            timeOutput.textContent = inputTime.value;
        });

        inputPeople.addEventListener('input', () => {
            numberOutput.textContent = inputPeople.value;
        });
    </script>
</body>
</html>
