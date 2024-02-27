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
    <div class="grid__parent">
        <header class="header-group">
            <div class="header__menu">
                <button class="menu__button">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
            <div class="app-title__space">
                <span class="app-title">Rese</span>
            </div>
        </header>
        <div class="shop-detail">
            <div class="shop-name__group">
                <div class="return">
                    <a href="/">
                        <button class="return__button">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                    </a>
                </div>
                <div class="shop-name__flame">
                    <h2 class="shop-name">{{ $shop_detail->shop_name }}</h2>
                </div>
            </div>
            <img src="{{$shop_detail->picture_url}}" alt="店舗イメージ" class="shop-image" >
            <div class="shop__area-genre">
                <h3 class="shop-area">#{{ $shop_detail->area }}</h3>
                <h3 class="shop-genre">#{{ $shop_detail->genre }}</h3>
            </div>
            <p class="over-view">{{ $shop_detail->overview }}</p>
        </div>
        <div class="reservation-group">
            <div class="reservation__flame">
                <h2 class="reservation-header">予約</h2>
                <div class="date__flame">
                    <input type="date" class="input_date" value="input">
                </div>
                <div class="time__flame">
                    <input type="time" class="input_time">
                </div>
                <div class="people__flame">
                    <input type="number" class="input_people">
                </div>
                <div class="reservation-info__flame"></div>
                <div class="info__inner">
                    <div class="shop-info">
                        <h4 class="info__header">Shop</h4>
                        <span class="shop">{{ $shop_detail->shop_name }}</span>
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
                <div class="reservation-button__flame">
                    <button class="reservation__button">予約する</button>
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
