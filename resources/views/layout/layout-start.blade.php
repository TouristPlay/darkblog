<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("/css/style.css")  }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset("favicon.png") }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
<div class="header-start">
    <div class="container">
        <div class="header__inner-start">
            <div class="header__logo">
                <a href="/" class="header__logo-link-start">
                    DarkBlog
                </a>
            </div>
            <nav class="header__nav-start">
                <ul class="header__list-start">
                    <li class="header__list-item-start">
                        <a href="@yield('link-route')" class="header__item-link-start">
                            @yield('link-text')
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
    @yield('content')

<script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>
