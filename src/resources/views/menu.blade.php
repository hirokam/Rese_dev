<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    <header>
        <div class="header__close">
            <button class="close__button">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
    </header>

    <main>
        <div class="content__menu">
            <div class="menu__group">
                <nav>
                    <ul>
                        <li class="content__inner">
                            <button class="inner__button">Home</button>
                        </li>
                        <li class="content__inner">
                            <button class="inner__button">Logout</button>
                        </li>
                        <li class="content__inner">
                            <button class="inner__button">Mypage</button>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>
</body>
</html>