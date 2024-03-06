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
            <form action="/close" method="get">
            @csrf
                <button class="close__button">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </form>
        </div>
    </header>

    <main>
        <div class="content__menu">
            <div class="menu__group">
                <nav>
                    <ul>
                        @if (Auth::check())
                        <li class="content__inner">
                            <form action="/" method="get">
                                <button class="inner__button">Home</button>
                            </form>
                        </li>
                        <li class="content__inner">
                            <form action="/logout" method="post">
                            @csrf
                                <button class="inner__button">Logout</button>
                            </form>
                        </li>
                        <li class="content__inner">
                            <a href="/mypage"><button class="inner__button">Mypage</button></a>
                        </li>
                        @else
                        <li class="content__inner">
                            <form action="/">
                                <button class="inner__button">Home</button>
                            </form>
                        </li>
                        <li class="content__inner">
                            <form action="/register">
                                <button class="inner__button">Registration</button>
                            </form>
                        </li>
                        <li class="content__inner">
                            <form action="/login">
                                <button class="inner__button">Login</button>
                            </form>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </main>
</body>
</html>