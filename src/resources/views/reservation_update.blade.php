<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reservation_update.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    <div class="grid__parent">
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
        <div class="shop-detail">
            <div class="shop-name__group">
                <div class="return">
                    <a href="/mypage">
                        <button class="return__button">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                    </a>
                </div>
                <div class="shop-name__frame">
                    <h2 class="shop-name">{{ $reservation->shop->shop_name }}</h2>
                </div>
            </div>
            <img src="{{$reservation->shop->picture_url}}" alt="店舗イメージ" class="shop-image" >
            <div class="shop__area-genre">
                <h3 class="shop-area">#{{ $reservation->shop->area }}</h3>
                <h3 class="shop-genre">#{{ $reservation->shop->genre }}</h3>
            </div>
            <p class="over-view">{{ $reservation->shop->overview }}</p>
        </div>
        <div class="reservation-group">
            <div class="reservation__frame">
                <h2 class="current-reservation-header">現在の予約内容</h2>
                <div class="current-reservation-info__frame"></div>
                <div class="current-reservation-info__inner">
                    <div class="shop-info">
                        <h4 class="info__header">Shop</h4>
                        <span class="current-shop">{{ $reservation->shop->shop_name }}</span>
                    </div>
                    <div class="date-info">
                        <h4 class="info__header">Date</h4>
                        <span class="current-date">{{ $reservation->reservation_date }}</span>
                    </div>
                    <div class="time-info">
                        <h4 class="info__header">Time</h4>
                        <span class="current-time">{{ $reservation->reservation_time }}</span>
                    </div>
                    <div class="number-info">
                        <h4 class="info__header">Number</h4>
                        <span class="current-number">{{ $reservation->reservation_number }}</span>
                    </div>
                </div>
                <h2 class="update-reservation-header">変更後の予約内容</h2>
                <form action="/reservation/update" method="post">
                @method('PATCH')
                @csrf
                    <input type="hidden" name="id" value="{{ $reservation->id }}">
                    <div class="date__frame">
                        <input type="date" name="reservation_date" class="input_date" value="input">
                    </div>
                    <div class="time__frame">
                        <input type="time" name="reservation_time" class="input_time">
                    </div>
                    <div class="people__frame">
                        <input type="number" name="reservation_number" class="input_people">
                    </div>
                    <div class="update-reservation-info__frame"></div>
                    <div class="update-reservation-info__inner">
                        <div class="shop-info">
                            <h4 class="info__header">Shop</h4>
                            <span class="shop">{{ $reservation->shop->shop_name }}</span>
                        </div>
                        <div class="date-info">
                            <h4 class="info__header">Date</h4>
                            <span class="date"></span>
                        </div>
                        <div class="time-info">
                            <h4 class="info__header">Time</h4>
                            <span class="time"></span>
                        </div>
                        <div class="number-info">
                            <h4 class="info__header">Number</h4>
                            <span class="number"></span>
                        </div>
                    </div>
                    <div class="update-reservation-button__frame">
                        <button class="update-reservation__button">予約内容を変更する</button>
                    </div>
                </form>
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
