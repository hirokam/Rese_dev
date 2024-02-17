<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common_scroll.css') }}">
    @yield('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
</head>
<body>
    <header>
        <div class="header__left">
            <div class="header__menu">
                <button class="menu__button">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
            <div class="app-title__space">
                <span class="app-title">Rese</span>
            </div>
        </div>

        @yield('header__right')

    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>